<?php
App::uses('AppController', 'Controller');
/**
 * Hdmfcontris Controller
 *
 * @property Hdmfcontri $Hdmfcontri
 * @property PaginatorComponent $Paginator
 */
class HdmfcontrisController extends AppController {

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
		$this->Hdmfcontri->recursive = 0;
		$this->set('hdmfcontris', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Hdmfcontri->exists($id)) {
			throw new NotFoundException(__('Invalid hdmfcontri'));
		}
		$options = array('conditions' => array('Hdmfcontri.' . $this->Hdmfcontri->primaryKey => $id));
		$this->set('hdmfcontri', $this->Hdmfcontri->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Hdmfcontri->create();
			if ($this->Hdmfcontri->save($this->request->data)) {
				$this->Session->setFlash(__('The hdmfcontri has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hdmfcontri could not be saved. Please, try again.'));
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
		if (!$this->Hdmfcontri->exists($id)) {
			throw new NotFoundException(__('Invalid hdmfcontri'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Hdmfcontri->save($this->request->data)) {
				$this->Session->setFlash(__('The hdmfcontri has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The hdmfcontri could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Hdmfcontri.' . $this->Hdmfcontri->primaryKey => $id));
			$this->request->data = $this->Hdmfcontri->find('first', $options);
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
		$this->Hdmfcontri->id = $id;
		if (!$this->Hdmfcontri->exists()) {
			throw new NotFoundException(__('Invalid hdmfcontri'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Hdmfcontri->delete()) {
			$this->Session->setFlash(__('The hdmfcontri has been deleted.'));
		} else {
			$this->Session->setFlash(__('The hdmfcontri could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
