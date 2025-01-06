<?php
App::uses('AppController', 'Controller');
/**
 * Leavetakens Controller
 *
 * @property Leavetaken $Leavetaken
 * @property PaginatorComponent $Paginator
 */
class LeavetakensController extends AppController {

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
		$this->Leavetaken->recursive = 0;
		$this->set('leavetakens', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Leavetaken->exists($id)) {
			throw new NotFoundException(__('Invalid leavetaken'));
		}
		$options = array('conditions' => array('Leavetaken.' . $this->Leavetaken->primaryKey => $id));
		$this->set('leavetaken', $this->Leavetaken->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($employeeid = null, $year = null) {
		$this->loadModel('Leave');
		if ($this->request->is('post')) {
			$this->Leavetaken->create();
			if ($this->Leavetaken->save($this->request->data)) {
				$this->Session->setFlash(__('The leavetaken has been saved.'));
				return $this->redirect(array('controller' => 'leaves', 'action' => 'view', $employeeid));
			} else {
				$this->Session->setFlash(__('The leavetaken could not be saved. Please, try again.'));
			}
		}
		
		$eleaves = $this->Leave->find('first', array('conditions' => array('Leave.employee_id' => $employeeid, 'Leave.year' => $year)));
		$this->set('eleaves', $eleaves);
		$this->set('employeeid', $employeeid);
		$employees = $this->Leavetaken->Employee->find('list');
		$vltypes = $this->Leavetaken->Vltype->find('list');
		$leavestatuses = $this->Leavetaken->Leavestatus->find('list');
		$this->set(compact('employees', 'vltypes', 'leavestatuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $employeeid = null, $year = null) {
		if (!$this->Leavetaken->exists($id)) {
			throw new NotFoundException(__('Invalid leavetaken'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Leavetaken->save($this->request->data)) {
				$this->Session->setFlash(__('The leavetaken has been saved.'));
				return $this->redirect(array('controller' => 'leaves', 'action' => 'view', $employeeid));
			} else {
				$this->Session->setFlash(__('The leavetaken could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Leavetaken.' . $this->Leavetaken->primaryKey => $id));
			$this->request->data = $this->Leavetaken->find('first', $options);
		}
		$leaves = $this->Leavetaken->find('first', array('conditions' => array('Leavetaken.id' => $id)));
		$this->set('leaves', $leaves);
		
		$employees = $this->Leavetaken->Employee->find('list');
		$vltypes = $this->Leavetaken->Vltype->find('list');
		$leavestatuses = $this->Leavetaken->Leavestatus->find('list');
		$this->set(compact('employees', 'vltypes', 'leavestatuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $employeeid = null, $year = null) {
		$this->Leavetaken->id = $id;
		if (!$this->Leavetaken->exists()) {
			throw new NotFoundException(__('Invalid leavetaken'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Leavetaken->delete()) {
			$this->Session->setFlash(__('The leavetaken has been deleted.'));
		} else {
			$this->Session->setFlash(__('The leavetaken could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('controller' => 'leaves', 'action' => 'view', $employeeid, $year));
	}
	
	public function searchleave($datefrom = null, $dateend = null, $employee = null){
		$leaves = $this->Leavetaken->find('all', array('conditions' => array(
			'AND' => array(
				'Leavetaken.date >=' => $datefrom,
				'Leavetaken.dateto <=' => $dateend,
				'Leavetaken.employee_id <=' => $employee
			)
		)));
		
		if(isset($this->params['requested'])){
			return $leaves;
		}
	}
}
