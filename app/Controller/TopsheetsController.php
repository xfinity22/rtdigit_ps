<?php
App::uses('AppController', 'Controller');
/**
 * Topsheets Controller
 *
 * @property Topsheet $Topsheet
 * @property PaginatorComponent $Paginator
 */
class TopsheetsController extends AppController {

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
		$this->Topsheet->recursive = 0;
		$this->set('topsheets', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$employee = $this->Topsheet->Employee->find('first', array(
			'conditions' => array(
				'Employee.id' => $id
			)
		));
		
		$this->set('employ', $employee);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null, $type = null) {
		if ($this->request->is('post')) {
			$this->Topsheet->create();
			if ($this->Topsheet->save($this->request->data)) {
				$this->Session->setFlash(__('The topsheet has been saved.'));
				return $this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The topsheet could not be saved. Please, try again.'));
			}
		}
		$employees = $this->Topsheet->Employee->find('list', array(
			'conditions' => array(
				'Employee.id' => $id
			),
			'fields' => 'fullname'
		));
		$this->set(compact('employees'));
		
		$this->set('type', $type);
		$this->set('id', $id);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $type = null, $eid = null) {
		if (!$this->Topsheet->exists($id)) {
			throw new NotFoundException(__('Invalid topsheet'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Topsheet->save($this->request->data)) {
				$this->Session->setFlash(__('The topsheet has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The topsheet could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Topsheet.' . $this->Topsheet->primaryKey => $id));
			$this->request->data = $this->Topsheet->find('first', $options);
		}
		$employees = $this->Topsheet->Employee->find('list');
		$this->set(compact('employees'));
		
		$this->set('type', $type);
		$this->set('id', $eid);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $eid = null) {
		$this->Topsheet->id = $id;
		if (!$this->Topsheet->exists()) {
			throw new NotFoundException(__('Invalid topsheet'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Topsheet->delete()) {
			$this->Session->setFlash(__('The topsheet has been deleted.'));
		} else {
			$this->Session->setFlash(__('The topsheet could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'view', $eid));
	}
	
	public function search ($id = null, $type = null){
		$topsheets = $this->Topsheet->find('all', array(
			'conditions' => array(
				'AND' => array(
					'Topsheet.employee_id' => $id,
					'Topsheet.type' => $type,
				)
				
			),
			'order' => array(
				'Topsheet.id' => 'DESC'
			)
		));
		
		if (isset($this->params['requested'])){
			return $topsheets;
		}
	}
}
