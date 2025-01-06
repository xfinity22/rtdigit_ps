<?php
App::uses('AppController', 'Controller');
/**
 * Vltypes Controller
 *
 * @property Vltype $Vltype
 * @property PaginatorComponent $Paginator
 */
class VltypesController extends AppController {

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
		$this->Vltype->recursive = 0;
		$this->set('vltypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Vltype->exists($id)) {
			throw new NotFoundException(__('Invalid vltype'));
		}
		$options = array('conditions' => array('Vltype.' . $this->Vltype->primaryKey => $id));
		$this->set('vltype', $this->Vltype->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Vltype->create();
			if ($this->Vltype->save($this->request->data)) {
				$this->Session->setFlash(__('The vltype has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vltype could not be saved. Please, try again.'));
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
		if (!$this->Vltype->exists($id)) {
			throw new NotFoundException(__('Invalid vltype'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Vltype->save($this->request->data)) {
				$this->Session->setFlash(__('The vltype has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vltype could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Vltype.' . $this->Vltype->primaryKey => $id));
			$this->request->data = $this->Vltype->find('first', $options);
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
		$this->Vltype->id = $id;
		if (!$this->Vltype->exists()) {
			throw new NotFoundException(__('Invalid vltype'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Vltype->delete()) {
			$this->Session->setFlash(__('The vltype has been deleted.'));
		} else {
			$this->Session->setFlash(__('The vltype could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
