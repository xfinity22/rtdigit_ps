<?php
App::uses('AppController', 'Controller');
/**
 * Parameters Controller
 *
 * @property Parameter $Parameter
 * @property PaginatorComponent $Paginator
 */
class ParametersController extends AppController {

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
		$this->Parameter->recursive = 0;
		$this->set('parameters', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Parameter->exists($id)) {
			throw new NotFoundException(__('Invalid parameter'));
		}
		$options = array('conditions' => array('Parameter.' . $this->Parameter->primaryKey => $id));
		$this->set('parameter', $this->Parameter->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$search = $this->Parameter->find('first');
		if(empty($search)){
			if ($this->request->is('post')) {
				$this->Parameter->create();
				if ($this->Parameter->save($this->request->data)) {
					$this->Session->setFlash(__('The parameter has been saved.'));
					return $this->redirect(array('action' => 'edit', $this->Parameter->getLastInsertedID()));
				} else {
					$this->Session->setFlash(__('The parameter could not be saved. Please, try again.'));
				}
			}
			$lateundertimebases = $this->Parameter->Lateundertimebase->find('list');
			$this->set(compact('lateundertimebases'));
		}else{
			return $this->redirect(array('action' => 'edit', $search['Parameter']['id']));
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
		if (!$this->Parameter->exists($id)) {
			throw new NotFoundException(__('Invalid parameter'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Parameter->save($this->request->data)) {
				$this->Session->setFlash(__('The parameter has been saved.'));
				return $this->redirect(array('action' => 'edit', $id));
			} else {
				$this->Session->setFlash(__('The parameter could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Parameter.' . $this->Parameter->primaryKey => $id));
			$this->request->data = $this->Parameter->find('first', $options);
		}
		$lateundertimebases = $this->Parameter->Lateundertimebase->find('list');
		$this->set(compact('lateundertimebases'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Parameter->id = $id;
		if (!$this->Parameter->exists()) {
			throw new NotFoundException(__('Invalid parameter'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Parameter->delete()) {
			$this->Session->setFlash(__('The parameter has been deleted.'));
		} else {
			$this->Session->setFlash(__('The parameter could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
