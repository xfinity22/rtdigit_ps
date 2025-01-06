<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function settings(){
		$this->set('title_for_layout', 'System Settings');
	}
	
/**
 * index method
 *
 * @return void
 */
 
	public function loggeduser($id=null){
		$id = $this->Auth->user('id');
		$user = $this->User->findById($id);		
		if(isset($this->params['requested'])){
			return $user;
		}
	}

	public function login() {
		$this->loadModel('Companyprofile');
		$profile = $this->Companyprofile->find('first');
		$this->loadModel('Parameter');
		$this->layout = ('login');
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				if($this->Auth->user('userstatus_id') == 1){
					if($this->Auth->user('usertype_id') != 4){
						$this->User->updateAll(array("User.lastip" => "'".$this->RequestHandler->getClientIp()."'"), array("User.id" => $this->Auth->user('id')));$this->User->updateAll(array("User.lastaccess" => "'".date('Y-m-d H:i:s', time())."'"), array("User.id" => $this->Auth->user('id')));
						$this->User->updateAll(array("User.payrollperiod" => 0), array("User.id" => $this->Auth->user('id')));
						if(empty($profile)){
							$this->redirect(array('controller' => 'companyprofiles', 'action' => 'add'));
						}else{
							$this->redirect(array('controller' => 'companyprofiles', 'action' => 'view', $profile['Companyprofile']['id']));
						}	
					}else{
						$this->User->updateAll(array("User.lastip" => "'".$this->RequestHandler->getClientIp()."'"), array("User.id" => $this->Auth->user('id')));$this->User->updateAll(array("User.lastaccess" => "'".date('Y-m-d H:i:s', time())."'"), array("User.id" => $this->Auth->user('id')));
						$this->loadModel('Employee');
						$id = $this->Employee->find('first', array('conditions' => array('Employee.employeeno' => $this->Auth->user('username'))));
						if(empty($id)){
							$this->redirect(array('controller' => 'employees', 'action' => 'dashboard', $this->Auth->user('employeeno')));							
						}else{
							$this->redirect(array('controller' => 'employees', 'action' => 'dashboard', $id['Employee']['id']));
						}
						
						
					}
					
					
				}else{
					$this->Session->setFlash($this->Message->getMessage("Not Authorize to Log in"), 'error_message2');
					
				}
							
			} else {
				$this->Session->setFlash($this->Message->getMessage("Log in Error. Please Try again"), 'error_message2');
			}
		}
	}
		

	public function logout(){
		if($this->redirect($this->Auth->logout())){ 
			$this->redirect(array('action' => 'login'));
		}
	}

 
	public function index() {
		$this->User->recursive = 0;
		$this->paginate = array(
			'limit' => 20,
			'order' =>  array(
				'User.firstname' => 'ASC',
				'User.lastname' => 'DESC'
			)
		);
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$userstatuses = $this->User->Userstatus->find('list');
		$usertypes = $this->User->Usertype->find('list');
		$this->set(compact('userstatuses', 'usertypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $action = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$userstatuses = $this->User->Userstatus->find('list');
		$usertypes = $this->User->Usertype->find('list');
		$this->set(compact('userstatuses', 'usertypes'));
		
		$this->set('action', $action);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function changepassword($id = null) {
		$id = $this->Auth->user('id');		
		$this->set('user', $this->User->findById($id));
		if($this->request->is('post') || $this->request->is('put')){
			$current_password = $this->data['Changepassword']['current'];
			$new_password = $this->data['Changepassword']['newpassword'];
			$confirm_password = $this->data['Changepassword']['confirmnew'];
			$fields = array($current_password, $new_password, $confirm_password);
			if($this->checkemptyfields($fields)){
				if($this->checkpasswordmatch($new_password, $confirm_password)){
					if($this->checkifuserexists($id)){
						if($this->checkifcurrentpasswordexists($current_password, $id)){
							$newpassword = AuthComponent::password($this->data['Changepassword']['newpassword']);
							if($this->User->updateAll(array("User.password" => "'".$newpassword."'"), array("User.id" => $this->Auth->user('id')))){
								$this->Session->setFlash($this->Message->getMessage("add_success"), 'success_message');
								$this->redirect(array('action' => 'changepassword', $id));
							}else{
								$this->Session->setFlash($this->Message->getMessage("Something happens, we advise not to change your password"), 'error_message');
							}	
						}else{
							$this->Session->setFlash($this->Message->getMessage("Current password does not exists."), 'error_message');
						}
					}else{
						$this->Session->setFlash($this->Message->getMessage("Something happens, we advise not to change your password"), 'error_message');
					}
				}else{
					$this->Session->setFlash($this->Message->getMessage("Password dit not match."), 'error_message');
				}
			}else{
				$this->Session->setFlash($this->Message->getMessage("Please fill the necessary fields"), 'error_message');
			}
		}
	}
	
	public function checkemptyfields($fields){
		foreach($fields as $field):
			if(empty($field)){
				return false;
			}
		endforeach;
		return true;
	}
	
	public function checkifuserexists($id=null){
		$id = $this->Auth->user('id');		
		$count_user = $this->User->find('count', array('conditions' => array('User.id' => $id)));
		if($count_user==1){ return true; }else{ return false;}
	}
	
	public function checkpasswordmatch($new_password, $confirm_password){
		if($new_password!=$confirm_password){ return false; }else{ return true;}
	}
	
	public function checkifcurrentpasswordexists($current_password, $id){
		$id = $this->Auth->user('id');
		$current_password = AuthComponent::password($current_password);
		$count_password = $this->User->find('count', array('conditions' => array('User.password' => $current_password, 'User.id' => $id)));
		if($count_password==1){return true; }else{ return false;}
	}
	
	public function changestatus($payrollperiod = null){
		$id = $this->Auth->user('id');
		if($this->User->updateAll(array("User.payrollperiod" => $payrollperiod ), array("User.id" => $id))){
			$this->Session->setFlash(__('DEFAULT PAYROLL PERIOD WAS SAVED!'), 'success_message');
			return $this->redirect(array('controller' => 'payrollperiods', 'action' => 'index'));
		}
	}
}
