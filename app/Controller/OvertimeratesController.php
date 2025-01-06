<?php
App::uses('AppController', 'Controller');
/**
 * Overtimerates Controller
 *
 * @property Overtimerate $Overtimerate
 * @property PaginatorComponent $Paginator
 */
class OvertimeratesController extends AppController {

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
		$this->Overtimerate->recursive = 0;
		$this->set('overtimerates', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Overtimerate->exists($id)) {
			throw new NotFoundException(__('Invalid overtimerate'));
		}
		$options = array('conditions' => array('Overtimerate.' . $this->Overtimerate->primaryKey => $id));
		$this->set('overtimerate', $this->Overtimerate->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Overtimerate->create();
			if ($this->Overtimerate->save($this->request->data)) {
				$this->Session->setFlash(__('The overtimerate has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The overtimerate could not be saved. Please, try again.'));
			}
		}
		$overtimetypes = $this->Overtimerate->Overtimetype->find('list');
		$this->set(compact('overtimetypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Overtimerate->exists($id)) {
			throw new NotFoundException(__('Invalid overtimerate'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Overtimerate->save($this->request->data)) {
				$this->Session->setFlash(__('The overtimerate has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The overtimerate could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Overtimerate.' . $this->Overtimerate->primaryKey => $id));
			$this->request->data = $this->Overtimerate->find('first', $options);
		}
		$overtimetypes = $this->Overtimerate->Overtimetype->find('list');
		$this->set(compact('overtimetypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Overtimerate->id = $id;
		if (!$this->Overtimerate->exists()) {
			throw new NotFoundException(__('Invalid overtimerate'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Overtimerate->delete()) {
			$this->Session->setFlash(__('The overtimerate has been deleted.'));
		} else {
			$this->Session->setFlash(__('The overtimerate could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
