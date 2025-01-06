<?php
App::uses('AppController', 'Controller');
/**
 * Costcenters Controller
 *
 * @property Costcenter $Costcenter
 * @property PaginatorComponent $Paginator
 */
class CostcentersController extends AppController {

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
		$this->Costcenter->recursive = 0;
		$this->set('costcenters', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Costcenter->exists($id)) {
			throw new NotFoundException(__('Invalid costcenter'));
		}
		$options = array('conditions' => array('Costcenter.' . $this->Costcenter->primaryKey => $id));
		$this->set('costcenter', $this->Costcenter->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Costcenter->create();
			if ($this->Costcenter->save($this->request->data)) {
				$this->Session->setFlash(__('The costcenter has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The costcenter could not be saved. Please, try again.'));
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
		if (!$this->Costcenter->exists($id)) {
			throw new NotFoundException(__('Invalid costcenter'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Costcenter->save($this->request->data)) {
				$this->Session->setFlash(__('The costcenter has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The costcenter could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Costcenter.' . $this->Costcenter->primaryKey => $id));
			$this->request->data = $this->Costcenter->find('first', $options);
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
		$this->Costcenter->id = $id;
		if (!$this->Costcenter->exists()) {
			throw new NotFoundException(__('Invalid costcenter'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Costcenter->delete()) {
			$this->Session->setFlash(__('The costcenter has been deleted.'));
		} else {
			$this->Session->setFlash(__('The costcenter could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
