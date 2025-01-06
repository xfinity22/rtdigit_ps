<?php
App::uses('AppController', 'Controller');
/**
 * Employeebackgrounds Controller
 *
 * @property Employeebackground $Employeebackground
 * @property PaginatorComponent $Paginator
 */
class EmployeebackgroundsController extends AppController {

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
		$this->Employeebackground->recursive = 0;
		$this->set('employeebackgrounds', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Employeebackground->exists($id)) {
			throw new NotFoundException(__('Invalid employeebackground'));
		}
		$options = array('conditions' => array('Employeebackground.' . $this->Employeebackground->primaryKey => $id));
		$this->set('employeebackground', $this->Employeebackground->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Employeebackground->create();
			if ($this->Employeebackground->save($this->request->data)) {
				$this->Session->setFlash(__('The employeebackground has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employeebackground could not be saved. Please, try again.'));
			}
		}
		$employees = $this->Employeebackground->Employee->find('list');
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
		if (!$this->Employeebackground->exists($id)) {
			throw new NotFoundException(__('Invalid employeebackground'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Employeebackground->save($this->request->data)) {
				$this->Session->setFlash(__('The employeebackground has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employeebackground could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Employeebackground.' . $this->Employeebackground->primaryKey => $id));
			$this->request->data = $this->Employeebackground->find('first', $options);
		}
		$employees = $this->Employeebackground->Employee->find('list');
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
		$this->Employeebackground->id = $id;
		if (!$this->Employeebackground->exists()) {
			throw new NotFoundException(__('Invalid employeebackground'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Employeebackground->delete()) {
			$this->Session->setFlash(__('The employeebackground has been deleted.'));
		} else {
			$this->Session->setFlash(__('The employeebackground could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
