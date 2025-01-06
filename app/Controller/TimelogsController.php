<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'phpexcel/index');
App::uses('Sanitize', 'Utility');
/**
 * Timelogs Controller
 *
 * @property Timelog $Timelog
 * @property PaginatorComponent $Paginator
 */
class TimelogsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


	public function search() {
		if ($this->request->is('post')) {
			$month = $this->data['Timelog']['searchyear'] . '-' . $this->data['Timelog']['searchmonth'] . '-01';
			$selecteddate = $this->data['Timelog']['selecteddate'];
			$employeeid = $this->data['Timelog']['employee'];
	
			if (!empty($selecteddate)) {
				// Redirect using 'date' type for filtering by exact date
				$this->redirect(array('controller' => 'timelogs', 'action' => 'index', $employeeid, $selecteddate, "date"));
			} elseif (!empty($month)) {
				// Redirect using 'monthyear' type for filtering by month and year
				$this->redirect(array('controller' => 'timelogs', 'action' => 'index', $employeeid, $month, "monthyear"));
			} else {
				// Set error message if both selecteddate and month are empty
				$this->Flash->error(__('Please provide a date or select a month and year.'));
			}
		}
	}
	
	

	public function index($id = null, $month = null, $type = null) {
		if (empty($id)) {
			if (!empty($month)) {
				$m = date("m", strtotime($month));
				$year = date("Y", strtotime($month));
	
				if ($type == "monthyear") {
					$this->paginate = array(
						'conditions' => array(
							'AND' => array(
								'MONTH(Timelog.date)' => $m,
								'YEAR(Timelog.date)' => $year,
							)
						),
						'order' => array(
							'Timelog.employee_id' => 'ASC',
							'Timelog.date' => 'ASC',
						)
					);
				} else {
					$this->paginate = array(
						'conditions' => array(
							'AND' => array(
								'DATE(Timelog.date)' => $month,
							)
						),
						'order' => array(
							'Timelog.employee_id' => 'ASC',
							'Timelog.date' => 'ASC',
						)
					);
				}
			} else {
				$month = date('Y-m-d');
				$m = date("m", strtotime($month));
				$year = date("Y", strtotime($month));
	
				if ($type == "monthyear") {
					$this->paginate = array(
						'conditions' => array(
							'AND' => array(
								'MONTH(Timelog.date)' => $m,
								'YEAR(Timelog.date)' => $year,
							)
						),
						'order' => array(
							'Timelog.employee_id' => 'ASC',
							'Timelog.date' => 'ASC',
						)
					);
				} else {
					$this->paginate = array(
						'conditions' => array(
							'AND' => array(
								'DATE(Timelog.date)' => $month,
							)
						),
						'order' => array(
							'Timelog.employee_id' => 'ASC',
							'Timelog.date' => 'ASC',
						)
					);
				}
			}
		} else {
			$m = date("m", strtotime($month));
			$year = date("Y", strtotime($month));
	
			if ($type == "monthyear") {
				$this->paginate = array(
					'conditions' => array(
						'AND' => array(
							'Timelog.employee_id' => $id,
							'MONTH(Timelog.date)' => $m,
							'YEAR(Timelog.date)' => $year,
						)
					),
					'order' => array(
						'Timelog.employee_id' => 'ASC',
						'Timelog.date' => 'ASC',
					)
				);
			} else {
				$this->paginate = array(
					'conditions' => array(
						'AND' => array(
							'Timelog.employee_id' => $id,
							'DATE(Timelog.date)' => $month,
						)
					),
					'order' => array(
						'Timelog.employee_id' => 'ASC',
						'Timelog.date' => 'ASC',
					)
				);
			}
	
			$this->set('id', $id);
		}
	
		$employees = $this->Timelog->Employee->find('all', array(
			'order' => array('Employee.firstname' => 'ASC', 'Employee.lastname' => 'ASC')
		));
		$this->set('employees', $employees);
	
		$this->set('month', $month);
		$this->Timelog->recursive = 0;
		$this->set('timelogs', $this->Paginator->paginate());
	}
	

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Timelog->exists($id)) {
			throw new NotFoundException(__('Invalid timelog'));
		}
		$options = array('conditions' => array('Timelog.' . $this->Timelog->primaryKey => $id));
		$this->set('timelog', $this->Timelog->find('first', $options));
	}
	
	

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Timelog->create();
			if ($this->Timelog->save($this->request->data)) {
				$this->Session->setFlash(__('The timelog has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The timelog could not be saved. Please, try again.'));
			}
		}
		$employees = $this->Timelog->Employee->find('list', array('fields' => 'fullname', 'order' => array('Employee.firstname' => 'ASC')));
		$workschedules = $this->Timelog->Workschedule->find('list');
		$this->set(compact('users', 'workschedules','employees'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Timelog->exists($id)) {
			throw new NotFoundException(__('Invalid timelog'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Timelog->save($this->request->data)) {
				$this->Session->setFlash(__('The timelog has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The timelog could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Timelog.' . $this->Timelog->primaryKey => $id));
			$this->request->data = $this->Timelog->find('first', $options);
		}
		$workschedules = $this->Timelog->Workschedule->find('list');
		$this->set(compact('users', 'workschedules'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Timelog->id = $id;
		if (!$this->Timelog->exists()) {
			throw new NotFoundException(__('Invalid timelog'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Timelog->delete()) {
			$this->Session->setFlash(__('The timelog has been deleted.'));
		} else {
			$this->Session->setFlash(__('The timelog could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	
	public function getfolderfromdata($id){
		$logid = $this->Auth->user('id');
		$this->set('logid', $logid);
		$this->loadModel('Uploadedfile');
		$status = $this->Uploadedfile->findById($id);
		return $status['Examinationresult']['mapping_id'].'/'.$status['Examinationresult']['region_id'].'/'.$status['Examinationresult']['areamanager_id'].'/'.$status['Examinationresult']['examinationtype_id'];
	}
	
	
	public function extract($id=null){
		$fileid = $id;
		$this->set('fileid', $fileid);
		$logid = $this->Auth->user('id');
		$this->loadModel('Uploadedfile');
	
		$filename = $this->Uploadedfile->find('first', array('conditions' => array('Uploadedfile.id' => $id)));
		$continue_save = false;
		
		//check if the file exists
		if(file_exists(APP.'xls/'.$this->Auth->user('id').'/'.$filename['Uploadedfile']['dateuploaded'].'/'.$filename['Uploadedfile']['filename'])){
			$continue_save = true;
		}
		$url = 'xls/'.$this->Auth->user('id').'/'.$filename['Uploadedfile']['dateuploaded'].'/'.$filename['Uploadedfile']['filename'];
		
		if($continue_save){
			$objPHPExcel = new PHPExcel();
			$objReader = PHPExcel_IOFactory::createReader('Excel2007');
			$objReader = new PHPExcel_Reader_Excel5();
			$objReader->setReadDataOnly(true);		
			$objPHPExcel = PHPExcel_IOFactory::load($this->checkthefile($filename));
			//$objWorksheet = $objPHPExcel->getActiveSheet();
							
			$this->set('objWorksheet', $objPHPExcel->setActiveSheetIndex(0)); /*SELECT THE TAB NUMBER*/
			$this->set('heighestRow', $objPHPExcel->setActiveSheetIndex(0)->getHighestRow());
			$this->set('filename', $this->Uploadedfile->read(null, $filename['Uploadedfile']['id']));			
						
			if($this->request->is('post')){			
				$employee_id = $this->data['Timelog']['employee_id'];
				$workschedule_id = $this->data['Timelog']['workschedule'];
				$temp_empoyeeid = $this->data['Timelog']['temp_empoyeeid'];
				$temp_day = $this->data['Timelog']['temp_day'];
				$temp_timein = $this->data['Timelog']['temp_timein'];
				$temp_timeout = $this->data['Timelog']['temp_timeout'];
				$temp_late = $this->data['Timelog']['temp_late'];
				$temp_otin = $this->data['Timelog']['temp_otin'];
				$temp_otout = $this->data['Timelog']['temp_otout'];
				$remarks = $this->data['Timelog']['remarks'];
				$udertimein = $this->data['Timelog']['udertimein'];
				$undertimeout = $this->data['Timelog']['undertimeout'];
				
				if(empty($this->data['Timelog']['employee_id'])){
				
				}else{
							
					foreach($this->data['Timelog']['employee_id'] as $index => $key):
						$data1[] = array(
							'Timelog' => array(
								'employee_id' => $this->data['Timelog']['employee_id'][$index],
								'workschedule_id' => $this->data['Timelog']['workschedule'][$index],
								'employeeid ' => $this->data['Timelog']['temp_empoyeeid'][$index],
								'date' => $this->data['Timelog']['temp_day'][$index],
								'timein' => $this->data['Timelog']['temp_timein'][$index],
								'timeout' => $this->data['Timelog']['temp_timeout'][$index],
								'late' => $this->data['Timelog']['temp_late'][$index],
								'lateminutes' => $this->data['Timelog']['temp_latemin'][$index],
								'otin' => $this->data['Timelog']['temp_otin'][$index],
								'otout' => $this->data['Timelog']['temp_otout'][$index],
								'remarks' => $this->data['Timelog']['remarks'][$index],
								'udertimein' => $this->data['Timelog']['udertimein'][$index],
								'undertimeout' => $this->data['Timelog']['undertimeout'][$index],
								//'user_id' => $this->Auth->user('id'),
								//'dateadded' => $this->data['Timelog']['dateadded']
							)
						);
					endforeach;
					
					$this->Timelog->create();	
					if($this->Timelog->saveAll($data1)){								
						$this->Session->setFlash($this->Message->getMessage("DATA WAS SUCCESFULLY SAVED!"), 'success_message');
						$this->redirect(array('controller' => 'timelogs', 'action' => 'index'));//, $logid, $this->data['Applicant']['dateadded']));
					}else{
						$this->Session->setFlash(__('Please, try again.' . mysql_error()));
						  
						if($this->Uploadedfile->deleteAll(['Uploadedfile.id' => $fileid])){
							$this->Session->setFlash(__('Please, try again.' . mysql_error()));
						}
					}															
				}
			}
		}else{
			$this->Session->setFlash(' Unable to continue, the system could not find the file', 'error_message');
		}
		$this->set('logid', $this->Auth->user('id'));
	}
	
	
	public function checkthefile($filename=null){		
		if(!empty($filename)){
			$dir  = APP.'xls/';
			$folder = $filename['Uploadedfile']['dateuploaded'];
			$filename = $filename['Uploadedfile']['filename'];
			$file_to_check = $dir . $this->Auth->user('id').'/'.$folder.'/'.$filename;
			
			if(file_exists($file_to_check)){
				return $file_to_check;
			}else{
				$this->Session->setFlash($this->Message->getMessage("Unable to locate the file ".$file_to_check), 'error_message');
			}
		}else{
			$this->Session->setFlash($this->Message->getMessage("Unable to locate the file "), 'error_message');
		}			
	}
	
	public function getlates($employeeid = null, $from = null, $until = null){
		$lates = $this->Timelog->find('all', array('conditions' => array('AND' => array('Timelog.employee_id' => $employeeid, 'Timelog.date >=' => $from, 'Timelog.date <=' => $until, 'Timelog.timeout !=' => NULL))));
		if(isset($this->params['requested'])){
			return $lates;			
		}
	}
	
	public function getDays($employeeid = null, $from = null, $until = null){
		$lates = $this->Timelog->find('all', array('conditions' => array('AND' => array('Timelog.employee_id' => $employeeid, 'Timelog.date >=' => $from, 'Timelog.date <=' => $until))));
		if(isset($this->params['requested'])){
			return $lates;			
		}
	}
	
	public function getUndertime($employeeid = null, $from = null, $until = null){
		$logs = $this->Timelog->find('all', 
		    array(
		        'conditions' => array(
		                'AND' => array(
		                        'Timelog.employee_id' => $employeeid, 
		                        'Timelog.date >=' => $from, 
		                        'Timelog.date <=' => $until,
		                        'Timelog.timeout < ' => date('H:i:s', strtotime('17:00:00'))
		                  )
		          )
		    )
	    );
	    
		if(isset($this->params['requested'])){
			return $logs;			
		}
	}
	
	
	
	public function printdtr($month = null, $id = null){
		$m = date("m", strtotime($month));
		$year = date("Y", strtotime($month));
		$this->set('timelogs', $timelogs = $this->Timelog->find('all', array(
			'conditions' => array(
				'AND' => array(
					'Timelog.employee_id' => $id,
					'MONTH(Timelog.date) ' => $m,
					'YEAR(Timelog.date) ' => $year,
					)
				)
			)
		));
		
		$this->set('month', $month);
	}
}
