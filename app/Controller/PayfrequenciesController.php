<?php
App::uses('AppController', 'Controller');
/**
 * Payfrequencies Controller
 *
 * @property Payfrequency $Payfrequency
 * @property PaginatorComponent $Paginator
 */
class PayfrequenciesController extends AppController {

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
		$this->Payfrequency->recursive = 0;
		$this->set('payfrequencies', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Payfrequency->exists($id)) {
			throw new NotFoundException(__('Invalid payfrequency'));
		}
		$options = array('conditions' => array('Payfrequency.' . $this->Payfrequency->primaryKey => $id));
		$this->set('payfrequency', $this->Payfrequency->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Payfrequency->create();
			if ($this->Payfrequency->save($this->request->data)) {
				$this->Session->setFlash(__('The payfrequency has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payfrequency could not be saved. Please, try again.'));
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
		if (!$this->Payfrequency->exists($id)) {
			throw new NotFoundException(__('Invalid payfrequency'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Payfrequency->save($this->request->data)) {
				$this->Session->setFlash(__('The payfrequency has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payfrequency could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Payfrequency.' . $this->Payfrequency->primaryKey => $id));
			$this->request->data = $this->Payfrequency->find('first', $options);
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
		$this->Payfrequency->id = $id;
		if (!$this->Payfrequency->exists()) {
			throw new NotFoundException(__('Invalid payfrequency'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Payfrequency->delete()) {
			$this->Session->setFlash(__('The payfrequency has been deleted.'));
		} else {
			$this->Session->setFlash(__('The payfrequency could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
