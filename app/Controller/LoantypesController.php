<?php
App::uses('AppController', 'Controller');
/**
 * Loantypes Controller
 *
 * @property Loantype $Loantype
 * @property PaginatorComponent $Paginator
 */
class LoantypesController extends AppController {

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
		$this->Loantype->recursive = 0;
		$this->set('loantypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Loantype->exists($id)) {
			throw new NotFoundException(__('Invalid loantype'));
		}
		$options = array('conditions' => array('Loantype.' . $this->Loantype->primaryKey => $id));
		$this->set('loantype', $this->Loantype->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Loantype->create();
			if ($this->Loantype->save($this->request->data)) {
				$this->Session->setFlash(__('The loan type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The loan type could not be saved. Please, try again.'));
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
		if (!$this->Loantype->exists($id)) {
			throw new NotFoundException(__('Invalid loantype'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Loantype->save($this->request->data)) {
				$this->Session->setFlash(__('The loan type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The loan type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Loantype.' . $this->Loantype->primaryKey => $id));
			$this->request->data = $this->Loantype->find('first', $options);
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
		$this->Loantype->id = $id;
		if (!$this->Loantype->exists()) {
			throw new NotFoundException(__('Invalid loantype'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Loantype->delete()) {
			$this->Session->setFlash(__('The loan type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The loan type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
