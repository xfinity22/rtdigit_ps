<?php
App::uses('AppController', 'Controller');
/**
 * Employeetypes Controller
 *
 * @property Employeetype $Employeetype
 * @property PaginatorComponent $Paginator
 */
class EmployeetypesController extends AppController {

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
		$this->Employeetype->recursive = 0;
		$this->set('employeetypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Employeetype->exists($id)) {
			throw new NotFoundException(__('Invalid employeetype'));
		}
		$options = array('conditions' => array('Employeetype.' . $this->Employeetype->primaryKey => $id));
		$this->set('employeetype', $this->Employeetype->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Employeetype->create();
			if ($this->Employeetype->save($this->request->data)) {
				$this->Session->setFlash(__('The employeetype has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employeetype could not be saved. Please, try again.'));
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
		if (!$this->Employeetype->exists($id)) {
			throw new NotFoundException(__('Invalid employeetype'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Employeetype->save($this->request->data)) {
				$this->Session->setFlash(__('The employeetype has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employeetype could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Employeetype.' . $this->Employeetype->primaryKey => $id));
			$this->request->data = $this->Employeetype->find('first', $options);
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
		$this->Employeetype->id = $id;
		if (!$this->Employeetype->exists()) {
			throw new NotFoundException(__('Invalid employeetype'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Employeetype->delete()) {
			$this->Session->setFlash(__('The employeetype has been deleted.'));
		} else {
			$this->Session->setFlash(__('The employeetype could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function relatedvariables(){
		$types = $this->Employeetype->find('all');
		if(isset($this->params['requested'])){
			return $types;
		}
	}
}
