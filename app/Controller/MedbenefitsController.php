<?php
App::uses('AppController', 'Controller');
/**
 * Medbenefits Controller
 *
 * @property Medbenefit $Medbenefit
 * @property PaginatorComponent $Paginator
 */
class MedbenefitsController extends AppController {

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
		$this->Medbenefit->recursive = 0;
		$this->set('medbenefits', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Medbenefit->exists($id)) {
			throw new NotFoundException(__('Invalid medbenefit'));
		}
		$options = array('conditions' => array('Medbenefit.' . $this->Medbenefit->primaryKey => $id));
		$this->set('medbenefit', $this->Medbenefit->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($employeeid = null) {
		if ($this->request->is('post')) {
			$this->Medbenefit->create();
			if ($this->Medbenefit->save($this->request->data)) {
				$this->Session->setFlash(__('The medbenefit has been saved.'));
				return $this->redirect(array('controller' => 'employees', 'action' => 'edit', $employeeid));
			} else {
				$this->Session->setFlash(__('The medbenefit could not be saved. Please, try again.'));
			}
		}
		//$medproviders = $this->Medbenefit->Medprovider->find('list');
		$this->set('employeeid', $employeeid);
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Medbenefit->exists($id)) {
			throw new NotFoundException(__('Invalid medbenefit'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Medbenefit->save($this->request->data)) {
				$this->Session->setFlash(__('The medbenefit has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medbenefit could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Medbenefit.' . $this->Medbenefit->primaryKey => $id));
			$this->request->data = $this->Medbenefit->find('first', $options);
		}
		$medproviders = $this->Medbenefit->Medprovider->find('list');
		$this->set(compact('medproviders'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Medbenefit->id = $id;
		if (!$this->Medbenefit->exists()) {
			throw new NotFoundException(__('Invalid medbenefit'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Medbenefit->delete()) {
			$this->Session->setFlash(__('The medbenefit has been deleted.'));
		} else {
			$this->Session->setFlash(__('The medbenefit could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function related($employeeid = null){
		$benefits = $this->Medbenefit->find('all', array('conditions' => array('Medbenefit.employee_id' => $employeeid), array('order' => array('Medbenefit.id' => 'DESC'))));
		if(isset($this->params['requested'])){
			return $benefits;
		}
	}
}
