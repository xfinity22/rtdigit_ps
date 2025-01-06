<?php
App::uses('AppController', 'Controller');
/**
 * Taxdescriptions Controller
 *
 * @property Taxdescription $Taxdescription
 * @property PaginatorComponent $Paginator
 */
class TaxdescriptionsController extends AppController {

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
		$this->Taxdescription->recursive = 0;
		$this->set('taxdescriptions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Taxdescription->exists($id)) {
			throw new NotFoundException(__('Invalid taxdescription'));
		}
		$options = array('conditions' => array('Taxdescription.' . $this->Taxdescription->primaryKey => $id));
		$this->set('taxdescription', $this->Taxdescription->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Taxdescription->create();
			if ($this->Taxdescription->save($this->request->data)) {
				$this->Session->setFlash(__('The taxdescription has been saved.'));
				return $this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The taxdescription could not be saved. Please, try again.'));
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
		if (!$this->Taxdescription->exists($id)) {
			throw new NotFoundException(__('Invalid taxdescription'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Taxdescription->save($this->request->data)) {
				$this->Session->setFlash(__('The taxdescription has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The taxdescription could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Taxdescription.' . $this->Taxdescription->primaryKey => $id));
			$this->request->data = $this->Taxdescription->find('first', $options);
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
		$this->Taxdescription->id = $id;
		if (!$this->Taxdescription->exists()) {
			throw new NotFoundException(__('Invalid taxdescription'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Taxdescription->delete()) {
			$this->Session->setFlash(__('The taxdescription has been deleted.'));
		} else {
			$this->Session->setFlash(__('The taxdescription could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
