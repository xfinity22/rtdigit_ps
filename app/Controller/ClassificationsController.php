<?php
App::uses('AppController', 'Controller');
/**
 * Classifications Controller
 *
 * @property Classification $Classification
 * @property PaginatorComponent $Paginator
 */
class ClassificationsController extends AppController {

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
		$this->Classification->recursive = 0;
		$this->set('classifications', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Classification->exists($id)) {
			throw new NotFoundException(__('Invalid classification'));
		}
		$options = array('conditions' => array('Classification.' . $this->Classification->primaryKey => $id));
		$this->set('classification', $this->Classification->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Classification->create();
			if ($this->Classification->save($this->request->data)) {
				$this->Session->setFlash(__('The classification has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The classification could not be saved. Please, try again.'));
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
		if (!$this->Classification->exists($id)) {
			throw new NotFoundException(__('Invalid classification'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Classification->save($this->request->data)) {
				$this->Session->setFlash(__('The classification has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The classification could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Classification.' . $this->Classification->primaryKey => $id));
			$this->request->data = $this->Classification->find('first', $options);
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
		$this->Classification->id = $id;
		if (!$this->Classification->exists()) {
			throw new NotFoundException(__('Invalid classification'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Classification->delete()) {
			$this->Session->setFlash(__('The classification has been deleted.'));
		} else {
			$this->Session->setFlash(__('The classification could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
