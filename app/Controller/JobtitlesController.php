<?php
App::uses('AppController', 'Controller');
/**
 * Jobtitles Controller
 *
 * @property Jobtitle $Jobtitle
 * @property PaginatorComponent $Paginator
 */
class JobtitlesController extends AppController {

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
		$this->Jobtitle->recursive = 0;
		$this->set('jobtitles', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Jobtitle->exists($id)) {
			throw new NotFoundException(__('Invalid jobtitle'));
		}
		$options = array('conditions' => array('Jobtitle.' . $this->Jobtitle->primaryKey => $id));
		$this->set('jobtitle', $this->Jobtitle->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Jobtitle->create();
			if ($this->Jobtitle->save($this->request->data)) {
				$this->Session->setFlash(__('The jobtitle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The jobtitle could not be saved. Please, try again.'));
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
		if (!$this->Jobtitle->exists($id)) {
			throw new NotFoundException(__('Invalid jobtitle'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Jobtitle->save($this->request->data)) {
				$this->Session->setFlash(__('The jobtitle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The jobtitle could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Jobtitle.' . $this->Jobtitle->primaryKey => $id));
			$this->request->data = $this->Jobtitle->find('first', $options);
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
		$this->Jobtitle->id = $id;
		if (!$this->Jobtitle->exists()) {
			throw new NotFoundException(__('Invalid jobtitle'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Jobtitle->delete()) {
			$this->Session->setFlash(__('The jobtitle has been deleted.'));
		} else {
			$this->Session->setFlash(__('The jobtitle could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
