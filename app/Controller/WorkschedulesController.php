<?php
App::uses('AppController', 'Controller');
/**
 * Workschedules Controller
 *
 * @property Workschedule $Workschedule
 * @property PaginatorComponent $Paginator
 */
class WorkschedulesController extends AppController {

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
		$this->Workschedule->recursive = 0;
		$this->set('workschedules', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Workschedule->exists($id)) {
			throw new NotFoundException(__('Invalid workschedule'));
		}
		$options = array('conditions' => array('Workschedule.' . $this->Workschedule->primaryKey => $id));
		$this->set('workschedule', $this->Workschedule->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Workschedule->create();
			if ($this->Workschedule->save($this->request->data)) {
				$this->Session->setFlash(__('The workschedule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workschedule could not be saved. Please, try again.'));
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
		if (!$this->Workschedule->exists($id)) {
			throw new NotFoundException(__('Invalid workschedule'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Workschedule->save($this->request->data)) {
				$this->Session->setFlash(__('The workschedule has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The workschedule could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Workschedule.' . $this->Workschedule->primaryKey => $id));
			$this->request->data = $this->Workschedule->find('first', $options);
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
		$this->Workschedule->id = $id;
		if (!$this->Workschedule->exists()) {
			throw new NotFoundException(__('Invalid workschedule'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Workschedule->delete()) {
			$this->Session->setFlash(__('The workschedule has been deleted.'));
		} else {
			$this->Session->setFlash(__('The workschedule could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
