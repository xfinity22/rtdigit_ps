<?php
App::uses('AppController', 'Controller');
/**
 * Medsalarydeductions Controller
 *
 * @property Medsalarydeduction $Medsalarydeduction
 * @property PaginatorComponent $Paginator
 */
class MedsalarydeductionsController extends AppController {

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
		$this->Medsalarydeduction->recursive = 0;
		$this->set('medsalarydeductions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Medsalarydeduction->exists($id)) {
			throw new NotFoundException(__('Invalid medsalarydeduction'));
		}
		$options = array('conditions' => array('Medsalarydeduction.' . $this->Medsalarydeduction->primaryKey => $id));
		$this->set('medsalarydeduction', $this->Medsalarydeduction->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Medsalarydeduction->create();
			if ($this->Medsalarydeduction->save($this->request->data)) {
				$this->Session->setFlash(__('The medsalarydeduction has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medsalarydeduction could not be saved. Please, try again.'));
			}
		}
		$employees = $this->Medsalarydeduction->Employee->find('list');
		$this->set(compact('employees'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Medsalarydeduction->exists($id)) {
			throw new NotFoundException(__('Invalid medsalarydeduction'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Medsalarydeduction->save($this->request->data)) {
				$this->Session->setFlash(__('The medsalarydeduction has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medsalarydeduction could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Medsalarydeduction.' . $this->Medsalarydeduction->primaryKey => $id));
			$this->request->data = $this->Medsalarydeduction->find('first', $options);
		}
		$employees = $this->Medsalarydeduction->Employee->find('list');
		$this->set(compact('employees'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Medsalarydeduction->id = $id;
		if (!$this->Medsalarydeduction->exists()) {
			throw new NotFoundException(__('Invalid medsalarydeduction'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Medsalarydeduction->delete()) {
			$this->Session->setFlash(__('The medsalarydeduction has been deleted.'));
		} else {
			$this->Session->setFlash(__('The medsalarydeduction could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
