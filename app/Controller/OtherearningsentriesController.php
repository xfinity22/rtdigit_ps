<?php
App::uses('AppController', 'Controller');
/**
 * Otherearningsentries Controller
 *
 * @property Otherearningsentry $Otherearningsentry
 * @property PaginatorComponent $Paginator
 */
class OtherearningsentriesController extends AppController {

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
		$this->Otherearningsentry->recursive = 0;
		$this->set('otherearningsentries', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Otherearningsentry->exists($id)) {
			throw new NotFoundException(__('Invalid otherearningsentry'));
		}
		$options = array('conditions' => array('Otherearningsentry.' . $this->Otherearningsentry->primaryKey => $id));
		$this->set('otherearningsentry', $this->Otherearningsentry->find('first', $options));
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
			$this->Otherearningsentry->create();
			if ($this->Otherearningsentry->save($this->request->data)) {
				$this->Session->setFlash(__('The otherearningsentry has been saved.'));
				return $this->redirect(array('controller' => 'employees', 'action' => 'edit', $employeeid));
			} else {
				$this->Session->setFlash(__('The otherearningsentry could not be saved. Please, try again.'));
			}
		}		
		$otherearnings = $this->Otherearningsentry->Otherearning->find('list', array('order' => array('Otherearning.name' => 'ASC')));
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
	public function edit($id = null, $employeeid = null) {
		if (!$this->Otherearningsentry->exists($id)) {
			throw new NotFoundException(__('Invalid otherearningsentry'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Otherearningsentry->save($this->request->data)) {
				$this->Session->setFlash(__('The otherearningsentry has been saved.'));
				return $this->redirect(array('controller' => 'employees', 'action' => 'edit', $employeeid));
			} else {
				$this->Session->setFlash(__('The otherearningsentry could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Otherearningsentry.' . $this->Otherearningsentry->primaryKey => $id));
			$this->request->data = $this->Otherearningsentry->find('first', $options);
		}
		$payrollperiods = $this->Otherearningsentry->Payrollperiod->find('list');
		$employees = $this->Otherearningsentry->Employee->find('list');
		$otherearnings = $this->Otherearningsentry->Otherearning->find('list', array('order' => array('Otherearning.name' => 'ASC')));
		$this->set(compact('payrollperiods', 'employees', 'otherearnings'));
		$this->set('employeeid', $employeeid);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $eid = null) {
		$this->Otherearningsentry->id = $id;
		if (!$this->Otherearningsentry->exists()) {
			throw new NotFoundException(__('Invalid otherearningsentry'));
		}
		$result = $this->Otherearningsentry->find('first', array('conditions' => array('Otherearningsentry.id' => $id)));
		// $this->request->allowMethod('post', 'delete');
		if ($this->Otherearningsentry->delete()) {
			return $this->redirect(array('controller' => 'employees', 'action' => 'edit', $result['Otherearningsentry']['employee_id']));
		} else {
			return $this->redirect(array('controller' => 'employees', 'action' => 'edit', $result['Otherearningsentry']['employee_id']));
		}
		return $this->redirect(array('controller' => 'employees', 'action' => 'edit', $eid));
	}
	
	public function selectentries($employeeid = null, $payrollperiod = null){
		$otherearnings = $this->Otherearningsentry->find('all', array('conditions' => array('AND' => array('Otherearningsentry.employee_id' => $employeeid, 'status' => 1))));
		if(isset($this->params['requested'])){
			return $otherearnings;
		}
	}
	
	public function search($employeeid = null, $type = null){
		$type_e = $this->Otherearningsentry->find('first', array(
			'conditions' => array(
				'AND' => array(
					'Otherearningsentry.employee_id' => $employeeid,
					'Otherearningsentry.otherearning_id' => $type,
				)
			)
		));
		
		if(isset($this->params['requested'])){
			return $type_e;
		}
	}
	
	public function updatestatus($id = null, $employeeid = null, $stat = null){
		$this->Otherearningsentry->create();
		$data = array(
			'Otherearningsentry' => array(
				'id' => $id,
				'status' => $stat,
			)
		);
		
		if($this->Otherearningsentry->save($data)){
			return $this->redirect(array('controller' => 'employees', 'action' => 'edit', $employeeid));
		}
	}
}
