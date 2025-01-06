<?php
App::uses('AppController', 'Controller');
/**
 * Otherearnings Controller
 *
 * @property Otherearning $Otherearning
 * @property PaginatorComponent $Paginator
 */
class OtherearningsController extends AppController {

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
		$this->Otherearning->recursive = 0;
		$this->set('otherearnings', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Otherearning->exists($id)) {
			throw new NotFoundException(__('Invalid otherearning'));
		}
		$options = array('conditions' => array('Otherearning.' . $this->Otherearning->primaryKey => $id));
		$this->set('otherearning', $this->Otherearning->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Otherearning->create();
			if ($this->Otherearning->save($this->request->data)) {
				$this->Session->setFlash(__('The Other Earning has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Other Earning could not be saved. Please, try again.'));
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
		if (!$this->Otherearning->exists($id)) {
			throw new NotFoundException(__('Invalid otherearning'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Otherearning->save($this->request->data)) {
				$this->Session->setFlash(__('The Other Earning has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Other Earning could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Otherearning.' . $this->Otherearning->primaryKey => $id));
			$this->request->data = $this->Otherearning->find('first', $options);
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
		$this->Otherearning->id = $id;
		if (!$this->Otherearning->exists()) {
			throw new NotFoundException(__('Invalid otherearning'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Otherearning->delete()) {
			$this->Session->setFlash(__('The Other Earning has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Other Earning could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function getentry($id = null){
		$earnname = $this->Otherearning->find('first', array('conditions' => array('Otherearning.id' => $id)));
		if(isset($this->params['requested'])){
			return $earnname;
		}
		
	}
	
	public function listall(){
		$earns = $this->Otherearning->find('all', array('order' => array('Otherearning.name' => 'ASC')));
		if(isset($this->params['requested'])){
			return $earns;
		}
		
	}
	
	public function find($id = null){
		$earns = $this->Otherearning->find('all', array('order' => array('Otherearning.name' => 'ASC'), 'conditions' => array('Otherearning.id' => $id)));
		if(isset($this->params['requested'])){
			return $earns;
		}
		
	}
}
