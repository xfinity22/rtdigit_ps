<?php
App::uses('AppController', 'Controller');
/**
 * Medhospitals Controller
 *
 * @property Medhospital $Medhospital
 * @property PaginatorComponent $Paginator
 */
class MedhospitalsController extends AppController {

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
		$this->Medhospital->recursive = 0;
		$this->set('medhospitals', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Medhospital->exists($id)) {
			throw new NotFoundException(__('Invalid medhospital'));
		}
		$options = array('conditions' => array('Medhospital.' . $this->Medhospital->primaryKey => $id));
		$this->set('medhospital', $this->Medhospital->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Medhospital->create();
			if ($this->Medhospital->save($this->request->data)) {
				$this->Session->setFlash(__('The medhospital has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medhospital could not be saved. Please, try again.'));
			}
		}
		$medproviders = $this->Medhospital->Medprovider->find('list');
		$this->set(compact('medproviders'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Medhospital->exists($id)) {
			throw new NotFoundException(__('Invalid medhospital'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Medhospital->save($this->request->data)) {
				$this->Session->setFlash(__('The medhospital has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medhospital could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Medhospital.' . $this->Medhospital->primaryKey => $id));
			$this->request->data = $this->Medhospital->find('first', $options);
		}
		$medproviders = $this->Medhospital->Medprovider->find('list');
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
		$this->Medhospital->id = $id;
		if (!$this->Medhospital->exists()) {
			throw new NotFoundException(__('Invalid medhospital'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Medhospital->delete()) {
			$this->Session->setFlash(__('The medhospital has been deleted.'));
		} else {
			$this->Session->setFlash(__('The medhospital could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function related($id = null){
		$hospitals = $this->Medhospital->find('all', array('conditions' => array('Medhospital.medprovider_id' => $id)));
		if(isset($this->params['requested'])){
			return $hospitals;
		}
	}
}
