<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'phpexcel/Classes/PHPExcel.php');
App::import('Vendor', 'phpexcel/index');


/**
 * Employees Controller
 *
 * @property Employee $Employee
 * @property PaginatorComponent $Paginator
 */
class EmployeesController extends AppController {

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
	public function generateplogs() {
		$this->loadModel('Timelog');

		// Employee IDs to generate logs for
		$employeeIds = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22];

		// Date range: Nov 1, 2024 - Dec 16, 2024
		$startDate = strtotime('2024-11-01');
		$endDate = strtotime('2024-12-16');

		$insertData = [];
		foreach ($employeeIds as $employeeId) {
			$currentDate = $startDate;

			while ($currentDate <= $endDate) {
				// Generate dynamic timein and timeout
				$timeIn = date('H:i:s', strtotime('08:00:00') + ($employeeId % 10) * 60);
				$timeOut = date('H:i:s', strtotime('17:00:00') + ($employeeId % 10) * 60);

				// Simulate late minutes and withot
				$late = $employeeId % 5; // Late by a few minutes based on employee ID
				$withot = 0;

				// Prepare the insert data
				$insertData[] = [
					'Timelog' => [
						'employee_id' => $employeeId,
						'date' => date('Y-m-d', $currentDate),
						'timein' => $timeIn,
						'timeout' => $timeOut,
						'late' => $late,
						'withot' => $withot
					]
				];

				$currentDate = strtotime('+1 day', $currentDate);
			}
		}

		// Batch insert using saveMany
		if ($this->Timelog->saveMany($insertData)) {
			$this->Session->setFlash(__('Payroll time logs have been successfully generated.'));
		} else {
			$this->Session->setFlash(__('An error occurred while generating the payroll time logs.'));
		}

		$this->redirect(array('action' => 'index'));
	}


	public function reminder() {
		$this->paginate = array(
				'conditions' => array(
				'AND' => array(
					'Employee.datehired <=' => date('Y-m-d', strtotime('-70 days')),
					'Employee.datehired >=' => date('Y-m-d', strtotime('-110 days')),
					'Employee.contri ' => 0
			)), 'limit' => 30,
				'order' =>  array(
					'Employee.datehired' => 'ASC',
					'Employee.fullname' => 'ASC',
				)
			);
		$this->Employee->recursive = 0;
		$this->set('employees', $this->Paginator->paginate());		
	}
	
	public function notif() {
		$notifs = $this->Employee->find('first', array(
			'conditions' => array(
				'AND' => array(
					'Employee.datehired <=' => date('Y-m-d', strtotime('-70 days')),
					'Employee.datehired >=' => date('Y-m-d', strtotime('-110 days')),
					'Employee.contri ' => 0		
		))));
		
		if(isset($this->params['requested'])){
			return $notifs;
		}
	}
 
	public function index($action = null, $employeetype = null, $message = null) {
		$this->set('message', $message);
		$this->loadModel('Payrollperiod');
		$this->loadModel('User');
		$periods = $this->Payrollperiod->find('all', array('order' => array('Payrollperiod.id' => 'DESC')));
		$this->set('periods', $periods);
		
		if(empty($action)){
			$this->paginate = array(
				'limit' => 50,
				'order' =>  array(
					'Employee.lastname' => 'ASC',
					'Employee.firstname' => 'ASC',
				), 
				'conditions' => array(
					'Employee.employmentstatus_id < ' => 4,
				)
			);
			$this->Employee->recursive = 0;
			$this->set('employees', $this->Paginator->paginate());
		}else if ($action == 2){
			$this->paginate = array(
				'conditions' => array(
				'AND' => array(
					'Employee.employmentstatus_id > ' => 3,
			)), 'limit' => 50,
				'order' =>  array(
					'Employee.lastname' => 'ASC',
					'Employee.firstname' => 'ASC',
				)
			);
			$this->Employee->recursive = 0;
			$this->set('employees', $this->Paginator->paginate());
		}else if ($action == 3){
			$this->paginate = array(
				'conditions' => array(
				'AND' => array(
					'Employee.employeetype_id' => $employeetype,
			)), 'limit' => 50,
				'order' =>  array(
					'Employee.lastname' => 'ASC',
					'Employee.firstname' => 'ASC',
				)
			);
			$this->Employee->recursive = 0;
			$this->set('employees', $this->Paginator->paginate());
		}else if ($action == 4){
			$this->paginate = array(
				'conditions' => array(
				'AND' => array(
					'Employee.division_id' => $employeetype,
			)), 'limit' => 50,
				'order' =>  array(
					'Employee.lastname' => 'ASC',
					'Employee.firstname' => 'ASC'
				)
			);
			$this->Employee->recursive = 0;
			$this->set('employees', $this->Paginator->paginate());
		}else if ($action == 5){
			$this->paginate = array(
				'conditions' => array(
				'AND' => array(
					'Employee.department_id' => $employeetype,
			)), 'limit' => 50,
				'order' =>  array(
					'Employee.lastname' => 'ASC',
					'Employee.firstname' => 'ASC'
				)
			);
			$this->Employee->recursive = 0;
			$this->set('employees', $this->Paginator->paginate());
		}
		if ($this->request->is('post')) {
			if($this->User->updateAll(array("User.payrollperiod" => $this->data['Employee']['period']), array("User.id" => $this->Auth->user('id')))){
			$this->Session->setFlash(__('DEFAULT PAYROLL PERIOD WAS SAVED!'), 'success_message');
			//return $this->redirect(array('controller' => 'payrollperiods', 'action' => 'index'));
		}
			
		}
	}	

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->loadModel('Medprovider');
		$this->loadModel('Taxdescription');
		$this->loadModel('Otherearningsentry');
		if (!$this->Employee->exists($id)) {
			throw new NotFoundException(__('Invalid employee'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Employee->save($this->request->data)) {
				$this->Session->setFlash(__('The employee has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The employee could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Employee.' . $this->Employee->primaryKey => $id));
			$this->request->data = $this->Employee->find('first', $options);
		}
		$employ = $this->Employee->find('first', array('conditions' => array('Employee.id' => $id)));
		$workschedules = $this->Employee->Workschedule->find('list', array('fields' => 'description'));
		$divisions = $this->Employee->Division->find('list');
		$departments = $this->Employee->Department->find('list');
		$costcenters = $this->Employee->Costcenter->find('list');
		$jobtitles = $this->Employee->Jobtitle->find('list');
		$employmentstatuses = $this->Employee->Employmentstatus->find('list');
		$employeetypes = $this->Employee->Employeetype->find('list');
		$banks = $this->Employee->Bank->find('list', array('order' => array('Bank.name' => 'ASC')));
		$withholdingtaxes = $this->Taxdescription->find('all');
		$providers = $this->Medprovider->find('all');
		$ratetypes = $this->Employee->Ratetype->find('list');
		$payfrequencies = $this->Employee->Payfrequency->find('list');
		$promotions = $this->Employee->Promotion->find('all', array('conditions' => array('Promotion.employee_id' => $id)));
		$earnings = $this->Otherearningsentry->find('all', array('conditions' => array('Otherearningsentry.employee_id' => $id)));
		$this->set(compact('workschedules', 'divisions', 'departments', 'costcenters', 'jobtitles', 'employmentstatuses', 'employeetypes', 'banks', 'ratetypes', 'payfrequencies'));
		$this->set('promotions', $promotions);
		$this->set('id', $id);
		$this->set('employ', $employ);
		$this->set('earnings', $earnings);
		$this->set('withholdingtaxes', $withholdingtaxes);
		$this->set('providers', $providers);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->loadModel('User');
		$this->loadModel('Taxdescription');
		$this->loadModel('Branch');
		if ($this->request->is('post')) {
			
			$string = '';
			$count = 0;
			
			if($count > 0){
				
				$this->Session->setFlash(__('Please Check The Following Error/s: <b><br/><br/>' . $string . '</b><br/><br/><br/>'));
			}else{
				
				$this->Employee->create();
				if ($this->Employee->save($this->request->data)) {
					$data1 = array(
						'User' => array(
							'username' => $this->data['Employee']['employeeno'],
							'password' => $this->data['Employee']['employeeno'],
							'firstname' => $this->data['Employee']['firstname'],
							'lastname' => $this->data['Employee']['lastname'],
							'userstatus_id' => 1,
							'usertype_id' => 4,
							'employeeno'=> $this->Employee->getLastInsertId(),
						)
					);
					if($this->User->saveAll($data1)){
						$this->Session->setFlash(__('The employee has been saved.'));
						return $this->redirect(array('action' => 'edit', $this->Employee->getLastInsertId()));
						
					}
					
				} else {
					$this->Session->setFlash(__('The employee could not be saved. Please, try again.'));
				}
				
			}
			

			
		}
		$workschedules = $this->Employee->Workschedule->find('list', array('fields' => 'Workschedule.description'));
		$divisions = $this->Employee->Division->find('list');
		$departments = $this->Employee->Department->find('list');
		$costcenters = $this->Employee->Costcenter->find('list');
		$jobtitles = $this->Employee->Jobtitle->find('list');
		$employmentstatuses = $this->Employee->Employmentstatus->find('list');
		$medproviders = $this->Employee->Medprovider->find('list');
		$plantypes = $this->Employee->Plantype->find('list');
		$employeetypes = $this->Employee->Employeetype->find('list');
		$banks = $this->Employee->Bank->find('list', array('order' => array('Bank.name' => 'ASC')));
		$branches = $this->Branch->find('list');
		$withholdingtaxes = $this->Taxdescription->find('all');
		$ratetypes = $this->Employee->Ratetype->find('list');
		$payfrequencies = $this->Employee->Payfrequency->find('list');
		$this->set(compact('workschedules', 'divisions', 'departments', 'costcenters', 'jobtitles', 'employmentstatuses', 'employeetypes', 'banks', 'ratetypes', 'payfrequencies','medproviders','plantypes','branches'));
		$this->set('withholdingtaxes', $withholdingtaxes);
	}


	public function uploademployee() {
		if ($this->request->is('post')) {
			if (!empty($this->request->data['Employee']['file']['name'])) {
				$file = $this->request->data['Employee']['file'];
	
				// Validate file extension
				$extension = pathinfo($file['name'], PATHINFO_EXTENSION);
				if ($extension !== 'csv') {
					$this->Session->setFlash(__('Invalid file format. Please upload a CSV file.'));
					return;
				}
	
				// Read CSV file
				$handle = fopen($file['tmp_name'], 'r');
				if ($handle) {
					$header = fgetcsv($handle); // Read the header row
					$rowCount = 0;
					$successCount = 0; // Count successful inserts
					$errorCount = 0;   // Count errors
					$errorMessages = []; // Store individual errors
	
					while (($row = fgetcsv($handle)) !== false) {
						$rowCount++;
						
						if(!empty($row[1])){
							// Check for required fields
							if (empty($row[1]) || empty($row[3]) || empty($row[5])) {
								$errorMessages[] = "Row $rowCount: Missing required fields (Employee Number, First Name, Last Name).";
								$errorCount++;
								continue;
							}
		
							// Check if employee exists based on employeeno
							$existingEmployee = $this->Employee->find('first', [
								'conditions' => ['Employee.employeeno' => $row[1]]
							]);
		
							if ($existingEmployee) {
								$errorMessages[] = "Row $rowCount: Employee with Employee Number {$row[1]} already exists.";
								$errorCount++;
								continue;
							}
		
							// Map CSV data to Employee fields
							$employeeData = [
								'Employee' => [
									//'faceID' => $row[0],
									'employeeno' => $row[1],	
									'datehired'	=> $row[2],																
									'firstname' => $row[3],
									'middlename' => $row[4],
									'lastname' => $row[5],															
									'department_id' => $row[6],
									'branch_id' => $row[7],
									'sssnumber' => $row[8],
									'philhealthnumber' => $row[9],
									'pagibignumber' => $row[10],
									'TIN' => $row[11],
									'mobilenumber' => $row[12],
									'email' => $row[13],
									'datehired' => !empty($row[14]) ? date("Y-m-d", strtotime($row[14])) : '',
								]
							];
		
							// Save employee data
							$this->Employee->create();
							if (!$this->Employee->save($employeeData)) {
								$errorMessages[] = "Row $rowCount: Error saving data - " . implode(", ", $this->Employee->validationErrors);
								$errorCount++;
							} else {
								$successCount++;
							}
						}
					}
					fclose($handle);
	
					// Display batch report
					if (!empty($errorMessages)) {
						foreach ($errorMessages as $message) {
							$this->Session->setFlash(__($message));
						}
					}
	
					$this->Session->setFlash(__(
						'File upload complete. %s rows added successfully, %s rows failed.',
						$successCount,
						$errorCount
					));
	
					//return $this->redirect(['action' => 'uploademployee']);
				} else {
					$this->Session->setFlash('Error reading the file.');
				}
			} else {
				$this->Session->setFlash('Please upload a file.');
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
	public function edit($id = null, $action = null, $emp = null) {
		$this->loadModel('Medprovider');
		$this->loadModel('Taxdescription');
		$this->loadModel('Otherearningsentry');
		$this->loadModel('Branch');
		if (!$this->Employee->exists($id)) {
			throw new NotFoundException(__('Invalid employee'));
		}
		if (isset($this->request->data['savedata'])) {
			if($action != 2){
				$string = '';
				$count = 0;
				
				
				if($count > 0){
					
					$this->Session->setFlash(__('Please Check The Following Error/s: <b><br/><br/>' . $string . '</b><br/><br/><br/>'));
				}else{
					if ($this->Employee->save($this->request->data)) {
						$this->Session->setFlash(__('The employee has been saved.'));
					return $this->redirect(array('action' => 'edit', $id));
					} else {
						$this->Session->setFlash(__('The employee could not be saved. Please, try again.'));
					}
				}
				
			}else{
				if($this->Uploadfile->checkfileExtensionforfileforpicture($this->data['Employee']['picture'])){
					$filename = $emp;				
					if (($this->Uploadfile->uploadforDownloadfile($this->data['Employee']['picture'], APP.'webroot/img/employees/', $this->renamefilewithextension($this->data['Employee']['picture'], $filename)))){	
						$newfilename = $emp . ".jpg";
						if($this->Employee->updateAll(array("Employee.picture" => "'".$newfilename."'"), array("Employee.id" => $id))){
							$this->Session->setFlash(__('Sucessfully Uploaded.'), 'success_message');
							return $this->redirect(array('action' => 'edit', $id));
						}
					} else {
						$this->Session->setFlash(__('Could not be saved. Please, try again.'));
					}
				}else{
					$this->Session->setFlash(__('Invalid File. Please, try again.'));
				}			
			}
			
		} else {
			$options = array('conditions' => array('Employee.' . $this->Employee->primaryKey => $id));
			$this->request->data = $this->Employee->find('first', $options);
		}
		$employ = $this->Employee->find('first', array('conditions' => array('Employee.id' => $id)));
		$workschedules = $this->Employee->Workschedule->find('list', array('fields' => 'description'));
		$divisions = $this->Employee->Division->find('list');
		$departments = $this->Employee->Department->find('list');
		$costcenters = $this->Employee->Costcenter->find('list');
		$jobtitles = $this->Employee->Jobtitle->find('list');
		$employmentstatuses = $this->Employee->Employmentstatus->find('list');
		$employeetypes = $this->Employee->Employeetype->find('list');
		$banks = $this->Employee->Bank->find('list', array('order' => array('Bank.name' => 'ASC')));
		$withholdingtaxes = $this->Taxdescription->find('all');
		$medproviders = $this->Medprovider->find('list');
		$providers = $this->Medprovider->find('all');
		$ratetypes = $this->Employee->Ratetype->find('list');
		$payfrequencies = $this->Employee->Payfrequency->find('list');
		$plantypes = $this->Employee->Plantype->find('list');
		$branches = $this->Branch->find('list');
		$promotions = $this->Employee->Promotion->find('all', array('conditions' => array('Promotion.employee_id' => $id)));
		$earnings = $this->Otherearningsentry->find('all', array('conditions' => array('Otherearningsentry.employee_id' => $id)));
		$this->set(compact('workschedules', 'divisions', 'departments', 'costcenters', 'jobtitles', 'employmentstatuses', 'employeetypes', 'banks', 'ratetypes', 'payfrequencies','medproviders','plantypes','branches'));
		$this->set('promotions', $promotions);
		$this->set('id', $id);
		$this->set('employ', $employ);
		$this->set('earnings', $earnings);
		$this->set('withholdingtaxes', $withholdingtaxes);
		$this->set('providers', $providers);
		$this->set('action', $action);
	}
	
	public function upload($id = null, $emp = null) {
		if (!$this->Employee->exists($id)) {
			throw new NotFoundException(__('Invalid employee'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if($this->Uploadfile->checkfileExtensionforfileforpicture($this->data['Employee']['logo'])){
					$filename = $emp;				
					if (($this->Uploadfile->uploadforDownloadfile($this->data['Employee']['logo'], APP.'webroot/img/', $this->renamefilewithextension($this->data['Employee']['logo'], $filename)))){	
						$newfilename = $emp . ".jpg";
						if($this->Employee->updateAll(array("Employee.logo" => "'".$newfilename."'"), array("Employee.id" => $id))){
							$this->Session->setFlash(__('Sucessfully Uploaded.'), 'success_message');
							return $this->redirect(array('action' => 'view', $id));
						}
					} else {
						$this->Session->setFlash(__('Could not be saved. Please, try again.'));
					}
				}else{
					$this->Session->setFlash(__('Invalid File. Please, try again.'));
				}
			
		}else {
			$options = array('conditions' => array('Employee.' . $this->Employee->primaryKey => $id));
			$this->request->data = $this->Employee->find('first', $options);
		}
		
	}
	
	public function renamefilewithextension($filename, $newfilename){
			$filename = $filename['name'];
			$extension = end(explode(".", $filename));
			$newfilename = $newfilename.".jpg";
			return $newfilename;
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Employee->id = $id;
		if (!$this->Employee->exists()) {
			throw new NotFoundException(__('Invalid employee'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Employee->delete()) {
			$this->Session->setFlash(__('The employee has been deleted.'));
		} else {
			$this->Session->setFlash(__('The employee could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function listemployees($keyword = null){
		$keywords = explode(" ", $keyword);
		
		$i = 0;
		foreach ($keywords as $keyword):
			$i++;
		endforeach;
		
		
		if($i==1){
			$conditions = array(
				'conditions' => array(
					'OR' => array(
							'Employee.firstname LIKE' => "%$keywords[0]%",
							'Employee.lastname LIKE' => "%$keywords[0]%",
							'Employee.fullname LIKE' => "%$keywords[0]%",
							)
						),
				'order' => array(
					'Employee.lastname' => 'ASC',
					'Employee.firstname' => 'ASC',
				)				
			);
		}else if($i==2){
			$conditions = array(
				'conditions' => array(
					'OR' => array(
						'Employee.firstname LIKE' => "%$keywords[0]%",
						'Employee.lastname LIKE' => "%$keywords[0]%",
						'Employee.fullname LIKE' => "%$keywords[0]%"),
				'AND' => array(
					'OR' => array(
						'Employee.firstname LIKE' => "%$keywords[1]%",
						'Employee.lastname LIKE' => "%$keywords[1]%",
						'Employee.fullname LIKE' => "%$keywords[1]%",
						)
					)
				),
				'order' => array(
					'Employee.lastname' => 'ASC',
					'Employee.firstname' => 'ASC',
				)			
			);
		}else if($i==3){
			$conditions = array(
				'conditions' => array(
					'OR' => array(
						'Employee.firstname LIKE' => "%$keywords[0]%",
						'Employee.lastname LIKE' => "%$keywords[0]%",
						'Employee.fullname LIKE' => "%$keywords[0]%"),
					'AND' => array(
						'OR' => array(
								'Employee.firstname LIKE' => "%$keywords[1]%",
								'Employee.lastname LIKE' => "%$keywords[1]%",
								'Employee.fullname LIKE' => "%$keywords[1]%",
								)
							),
					'AND' => array(
						'OR' => array(
								'Employee.firstname LIKE' => "%$keywords[2]%",
								'Employee.lastname LIKE' => "%$keywords[2]%",
								'Employee.fullname LIKE' => "%$keywords[2]%",
								)
							)
				),
				'order' => array(
					'Employee.lastname' => 'ASC',
					'Employee.firstname' => 'ASC',
				)
			);
		}
		
		
		$this->set('employees', $this->Employee->find('all', $conditions));
	}
	
	public function search(){
		//isset($this->data['Employee']['keyword']);
		if($this->request->is('post')){
			
			
		}
		$keyword = $this->data['Employee']['keyword'];
		return $this->redirect(array('action' => 'listemployees', $keyword));
	}
	
	public function getemployee($id = null){
		$employee = $this->Employee->find('first', array('conditions' => array('AND' => array('Employee.id' => $id))));
		if(isset($this->params['requested'])){
			return $employee;
		}
	}
	
	public function listdept($id = null){
		$this->loadModel('Department');
		if(empty($id)){
			$departments = $this->Department->find('all');
		}else{
			$dept = $this->Department->find('first', array('conditions' => array('AND' => array('Department.id' => $id))));
			$departments = $this->Employee->find('all', array('conditions' => array('AND' => array('Employee.department_id' => $id))));
			$this->set('dept', $dept);
		}
		$this->set('id', $id);
		$this->set('departments', $departments);
		
	}
	
	public function printemployees($action = null, $department = null){
		$this->loadModel('Companyprofile');
		$profile = $this->Companyprofile->find('first');
		if($action == 1){
			$employees = $this->Employee->find('all', array('conditions' => array('and' => array('Employee.employmentstatus_id < ' => 4)), 'order' => array('Employee.lastname' => 'ASC', 'Employee.firstname' => 'ASC', 'Employee.middlename' => 'ASC')));
		}else{
			$employees = $this->Employee->find('all', array('conditions' => array('and' => array('Employee.employmentstatus_id < ' => 4, 'Employee.department_id' => $department)), 'order' => array('Employee.lastname' => 'ASC', 'Employee.firstname' => 'ASC', 'Employee.middlename' => 'ASC')));
		}
		//$employees = $this->Employee->find('all', array('conditions' => array('and' => array('Employee.employmentstatus_id < ' => 4, 'Employee.department_id' => $department)), 'order' => array('Employee.lastname' => 'ASC', 'Employee.firstname' => 'ASC', 'Employee.middlename' => 'ASC')));
		$this->set('employees', $employees);
		$this->set('profile', $profile);
		
	}
	
	public function getemployeenum($id = null){
		$emp = $this->Employee->find('first', array('conditions' => array('AND' => array('Employee.faceID LIKE' => $id))));
		if(isset($this->params['requested'])){
			return $emp;
		}
	}
	
	public function employeedetails($id = null) {
		$this->loadModel('Promotions');
		
		if (!$this->Employee->exists($id)) {
			throw new NotFoundException(__('Invalid employee'));
		}
		
		$promotions = $this->Employee->Promotion->find('all', array('conditions' => array('Promotion.employee_id' => $id)));
		$employ = $this->Employee->find('first', array('conditions' => array('Employee.id' => $id)));
		$this->set('employ', $employ);
		$this->set('promotions', $promotions);
	}
	
	
	public function db_mysql_dump($tables = '*') {

      $return = '';
      $modelName = $this->modelClass;

      $dataSource = $this->{$modelName}->getDataSource();
      $databaseName = $dataSource->getSchemaName();


     //  // Do a short header
      $return .= '-- Database: `' . $databaseName . '`' . "\n";
      $return .= '-- Generation time: ' . date('D jS M Y H:i:s') . "\n\n\n";


      if ($tables == '*') {
          $tables = array();
          $result = $this->{$modelName}->query('SHOW TABLES');
          foreach($result as $resultKey => $resultValue){
              $tables[] = current($resultValue['TABLE_NAMES']);
          }
      } else {
          $tables = is_array($tables) ? $tables : explode(',', $tables);
      }

      // Run through all the tables
      foreach ($tables as $table) {
          $tableData = $this->{$modelName}->query('SELECT * FROM ' . $table);

          $return .= 'DROP TABLE IF EXISTS ' . $table . ';';
          $createTableResult = $this->{$modelName}->query('SHOW CREATE TABLE ' . $table);
          $createTableEntry = current(current($createTableResult));
          $return .= "\n\n" . $createTableEntry['Create Table'] . ";\n\n";

          // Output the table data
          foreach($tableData as $tableDataIndex => $tableDataDetails) {

              $return .= 'INSERT INTO ' . $table . ' VALUES(';

              foreach($tableDataDetails[$table] as $dataKey => $dataValue) {

                  if(is_null($dataValue)){
                      $escapedDataValue = 'NULL';
                  }
                  else {
                      // Convert the encoding
                      $escapedDataValue = mb_convert_encoding( $dataValue, "UTF-8", "ISO-8859-1" );

                      // Escape any apostrophes using the datasource of the model.
                      $escapedDataValue = $this->{$modelName}->getDataSource()->value($escapedDataValue);
                  }

                  $tableDataDetails[$table][$dataKey] = $escapedDataValue;
              }
              $return .= implode(',', $tableDataDetails[$table]);

              $return .= ");\n";
          }

          $return .= "\n\n\n";
      }

      // Set the default file name
      $fileName = $databaseName . '-backup-' . date('Y-m-d_H-i-s') . '.sql';

      // Serve the file as a download      
      $this->response->body($return);
      $this->response->type('Content-Type: text/x-sql');
      $this->response->download($fileName);

      return $this->response;
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
			/*
				$employee_id = $this->data['Employee']['employee_id'];
				$workschedule_id = $this->data['Timelog']['workschedule'];
				$temp_empoyeeid = $this->data['Timelog']['temp_empoyeeid'];
				$temp_day = $this->data['Timelog']['temp_day'];
				$temp_timein = $this->data['Timelog']['temp_timein'];
				$temp_timeout = $this->data['Timelog']['temp_timeout'];
				$temp_late = $this->data['Timelog']['temp_late'];
				$temp_otin = $this->data['Timelog']['temp_otin'];
				$temp_otout = $this->data['Timelog']['temp_otout'];
			*/	
				if(empty($this->data['Employee']['temp_lastname'])){
				
				}else{
					$count = 0;
					foreach($this->data['Employee']['temp_lastname'] as $index => $key):
						$count++;
						$data1[] = array(
							'Employee' => array(
								'id' => $this->data['Employee']['id'][$index],
								'employeeno' => $this->data['Employee']['employeeno'][$index],
								'lastname' => $this->data['Employee']['temp_lastname'][$index],
								'firstname' => $this->data['Employee']['temp_firstname'][$index],
								'middlename' => $this->data['Employee']['temp_middlename'][$index],
								'birthdate' => $this->data['Employee']['temp_dob'][$index],
								'datehired' => $this->data['Employee']['temp_datehired'][$index],
								'pagibignumber' => $this->data['Employee']['temp_pagibig'][$index],
								'TIN' => $this->data['Employee']['temp_tin'][$index],
								'philhealthnumber' => $this->data['Employee']['temp_phic'][$index],
								'sssnumber' => $this->data['Employee']['temp_sss'][$index],
								'payrollaccountnumber' => $this->data['Employee']['payrollaccountnumber'][$index],
								'dateregularized' => $this->data['Employee']['dateregularized'][$index],
								'sex' => $this->data['Employee']['sex'][$index],
								'civilstatus' => $this->data['Employee']['civilstatus'][$index],
								'height' => $this->data['Employee']['height'][$index],
								'religion' => $this->data['Employee']['religion'][$index],
								'weight' => $this->data['Employee']['weight'][$index],
								'mothername' => $this->data['Employee']['mothername'][$index],
								'motheraddress' => $this->data['Employee']['motheraddress'][$index],
								'mothercontactnumber' => $this->data['Employee']['mothercontactnumber'][$index],
								'motheroccupation' => $this->data['Employee']['motheroccupation'][$index],
								'fathername' => $this->data['Employee']['fathername'][$index],
								'fatheraddress' => $this->data['Employee']['fatheraddress'][$index],
								'fathercontactnumber' => $this->data['Employee']['fathercontactnumber'][$index],
								'fatheroccupation' => $this->data['Employee']['fatheroccupation'][$index],
								'mobilenumber' => $this->data['Employee']['mobilenumber'][$index],
								'email' => $this->data['Employee']['email'][$index],
								'permanentaddress' => $this->data['Employee']['permanentaddress'][$index],
								'presetaddress' => $this->data['Employee']['presetaddress'][$index],
								'econtactname' => $this->data['Employee']['econtactname'][$index],
								'econtactnumber' => $this->data['Employee']['econtactnumber'][$index],
								'ehomeaddress' => $this->data['Employee']['ehomeaddress'][$index],
								'erelationship' => $this->data['Employee']['erelationship'][$index],
								'primaryschool' => $this->data['Employee']['primaryschool'][$index],
								'primarygrad' => $this->data['Employee']['primarygrad'][$index],
								'primarycourse' => $this->data['Employee']['primarycourse'][$index],
								'secondaryschool' => $this->data['Employee']['secondaryschool'][$index],
								'secondarygrad' => $this->data['Employee']['secondarygrad'][$index],
								'secondarycourse' => $this->data['Employee']['secondarycourse'][$index],
								'tertiaryschool' => $this->data['Employee']['tertiaryschool'][$index],
								'tertiarygrad' => $this->data['Employee']['tertiarygrad'][$index],
								'tertiarycourse' => $this->data['Employee']['tertiarycourse'][$index],
								'graduateschool' => $this->data['Employee']['graduateschool'][$index],
								'graduategrad' => $this->data['Employee']['graduategrad'][$index],
								'graduatecourse' => $this->data['Employee']['graduatecourse'][$index],
								'postgradschool' => $this->data['Employee']['postgradschool'][$index],
								'postgradgrad' => $this->data['Employee']['postgradgrad'][$index],
								'postgradcourse' => $this->data['Employee']['postgradcourse'][$index],
								'monthlyrate' => $this->data['Employee']['monthly'][$index],
								'dailyrate' => $this->data['Employee']['daily'][$index],
								'hourlyrate' => $this->data['Employee']['hour'][$index],
								'faceID' => $this->data['Employee']['bio'][$index],
								'division_id' => $this->data['Employee']['division_id'],
								'department_id' => $this->data['Employee']['department_id'],
								'branch_id' => $this->data['Employee']['branch_id'][$index],
								'ratetype_id' => 2,
								'employmentstatus_id' => 3
							)
						);
						
						$data2[] = array(
							'User' => array(
								'username' => $this->data['Employee']['employeeno'][$index],
								'password' => $this->data['Employee']['employeeno'][$index],
								'firstname' => $this->data['Employee']['temp_firstname'][$index],
								'lastname' => $this->data['Employee']['temp_lastname'][$index],
								'userstatus_id' => 1,
								'usertype_id' => 4,
								'employeeno'=> $this->data['Employee']['employeeno'][$index],
							)
						);
						
					endforeach;
					
					$this->loadModel('User');
					$this->Employee->create();	
					$this->User->create();	
					if($this->Employee->saveAll($data1) && $this->User->saveAll($data2)){								
						$this->Session->setFlash($this->Message->getMessage("DATA WAS SUCCESFULLY SAVED!"), 'success_message');
						$this->redirect(array('controller' => 'employees', 'action' => 'index'));//, $logid, $this->data['Applicant']['dateadded']));
					}else{
						$this->Session->setFlash(__('DATA WAS SUCCESFULLY SAVED!.' . mysql_error()));
						 $this->redirect(array('controller' => 'employees', 'action' => 'index'));
						 
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
		
		$this->loadModel('Branch');
		$divisions = $this->Employee->Division->find('list');
		$departments = $this->Employee->Department->find('list');
		$branches = $this->Branch->find('list');
		
		$this->set(compact('divisions', 'departments', 'branches'));
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
	
	public function getid($value = null, $action = null){
		if($action == 1){
			$getid = $this->Employee->find('first', array('conditions' => array('Employee.employeeno LIKE' => $value)));
		}else if ($action ==2){
			$getid = $this->Employee->find('first', array('conditions' => array('Employee.philhealthnumber LIKE' => $value)));
		}else if ($action ==3){
			$getid = $this->Employee->find('first', array('conditions' => array('Employee.TIN LIKE' => $value)));
		}else{
			$getid = '';
		}
		
		if(isset($this->params['requested'])){
			return $getid;
		}
		
	}
	
	public function checkdelete($id = null){
		$yes = $this->Employee->find('first', array(
			'conditions' => array(
				'Employee.employeetype_id' => $id
			)));
		if(isset($this->params['requested'])){
			return $yes;
		}
	}
	
	public function contributions($id=null, $year = null){
		$employ = $this->Employee->find('first', array('conditions' => array('Employee.id' => $id)));
		$this->set('employ', $employ);
		
		if(empty($year)){
			$year = date('Y');
		}
		$contris = $this->Employee->Income->find('all', array('conditions' => array('AND' => array('YEAR(Income.month)' => $year, 'Employee.id' => $id)), 'order' => array('Income.month' => 'ASC')));
		$this->set('contris', $contris);
		$this->set('year', $year);
	}
	
	public function printcontri($action = null, $id = null, $year = null){
		$employ = $this->Employee->find('first', array('conditions' => array('Employee.id' => $id)));
		$this->set('employ', $employ);
		
		if(empty($year)){
			$year = date('Y');
		}
		$contris = $this->Employee->Income->find('all', array('conditions' => array('AND' => array('YEAR(Income.month)' => $year, 'Employee.id' => $id)), 'order' => array('Income.month' => 'ASC')));
		$this->set('contris', $contris);
		$this->set('year', $year);
		$this->set('action', $action);
	}
	
	public function sssepf(){
		$this->layout = ('text');
		$employees = $this->Employee->find('all', array('conditions' => array('Employee.employmentstatus_id < ' => 4)));
		$this->set('employees', $employees);
		$this->loadModel('Companyprofile');
		$profile = $this->Companyprofile->find('first');
		$this->set('profile', $profile);
	}
	
	public function coe($id = null, $action = null){
		if($action == 1){
			$employee = $this->Employee->find('first', array('conditions' => array('Employee.id' => $id)));
			$this->set('employee', $employee);
		
			$promotions = $this->Employee->Promotion->find('all', array('conditions' => array('Promotion.employee_id' => $id)));
			$this->set('promotions', $promotions);			
		}else{
			$employee = $this->Employee->find('first', array('conditions' => array('Employee.id' => $id)));
			$this->set('employee', $employee);
			
			$promotions = $this->Employee->Promotion->find('all', array('conditions' => array('Promotion.employee_id' => $id), 'order' => array('Promotion.id' => 'ASC')));
			$this->set('promotions', $promotions);	
			
			$promotion2 = $this->Employee->Promotion->find('first', array('conditions' => array('Promotion.employee_id' => $id), 'order' => array('Promotion.id' => 'DESC')));
			$this->set('promotion2', $promotion2);	
		}
		
		$this->set('action', $action);
		
	}
	
	public function index_period($payrollperiod = null) {
		$this->loadModel('Employee');
		$employees = $this->Employee->find('all', array(
				'joins' => array(
					 array(
                        'table' => 'periodincludes',
                        'alias' => 'period',
                        'type' => 'left',
                        'foreignKey' => false,
                        'conditions'=> array('Employee.id = period.employee_id')
                    ),
					array(
                        'table' => 'incomes',
                        'alias' => 'I',
                        'type' => 'left',
                        'foreignKey' => false,
                        'conditions'=> array('I.employee_id = Employee.id')
                    ),
					array(
                        'table' => 'branches',
                        'alias' => 'B',
                        'type' => 'left',
                        'foreignKey' => false,
                        'conditions'=> array('B.id = Employee.branch_id')
                    ),
					array(
                        'table' => 'departments',
                        'alias' => 'dept',
                        'type' => 'left',
                        'foreignKey' => false,
                        'conditions'=> array('dept.id = Employee.department_id')
                    ),
					array(
                        'table' => 'employeetypes',
                        'alias' => 'etype',
                        'type' => 'left',
                        'foreignKey' => false,
                        'conditions'=> array('etype.id = Employee.employeetype_id')
                    ),
				),
				'order' => array(
					'Employee.lastname' => 'ASC',
					'Employee.firstname' => 'ASC',
				),
				'limit' => 5,
				'fields' => array(
					'DISTINCT (Employee.id)',
					'Employee.firstname',
					'Employee.lastname',
					'Employee.middlename',
					'Employee.dailyrate',
					'Employee.employeeno',
					'B.name AS bname',
					'dept.name AS deptname'
				)
			));
			
			$this->set('employees', $employees);
		
		$this->Employee->recursive = -1;
	}

	public function dashboard(){
		
	}
}
