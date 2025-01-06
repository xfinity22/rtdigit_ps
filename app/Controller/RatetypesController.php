<?php
App::uses('AppController', 'Controller');
/**
 * Ratetypes Controller
 *
 * @property Ratetype $Ratetype
 * @property PaginatorComponent $Paginator
 */
class RatetypesController extends AppController {

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
		$this->Ratetype->recursive = 0;
		$this->set('ratetypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ratetype->exists($id)) {
			throw new NotFoundException(__('Invalid ratetype'));
		}
		$options = array('conditions' => array('Ratetype.' . $this->Ratetype->primaryKey => $id));
		$this->set('ratetype', $this->Ratetype->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ratetype->create();
			if ($this->Ratetype->save($this->request->data)) {
				$this->Session->setFlash(__('The ratetype has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ratetype could not be saved. Please, try again.'));
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
		if (!$this->Ratetype->exists($id)) {
			throw new NotFoundException(__('Invalid ratetype'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ratetype->save($this->request->data)) {
				$this->Session->setFlash(__('The ratetype has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ratetype could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ratetype.' . $this->Ratetype->primaryKey => $id));
			$this->request->data = $this->Ratetype->find('first', $options);
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
		$this->Ratetype->id = $id;
		if (!$this->Ratetype->exists()) {
			throw new NotFoundException(__('Invalid ratetype'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Ratetype->delete()) {
			$this->Session->setFlash(__('The ratetype has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ratetype could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
