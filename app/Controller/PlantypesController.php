<?php
App::uses('AppController', 'Controller');
/**
 * Plantypes Controller
 *
 * @property Plantype $Plantype
 * @property PaginatorComponent $Paginator
 */
class PlantypesController extends AppController {

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
		$this->Plantype->recursive = 0;
		$this->set('plantypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Plantype->exists($id)) {
			throw new NotFoundException(__('Invalid plantype'));
		}
		$options = array('conditions' => array('Plantype.' . $this->Plantype->primaryKey => $id));
		$this->set('plantype', $this->Plantype->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Plantype->create();
			if ($this->Plantype->save($this->request->data)) {
				$this->Session->setFlash(__('The plantype has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The plantype could not be saved. Please, try again.'));
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
		if (!$this->Plantype->exists($id)) {
			throw new NotFoundException(__('Invalid plantype'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Plantype->save($this->request->data)) {
				$this->Session->setFlash(__('The plantype has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The plantype could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Plantype.' . $this->Plantype->primaryKey => $id));
			$this->request->data = $this->Plantype->find('first', $options);
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
		$this->Plantype->id = $id;
		if (!$this->Plantype->exists()) {
			throw new NotFoundException(__('Invalid plantype'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Plantype->delete()) {
			$this->Session->setFlash(__('The plantype has been deleted.'));
		} else {
			$this->Session->setFlash(__('The plantype could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function related($id = null){
		$types = $this->Plantype->find('first', array('conditions' => array('Plantype.id' => $id)));
		if(isset($this->params['requested'])){
			return $types;
		}
	}
}
