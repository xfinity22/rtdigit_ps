<?php
App::uses('AppController', 'Controller');
/**
 * Medreports Controller
 *
 * @property Medreport $Medreport
 * @property PaginatorComponent $Paginator
 */
class MedreportsController extends AppController {

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
		$this->Medreport->recursive = 0;
		$this->set('medreports', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Medreport->exists($id)) {
			throw new NotFoundException(__('Invalid medreport'));
		}
		$options = array('conditions' => array('Medreport.' . $this->Medreport->primaryKey => $id));
		$this->set('medreport', $this->Medreport->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Medreport->create();
			if ($this->Medreport->save($this->request->data)) {
				$this->Session->setFlash(__('The medreport has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medreport could not be saved. Please, try again.'));
			}
		}
		$employees = $this->Medreport->Employee->find('list');
		$this->set(compact('employees'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Medreport->exists($id)) {
			throw new NotFoundException(__('Invalid medreport'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Medreport->save($this->request->data)) {
				$this->Session->setFlash(__('The medreport has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The medreport could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Medreport.' . $this->Medreport->primaryKey => $id));
			$this->request->data = $this->Medreport->find('first', $options);
		}
		$employees = $this->Medreport->Employee->find('list');
		$this->set(compact('employees'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Medreport->id = $id;
		if (!$this->Medreport->exists()) {
			throw new NotFoundException(__('Invalid medreport'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Medreport->delete()) {
			$this->Session->setFlash(__('The medreport has been deleted.'));
		} else {
			$this->Session->setFlash(__('The medreport could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
