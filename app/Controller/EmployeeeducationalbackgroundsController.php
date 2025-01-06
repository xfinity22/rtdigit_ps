<?php
App::uses('AppController', 'Controller');
/**
 * Employeeeducationalbackgrounds Controller
 *
 * @property Employeeeducationalbackground $Employeeeducationalbackground
 * @property PaginatorComponent $Paginator
 */
class EmployeeeducationalbackgroundsController extends AppController {

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
		$this->Employeeeducationalbackground->recursive = 0;
		$this->set('employeeeducationalbackgrounds', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Employeeeducationalbackground->exists($id)) {
			throw new NotFoundException(__('Invalid employeeeducationalbackground'));
		}
		$options = array('conditions' => array('Employeeeducationalbackground.' . $this->Employeeeducationalbackground->primaryKey => $id));
		$this->set('employeeeducationalbackground', $this->Employeeeducationalbackground->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Employeeeducationalbackground->create();
			if ($this->Employeeeducationalbackground->save($this->request->data)) {
				$this->Session->setFlash(__('The employeeeducationalbackground has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employeeeducationalbackground could not be saved. Please, try again.'));
			}
		}
		$employees = $this->Employeeeducationalbackground->Employee->find('list');
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
		if (!$this->Employeeeducationalbackground->exists($id)) {
			throw new NotFoundException(__('Invalid employeeeducationalbackground'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Employeeeducationalbackground->save($this->request->data)) {
				$this->Session->setFlash(__('The employeeeducationalbackground has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employeeeducationalbackground could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Employeeeducationalbackground.' . $this->Employeeeducationalbackground->primaryKey => $id));
			$this->request->data = $this->Employeeeducationalbackground->find('first', $options);
		}
		$employees = $this->Employeeeducationalbackground->Employee->find('list');
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
		$this->Employeeeducationalbackground->id = $id;
		if (!$this->Employeeeducationalbackground->exists()) {
			throw new NotFoundException(__('Invalid employeeeducationalbackground'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Employeeeducationalbackground->delete()) {
			$this->Session->setFlash(__('The employeeeducationalbackground has been deleted.'));
		} else {
			$this->Session->setFlash(__('The employeeeducationalbackground could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
