<?php
App::uses('AppController', 'Controller');
/**
 * Otherductionentries Controller
 *
 * @property Otherductionentry $Otherductionentry
 * @property PaginatorComponent $Paginator
 */
class OtherductionentriesController extends AppController {

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
		$this->Otherductionentry->recursive = 0;
		$this->set('otherductionentries', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Otherductionentry->exists($id)) {
			throw new NotFoundException(__('Invalid otherductionentry'));
		}
		$options = array('conditions' => array('Otherductionentry.' . $this->Otherductionentry->primaryKey => $id));
		$this->set('otherductionentry', $this->Otherductionentry->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($employeeid = null, $payrollperiod = null) {
		if ($this->request->is('post')) {
			$this->Otherductionentry->create();
			if ($this->Otherductionentry->save($this->request->data)) {
				$this->Session->setFlash(__('The otherductionentry has been saved.'));
				return $this->redirect(array('controller' => 'incomes', 'action' => 'view', $employeeid, $payrollperiod));
			} else {
				$this->Session->setFlash(__('The otherductionentry could not be saved. Please, try again.'));
			}
		}
		
		$otherdeductions = $this->Otherductionentry->Otherdeduction->find('list');
		$this->set(compact('otherdeductions'));
		
		$this->set('employeeid', $employeeid);
		$this->set('payrollperiod', $payrollperiod);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $employeeid = null, $payrollperiod = null) {
		if (!$this->Otherductionentry->exists($id)) {
			throw new NotFoundException(__('Invalid otherductionentry'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Otherductionentry->save($this->request->data)) {
				$this->Session->setFlash(__('The otherductionentry has been saved.'));
				return $this->redirect(array('controller' => 'incomes', 'action' => 'view', $employeeid, $payrollperiod));
			} else {
				$this->Session->setFlash(__('The otherductionentry could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Otherductionentry.' . $this->Otherductionentry->primaryKey => $id));
			$this->request->data = $this->Otherductionentry->find('first', $options);
		}
		$payrollperiods = $this->Otherductionentry->Payrollperiod->find('list');
		$employees = $this->Otherductionentry->Employee->find('list');
		$otherdeductions = $this->Otherductionentry->Otherdeduction->find('list');
		$this->set(compact('payrollperiods', 'employees', 'otherdeductions'));
		$this->set('employeeid', $employeeid);
		$this->set('payrollperiod', $payrollperiod);
	
		$this->set('employeeid', $employeeid);
		$this->set('payrollperiod', $payrollperiod);
	
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $employeeid = null, $payrollperiod = null) {
		$this->Otherductionentry->id = $id;
		if (!$this->Otherductionentry->exists()) {
			throw new NotFoundException(__('Invalid otherductionentry'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Otherductionentry->delete()) {
			$this->Session->setFlash(__('The otherductionentry has been deleted.'));
		} else {
			$this->Session->setFlash(__('The otherductionentry could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('controller' => 'incomes', 'action' => 'view', $employeeid, $payrollperiod));
	}
	
	public function otherdeducts($employeeid = null, $payrollperiod = null){
		$otherdeduction = $this->Otherductionentry->find('all', array('conditions' => array('AND' => array('Otherductionentry.payrollperiod_id' => $payrollperiod, 'Otherductionentry.employee_id' => $employeeid))));
		if(isset($this->params['requested'])){
			return $otherdeduction;
		}
	}
	
	public function s_deduction($employeeid = null, $payrollperiod = null, $type = null){
		$deductions = $this->Otherductionentry->find('all', array(
			'conditions' => array(
				'AND' => array(
					'Otherductionentry.payrollperiod_id' => $payrollperiod,
					'Otherductionentry.employee_id' => $employeeid,
					'Otherductionentry.otherdeduction_id' => $type,
				)
			)
		));
		if(isset($this->params['requested'])){
			return $deductions;
		}
	}
	
	public function search2($payrollperiod = null, $type = null){
		$searchs = $this->Otherductionentry->find('all', array(
			'conditions' => array(
				'AND' => array(
					'Otherductionentry.payrollperiod_id' => $payrollperiod,
					'Otherductionentry.otherdeduction_id' => $type
				)
			)
		));
		if(isset($this->params['requested'])){
			return $searchs;
		}
	}
}
