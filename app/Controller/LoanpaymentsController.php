<?php
App::uses('AppController', 'Controller');
/**
 * Loanpayments Controller
 *
 * @property Loanpayment $Loanpayment
 * @property PaginatorComponent $Paginator
 */
class LoanpaymentsController extends AppController {

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
		$this->Loanpayment->recursive = 0;
		$this->set('loanpayments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Loanpayment->exists($id)) {
			throw new NotFoundException(__('Invalid loanpayment'));
		}
		$options = array('conditions' => array('Loanpayment.' . $this->Loanpayment->primaryKey => $id));
		$this->set('loanpayment', $this->Loanpayment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($employeeid = null, $payrollperiod = null) {
		$this->loadModel('Employee');
		$this->loadModel('Payrollperiod');
		$employee = $this->Employee->find('first', array('conditions' => array('Employee.id' => $employeeid)));
		$payroll = $this->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
		$this->set('payroll', $payroll);
		$this->set('employee', $employee);
		
		
		
		if ($this->request->is('post')) {
			foreach($this->data['Loanpayment']['loantype_id'] as $index => $key):
			$data1[] = array(
				'Loanpayment' => array(
					'payrollperiod_id' => $this->data['Loanpayment']['payrollperiod_id'][$index],
					'employee_id' => $this->data['Loanpayment']['employee_id'][$index],
					'loantype_id' => $this->data['Loanpayment']['loantype_id'][$index],
					'amount' => $this->data['Loanpayment']['amount'][$index],
				)
			);
			endforeach;
					
			$this->Loanpayment->create();	
			if($this->Loanpayment->saveAll($data1)){								
				$this->Session->setFlash(__('The loanpayment has been saved.'));
				return $this->redirect(array('controller' => 'incomes', 'action' => 'view', $employeeid, $payrollperiod));
			}else {
				$this->Session->setFlash(__('The loanpayment could not be saved. Please, try again.'));
			}
		}
		$payrollperiods = $this->Loanpayment->Payrollperiod->find('list');
		$loantypes = $this->Loanpayment->Loantype->find('list');
		$this->set(compact('payrollperiods', 'loantypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $employeeid=null, $payrollperiod=null) {
		if (!$this->Loanpayment->exists($id)) {
			throw new NotFoundException(__('Invalid loanpayment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Loanpayment->save($this->request->data)) {
				$this->Session->setFlash(__('The loanpayment has been saved.'));
				return $this->redirect(array('controller' => 'incomes', 'action' => 'view', $employeeid, $payrollperiod));
			} else {
				$this->Session->setFlash(__('The loanpayment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Loanpayment.' . $this->Loanpayment->primaryKey => $id));
			$this->request->data = $this->Loanpayment->find('first', $options);
		}
		$payrollperiods = $this->Loanpayment->Payrollperiod->find('list');
		$loantypes = $this->Loanpayment->Loantype->find('list');
		$this->set(compact('payrollperiods', 'loantypes'));
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
	public function delete($id = null, $empid = null, $payrollperiod = null) {
		$this->Loanpayment->id = $id;
		if (!$this->Loanpayment->exists()) {
			throw new NotFoundException(__('Invalid loanpayment'));
		}
		
		
		
		$this->loadModel('Loanentry');
		$l = $this->Loanpayment->find('first', array(
			'conditions' => array(
				'Loanpayment.id'=> $id
			)
		));
			
		if(!empty($l)){
			$s = $this->Loanentry->find('first', array(
				'conditions' => array(
					'Loanentry.id' => $l['Loanpayment']['loanentry_id']
				)
			));
			
			if(!empty($s)){
				$bal = $l['Loanpayment']['amount'] + $s['Loanentry']['balance'];
				$this->Loanentry->updateAll(array("Loanentry.balance" => "'".$bal."'"), array("Loanentry.id" => $l['Loanpayment']['loanentry_id']));		
			}
		}
		
		$this->request->allowMethod('post', 'delete');
		if ($this->Loanpayment->delete()) {
			$this->Session->setFlash(__('The loanpayment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The loanpayment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('controller' => 'incomes', 'action' => 'view', $empid, $payrollperiod));
	}
	
	public function selectloan($period = null, $empid = null){
		$loans = $this->Loanpayment->find('all', array('conditions' => array('AND' => array('Loanpayment.employee_id' => $empid, 'Loanpayment.payrollperiod_id' => $period))));
		if(isset($this->params['requested'])){
			return $loans;
		}
	}
	
	public function loanpayment($empid = null, $type = null){
		$payments = $this->Loanpayment->find('all', array('conditions' => array('AND'=>array('Loanpayment.employee_id' => $empid, 'Loanpayment.loantype_id' => $type))));
		if(isset($this->params['requested'])){
			return $payments;
		}
	}
	
	public function findloans($payrollperiod = null, $type = null){
		$reports = $this->Loanpayment->find('all', array('conditions' => array(
			'AND' => array(
				'Loanpayment.loantype_id' => $type,
				'MONTH(Payrollperiod.preriodfrom)' => date('m', strtotime($payrollperiod)), 
				'YEAR(Payrollperiod.preriodfrom)' => date('Y', strtotime($payrollperiod)),
				// 'Loanpayment.payrollperiod_id' => $id
		))));
		if(isset($this->params['requested'])){
			return $reports;
		}
	}
	
	public function loans($id = null){
		$loans = $this->Loanpayment->find('all', array('conditions' => array('AND' => array('Loanpayment.payrollperiod_id' => $id, 'Loanpayment.loantype_id' => 2))));
		if(isset($this->params['requested'])){
			return $loans;
		}
	}
	
	public function s_loan($employeeid = null, $payrollperiod = null, $type = null){
		$loans = $this->Loanpayment->find('all', array(
			'conditions' => array(
				'AND' => array(
					'Loanpayment.payrollperiod_id' => $payrollperiod,
					'Loanpayment.employee_id' => $employeeid,
					'Loanpayment.loantype_id' => $type
				)
			)
		));
		if(isset($this->params['requested'])){
			return $loans;
		}
	}
	
	public function search2($payrollperiod = null, $type = null){
		$searchs = $this->Loanpayment->find('all', array(
			'conditions' => array(
				'AND' => array(
					'Loanpayment.payrollperiod_id' => $payrollperiod,
					'Loanpayment.loantype_id' => $type
				)
			)
		));
		if(isset($this->params['requested'])){
			return $searchs;
		}
	}
	
	public function set_loan(){
		$loans = $this->Loanpayment->find('all');
		foreach ($loans as $loan):
			$this->loadModel('Loanentry');
			$s = $this->Loanentry->find('first', array(
				'conditions' => array(
					'AND' => array(
						'Loanentry.loantype_id' => $loan['Loanpayment']['loantype_id'],
						'Loanentry.employee_id' => $loan['Loanpayment']['employee_id'],
						'Loanentry.deductionperpayday' => $loan['Loanpayment']['amount'],
					)
				)
			));
			
			if(!empty($s)){
				$this->Loanpayment->updateAll(array("Loanpayment.loanentry_id" => "'".$s['Loanentry']['id']."'"), array("Loanpayment.id" => $loan['Loanpayment']['id']));		
			}
		endforeach;
	}
}
