<?php
App::uses('AppController', 'Controller');
/**
 * Otstatuses Controller
 *
 * @property Otstatus $Otstatus
 * @property PaginatorComponent $Paginator
 */
class OtstatusesController extends AppController {

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
		$this->Otstatus->recursive = 0;
		$this->set('otstatuses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Otstatus->exists($id)) {
			throw new NotFoundException(__('Invalid otstatus'));
		}
		$options = array('conditions' => array('Otstatus.' . $this->Otstatus->primaryKey => $id));
		$this->set('otstatus', $this->Otstatus->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Otstatus->create();
			if ($this->Otstatus->save($this->request->data)) {
				$this->Session->setFlash(__('The otstatus has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The otstatus could not be saved. Please, try again.'));
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
		if (!$this->Otstatus->exists($id)) {
			throw new NotFoundException(__('Invalid otstatus'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Otstatus->save($this->request->data)) {
				$this->Session->setFlash(__('The otstatus has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The otstatus could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Otstatus.' . $this->Otstatus->primaryKey => $id));
			$this->request->data = $this->Otstatus->find('first', $options);
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
		$this->Otstatus->id = $id;
		if (!$this->Otstatus->exists()) {
			throw new NotFoundException(__('Invalid otstatus'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Otstatus->delete()) {
			$this->Session->setFlash(__('The otstatus has been deleted.'));
		} else {
			$this->Session->setFlash(__('The otstatus could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
