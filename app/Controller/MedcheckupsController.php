<?php
App::uses('AppController', 'Controller');
/**
 * Medcheckups Controller
 *
 * @property Medcheckup $Medcheckup
 * @property PaginatorComponent $Paginator
 */
class MedcheckupsController extends AppController {

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
		$this->Medcheckup->recursive = 0;
		$this->set('medcheckups', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Medcheckup->exists($id)) {
			throw new NotFoundException(__('Invalid medcheckup'));
		}
		$options = array('conditions' => array('Medcheckup.' . $this->Medcheckup->primaryKey => $id));
		$this->set('medcheckup', $this->Medcheckup->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($employeeid = null) {
		if ($this->request->is('post')) {
			$this->Medcheckup->create();
			if ($this->Medcheckup->save($this->request->data)) {
				$this->Session->setFlash(__('The medcheckup has been saved.'));
				return $this->redirect(array('controller' => 'employees', 'action' => 'edit', $employeeid));
			} else {
				$this->Session->setFlash(__('The medcheckup could not be saved. Please, try again.'));
			}
		}
		$employees = $this->Medcheckup->Employee->find('list');
		$medhospitals = $this->Medcheckup->Medhospital->find('list');
		$this->set(compact('employees', 'medhospitals'));
		
		$this->set('employeeid', $employeeid);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Medcheckup->exists($id)) {
			throw new NotFoundException(__('Invalid medcheckup'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Medcheckup->save($this->request->data)) {
				$this->Session->setFlash(__('The medcheckup has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medcheckup could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Medcheckup.' . $this->Medcheckup->primaryKey => $id));
			$this->request->data = $this->Medcheckup->find('first', $options);
		}
		$employees = $this->Medcheckup->Employee->find('list');
		$medhospitals = $this->Medcheckup->Medhospital->find('list');
		$this->set(compact('employees', 'medhospitals'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Medcheckup->id = $id;
		if (!$this->Medcheckup->exists()) {
			throw new NotFoundException(__('Invalid medcheckup'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Medcheckup->delete()) {
			$this->Session->setFlash(__('The medcheckup has been deleted.'));
		} else {
			$this->Session->setFlash(__('The medcheckup could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function related($employeeid = null){
		$checkups = $this->Medcheckup->find('all', array('conditions' => array('Medcheckup.employee_id' => $employeeid)));
		if(isset($this->params['requested'])){
			return $checkups;
		}
	}
}
