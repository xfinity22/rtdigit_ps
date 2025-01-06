<?php
App::uses('AppController', 'Controller');
/**
 * Overtimes Controller
 *
 * @property Overtime $Overtime
 * @property PaginatorComponent $Paginator
 */
class OvertimesController extends AppController {

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
		$this->Overtime->recursive = 0;
		$this->set('overtimes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Overtime->exists($id)) {
			throw new NotFoundException(__('Invalid overtime'));
		}
		$options = array('conditions' => array('Overtime.' . $this->Overtime->primaryKey => $id));
		$this->set('overtime', $this->Overtime->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($employeeid = null, $payrollperiod = null) {
		
		if ($this->request->is('post')) {
			
			$addon = $this->Overtime->Overtimerate->find('first', array('conditions' => array('Overtimerate.id' => $this->request->data['Overtime']['overtimerate_id'])));
			$this->request->data['Overtime']['otaddon'] = $addon['Overtimerate']['addonrate'];
			$this->Overtime->create();
			if ($this->Overtime->save($this->request->data)) {
				$this->Session->setFlash(__('The overtime has been saved.'));
				return $this->redirect(array('controller' => 'incomes', 'action' => 'view', $employeeid, $payrollperiod));
			} else {
				$this->Session->setFlash(__('The overtime could not be saved. Please, try again.'));
			}
		}
		$employee = $this->Overtime->Employee->find('first', array('conditions' => array('Employee.id' => $employeeid)));
		$payroll = $this->Overtime->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
		$otstatuses = $this->Overtime->OTstatus->find('all');
		$otrate = $this->Overtime->Overtimerate->find('all');
		
		$this->set('employee', $employee);
		$this->set('payroll', $payroll);
		$this->set('otrate', $otrate);
		$this->set('otstatuses', $otstatuses);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $employeeid = null, $payrollperiod = null) {
		if (!$this->Overtime->exists($id)) {
			throw new NotFoundException(__('Invalid overtime'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			$addon = $this->Overtime->Overtimerate->find('first', array('conditions' => array('Overtimerate.id' => $this->request->data['Overtime']['overtimerate_id'])));
			$this->request->data['Overtime']['otaddon'] = $addon['Overtimerate']['addonrate'];
			if ($this->Overtime->save($this->request->data)) {
				$this->Session->setFlash(__('The overtime has been saved.'));
				return $this->redirect(array('controller' => 'incomes', 'action' => 'view', $employeeid, $payrollperiod ));
			} else {
				$this->Session->setFlash(__('The overtime could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Overtime.' . $this->Overtime->primaryKey => $id));
			$this->request->data = $this->Overtime->find('first', $options);
		}
		$employees = $this->Overtime->Employee->find('list');
		$payrollperiods = $this->Overtime->Payrollperiod->find('list');
		$otstatuses = $this->Overtime->OTstatus->find('all');
		$overtimerates = $this->Overtime->Overtimerate->find('list');
		$users = $this->Overtime->User->find('list');
		$this->set(compact('employees', 'payrollperiods', 'oTstatuses', 'overtimerates', 'users'));
		
		$ots = $this->Overtime->find('first', array('Overtime.id' => $id));
		$otstatuses = $this->Overtime->OTstatus->find('all');
		$otrate = $this->Overtime->Overtimerate->find('all');
		$this->set('otrate', $otrate);
		$this->set('otstatuses', $otstatuses);
		$this->set('ots', $ots);
		
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $employeeid = null, $payrollperiod = null) {
		$this->Overtime->id = $id;
		if (!$this->Overtime->exists()) {
			throw new NotFoundException(__('Invalid overtime'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Overtime->delete()) {
			$this->Session->setFlash(__('The overtime has been deleted.'));
		} else {
			$this->Session->setFlash(__('The overtime could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('controller' => 'incomes', 'action' => 'view', $employeeid, $payrollperiod));
	}
	
	public function overtimes($employeeid = null, $payrollperiod = null){
		$ots = $this->Overtime->find('all', array(
			'conditions' => array(
				'AND' => array(
					'Overtime.payrollperiod_id' => $payrollperiod,
					'Overtime.employee_id' => $employeeid
				)
			)
		));
		
		if(isset($this->params['requested'])){
			return $ots;
		}
	}
}
