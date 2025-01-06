<?php
App::uses('AppController', 'Controller');
/**
 * Divisions Controller
 *
 * @property Division $Division
 * @property PaginatorComponent $Paginator
 */
class DivisionsController extends AppController {

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
	
	public function index($action = null, $payrollperiod = null) {
		$divisions = $this->Division->find('all');
		$departments = $this->Division->Department->find('all');
		$this->set('divisions', $divisions);
		$this->set('departments', $departments);
		$this->set('payrollperiod', $payrollperiod);
		
	}
	
	public function index2($payrollperiod = null) {
		$this->loadModel('Jobtitle');
		$this->loadModel('Branch');
		$divisions = $this->Division->find('all');
		$departments = $this->Division->Department->find('all');
		$jobtitles = $this->Jobtitle->find('all');
		$branches = $this->Branch->find('all', array(
			'order' => array(
				
				'Branch.name' => 'ASC',
			)
		));
		$this->set('divisions', $divisions);
		$this->set('departments', $departments);
		$this->set('payrollperiod', $payrollperiod);
		$this->set('jobtitles', $jobtitles);
		$this->set('branches', $branches);
		
		
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Division->exists($id)) {
			throw new NotFoundException(__('Invalid division'));
		}
		$options = array('conditions' => array('Division.' . $this->Division->primaryKey => $id));
		$this->set('division', $this->Division->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Division->create();
			if ($this->Division->save($this->request->data)) {
				$this->Session->setFlash(__('The division has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The division could not be saved. Please, try again.'));
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
	public function edit($id = null) {
		if (!$this->Division->exists($id)) {
			throw new NotFoundException(__('Invalid division'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Division->save($this->request->data)) {
				$this->Session->setFlash(__('The division has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The division could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Division.' . $this->Division->primaryKey => $id));
			$this->request->data = $this->Division->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Division->id = $id;
		if (!$this->Division->exists()) {
			throw new NotFoundException(__('Invalid division'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Division->delete()) {
			$this->Session->setFlash(__('The division has been deleted.'));
		} else {
			$this->Session->setFlash(__('The division could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function relatedvariables(){
		$divisions = $this->Division->find('all');
		if(isset($this->params['requested'])){
			return $divisions;
		}
	}
}
