<?php
App::uses('AppController', 'Controller');
/**
 * Lateundertimebases Controller
 *
 * @property Lateundertimebase $Lateundertimebase
 * @property PaginatorComponent $Paginator
 */
class LateundertimebasesController extends AppController {

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
		$this->Lateundertimebase->recursive = 0;
		$this->set('lateundertimebases', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Lateundertimebase->exists($id)) {
			throw new NotFoundException(__('Invalid lateundertimebase'));
		}
		$options = array('conditions' => array('Lateundertimebase.' . $this->Lateundertimebase->primaryKey => $id));
		$this->set('lateundertimebase', $this->Lateundertimebase->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Lateundertimebase->create();
			if ($this->Lateundertimebase->save($this->request->data)) {
				$this->Session->setFlash(__('The lateundertimebase has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lateundertimebase could not be saved. Please, try again.'));
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
		if (!$this->Lateundertimebase->exists($id)) {
			throw new NotFoundException(__('Invalid lateundertimebase'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Lateundertimebase->save($this->request->data)) {
				$this->Session->setFlash(__('The lateundertimebase has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lateundertimebase could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Lateundertimebase.' . $this->Lateundertimebase->primaryKey => $id));
			$this->request->data = $this->Lateundertimebase->find('first', $options);
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
		$this->Lateundertimebase->id = $id;
		if (!$this->Lateundertimebase->exists()) {
			throw new NotFoundException(__('Invalid lateundertimebase'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Lateundertimebase->delete()) {
			$this->Session->setFlash(__('The lateundertimebase has been deleted.'));
		} else {
			$this->Session->setFlash(__('The lateundertimebase could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
