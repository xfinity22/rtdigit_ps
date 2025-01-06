<?php
App::uses('AppController', 'Controller');
/**
 * Leavestatuses Controller
 *
 * @property Leavestatus $Leavestatus
 * @property PaginatorComponent $Paginator
 */
class LeavestatusesController extends AppController {

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
		$this->Leavestatus->recursive = 0;
		$this->set('leavestatuses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Leavestatus->exists($id)) {
			throw new NotFoundException(__('Invalid leavestatus'));
		}
		$options = array('conditions' => array('Leavestatus.' . $this->Leavestatus->primaryKey => $id));
		$this->set('leavestatus', $this->Leavestatus->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Leavestatus->create();
			if ($this->Leavestatus->save($this->request->data)) {
				$this->Session->setFlash(__('The leavestatus has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The leavestatus could not be saved. Please, try again.'));
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
		if (!$this->Leavestatus->exists($id)) {
			throw new NotFoundException(__('Invalid leavestatus'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Leavestatus->save($this->request->data)) {
				$this->Session->setFlash(__('The leavestatus has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The leavestatus could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Leavestatus.' . $this->Leavestatus->primaryKey => $id));
			$this->request->data = $this->Leavestatus->find('first', $options);
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
		$this->Leavestatus->id = $id;
		if (!$this->Leavestatus->exists()) {
			throw new NotFoundException(__('Invalid leavestatus'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Leavestatus->delete()) {
			$this->Session->setFlash(__('The leavestatus has been deleted.'));
		} else {
			$this->Session->setFlash(__('The leavestatus could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
