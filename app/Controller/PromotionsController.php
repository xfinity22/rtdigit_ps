<?php
App::uses('AppController', 'Controller');
/**
 * Promotions Controller
 *
 * @property Promotion $Promotion
 * @property PaginatorComponent $Paginator
 */
class PromotionsController extends AppController {

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
		$this->Promotion->recursive = 0;
		$this->set('promotions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Promotion->exists($id)) {
			throw new NotFoundException(__('Invalid promotion'));
		}
		$options = array('conditions' => array('Promotion.' . $this->Promotion->primaryKey => $id));
		$this->set('promotion', $this->Promotion->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($employeeid = null) {
		if ($this->request->is('post')) {
			$this->Promotion->create();
			if ($this->Promotion->save($this->request->data)) {
				
				$promotion = $this->Promotion->find('first', array(
					'conditions' => array(
						'Promotion.employee_id' => $employeeid
					),
					'order' => array(
						'Promotion.id' => 'DESC'
					)
				
				));
				
				$this->loadModel('Employee');
				$this->Employee->create();
				if(!empty($promotion)){
					$mrate = $promotion['Promotion']['salary'] ;
					$drate = $mrate / 26;
					$hrate = $drate / 8;
					$data = array(
						'Employee' => array(
							'id' => $employeeid,
							'monthlyrate' => $mrate,
							'dailyrate' => $drate, 
							'hourlyrate' => $hrate,
							'save' => 1, 
						)
						
					);
					
					$this->Employee->save($data);
				}
				
				$this->Session->setFlash(__('The promotion has been saved.'));
				return $this->redirect(array('controller' => 'employees', 'action' => 'edit', $employeeid));
			} else {
				$this->Session->setFlash(__('The promotion could not be saved. Please, try again.'));
			}
		}
		
		
		$this->set('employeeid', $employeeid);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $empid = null) {
		if (!$this->Promotion->exists($id)) {
			throw new NotFoundException(__('Invalid promotion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Promotion->save($this->request->data)) {
				$promotion = $this->Promotion->find('first', array(
					'conditions' => array(
						'Promotion.employee_id' => $employeeid
					),
					'order' => array(
						'Promotion.id' => 'DESC'
					)
				
				));
				
				
				$this->loadModel('Employee');
				$this->Employee->create();
				if(!empty($promotion)){
					$mrate = $promotion['Promotion']['salary'] ;
					$drate = $mrate / 26;
					$hrate = $drate / 8;
					$data = array(
						'Employee' => array(
							'id' => $employeeid,
							'monthlyrate' => $mrate,
							'dailyrate' => $drate, 
							'hourlyrate' => $hrate, 
							'save' => 1, 
						)
						
					);
					
					$this->Employee->save($data);
				}
				
				$this->Session->setFlash(__('The promotion has been saved.'));
				return $this->redirect(array('controller' => 'employees', 'action' => 'edit', $empid));
			} else {
				$this->Session->setFlash(__('The promotion could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Promotion.' . $this->Promotion->primaryKey => $id));
			$this->request->data = $this->Promotion->find('first', $options);
			
		}
		
		$promotion = $this->Promotion->find('first', array('conditions' => array('Promotion.id' => $id)));
		$this->set('employeeid', $empid);
		$this->set('promotion', $promotion);
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $empid = null) {
		$this->Promotion->id = $id;
		if (!$this->Promotion->exists()) {
			throw new NotFoundException(__('Invalid promotion'));
		}
		// $this->request->allowMethod('post', 'delete');
		if ($this->Promotion->delete()) {
			return $this->redirect(array('controller' => 'employees', 'action' => 'edit', $empid));
		} else {
			$this->Session->setFlash(__('The promotion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
