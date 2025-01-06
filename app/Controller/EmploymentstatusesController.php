<?php
App::uses('AppController', 'Controller');
/**
 * Employmentstatuses Controller
 *
 * @property Employmentstatus $Employmentstatus
 * @property PaginatorComponent $Paginator
 */
class EmploymentstatusesController extends AppController {

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
		$this->Employmentstatus->recursive = 0;
		$this->set('employmentstatuses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Employmentstatus->exists($id)) {
			throw new NotFoundException(__('Invalid employmentstatus'));
		}
		$options = array('conditions' => array('Employmentstatus.' . $this->Employmentstatus->primaryKey => $id));
		$this->set('employmentstatus', $this->Employmentstatus->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Employmentstatus->create();
			if ($this->Employmentstatus->save($this->request->data)) {
				$this->Session->setFlash(__('The employmentstatus has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employmentstatus could not be saved. Please, try again.'));
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
		if (!$this->Employmentstatus->exists($id)) {
			throw new NotFoundException(__('Invalid employmentstatus'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Employmentstatus->save($this->request->data)) {
				$this->Session->setFlash(__('The employmentstatus has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employmentstatus could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Employmentstatus.' . $this->Employmentstatus->primaryKey => $id));
			$this->request->data = $this->Employmentstatus->find('first', $options);
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
		$this->Employmentstatus->id = $id;
		if (!$this->Employmentstatus->exists()) {
			throw new NotFoundException(__('Invalid employmentstatus'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Employmentstatus->delete()) {
			$this->Session->setFlash(__('The employmentstatus has been deleted.'));
		} else {
			$this->Session->setFlash(__('The employmentstatus could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
