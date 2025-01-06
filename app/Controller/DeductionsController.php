<?php
App::uses('AppController', 'Controller');
/**
 * Deductions Controller
 *
 * @property Deduction $Deduction
 * @property PaginatorComponent $Paginator
 */
class DeductionsController extends AppController {

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
	public function index() {
		$this->Deduction->recursive = 0;
		$this->set('deductions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Deduction->exists($id)) {
			throw new NotFoundException(__('Invalid deduction'));
		}
		$options = array('conditions' => array('Deduction.' . $this->Deduction->primaryKey => $id));
		$this->set('deduction', $this->Deduction->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		if ($this->request->is('post')) {
			$this->Deduction->create();
			if ($this->Deduction->save($this->request->data)) {
				$this->Session->setFlash(__('The deduction has been saved.'));
				return $this->redirect(array('controller' => 'employees', 'action' => 'edit', $id));
			} else {
				$this->Session->setFlash(__('The deduction could not be saved. Please, try again.'));
			}
		}
		$employees = $this->Deduction->Employee->find('list', array('conditions' => array('Employee.id' => $id), 'fields' => 'fullname'));
		$payrollperiods = $this->Deduction->Payrollperiod->find('list');
		$users = $this->Deduction->User->find('list');
		$this->set(compact('employees', 'payrollperiods', 'users'));
		
		$this->set('id', $id);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $eid = null) {
		if (!$this->Deduction->exists($id)) {
			throw new NotFoundException(__('Invalid deduction'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Deduction->save($this->request->data)) {
				$this->Session->setFlash(__('The deduction has been saved.'));
				return $this->redirect(array('controller' => 'employees', 'action' => 'edit', $eid));
			} else {
				$this->Session->setFlash(__('The deduction could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Deduction.' . $this->Deduction->primaryKey => $id));
			$this->request->data = $this->Deduction->find('first', $options);
		}
		$employees = $this->Deduction->Employee->find('list', array('conditions' => array('Employee.id' => $eid), 'fields' => 'fullname'));
		$payrollperiods = $this->Deduction->Payrollperiod->find('list');
		$users = $this->Deduction->User->find('list');
		$this->set(compact('employees', 'payrollperiods', 'users'));
		
		$this->set('eid', $eid);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $eid = null) {
		$this->Deduction->id = $id;
		if (!$this->Deduction->exists()) {
			throw new NotFoundException(__('Invalid deduction'));
		}
		//$this->request->allowMethod('post', 'delete');
		if ($this->Deduction->delete()) {
			$this->Session->setFlash(__('The deduction has been deleted.'));
		} else {
			$this->Session->setFlash(__('The deduction could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('controller' => 'employees', 'action' => 'edit', $eid));
	}
	
	public function searchdeductions($id = null){
		$deductions = $this->Deduction->find('first', array('conditions' => array('Deduction.employee_id' => $id)));
		if(isset($this->params['requested'])){
			return $deductions;
		}
	}
	
	public function deductions($employeeid = null, $payrollperiod = null){
		$deductions = $this->Deduction->find('all', array('conditions' => array('AND' => array('Deduction.payrollperiod_id' => $payrollperiod, 'Deduction.employee_id' => $employeeid))));
		if(isset($this->params['requested'])){
			return $deductions;
		}
	}
}
