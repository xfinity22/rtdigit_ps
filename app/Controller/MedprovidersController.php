<?php
App::uses('AppController', 'Controller');
/**
 * Medproviders Controller
 *
 * @property Medprovider $Medprovider
 * @property PaginatorComponent $Paginator
 */
class MedprovidersController extends AppController {

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
		$this->Medprovider->recursive = 0;
		$this->set('medproviders', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Medprovider->exists($id)) {
			throw new NotFoundException(__('Invalid medprovider'));
		}
		$options = array('conditions' => array('Medprovider.' . $this->Medprovider->primaryKey => $id));
		$this->set('medprovider', $this->Medprovider->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Medprovider->create();
			if ($this->Medprovider->save($this->request->data)) {
				$this->Session->setFlash(__('The medprovider has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medprovider could not be saved. Please, try again.'));
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
		if (!$this->Medprovider->exists($id)) {
			throw new NotFoundException(__('Invalid medprovider'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Medprovider->save($this->request->data)) {
				$this->Session->setFlash(__('The medprovider has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medprovider could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Medprovider.' . $this->Medprovider->primaryKey => $id));
			$this->request->data = $this->Medprovider->find('first', $options);
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
		$this->Medprovider->id = $id;
		if (!$this->Medprovider->exists()) {
			throw new NotFoundException(__('Invalid medprovider'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Medprovider->delete()) {
			$this->Session->setFlash(__('The medprovider has been deleted.'));
		} else {
			$this->Session->setFlash(__('The medprovider could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function related($id = null){
		$provider = $this->Medprovider->find('first', array('conditions' => array('Medprovider.id' => $id)));
		if(isset($this->params['requested'])){
			return $provider;
		}
		
	}
}
