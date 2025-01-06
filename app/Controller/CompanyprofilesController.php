<?php
App::uses('AppController', 'Controller');
/**
 * Companyprofiles Controller
 *
 * @property Companyprofile $Companyprofile
 * @property PaginatorComponent $Paginator
 */
class CompanyprofilesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index($id = null) {
		return $this->redirect(array('action' => 'view', $id));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->set('companyprofile', $this->Companyprofile->find('first'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		$search = $this->Companyprofile->find('first');
		if(empty($search)){
			if ($this->request->is('post')) {
				$this->Companyprofile->create();
				if ($this->Companyprofile->save($this->request->data)) {
					$this->Session->setFlash(__('The Company Profile has been saved.'));
					return $this->redirect(array('controller' => 'companyprofiles', 'action' => 'view', $this->Companyprofile->getlastInsertId()));
				} else {
					$this->Session->setFlash(__('The Company Profile could not be saved. Please, try again.'));
				}
			}
		}else{
			if(empty($id)){
				return $this->redirect(array('action' => 'edit', $search['Companyprofile']['id']));
			}else{
				return $this->redirect(array('action' => 'footer', $search['Companyprofile']['id']));
			}
			
		}
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $action = null) {
		if (!$this->Companyprofile->exists($id)) {
			throw new NotFoundException(__('Invalid companyprofile'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if($action == 2){
				if($this->Uploadfile->checkfileExtensionforfileforpicture($this->data['Companyprofile']['logo'])){
					$filename = "logo";				
					if (($this->Uploadfile->uploadforDownloadfile($this->data['Companyprofile']['logo'], APP.'webroot/img/', $this->renamefilewithextension($this->data['Companyprofile']['logo'], $filename)))){	
						$newfilename = "logo.jpg";
						if($this->Companyprofile->updateAll(array("Companyprofile.logo" => "'".$newfilename."'"), array("Companyprofile.id" => $id))){
							$this->Session->setFlash(__('Sucessfully Uploaded.'), 'success_message');
							//$this->flash('Your post has been updated, thanks', 'view', $id);
							return $this->redirect(array('action' => 'index', $id));
						}
					} else {
						$this->Session->setFlash(__('Could not be saved. Please, try again.'));
					}
				}else{
					$this->Session->setFlash(__('Invalid File. Please, try again.'));
				}
			}else{
				if ($this->Companyprofile->save($this->request->data)) {
					$this->Session->setFlash(__('The Company Profile has been saved.'), 'success_message');
					return $this->redirect(array('action' => 'view', $id));
				} else {
					$this->Session->setFlash(__('The Company Profile could not be saved. Please, try again.'));
				}
			}
		} else {
			$options = array('conditions' => array('Companyprofile.' . $this->Companyprofile->primaryKey => $id));
			$this->request->data = $this->Companyprofile->find('first', $options);
		}
		$c = $this->Companyprofile->find('first');
		$this->set('c', $c);
		$this->set('action', $action);
	}
	
	public function renamefilewithextension($filename, $newfilename){
			$filename = $filename['name'];
			$extension = end(explode(".", $filename));
			$newfilename = $newfilename.".jpg";
			return $newfilename;
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Companyprofile->id = $id;
		if (!$this->Companyprofile->exists()) {
			throw new NotFoundException(__('Invalid companyprofile'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Companyprofile->delete()) {
			$this->Session->setFlash(__('The Company Profile has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Company Profile could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function findprofile(){
		$profilec = $this->Companyprofile->find('first');
		if(isset($this->params['requested'])){
			return $profilec;
		}
		
	}
	
	public function footer($id = null) {
		if (!$this->Companyprofile->exists($id)) {
			throw new NotFoundException(__('Invalid companyprofile'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Companyprofile->save($this->request->data)) {
					$this->Session->setFlash(__('The COE Footer has been saved.'), 'success_message');
					return $this->redirect(array('action' => 'footer', $id));
				} else {
					$this->Session->setFlash(__('The Company Profile could not be saved. Please, try again.'));
				}
		} else {
			$options = array('conditions' => array('Companyprofile.' . $this->Companyprofile->primaryKey => $id));
			$this->request->data = $this->Companyprofile->find('first', $options);
		}
		
	}
	
	public function getData() {
		$profile = $this->Companyprofile->find('first');
		if(isset($this->params['requested'])){
			return $profile;			
		}
	}
}
