<?php
App::uses('AppController', 'Controller');
/**
 * Otherdeductions Controller
 *
 * @property Otherdeduction $Otherdeduction
 * @property PaginatorComponent $Paginator
 */
class OtherdeductionsController extends AppController {

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
		$this->Otherdeduction->recursive = 0;
		$this->set('otherdeductions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Otherdeduction->exists($id)) {
			throw new NotFoundException(__('Invalid otherdeduction'));
		}
		$options = array('conditions' => array('Otherdeduction.' . $this->Otherdeduction->primaryKey => $id));
		$this->set('otherdeduction', $this->Otherdeduction->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Otherdeduction->create();
			if ($this->Otherdeduction->save($this->request->data)) {
				$this->Session->setFlash(__('The other deduction has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The other deduction could not be saved. Please, try again.'));
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
		if (!$this->Otherdeduction->exists($id)) {
			throw new NotFoundException(__('Invalid otherdeduction'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Otherdeduction->save($this->request->data)) {
				$this->Session->setFlash(__('The other deduction has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The other deduction could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Otherdeduction.' . $this->Otherdeduction->primaryKey => $id));
			$this->request->data = $this->Otherdeduction->find('first', $options);
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
		$this->Otherdeduction->id = $id;
		if (!$this->Otherdeduction->exists()) {
			throw new NotFoundException(__('Invalid otherdeduction'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Otherdeduction->delete()) {
			$this->Session->setFlash(__('The other deduction has been deleted.'));
		} else {
			$this->Session->setFlash(__('The other deduction could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
