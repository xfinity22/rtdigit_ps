<?php
App::uses('AppController', 'Controller');
/**
 * Periodincludes Controller
 *
 * @property Periodinclude $Periodinclude
 * @property PaginatorComponent $Paginator
 */
class PeriodincludesController extends AppController {

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
	public function index($payrollperiod = null) {
		$this->loadModel('User');
		$user = $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id'))));
		$period = $user['User']['payrollperiod'];
		$id = $this->Auth->user('id');
		if($period != 0){
			
			$employees = $this->Periodinclude->Employee->find('all', array(
				'conditions' => array(
					'Employee.employmentstatus_id <' =>  4
				),
				'order' => array(
					'Employee.lastname' => 'ASC',
					'Employee.firstname' => 'ASC',
				)
			));
			
			$this->set('employees', $employees);
		}
		
		$this->set('id', $id);
		$this->set('period', $period);
		
		
		
		
		$payrollperiods = $this->Periodinclude->Payrollperiod->find('list', array(
			'order' => array(
				'Payrollperiod.id' => 'DESC'
			),
			'fields' => 'Payrollperiod.period'
		));
		
		$this->set(compact('payrollperiods'));
			
		if ($this->request->is('post')) {
			$this->User->create();
			if($this->User->updateAll(array("User.payrollperiod" => $this->data['User']['payrollperiod_id']), array("User.id" => $this->Auth->user('id')))){
				$this->Session->setFlash(__('DEFAULT PAYROLL PERIOD WAS SAVED!'), 'success_message');
				return $this->redirect(array('controller' => 'periodincludes', 'action' => 'index'));
			}
		}	
		
		$this->loadModel('Branch');
		$this->set('branches', $branches = $this->Branch->find('all', array('order' => array('Branch.name' => 'ASC'))));
		
		$this->loadModel('Department');
		$this->set('departments', $departments = $this->Department->find('all', array('order' => array('Department.name' => 'ASC'))));
		
		$this->loadModel('Employeetype');
		$this->set('employeetypes', $employeetypes = $this->Employeetype->find('all', array('order' => array('Employeetype.name' => 'ASC'))));
	}
	
	
	
	
	public function index2($payrollperiod = null) {
		
			$id = $this->Auth->user('id');
			$this->loadModel('User');
			$this->loadModel('Payrollperiod');
			
			$period = $this->User->find('first', array('conditions' => array('User.id' => $id)));
			$this->set('period', $period);
			$periodid = $period['User']['payrollperiod'];
			$this->set('periodid', $periodid);
			
			$periods = $this->Payrollperiod->find('all', array('conditions' => array('Payrollperiod.payrolltype_id' => 2), 'order' => array('Payrollperiod.id' => 'DESC')));
			$this->set('periods', $periods);
			
			$this->Periodinclude->recursive = 0;
			$this->set('periodincludes', $this->Periodinclude->find('all'));
			
			if ($this->request->is('post')) {
				if($this->User->updateAll(array("User.payrollperiod" => $this->data['Employee']['period']), array("User.id" => $this->Auth->user('id')))){
					$this->Session->setFlash(__('DEFAULT PAYROLL PERIOD WAS SAVED!'), 'success_message');
				}
			}	
		
	}
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Periodinclude->exists($id)) {
			throw new NotFoundException(__('Invalid periodinclude'));
		}
		$options = array('conditions' => array('Periodinclude.' . $this->Periodinclude->primaryKey => $id));
		$this->set('periodinclude', $this->Periodinclude->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($period = null) {
		$this->loadModel('Employee');
		$this->loadModel('User');
		if ($this->request->is('post')) {
			$this->Periodinclude->create();
			if (!empty($this->data['Periodinclude']['employee_id'])){
				foreach($this->data['Periodinclude']['employee_id'] as $index => $key):
				$data1[] = array(
					'Periodinclude' => array(
						'payrollperiod_id' => $period,
						'employee_id' => $this->data['Periodinclude']['employee_id'][$index],
					)
				);
				endforeach;	
			}
				
			if($this->Periodinclude->saveAll($data1)){	
				if($this->User->updateAll(array("User.payrollperiod" => $period ), array("User.id" => $this->Auth->user('id')))){
					$this->Session->setFlash(__('SUCCESSFULLY SAVED!'), 'success_message');
					return $this->redirect(array('controller' => 'periodincludes', 'action' => 'index', $period));
				}
				
				$this->Session->setFlash(__('The payrollperiod has been saved.'));
				return $this->redirect(array('controller' => 'employees', 'action' => 'index'));
			}else{
				$this->Session->setFlash(__('The periodinclude could not be saved. Please, try again.'));
			}
		}
		$payrollperiods = $this->Periodinclude->Payrollperiod->find('list');
		$employees = $this->Employee->find('all', array('conditions' => array('Employee.employmentstatus_id < ' => 4), 'order' => array('Employee.lastname' => 'ASC', 'Employee.firstname' => 'ASC')));
		$this->set(compact('payrollperiods'));
		$this->set('employees', $employees);
		$this->set('period', $period);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Periodinclude->exists($id)) {
			throw new NotFoundException(__('Invalid periodinclude'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Periodinclude->save($this->request->data)) {
				$this->Session->setFlash(__('The periodinclude has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The periodinclude could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Periodinclude.' . $this->Periodinclude->primaryKey => $id));
			$this->request->data = $this->Periodinclude->find('first', $options);
		}
		$payrollperiods = $this->Periodinclude->Payrollperiod->find('list');
		$employees = $this->Periodinclude->Employee->find('list');
		$this->set(compact('payrollperiods', 'employees'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $payrollperiod = null, $employee_id = null) {
		
		$search = $this->Periodinclude->find('first', array('conditions' => array('Periodinclude.id' => $id)));
		$employee = $search['Periodinclude']['employee_id'];
		$payroll = $search['Periodinclude']['payrollperiod_id'];
		
		
		$this->Periodinclude->id = $id;
		if (!$this->Periodinclude->exists()) {
			throw new NotFoundException(__('Invalid periodinclude'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Periodinclude->delete()) {
			$this->Session->setFlash(__('SUCCESSFULLY REMOVED.'));
			
		} else {
			$this->Session->setFlash(__('The periodinclude could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function checkemployee($id = null, $payrollperiod = null){
		$true = $this->Periodinclude->find('first', array('conditions' => array('AND' => array('Periodinclude.employee_id' => $id, 'Periodinclude.payrollperiod_id' => $payrollperiod))));
		if(isset($this->params['requested'])){
			return $true;			
		}
		
	}
}
