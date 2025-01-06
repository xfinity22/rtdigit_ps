<?php
App::uses('AppController', 'Controller');
/**
 * Earningrecords Controller
 *
 * @property Earningrecord $Earningrecord
 * @property PaginatorComponent $Paginator
 */
class EarningrecordsController extends AppController {

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
		$this->Earningrecord->recursive = 0;
		$this->set('earningrecords', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Earningrecord->exists($id)) {
			throw new NotFoundException(__('Invalid earningrecord'));
		}
		$options = array('conditions' => array('Earningrecord.' . $this->Earningrecord->primaryKey => $id));
		$this->set('earningrecord', $this->Earningrecord->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($employeeid = null, $payrollperiod = null, $income = null) {
		$this->loadModel('Income');
		$this->loadModel('Employee');
		$this->loadModel('Payrollperiod');
		$employee = $this->Employee->find('first', array('conditions' => array('Employee.id' => $employeeid)));
		$payroll = $this->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
		$income = $this->Income->find('first', array('conditions' => array('Income.id' => $income)));
		$this->set('payroll', $payroll);
		$this->set('employee', $employee);
		$this->set('income', $income);
		
		if ($this->request->is('post')) {
			foreach($this->data['Earningrecord']['otherearningsentry_id'] as $index => $key):
			$data1[] = array(
				'Earningrecord' => array(
					'payrollperiod_id' => $this->data['Earningrecord']['payrollperiod_id'][$index],
					'employee_id' => $this->data['Earningrecord']['employee_id'][$index],
					'otherearningsentry_id' => $this->data['Earningrecord']['otherearningsentry_id'][$index],
					'ratetype_id' => $this->data['Earningrecord']['ratetype_id'][$index],
					'daysabsent' => $this->data['Earningrecord']['daysabsent'][$index],
					'daysworked' => $this->data['Earningrecord']['daysworked'][$index],
					'totalamount' => $this->data['Earningrecord']['totalamount'][$index],
					'amount' => $this->data['Earningrecord']['amount'][$index],
				)
			);
			endforeach;
					
			$this->Earningrecord->create();	
			if($this->Earningrecord->saveAll($data1)){								
				$this->Session->setFlash(__('Successfully saved.'));
				return $this->redirect(array('controller' => 'incomes', 'action' => 'view', $employeeid, $payrollperiod));
			}else {
				$this->Session->setFlash(__('The loanpayment could not be saved. Please, try again.'));
			}
		}
		
		$otherearningsentries = $this->Earningrecord->Otherearningsentry->find('list');
		$payrollperiods = $this->Earningrecord->Payrollperiod->find('list');
		$this->set(compact('otherearningsentries', 'payrollperiods'));
		$this->set('payrollperiod', $payrollperiod);
	}
	
	public function add2($employeeid = null, $payrollperiod = null) {
		$this->loadModel('Employee');
		$this->loadModel('Payrollperiod');
		$employee = $this->Employee->find('first', array('conditions' => array('Employee.id' => $employeeid)));
		$payroll = $this->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
		$this->set('payroll', $payroll);
		$this->set('employee', $employee);
		
		if ($this->request->is('post')) {
			$this->Earningrecord->create();
			if ($this->Earningrecord->save($this->request->data)) {
				$this->Session->setFlash(__('The Earningrecord has been saved.'));
				return $this->redirect(array('controller' => 'incomes', 'action' => 'view', $employeeid, $payrollperiod));
			} else {
				$this->Session->setFlash(__('The Earningrecord could not be saved. Please, try again.'));
			}
		}		
		//$otherearnings = $this->Otherearningsentry->Otherearning->find('list');
		$this->set(compact('otherearnings'));
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
		if (!$this->Earningrecord->exists($id)) {
			throw new NotFoundException(__('Invalid earningrecord'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Earningrecord->save($this->request->data)) {
				$this->Session->setFlash(__('The earningrecord has been saved.'));
				return $this->redirect(array('controller' => 'incomes', 'action' => 'view', $employeeid, $payrollperiod));
			} else {
				$this->Session->setFlash(__('The earningrecord could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Earningrecord.' . $this->Earningrecord->primaryKey => $id));
			$this->request->data = $this->Earningrecord->find('first', $options);
		}
		$entry = $this->Earningrecord->find('first', array('conditions' => array('Earningrecord.id' => $id)));
		$this->set('entry', $entry);
		$otherearningsentries = $this->Earningrecord->Otherearningsentry->find('list');
		$payrollperiods = $this->Earningrecord->Payrollperiod->find('list');
		$this->set(compact('otherearningsentries', 'payrollperiods'));
		
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
		$this->Earningrecord->id = $id;
		if (!$this->Earningrecord->exists()) {
			throw new NotFoundException(__('Invalid earningrecord'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Earningrecord->delete()) {
			$this->Session->setFlash(__('The earningrecord has been deleted.'));
		} else {
			$this->Session->setFlash(__('The earningrecord could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('controller' => 'incomes', 'action' => 'view', $employeeid, $payrollperiod));
	}
	
	public function earnings($employeeid = null, $payrollperiod = null){
		$earnings = $this->Earningrecord->find('all', array('conditions' => array('AND' => array('Earningrecord.payrollperiod_id' => $payrollperiod, 'Earningrecord.employee_id' => $employeeid))));
		if(isset($this->params['requested'])){
			return $earnings;
		}
	}
	
	public function s_earnings($employeeid = null, $payrollperiod = null, $type = null){
		$earnings = $this->Earningrecord->find('all', array(
			'conditions' => array(
				'AND' => array(
					'Earningrecord.payrollperiod_id' => $payrollperiod,
					'Earningrecord.employee_id' => $employeeid,
					'Earningrecord.otherearningsentry_id' => $type
				)
			)
		));
		if(isset($this->params['requested'])){
			return $earnings;
		}
	}
	
	public function search2($payrollperiod = null, $type = null){
		$searchs = $this->Earningrecord->find('all', array(
			'conditions' => array(
				'AND' => array(
					'Earningrecord.payrollperiod_id' => $payrollperiod,
					'Earningrecord.otherearningsentry_id' => $type
				)
			)
		));
		if(isset($this->params['requested'])){
			return $searchs;
		}
	}
	
	
}
