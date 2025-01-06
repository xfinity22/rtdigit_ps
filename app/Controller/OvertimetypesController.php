<?php
App::uses('AppController', 'Controller');
/**
 * Overtimetypes Controller
 *
 * @property Overtimetype $Overtimetype
 * @property PaginatorComponent $Paginator
 */
class OvertimetypesController extends AppController {

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
		$this->Overtimetype->recursive = 0;
		$this->set('overtimetypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Overtimetype->exists($id)) {
			throw new NotFoundException(__('Invalid overtimetype'));
		}
		$options = array('conditions' => array('Overtimetype.' . $this->Overtimetype->primaryKey => $id));
		$this->set('overtimetype', $this->Overtimetype->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Overtimetype->create();
			if ($this->Overtimetype->save($this->request->data)) {
				$this->Session->setFlash(__('The overtimetype has been saved.'));
				return $this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The overtimetype could not be saved. Please, try again.'));
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
		if (!$this->Overtimetype->exists($id)) {
			throw new NotFoundException(__('Invalid overtimetype'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Overtimetype->save($this->request->data)) {
				$this->Session->setFlash(__('The overtimetype has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The overtimetype could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Overtimetype.' . $this->Overtimetype->primaryKey => $id));
			$this->request->data = $this->Overtimetype->find('first', $options);
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
		$this->Overtimetype->id = $id;
		if (!$this->Overtimetype->exists()) {
			throw new NotFoundException(__('Invalid overtimetype'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Overtimetype->delete()) {
			$this->Session->setFlash(__('The overtimetype has been deleted.'));
		} else {
			$this->Session->setFlash(__('The overtimetype could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
