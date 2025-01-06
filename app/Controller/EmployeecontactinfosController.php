<?php
App::uses('AppController', 'Controller');
/**
 * Employeecontactinfos Controller
 *
 * @property Employeecontactinfo $Employeecontactinfo
 * @property PaginatorComponent $Paginator
 */
class EmployeecontactinfosController extends AppController {

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
		$this->Employeecontactinfo->recursive = 0;
		$this->set('employeecontactinfos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Employeecontactinfo->exists($id)) {
			throw new NotFoundException(__('Invalid employeecontactinfo'));
		}
		$options = array('conditions' => array('Employeecontactinfo.' . $this->Employeecontactinfo->primaryKey => $id));
		$this->set('employeecontactinfo', $this->Employeecontactinfo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Employeecontactinfo->create();
			if ($this->Employeecontactinfo->save($this->request->data)) {
				$this->Session->setFlash(__('The employeecontactinfo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employeecontactinfo could not be saved. Please, try again.'));
			}
		}
		$employees = $this->Employeecontactinfo->Employee->find('list');
		$this->set(compact('employees'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Employeecontactinfo->exists($id)) {
			throw new NotFoundException(__('Invalid employeecontactinfo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Employeecontactinfo->save($this->request->data)) {
				$this->Session->setFlash(__('The employeecontactinfo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employeecontactinfo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Employeecontactinfo.' . $this->Employeecontactinfo->primaryKey => $id));
			$this->request->data = $this->Employeecontactinfo->find('first', $options);
		}
		$employees = $this->Employeecontactinfo->Employee->find('list');
		$this->set(compact('employees'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Employeecontactinfo->id = $id;
		if (!$this->Employeecontactinfo->exists()) {
			throw new NotFoundException(__('Invalid employeecontactinfo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Employeecontactinfo->delete()) {
			$this->Session->setFlash(__('The employeecontactinfo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The employeecontactinfo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
