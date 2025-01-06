<?php
App::uses('AppController', 'Controller');
/**
 * Payrollperiods Controller
 *
 * @property Payrollperiod $Payrollperiod
 * @property PaginatorComponent $Paginator
 */
class PayrollperiodsController extends AppController {

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
		$this->paginate = array(
			'order' => array(
				'id' => 'DESC'
			)
		);
		$this->Payrollperiod->recursive = 0;
		$this->set('payrollperiods', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Payrollperiod->exists($id)) {
			throw new NotFoundException(__('Invalid payrollperiod'));
		}
		$options = array('conditions' => array('Payrollperiod.' . $this->Payrollperiod->primaryKey => $id));
		$this->set('payrollperiod', $this->Payrollperiod->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->loadModel('Periodinclude');
		$this->loadModel('Employee');
		if ($this->request->is('post')) {
			$this->Payrollperiod->create();
			if ($this->Payrollperiod->save($this->request->data)) {
				$this->Session->setFlash(__('Payroll Period was Created! Please select names included in the payroll.'), 'success_message');
				return $this->redirect(array('controller' => 'periodincludes', 'action' => 'add', $this->Payrollperiod->getLastInsertId()));
			} else {
				$this->Session->setFlash(__('The payrollperiod could not be saved. Please, try again.'));
			}
		}
		$employees = $this->Employee->find('all', array('conditions' => array('Employee.employmentstatus_id < ' => 4), 'order' => array('Employee.lastname' => 'ASC', 'Employee.firstname' => 'ASC')));
		$this->set('employees', $employees);
		
		$payrolltypes = $this->Payrollperiod->Payrolltype->find('list', array('conditions' => array('Payrolltype.id' => 1)));
		$classifications = $this->Payrollperiod->Classification->find('list');
		$payfrequencies = $this->Payrollperiod->Payfrequency->find('list');
		$this->set(compact('payrolltypes', 'classifications', 'payfrequencies'));
		
	}
	
	public function add2() {
		$this->loadModel('Periodinclude');
		$this->loadModel('Employee');
		if ($this->request->is('post')) {
			$this->Payrollperiod->create();
			if ($this->Payrollperiod->save($this->request->data)) {
				$this->Session->setFlash(__('Payroll Period was Created! Please select names included in the payroll.'), 'success_message');
				return $this->redirect(array('controller' => 'periodincludes', 'action' => 'add', $this->Payrollperiod->getLastInsertId()));
			} else {
				$this->Session->setFlash(__('The payrollperiod could not be saved. Please, try again.'));
			}
		}
		$employees = $this->Employee->find('all', array('conditions' => array('Employee.employmentstatus_id < ' => 4), 'order' => array('Employee.lastname' => 'ASC', 'Employee.firstname' => 'ASC')));
		$this->set('employees', $employees);
		
		$payrolltypes = $this->Payrollperiod->Payrolltype->find('list', array('conditions' => array('Payrolltype.id' => 2)));
		$classifications = $this->Payrollperiod->Classification->find('list');
		$payfrequencies = $this->Payrollperiod->Payfrequency->find('list');
		$this->set(compact('payrolltypes', 'classifications', 'payfrequencies'));
		
	}
	
	
	public function edit($id = null) {
		if (!$this->Payrollperiod->exists($id)) {
			throw new NotFoundException(__('Invalid payrollperiod'));
		}
		if ($this->request->is(array('post', 'put'))) {
			// Check if date fields are not empty and in the correct format
			$fromDate = $this->request->data['Payrollperiod']['fromDate'];
			$untilDate = $this->request->data['Payrollperiod']['untilDAte'];

			if (empty($fromDate) || empty($untilDate)) {
				$this->Session->setFlash(__('Both dates must be provided.'));
			} elseif (!$this->_isValidDateFormat($fromDate) || !$this->_isValidDateFormat($untilDate)) {
				$this->Session->setFlash(__('Dates must be in the correct format (YYYY-MM-DD).'));
			} elseif (strtotime($fromDate) > strtotime($untilDate)) {
				$this->Session->setFlash(__('The start date cannot be later than the end date.'));
			} else {
				// Save data if validation passes
				if ($this->Payrollperiod->save($this->request->data)) {
					$this->Session->setFlash(__('The payrollperiod has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The payrollperiod could not be saved. Please, try again.'));
				}
			}
		} else {
			$options = array('conditions' => array('Payrollperiod.' . $this->Payrollperiod->primaryKey => $id));
			$this->request->data = $this->Payrollperiod->find('first', $options);
		}

		$payrolltypes = $this->Payrollperiod->Payrolltype->find('list');
		$classifications = $this->Payrollperiod->Classification->find('list');
		$payfrequencies = $this->Payrollperiod->Payfrequency->find('list');
		$this->set(compact('payrolltypes', 'classifications', 'payfrequencies'));
	}

	/**
	 * Helper function to validate date format (Y-m-d)
	 */
	private function _isValidDateFormat($date) {
		$d = DateTime::createFromFormat('Y-m-d', $date);
		return $d && $d->format('Y-m-d') === $date;
	}

	
	public function edit2($id = null) {
		if (!$this->Payrollperiod->exists($id)) {
			throw new NotFoundException(__('Invalid payrollperiod'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Payrollperiod->save($this->request->data)) {
				$this->Session->setFlash(__('The payrollperiod has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payrollperiod could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Payrollperiod.' . $this->Payrollperiod->primaryKey => $id));
			$this->request->data = $this->Payrollperiod->find('first', $options);
		}
		$payrolltypes = $this->Payrollperiod->Payrolltype->find('list');
		$classifications = $this->Payrollperiod->Classification->find('list');
		$payfrequencies = $this->Payrollperiod->Payfrequency->find('list');
		$this->set(compact('payrolltypes', 'classifications', 'payfrequencies'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Payrollperiod->id = $id;
		if (!$this->Payrollperiod->exists()) {
			throw new NotFoundException(__('Invalid payrollperiod'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Payrollperiod->delete()) {
			$this->Session->setFlash(__('The payrollperiod has been deleted.'));
		} else {
			$this->Session->setFlash(__('The payrollperiod could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function selectperiod($id = null){
		$period = $this->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $id)));
		if(isset($this->params['requested'])){
			return $period;
		}
	}
	
	public function changestatus($id = null, $value = null){
		if($this->Payrollperiod->updateAll(array("Payrollperiod.locked" => $value), array("Payrollperiod.id" => $id))){
			$this->Session->setFlash(__('DEFAULT PAYROLL PERIOD WAS SAVED!'), 'success_message');
			return $this->redirect(array('controller' => 'payrollperiods', 'action' => 'index'));
		}
	}
	
	public function listpayroll($employeeid = null){
		$payrollperiods = $this->Payrollperiod->find('all', array('order' => array('Payrollperiod.id' => 'DESC')));	
		$this->set('payrollperiods', $payrollperiods);
		$this->loadModel('Employee');
		$id = $this->Employee->find('first', array('conditions' => array('Employee.employeeno' => $this->Auth->user('username'))));
		if(empty($id)){
			$employeeid =  $this->Auth->user('employeeno');
							
		}else{
			$employeeid =  $id['Employee']['id'];
		}
		$this->set('employeeid', $employeeid);
	}
}
