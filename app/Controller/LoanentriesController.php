<?php
App::uses('AppController', 'Controller');
/**
 * Loanentries Controller
 *
 * @property Loanentry $Loanentry
 * @property PaginatorComponent $Paginator
 */
class LoanentriesController extends AppController {

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
		if(empty($id)){
			
			$liste = $this->Loanentry->Employee->find('all', array(
				'order' => array(
					'Employee.id' => 'DESC',
					'Employee.lastname' => 'ASC',
					'Employee.firstname' => 'ASC',
				),
				'limit' => 50
			));
			
			$this->set('liste', $liste);
			
		}else{
			$liste = $this->Loanentry->Employee->find('all', array(
				'conditions' => array(
					'Employee.id' => $id
				),
				'order' => array(
					'Employee.id' => 'DESC',
					'Employee.lastname' => 'ASC',
					'Employee.firstname' => 'ASC',
				)
			));
			$this->set('liste', $liste);
			$this->set('id', $id);
		}
		
		$employees = $this->Loanentry->Employee->find('list', array(
			'order' => array(
				'Employee.firstname' => 'ASC',
				'Employee.lastname' => 'ASC'
			),
			'fields' => 'Employee.fullname'
		));
		
		$this->set(compact('employees'));
		
		if ($this->request->is('post')) {
			return $this->redirect(array('action' => 'index', $this->data['Loanentry']['employee_id']));
		}
		
		
	}
	
	public function inactiveloans($id = null) {
		if(empty($id)){
			
			$liste = $this->Loanentry->Employee->find('all', array(
				'order' => array(
					'Employee.id' => 'DESC',
					'Employee.lastname' => 'ASC',
					'Employee.firstname' => 'ASC',
				),
				'limit' => 50
			));
			
			$this->set('liste', $liste);
			
		}else{
			$liste = $this->Loanentry->Employee->find('all', array(
				'conditions' => array(
					'Employee.id' => $id
				),
				'order' => array(
					'Employee.id' => 'DESC',
					'Employee.lastname' => 'ASC',
					'Employee.firstname' => 'ASC',
				)
			));
			$this->set('liste', $liste);
			$this->set('id', $id);
		}
		
		$employees = $this->Loanentry->Employee->find('list', array(
			'order' => array(
				'Employee.firstname' => 'ASC',
				'Employee.lastname' => 'ASC'
			),
			'fields' => 'Employee.fullname'
		));
		
		$this->set(compact('employees'));
		
		if ($this->request->is('post')) {
			return $this->redirect(array('action' => 'inactiveloans', $this->data['Loanentry']['employee_id']));
		}
		
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $loantype = null) {
		$loan = $this->Loanentry->find('first', array(
			'conditions' => array(
				'AND' => array(
					'Loanentry.id' => $id
			))
		));
		$this->Loanentry->recursive = 0;
		$this->set('loan', $loan);
		$this->set('id', $id);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($empid = null) {
		if ($this->request->is('post')) {
			$this->Loanentry->create();
			$this->request->data['Loanentry']['balance'] = $this->data['Loanentry']['amount'];
			if ($this->Loanentry->save($this->request->data)) {
				$this->Session->setFlash(__('The loan entry has been saved.'));
				return $this->redirect(array('action' => 'index', $empid));
			} else {
				$this->Session->setFlash(__('The loan entry could not be saved. Please, try again.'));
			}
		}
		$loantypes = $this->Loanentry->Loantype->find('list');
		$this->set(compact('loantypes'));
		
		
		if(!empty($empid)){
			$emp = $this->Loanentry->Employee->find('first', array('conditions' => array('Employee.id' => $empid)));
			$this->set('emp', $emp);
		}
			$employees = $this->Loanentry->Employee->find('all', array('order' => array('Employee.fullname' => 'ASC'), 'conditions' => array('Employee.employmentstatus_id <' => 4)));
			$this->set('employees', $employees);	
			$this->set('empid', $empid);	
		
	}
	
	
	public function add2($empid = null, $payrollperiod = null) {
		$this->loadModel('Loanpayment');
		if ($this->request->is('post')) {
			$this->Loanentry->create();
			if ($this->Loanentry->save($this->request->data)) {
				$this->Session->setFlash(__('The loan entry has been saved.'));
				$data = array(
					'Loanpayment' => array(
						'payrollperiod_id' => $payrollperiod,
						'employee_id' => $empid,
						'loantype_id' => $this->data['Loanentry']['loantype_id'],
						'amount' => $this->data['Loanentry']['deductionperpayday']
					)
				);
				$this->Loanpayment->create();
				if($this->Loanpayment->save($data)){
					return $this->redirect(array('controller' => 'incomes', 'action' => 'view', $empid, $payrollperiod));
				}
			} else {
				$this->Session->setFlash(__('The loan entry could not be saved. Please, try again.'));
			}
		}
		$loantypes = $this->Loanentry->Loantype->find('list');
		$this->set(compact('loantypes'));
		
		
		if(!empty($empid)){
			$emp = $this->Loanentry->Employee->find('first', array('conditions' => array('Employee.id' => $empid)));
			$this->set('emp', $emp);
		}
			$employees = $this->Loanentry->Employee->find('all', array('conditions' => array('Employee.id' => $empid)));
			$this->set('employees', $employees);	
			$this->set('empid', $empid);	
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Loanentry->exists($id)) {
			throw new NotFoundException(__('Invalid loanentry'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Loanentry->save($this->request->data)) {
				$this->Session->setFlash(__('The loan entry has been saved.'));
				return $this->redirect(array('action' => 'index', $this->data['Loanentry']['employee_id']));
			} else {
				$this->Session->setFlash(__('The loan entry could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Loanentry.' . $this->Loanentry->primaryKey => $id));
			$this->request->data = $this->Loanentry->find('first', $options);
		}
		$loantypes = $this->Loanentry->Loantype->find('list');
		$employees = $this->Loanentry->Employee->find('list', array(
			'conditions' => array(
				'Employee.id' => $this->request->data['Loanentry']['employee_id']
			),
			'order' => array(
				'Employee.fullname' => 'ASC'
			),
			'fields' => 'Employee.fullname'
		));
		
		$emp = $this->Loanentry->find('first', array('conditions' => array('Loanentry.id' => $id)));
	
		$this->set(compact('loantypes', 'employees'));
		$this->set('emp', $emp);
		$this->set('employees', $employees);
		
		
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $empid = null, $payrollperiod = null) {
		$this->Loanentry->id = $id;
		if (!$this->Loanentry->exists()) {
			throw new NotFoundException(__('Invalid loanentry'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Loanentry->delete()) {
			$this->Session->setFlash(__('The loan entry has been deleted.'));
		} else {
			$this->Session->setFlash(__('The loan entry could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('controller' => 'incomes', 'action' => 'view', $empid, $payrollperiod));
	}
	
	public function selectloan($empid = null){
		$loans = $this->Loanentry->find('all', array('conditions' => array('AND' => array('Loanentry.employee_id' => $empid, 'Loanentry.status' => 1))));
		if(isset($this->params['requested'])){
			return $loans;
		}
	}
	
	public function type($id = null){
		$type = $this->Loanentry->find('first', array('conditions' => array('AND' => array('Loanentry.loantype_id' => $id))));
		if(isset($this->params['requested'])){
			return $type;
		}
	}
	
	public function loanreport($id = null, $option = null){
		if($option == 1){
			$loans = $this->Loanentry->find('all', array(
				'conditions' => array(
					'AND' => array(
						'Loanentry.employee_id' => $id,
						// 'Loanentry.status >' => 0,
				)),
				
				'order' =>  array(
					'Loanentry.id' => 'DESC',
					'Loanentry.status' => 'ASC',
				)
			));
		}else{
			$loans = $this->Loanentry->find('all', array(
				'conditions' => array(
					'AND' => array(
						'Loanentry.employee_id' => $id,
						// 'Loanentry.status' => 0,
				)),
				
				'order' =>  array(
					'Loanentry.id' => 'DESC',
					'Loanentry.status' => 'ASC',
				)
			));
		}
		
		
		$this->Loanentry->recursive = 0;
		//$this->set('loans', $this->Paginator->paginate());
		$this->set('id', $id);
		
		$employee = $this->Loanentry->Employee->find('first', array(
			'conditions' => array(
				'Employee.id' => $id
			)
			
		));
		
		$this->set('employee', $employee);
		$this->set('loans', $loans);
	}
	
	public function printloan($id = null, $loantype = null){
		if(empty($loantype)){
			$loans = $this->Loanentry->find('all', array(
				'conditions' => array(
					'AND' => array(
						'Loanentry.employee_id' => $id,
						// 'Loanentry.status >' => 0,
					)
				),
				'order' =>  array(
					'Loanentry.id' => 'DESC',
					'Loanentry.status' => 'ASC',
				)
			));
		}else{
			$loans = $this->Loanentry->find('all', array(
				'conditions' => array(
					'AND' => array(
						'Loanentry.employee_id' => $id,
						'Loanentry.id' => $loantype,
						// 'Loanentry.status >' => 0,
					)
				),
				'order' =>  array(
					'Loanentry.id' => 'DESC',
					'Loanentry.status' => 'ASC',
				)
			));
		}
		
		$employee = $this->Loanentry->Employee->find('first', array(
			'conditions' => array(
				'Employee.id' => $id
			)
			
		));
		
		$this->set('employee', $employee);
		$this->set('loans', $loans);
		$this->set('id', $id);
	}
	
	public function searchloan($id = null, $option = null){
		if($option == 1){
			$loanentries = $this->Loanentry->find('all', array(
				'conditions' => array(
					'AND' => array(
						'Loanentry.employee_id' => $id,
						'Loanentry.status >' => 0
					)
					
				)
			));
		}else{
			$loanentries = $this->Loanentry->find('all', array(
				'conditions' => array(
					'AND' => array(
						'Loanentry.employee_id' => $id,
						'Loanentry.status' => 0
					)
					
				)
			));
			
		}
		
		if(isset($this->params['requested'])){
			return $loanentries;
		}
		
	}
	
	public function delete2($id = null, $empid = null) {
		$this->Loanentry->id = $id;
		if (!$this->Loanentry->exists()) {
			throw new NotFoundException(__('Invalid loanentry'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Loanentry->delete()) {
			$this->Session->setFlash(__('The loan entry has been deleted.'));
		} else {
			$this->Session->setFlash(__('The loan entry could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index', $empid));
	}
}
