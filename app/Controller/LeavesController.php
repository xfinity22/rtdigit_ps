<?php
App::uses('AppController', 'Controller');
/**
 * Leaves Controller
 *
 * @property Leave $Leave
 * @property PaginatorComponent $Paginator
 */
class LeavesController extends AppController {

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
		$this->Leave->recursive = 0;
		$this->set('leaves', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($employeeid = null, $year = null) {
		$this->loadModel('Leavetaken');
		if(empty($year)){
			$year = date('Y');
		}
		$employee = $this->Leave->Employee->find('first', array('conditions' => array('Employee.id' => $employeeid)));
		$leave = $this->Leave->find('first', array('conditions' => array('AND' => array('Leave.year' => $year, 'Leave.employee_id' => $employeeid))));
		$leaves = $this->Leavetaken->find('all', array('conditions' => array('AND' => array('Leavetaken.year' => $year, 'Leavetaken.employee_id' => $employeeid)), 'order' => array('Leavetaken.vltype_id' => 'DESC')));
		$this->set('leave', $leave);
		$this->set('leaves', $leaves);
		$this->set('employee', $employee);
		$this->set('year', $year);
		
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add($employeeid = null, $year = null) {
		if ($this->request->is('post')) {
			$this->Leave->create();
			if ($this->Leave->save($this->request->data)) {
				$this->Session->setFlash(__('The leave has been saved.'));
				return $this->redirect(array('action' => 'view', $employeeid));
			} else {
				$this->Session->setFlash(__('The leave could not be saved. Please, try again.'));
			}
		}
		$this->set('employeeid', $employeeid);
		$this->set('year', $year);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $employeeid=null, $year = null) {
		if (!$this->Leave->exists($id)) {
			throw new NotFoundException(__('Invalid leave'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Leave->save($this->request->data)) {
				$this->Session->setFlash(__('The leave has been saved.'));
				return $this->redirect(array('action' => 'view', $employeeid));
			} else {
				$this->Session->setFlash(__('The leave could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Leave.' . $this->Leave->primaryKey => $id));
			$this->request->data = $this->Leave->find('first', $options);
		}
		$employees = $this->Leave->Employee->find('list');
		$this->set(compact('employees'));
		$this->set('year', $year);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Leave->id = $id;
		if (!$this->Leave->exists()) {
			throw new NotFoundException(__('Invalid leave'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Leave->delete()) {
			$this->Session->setFlash(__('The leave has been deleted.'));
		} else {
			$this->Session->setFlash(__('The leave could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
