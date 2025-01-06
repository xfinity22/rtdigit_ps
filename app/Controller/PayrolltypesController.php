<?php
App::uses('AppController', 'Controller');
/**
 * Payrolltypes Controller
 *
 * @property Payrolltype $Payrolltype
 * @property PaginatorComponent $Paginator
 */
class PayrolltypesController extends AppController {

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
		$this->Payrolltype->recursive = 0;
		$this->set('payrolltypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Payrolltype->exists($id)) {
			throw new NotFoundException(__('Invalid payrolltype'));
		}
		$options = array('conditions' => array('Payrolltype.' . $this->Payrolltype->primaryKey => $id));
		$this->set('payrolltype', $this->Payrolltype->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Payrolltype->create();
			if ($this->Payrolltype->save($this->request->data)) {
				$this->Session->setFlash(__('The payrolltype has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payrolltype could not be saved. Please, try again.'));
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
		if (!$this->Payrolltype->exists($id)) {
			throw new NotFoundException(__('Invalid payrolltype'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Payrolltype->save($this->request->data)) {
				$this->Session->setFlash(__('The payrolltype has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The payrolltype could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Payrolltype.' . $this->Payrolltype->primaryKey => $id));
			$this->request->data = $this->Payrolltype->find('first', $options);
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
		$this->Payrolltype->id = $id;
		if (!$this->Payrolltype->exists()) {
			throw new NotFoundException(__('Invalid payrolltype'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Payrolltype->delete()) {
			$this->Session->setFlash(__('The payrolltype has been deleted.'));
		} else {
			$this->Session->setFlash(__('The payrolltype could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
