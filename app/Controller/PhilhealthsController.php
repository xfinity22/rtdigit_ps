<?php
App::uses('AppController', 'Controller');
/**
 * Philhealths Controller
 *
 * @property Philhealth $Philhealth
 * @property PaginatorComponent $Paginator
 */
class PhilhealthsController extends AppController {

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
		$this->Philhealth->recursive = 0;
		$this->set('philhealths', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Philhealth->exists($id)) {
			throw new NotFoundException(__('Invalid philhealth'));
		}
		$options = array('conditions' => array('Philhealth.' . $this->Philhealth->primaryKey => $id));
		$this->set('philhealth', $this->Philhealth->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Philhealth->create();
			if ($this->Philhealth->save($this->request->data)) {
				$this->Session->setFlash(__('The philhealth has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The philhealth could not be saved. Please, try again.'));
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
		if (!$this->Philhealth->exists($id)) {
			throw new NotFoundException(__('Invalid philhealth'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Philhealth->save($this->request->data)) {
				$this->Session->setFlash(__('The philhealth has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The philhealth could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Philhealth.' . $this->Philhealth->primaryKey => $id));
			$this->request->data = $this->Philhealth->find('first', $options);
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
		$this->Philhealth->id = $id;
		if (!$this->Philhealth->exists()) {
			throw new NotFoundException(__('Invalid philhealth'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Philhealth->delete()) {
			$this->Session->setFlash(__('The philhealth has been deleted.'));
		} else {
			$this->Session->setFlash(__('The philhealth could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function getcontri($amount = null){
		$philhealth = $this->Philhealth->find('first', array('conditions' => array('AND' => array('Philhealth.rangestart <=' => $amount, 'Philhealth.rangeend >=' => $amount))));
		if(isset($this->params['requested'])){
			return $philhealth;
		}
	}
}
