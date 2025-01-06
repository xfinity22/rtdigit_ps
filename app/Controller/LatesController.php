<?php
App::uses('AppController', 'Controller');
/**
 * Lates Controller
 *
 * @property Late $Late
 * @property PaginatorComponent $Paginator
 */
class LatesController extends AppController {

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
		$this->Late->recursive = 0;
		$this->set('lates', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Late->exists($id)) {
			throw new NotFoundException(__('Invalid late'));
		}
		$options = array('conditions' => array('Late.' . $this->Late->primaryKey => $id));
		$this->set('late', $this->Late->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Late->create();
			if ($this->Late->save($this->request->data)) {
				$this->Session->setFlash(__('The late has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The late could not be saved. Please, try again.'));
			}
		}
		$employees = $this->Late->Employee->find('list');
		$payrollperiods = $this->Late->Payrollperiod->find('list');
		$users = $this->Late->User->find('list');
		$this->set(compact('employees', 'payrollperiods', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Late->exists($id)) {
			throw new NotFoundException(__('Invalid late'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Late->save($this->request->data)) {
				$this->Session->setFlash(__('The late has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The late could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Late.' . $this->Late->primaryKey => $id));
			$this->request->data = $this->Late->find('first', $options);
		}
		$employees = $this->Late->Employee->find('list');
		$payrollperiods = $this->Late->Payrollperiod->find('list');
		$users = $this->Late->User->find('list');
		$this->set(compact('employees', 'payrollperiods', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Late->id = $id;
		if (!$this->Late->exists()) {
			throw new NotFoundException(__('Invalid late'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Late->delete()) {
			$this->Session->setFlash(__('The late has been deleted.'));
		} else {
			$this->Session->setFlash(__('The late could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
