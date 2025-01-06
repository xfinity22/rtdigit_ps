<?php
App::uses('AppController', 'Controller');
/**
 * Withholdingtaxes Controller
 *
 * @property Withholdingtax $Withholdingtax
 * @property PaginatorComponent $Paginator
 */
class WithholdingtaxesController extends AppController {

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
		$this->Withholdingtax->recursive = 0;
		$this->set('withholdingtaxes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Withholdingtax->exists($id)) {
			throw new NotFoundException(__('Invalid withholdingtax'));
		}
		$options = array('conditions' => array('Withholdingtax.' . $this->Withholdingtax->primaryKey => $id));
		$this->set('withholdingtax', $this->Withholdingtax->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Withholdingtax->create();
			if ($this->Withholdingtax->save($this->request->data)) {
				$this->Session->setFlash(__('The withholdingtax has been saved.'));
				return $this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The withholdingtax could not be saved. Please, try again.'));
			}
		}
		$taxdescriptions = $this->Withholdingtax->Taxdescription->find('all');
		$this->set('taxdescriptions', $taxdescriptions);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Withholdingtax->exists($id)) {
			throw new NotFoundException(__('Invalid withholdingtax'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Withholdingtax->save($this->request->data)) {
				$this->Session->setFlash(__('The withholdingtax has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The withholdingtax could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Withholdingtax.' . $this->Withholdingtax->primaryKey => $id));
			$this->request->data = $this->Withholdingtax->find('first', $options);
		}
		$taxdescriptions = $this->Withholdingtax->Taxdescription->find('list');
		$this->set(compact('taxdescriptions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Withholdingtax->id = $id;
		if (!$this->Withholdingtax->exists()) {
			throw new NotFoundException(__('Invalid withholdingtax'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Withholdingtax->delete()) {
			$this->Session->setFlash(__('The withholdingtax has been deleted.'));
		} else {
			$this->Session->setFlash(__('The withholdingtax could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function taxbase($taxid = null, $taxableincome = null){
		//$tax = $this->Withholdingtax->find('first', array('conditions' => array('AND' => array('Withholdingtax.taxdescription_id' => $taxid, 'Withholdingtax.baseamount <' => $taxableincome)), 'order' =>  array('Withholdingtax.factor' => 'DESC')));
		$tax = $this->Withholdingtax->find('first', array('conditions' => array('AND' => array('Withholdingtax.id' => $taxid)), 'order' =>  array('Withholdingtax.factor' => 'DESC')));
		if(isset($this->params['requested'])){
			return $tax;
		}
		
	}
}
