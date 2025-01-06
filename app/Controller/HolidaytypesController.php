<?php
App::uses('AppController', 'Controller');
/**
 * Holidaytypes Controller
 *
 * @property Holidaytype $Holidaytype
 * @property PaginatorComponent $Paginator
 */
class HolidaytypesController extends AppController {

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
		$this->Holidaytype->recursive = 0;
		$this->set('holidaytypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Holidaytype->exists($id)) {
			throw new NotFoundException(__('Invalid holidaytype'));
		}
		$options = array('conditions' => array('Holidaytype.' . $this->Holidaytype->primaryKey => $id));
		$this->set('holidaytype', $this->Holidaytype->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Holidaytype->create();
			if ($this->Holidaytype->save($this->request->data)) {
				$this->Session->setFlash(__('The holidaytype has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The holidaytype could not be saved. Please, try again.'));
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
		if (!$this->Holidaytype->exists($id)) {
			throw new NotFoundException(__('Invalid holidaytype'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Holidaytype->save($this->request->data)) {
				$this->Session->setFlash(__('The holidaytype has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The holidaytype could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Holidaytype.' . $this->Holidaytype->primaryKey => $id));
			$this->request->data = $this->Holidaytype->find('first', $options);
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
		$this->Holidaytype->id = $id;
		if (!$this->Holidaytype->exists()) {
			throw new NotFoundException(__('Invalid holidaytype'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Holidaytype->delete()) {
			$this->Session->setFlash(__('The holidaytype has been deleted.'));
		} else {
			$this->Session->setFlash(__('The holidaytype could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
