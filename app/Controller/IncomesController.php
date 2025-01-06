<?php
App::uses('AppController', 'Controller');
App::import('Vendor', 'phpexcel/Classes/PHPExcel.php');
App::import('Vendor', 'phpexcel/index');

App::import('Vendor', 'dompdf/autoload.inc');
use Dompdf\Dompdf;

/**
 * Incomes Controller
 *
 * @property Income $Income
 * @property PaginatorComponent $Paginator
 */
class IncomesController extends AppController {

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
	public function index($payrollperiod = null) {
		$this->loadModel('Division');
		$this->loadModel('Department');
		$this->loadModel('User');
		
		$p = $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id'))));
		$period = $p['User']['payrollperiod'];
		
		if($period == 0){
			$this->redirect(array('controller' => 'employees', 'action' => 'index', '0', '0', 1));
		}else{
			//$this->set('payrollperiod', $p);
		}
		
		$departments = $this->Department->find('all');
		$this->set('departments', $departments);
		$divisions = $this->Division->find('all');
		$this->set('divisions', $divisions);
		$this->set('payrollperiod', $period);
		
		
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($employeeid = null, $payrollperiod = null) {
		$this->loadModel('Otherductionentry');
		$this->loadModel('Otherearningsentry');
		$this->loadModel('Employee');		
		$this->loadModel('Overtime');
		$this->loadModel('Earningrecord');
		$this->loadModel('Loanpayment');
		
		$p = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
		if($p['Payrollperiod']['payrolltype_id'] == 2){
			return $this->redirect(array('action' => 'viewspecial', $employeeid, $payrollperiod));
		}else{		
			$ots = $this->Overtime->find('all', array('conditions' => array('AND' => array('Overtime.payrollperiod_id' => $payrollperiod, 'Overtime.employee_id' => $employeeid)), 'order' => array('Overtime.referencedate' => 'ASC')));		
			$income = $this->Income->find('first', array('conditions' => array('AND' => array('Income.payrollperiod_id' => $payrollperiod, 'Income.employee_id' => $employeeid))));
			$employee = $this->Employee->find('first', array('conditions' => array('Employee.id' => $employeeid)));
			$payroll = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
			$deductions = $this->Otherductionentry->find('all', array('conditions' => array('AND' => array('Otherductionentry.payrollperiod_id' => $payrollperiod, 'Otherductionentry.employee_id' => $employeeid))));
			$earnings = $this->Earningrecord->find('all', array('conditions' => array('AND' => array('Earningrecord.payrollperiod_id' => $payrollperiod, 'Earningrecord.employee_id' => $employeeid))));
			$loans = $this->Loanpayment->find('all', array('conditions' => array('AND' => array('Loanpayment.payrollperiod_id' => $payrollperiod, 'Loanpayment.employee_id' => $employeeid))));
			
			
			$this->set('payroll', $payroll);
			$this->set('income', $income);
			$this->set('employee', $employee);
			$this->set('ots', $ots);
			$this->set('deductions', $deductions);
			$this->set('earnings', $earnings);
			$this->set('loans', $loans);
		}
	}

/**
 * add method
 *
 * @return void
 */
	public function add($payrollperiod = null, $employeeid = null) {
		$payroll = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
		$this->loadModel('Employee');
		$this->loadModel('Overtimerate');
		$this->loadModel('Loanpayment');
		$this->loadModel('Earningrecord');
		$this->loadModel('Otherearningsentry');
		$this->loadModel('Loanentry');
		$this->loadModel('Otstatus');
		
		$search = $this->Income->find('first', array('conditions' => array('AND' => array('Income.payrollperiod_id' => $payrollperiod, 'Income.employee_id' => $employeeid))));
		$ottype = $this->Income->find('first', array('conditions' => array('AND' => array('Income.payrollperiod_id' => $payrollperiod, 'Income.employee_id' => $employeeid))));
		if(!empty($search)){
			return $this->redirect(array('action' => 'view', $employeeid, $payrollperiod));
		}else{
			if ($this->request->is('post')) {
				$this->Income->create();
				if ($this->Income->save($this->request->data)) {
					
			$otherearnings = $this->Otherearningsentry->find('all', array('conditions' => array('AND' => array('Otherearningsentry.employee_id' => $employeeid, 'Otherearningsentry.status' => 1))));
			
			if(!empty($otherearnings)){
				foreach ($otherearnings as $earn):
					if($earn['Otherearningsentry']['payprequency'] == 0){
						if($this->data['Income']['ratetype']== 1){
							$absent = $this->data['Income']['absent'];
							$dayswork = 0;
						}else if($this->data['Income']['ratetype'] == 2){
							$absent = 0;
							$dayswork = $this->data['Income']['dayswork'];
						}
						
						if($this->data['Income']['ratetype'] == 1){
							$value = (12 - $absent) * $earn['Otherearningsentry']['amount'];
						}else if($this->data['Income']['ratetype'] == 2){
							$value = $dayswork * $earn['Otherearningsentry']['amount'] ;
						}
						
						$earning = array(
						'Earningrecord' => array(
							'payrollperiod_id' => $payrollperiod,
							'employee_id' => $employeeid,
							'otherearningsentry_id' => $earn['Otherearningsentry']['otherearning_id'],
							'ratetype' => $this->data['Income']['ratetype'],
							'daysabsent' => $absent,
							'daysworked' => $dayswork,
							'totalamount' => $value,
							'amount' =>$earn['Otherearningsentry']['amount'],
							)
						);
								
						$this->Earningrecord->create();	
						if($this->Earningrecord->save($earning)){
							
						}
					}if($earn['Otherearningsentry']['payprequency'] == 1 && $payroll['Payrollperiod']['classification_id'] == 1){
						if($this->data['Income']['ratetype'] == 1){
							$absent = $this->data['Income']['absent'];
							$dayswork = 0;
						}else if($this->data['Income']['ratetype'] == 2){
							$absent = 0;
							$dayswork = $this->data['Income']['dayswork'];
						}
						
						$value = $earn['Otherearningsentry']['amount'];
						
						$earning = array(
							'Earningrecord' => array(
								'payrollperiod_id' => $payrollperiod,
								'employee_id' => $employeeid,
								'otherearningsentry_id' => $earn['Otherearningsentry']['otherearning_id'],
								'ratetype' => $this->data['Income']['ratetype'],
								'daysabsent' => $absent,
								'daysworked' => $dayswork,
								'totalamount' => $value,
								'amount' =>$earn['Otherearningsentry']['amount'],
								)
							);
								
						$this->Earningrecord->create();	
						if($this->Earningrecord->save($earning)){
							
						}
					}if($earn['Otherearningsentry']['payprequency'] == 2 && $payroll['Payrollperiod']['classification_id'] == 2){
						if($this->data['Income']['ratetype'] == 1){
							$absent = $this->data['Income']['absent'];
							$dayswork = 0;
						}else if($this->data['Income']['ratetype'] == 2){
							$absent = 0;
							$dayswork = $this->data['Income']['dayswork'];
						}
						$value = $earn['Otherearningsentry']['amount'];
						
						$earning = array(
						'Earningrecord' => array(
							'payrollperiod_id' => $payrollperiod,
							'employee_id' => $employeeid,
							'otherearningsentry_id' => $earn['Otherearningsentry']['otherearning_id'],
							'ratetype' => $this->data['Income']['ratetype'],
							'daysabsent' => $absent,
							'daysworked' => $dayswork,
							'totalamount' => $value,
							'amount' =>$earn['Otherearningsentry']['amount'],
							)
						);
								
						$this->Earningrecord->create();	
						if($this->Earningrecord->save($earning)){
							
						}
					}if($earn['Otherearningsentry']['payprequency'] == 3){
						if($this->data['Income']['ratetype'] == 1){
							$absent = $this->data['Income']['absent'];
							$dayswork = 0;
						}else if($this->data['Income']['ratetype'] == 2){
							$absent = 0;
							$dayswork = $this->data['Income']['dayswork'];
						}
						$value = $earn['Otherearningsentry']['amount'];
						
						$earning = array(
						'Earningrecord' => array(
							'payrollperiod_id' => $payrollperiod,
							'employee_id' => $employeeid,
							'otherearningsentry_id' => $earn['Otherearningsentry']['otherearning_id'],
							'ratetype' => $this->data['Income']['ratetype'],
							'daysabsent' => $absent,
							'daysworked' => $dayswork,
							'totalamount' => $value,
							'amount' =>$earn['Otherearningsentry']['amount'],
							)
						);
								
						$this->Earningrecord->create();	
						if($this->Earningrecord->save($earning)){
							
						}
					}
				endforeach;
			}
			
			//LOANS
			$loans = $this->Loanentry->find('all', array('conditions' => array('AND' => array('Loanentry.employee_id' => $employeeid, 'Loanentry.status' => 1))));
			
			if(!empty($loans)){
				foreach ($loans as $loan):
					if($payroll['Payrollperiod']['until'] >=  $loan['Loanentry']['startdeduction']){
						$loantype = $loan['Loantype']['id'];			
						if($loan['Loanentry']['deductiontype'] == 0){
							if($payroll['Payrollperiod']['classification_id'] == 1){
								$amount = $loan['Loanentry']['deductionperpayday'];
							}else{
								$amount = 0;
							}
							
														
						}else if($loan['Loanentry']['deductiontype'] == 1){
							if($payroll['Payrollperiod']['classification_id'] == 2){
								$amount = $loan['Loanentry']['deductionperpayday'];
							}else{
								$amount = 0;
							}
							
							
						}else if($loan['Loanentry']['deductiontype'] == 2){
							$amount = $loan['Loanentry']['deductionperpayday'];
							
						}
						
						
						if($amount > $loan['Loanentry']['balance']){
							$amount = $loan['Loanentry']['balance'];
						}
						
						$loans = array(
							'Loanpayment' => array(
								'payrollperiod_id' => $payrollperiod,
								'employee_id' => $this->data['Income']['employee_id'],
								'loantype_id' => $loantype,
								'amount' => $amount,
								'loanentry_id' => $loan['Loanentry']['id']
							)
						);
						
						$this->Loanpayment->create();	
						if($this->Loanpayment->save($loans)){
							$newbalance = $loan['Loanentry']['balance'] - $amount;
						
							$status = 1;
							if ($newbalance == 0){
								$status = 0;
							}
							
							$loane = array(
								'Loanentry' => array(
									'id' => $loan['Loanentry']['id'],
									'balance' => $newbalance,
									'status' => $status
								)
							
							);
							
							$this->Loanentry->create();	
							if($this->Loanentry->save($loane)){}
							
						}
						
						
					}
					
					
				endforeach;
			}	
					
					$this->Session->setFlash(__('The income has been saved.'));
					return $this->redirect(array('action' => 'view', $this->data['Income']['employee_id'], $this->data['Income']['payrollperiod_id']));
				} else {
					$this->Session->setFlash(__('The income could not be saved. Please, try again.'));
				}
			}
			$employee = $this->Employee->find('first', array('conditions' => array('Employee.id' => $employeeid)));
			$payrollperiods = $this->Income->Payrollperiod->find('list');
			$ratetypes = $this->Income->Ratetype->find('list');
			$users = $this->Income->User->find('list');
			$otstatuses = $this->Otstatus->find('all');
			$otrate = $this->Overtimerate->find('all');
			$payroll = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
			$this->set('payroll', $payroll);
			$this->set(compact('payrollperiods', 'ratetypes', 'users'));
			$this->set('employee', $employee);
			$this->set('otstatuses', $otstatuses);
			$this->set('otrate', $otrate);
			$this->set('payrollperiods', $payrollperiods);
			$this->set('incomeTax', $this->computeTax($employee['Employee']['monthlyrate']));
		}
	}
	
	private function getSSScontri($monthlyIncome){
	    $this->loadModel('Ssscontrib');
	    $ssscontri = $this->Ssscontrib->find(
			'first', array('conditions' => array('AND' => array('Ssscontrib.rangestart <=' => $monthlyIncome, 'Ssscontrib.rangeend >=' => $monthlyIncome))));
		if(!empty($ssscontri)){
		    $contrif = $ssscontri['Ssscontrib']['eess'] + $ssscontri['Ssscontrib']['mandatoryee'];
			return $contrif;
		}
	}

	private function computeTax($monthlyIncome) {
		// Calculate taxable income (subtract total contributions from monthly income)
		$sss = $this->getSSScontri($monthlyIncome);
		$philHealth = ($monthlyIncome * (0.05)) / 2;
		$pagIbig = 200;// $employee['Employee']['monthlyrate'] * 0.02;
		$totalContributions = $sss + $philHealth + $pagIbig;
		$taxableIncome = $monthlyIncome - $totalContributions;
	
		// Define the tax brackets (based on annual income)
		$annualTaxableIncome = $taxableIncome * 12; // Convert to annual income
		$brackets = [
			['from' => 0, 'to' => 250000, 'fixTax' => 0, 'rateOnExcess' => 0],
			['from' => 250000, 'to' => 400000, 'div' => '20833.33', 'fixTax' => 0, 'rateOnExcess' => 0.15],
			['from' => 400000, 'to' => 800000, 'div' => '33333.33', 'fixTax' => 22500, 'rateOnExcess' => 0.20],
			['from' => 800000, 'to' => 2000000, 'div' => '66666.67', 'fixTax' => 102500, 'rateOnExcess' => 0.25],
			['from' => 2000000, 'to' => 8000000, 'div' => '166666.67', 'fixTax' => 402500, 'rateOnExcess' => 0.30],
			['from' => 8000000, 'to' => PHP_INT_MAX, 'div' => '666666.67', 'fixTax' => 2202500, 'rateOnExcess' => 0.35],
		];
	
		// Compute tax based on the applicable bracket
		$tax = 0;
		foreach ($brackets as $bracket) {
			if ($annualTaxableIncome > $bracket['from']) {
				$excessIncome = min($annualTaxableIncome, $bracket['to']) - $bracket['from'];
				//$tax = $bracket['fixTax'] + ($excessIncome * $bracket['rateOnExcess']); 
				$tax = ($taxableIncome - $bracket['div']) * $bracket['rateOnExcess'];
				
			} else {
				break;
			}
		}
	
		// Convert annual tax to monthly tax
		//return round($tax / 12, 2);
		return $tax;
	}
	

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null, $payrollperiod = null) {
		$this->loadModel('Employee');
		if (!$this->Income->exists($id)) {
			throw new NotFoundException(__('Invalid income'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Income->save($this->request->data)) {
				$this->Session->setFlash(__('The income has been saved.'));
				return $this->redirect(array('action' => 'view', $this->data['Income']['employee_id'], $this->data['Income']['payrollperiod_id']));
			} else {
				$this->Session->setFlash(__('The income could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Income.' . $this->Income->primaryKey => $id));
			$this->request->data = $this->Income->find('first', $options);
		}

		$income = $this->Income->find('first', array('conditions' => array('Income.id' => $id)));
		$payroll = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $income['Income']['payrollperiod_id'])));
		$ratetypes = $this->Income->Ratetype->find('list');
		$users = $this->Income->User->find('list');
		
		$employee = $this->Employee->find('first', array('conditions' => array('Employee.id' => $income['Income']['employee_id'])));
		$this->set('employee', $employee);
		$this->set('payroll', $payroll);
		$this->set('payrollperiod', $payrollperiod);
		$this->set(compact('income', 'ratetypes', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $employee = null, $payrollperiod_id = null) {
		$this->Income->id = $id;
		if (!$this->Income->exists()) {
			throw new NotFoundException(__('Invalid income'));
		}
		//this->request->allowMethod('post', 'delete');
		if ($this->Income->delete()) {
			$this->Session->setFlash(__('The income has been deleted.'));
			
			$this->loadModel('Earningrecord');
			$this->Earningrecord->deleteAll(array(
				'Earningrecord.employee_id'=> $employee,
				'Earningrecord.payrollperiod_id' =>$payrollperiod_id
			));
			
			$this->loadModel('Otherductionentry');
			$this->Otherductionentry->deleteAll(array(
				'Otherductionentry.employee_id'=> $employee,
				'Otherductionentry.payrollperiod_id' =>$payrollperiod_id
			));
			
			$this->loadModel('Loanpayment');
			$this->loadModel('Loanentry');
			$loans = $this->Loanpayment->find('all', array(
				'conditions' => array(
					'Loanpayment.employee_id'=> $employee,
					'Loanpayment.payrollperiod_id' =>$payrollperiod_id
				)
			));
			
			if(!empty($loans)){
				foreach ($loans as $l):
					$s = $this->Loanentry->find('first', array(
						'conditions' => array(
							'Loanentry.id' => $l['Loanpayment']['loanentry_id']
						)
					));
					
					if(!empty($s)){
						$bal = $l['Loanpayment']['amount'] + $s['Loanentry']['balance'];
						$this->Loanentry->updateAll(array("Loanentry.balance" => "'".$bal."'"), array("Loanentry.id" => $l['Loanpayment']['loanentry_id']));		
					}
				endforeach;
			}
			
			$this->Loanpayment->deleteAll(array(
				'Loanpayment.employee_id'=> $employee,
				'Loanpayment.payrollperiod_id' =>$payrollperiod_id
			));
		} else {
			$this->Session->setFlash(__('The income could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('controller' => 'periodincludes', 'action' => 'index'));
	}
	
	public function selectpayrollperiod($employeeid = null){
		$payrollperiods = $this->Income->Payrollperiod->find('list', array('order' => array('Payrollperiod.id' => 'DESC'), 'fields' => 'period'));
		//$this->set('periods', $periods);
		$this->set('employeeid', $employeeid);
		if ($this->request->is('post')) {
			$payrollperiod = $this->data['Income']['payrollperiod_id'];
			
			$check = $this->Income->find('first', array(
				'conditions' => array(
					'AND' => array(
						'Income.payrollperiod_id' => $payrollperiod,
						'Income.employee_id' => $payrollperiod
					)
				)
			));
			if(!empty($check)){
				return $this->redirect(array('action' => 'add', $payrollperiod, $employeeid));
			}else{
				return $this->redirect(array('action' => 'view', $employeeid, $payrollperiod));
			}
			
		}
		$this->set(compact('payrollperiods'));
	}
	
	public function selectpayrollperiod2($action = null){
		$this->loadModel('Branch');
		$periods = $this->Income->Payrollperiod->find('list', array('order' => array('Payrollperiod.id' => 'DESC'), 'fields' => 'period'));
		$this->set('periods', $periods);
		if ($this->request->is('post')) {
			$branch = $this->data['Income']['branch_id'];
			$date = $this->data['Income']['year'] . '-' . $this->data['Income']['month'] . '-01';
			if($action < 8){
				return $this->redirect(array('action' => 'excelreport', $date, $action, $branch));
			}else if ($action == 8){
				return $this->redirect(array('action' => 'ssslcl', $date, $action));
			}else if ($action == 9){
				return $this->redirect(array('action' => 'pagibig', $date, $action));
			}
		}
		
		$branches = $this->Branch->find('list', array(
			'order' => array(
				'Branch.name' => 'ASC'
			)
		));
		$this->set(compact('branches'));
	}
	
	public function printreporttest($payrollperiod = null, $option = null, $branch = null, $bank = null){
		$payrollperiod = 85;
		$this->set('otherearnings', 
			$otherearnings = $this->Income->Earningrecord->find('all', 
				array(
					'joins' => array(						
						array(
							'alias' => 'Otherearning',  
							'table' => 'otherearnings',
							'type' => 'LEFT',
							'conditions' => array(
								'Otherearning.id = Earningrecord.otherearningsentry_id',
							),
						)
					),
					'conditions' => array(
						'Earningrecord.payrollperiod_id' => $payrollperiod
					),
					'fields' => array(
						'DISTINCT(Earningrecord.otherearningsentry_id)', 'Otherearning.name'
					),			
					'order' => array('Otherearning.name')
				)
			)
		);
		
		
		$this->set('otherdeductions', 
			$otherdeductions = $this->Income->Otherductionentry->find('all', 
				array(
					'joins' => array(						
						array(
							'alias' => 'Otherdeduction1',  
							'table' => 'otherdeductions',
							'type' => 'LEFT',
							'conditions' => array(
								'Otherdeduction1.id = Otherductionentry.otherdeduction_id',
							),
						)
					),
					'conditions' => array(
						'Otherductionentry.payrollperiod_id' => $payrollperiod
					),
					'fields' => array(
						'DISTINCT(Otherductionentry.otherdeduction_id)', 'Otherdeduction1.name'
					),			
					'order' => array('Otherdeduction.name')
				)
			)
		);
		
		$this->set('loantypes', 
			$loantypes = $this->Income->Loanpayment->find('all', 
				array(
					'joins' => array(						
						array(
							'alias' => 'Loantype1',  
							'table' => 'loantypes',
							'type' => 'LEFT',
							'conditions' => array(
								'Loantype1.id = Loanpayment.loantype_id',
							),
						)
					),
					'conditions' => array(
						'Loanpayment.payrollperiod_id' => $payrollperiod
					),
					'fields' => array(
						'DISTINCT(Loanpayment.loantype_id)', 'Loantype1.name'
					),			
					'order' => array('Loantype1.name')
				)
			)
		);
		
		
		$incomes = $this->Income->find('all', array(
							'conditions' => array(
								'AND' => array(
									'Income.payrollperiod_id' => $payrollperiod,
									// 'Employee.branch_id' => $branch,
									// 	'Employee.dem >' => 0,
								)
							),
							'joins' => array(						
								array(
									'alias' => 'Employee',  
									'table' => 'employees',
									'type' => 'LEFT',
									'conditions' => array(
										'Income.id = Employee.id',
									),
								)
							),
							'joins' => array(						
								array(
									'alias' => 'Department',  
									'table' => 'departments',
									'type' => 'LEFT',
									'conditions' => array(
										'Department.id = Employee.department_id',
									),
								)
							),
							'order' => array(
								'Department.name' => 'ASC',
								'Employee.lastname' => 'ASC',
								'Employee.firstname' => 'ASC'
							)
						));	
		$this->set('incomes', $incomes);
	}
	
	public function printreport($payrollperiod = null, $option = null, $branch = null, $bank = null, $depthead = null){
		$this->loadModel('Companyprofile');
		$profile = $this->Companyprofile->find('first');
		$this->set('profile', $profile);
		if(!empty($branch) AND $branch != 'All'){
			$this->loadModel('Branch');
			$b = $this->Branch->find('first', array(
				'conditions' => array(
					'Branch.id' => $branch
				)
			));
			
			$this->set('branch', $b['Branch']['name']);
		}else{
			$this->set('branch', 'Overall');
		}
		$this->loadModel('Otherearningsentry');
		$this->loadModel('Otherdeduction');
		$this->loadModel('Loantype');
		
		
		$this->set('otherearnings', 
			$otherearnings = $this->Income->Earningrecord->find('all', 
				array(
					'joins' => array(
						
						array(
							'alias' => 'Otherearning',  
							'table' => 'otherearnings',
							'type' => 'LEFT',
							'conditions' => array(
								'Otherearning.id = Earningrecord.otherearningsentry_id',
							),
						)
					),
					'conditions' => array(
						'Earningrecord.payrollperiod_id' => $payrollperiod
					),
					'fields' => array(
						'DISTINCT(Earningrecord.otherearningsentry_id)', 'Otherearning.name'
					),			
					'order' => array('Otherearning.id')
				)
			)
		);
		
		
		$this->set('otherdeductions', 
			$otherdeductions = $this->Income->Otherductionentry->find('all', 
				array(
					'joins' => array(						
						array(
							'alias' => 'Otherdeduction1',  
							'table' => 'otherdeductions',
							'type' => 'LEFT',
							'conditions' => array(
								'Otherdeduction1.id = Otherductionentry.otherdeduction_id',
							),
						)
					),
					'conditions' => array(
						'Otherductionentry.payrollperiod_id' => $payrollperiod
					),
					'fields' => array(
						'DISTINCT(Otherductionentry.otherdeduction_id)', 'Otherdeduction1.name'
					),			
					'order' => array('Otherdeduction.name')
				)
			)
		);
		$this->set('loantypes', 
			$loantypes = $this->Income->Loanpayment->find('all', 
				array(
					'joins' => array(						
						array(
							'alias' => 'Loantype1',  
							'table' => 'loantypes',
							'type' => 'LEFT',
							'conditions' => array(
								'Loantype1.id = Loanpayment.loantype_id',
							),
						)
					),
					'conditions' => array(
						'Loanpayment.payrollperiod_id' => $payrollperiod
					),
					'fields' => array(
						'DISTINCT(Loanpayment.loantype_id)', 'Loantype1.name'
					),			
					'order' => array('Loantype1.name')
				)
			)
		);
	
		if($option == 3){
			return $this->redirect(array('action' => 'payfile', $payrollperiod,$branch));
		}else{
			$this->loadModel('Otherearning');
			$earningsentries = $this->Otherearning->find('all');
			
			$conditions = '';
			if($depthead == 1){
				$conditions = "Employee.depthead = 1" ;
			}
			//ALL
			if($option == 0){				
				if(!empty($branch) AND $branch == 'All'){
					$incomes = $this->Income->find('all', array(
							'conditions' => array(
								'AND' => array(
									'Income.payrollperiod_id' => $payrollperiod,
									$conditions
								)
							),
							'joins' => array(						
								array(
									'alias' => 'Employee',  
									'table' => 'employees',
									'type' => 'LEFT',
									'conditions' => array(
										'Income.id = Employee.id',
									),
								)
							),
							'joins' => array(						
								array(
									'alias' => 'Department',  
									'table' => 'departments',
									'type' => 'LEFT',
									'conditions' => array(
										'Department.id = Employee.department_id',
									),
								)
							),
							'order' => array(
								'Department.name' => 'ASC',
								'Employee.lastname' => 'ASC',
								'Employee.firstname' => 'ASC'
							)
						));	
					$period = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
				}else{
					$incomes = $this->Income->find('all', array(
							'conditions' => array(
								'AND' => array(
									'Income.payrollperiod_id' => $payrollperiod,
									'Employee.branch_id' => $branch,
									$conditions
								)
							),
							'joins' => array(						
								array(
									'alias' => 'Employee',  
									'table' => 'employees',
									'type' => 'LEFT',
									'conditions' => array(
										'Income.id = Employee.id',
									),
								)
							),
							'joins' => array(						
								array(
									'alias' => 'Department',  
									'table' => 'departments',
									'type' => 'LEFT',
									'conditions' => array(
										'Department.id = Employee.department_id',
									),
								)
							),
							'order' => array(
								'Department.name' => 'ASC',
								'Employee.lastname' => 'ASC',
								'Employee.firstname' => 'ASC'
							)
						));	
					$period = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
				}
				
			}elseif ($option == 1){
				//BANK REPORT
				if(!empty($branch) AND $branch != 'All'){
					if(empty($bank)){
						$incomes = $this->Income->find('all', array(
							'conditions' => array(
								'AND' => array(
									'Income.payrollperiod_id' => $payrollperiod,
									'Employee.dem >' => 0,
									$conditions
								)
							),
							'order' => array(
								'Employee.department_id' => 'ASC',
								//'Employee.lastname' => 'ASC',
								//'Employee.firstname' => 'ASC'
							)
						));
					}else{
						$incomes = $this->Income->find('all', array(
							'conditions' => array(
								'AND' => array(
									'Income.payrollperiod_id' => $payrollperiod,
									'Employee.dem >' => 0,
									'Employee.bank_id' => $bank,
									$conditions
								)
							),
							'joins' => array(						
								array(
									'alias' => 'Department',  
									'table' => 'departments',
									'type' => 'LEFT',
									'conditions' => array(
										'Department.id = Employee.department_id',
									),
								)
							),
							'order' => array(
								'Department.name' => 'ASC',
								//'Employee.lastname' => 'ASC',
								//'Employee.firstname' => 'ASC'
							)
						));
					}
					
					$period = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
				}else{
					if(empty($bank)){
						$incomes = $this->Income->find('all', array(
							'conditions' => array(
								'AND' => array(
									'Income.payrollperiod_id' => $payrollperiod,
									'Employee.branch_id' => $branch,
									'Employee.dem >' => 0,
									$conditions
								)
							),
							'joins' => array(						
								array(
									'alias' => 'Department',  
									'table' => 'departments',
									'type' => 'LEFT',
									'conditions' => array(
										'Department.id = Employee.department_id',
									),
								)
							),
							'order' => array(
								'Department.name' => 'ASC',
								//'Employee.lastname' => 'ASC',
								//'Employee.firstname' => 'ASC'
							)
						));	
					}else{
						$incomes = $this->Income->find('all', array(
							'conditions' => array(
								'AND' => array(
									'Income.payrollperiod_id' => $payrollperiod,
									'Employee.branch_id' => $branch,
									'Employee.dem >' => 0,
									'Employee.bank_id' => $bank,
									$conditions
								)
							),
							'order' => array(
								'Employee.department_id' => 'ASC',
								'Employee.lastname' => 'ASC',
								'Employee.firstname' => 'ASC'
							)
						));	
					}
					
					$period = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
				}
			}elseif ($option == 2){
				if(!empty($branch) AND $branch != 'All'){
					$incomes = $this->Income->find('all', array(
						'conditions' => array(
							'AND' => array(
								'Income.payrollperiod_id' => $payrollperiod,
								'Employee.dem' => 0,
								$conditions
							)
						),
						'order' => array(
							'Employee.department_id' => 'ASC',
							'Employee.lastname' => 'ASC',
							'Employee.firstname' => 'ASC'
						)
					));
					$period = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
				}else{
					$incomes = $this->Income->find('all', array(
						'conditions' => array(
							'AND' => array(
								'Income.payrollperiod_id' => $payrollperiod,
								'Employee.branch_id' => $branch,
								'Employee.dem' => 0,
								$conditions
							)
						),
						'order' => array(
							'Employee.department_id' => 'ASC',
							'Employee.lastname' => 'ASC',
							'Employee.firstname' => 'ASC'
						)
					));
					$period = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
				}
			}
			
			
			$this->set('period', $period);
			$this->set('incomes', $incomes);

			$this->set('option', $option);
			$this->set('bank', $bank);
			
			ini_set('memory_limit', '2048M');
		}
	}
	
	public function payfile($payrollperiod = null, $branch = null){
		$this->loadModel('Otherearning');
		$earningsentries = $this->Otherearning->find('all');
		
		if($branch == 0){
			$incomes = $this->Income->find('all', array(
				'conditions' => array(
					'AND' => array(
						'Income.payrollperiod_id' => $payrollperiod
					)
				),
					'order' => array(
						'Employee.lastname' => 'ASC',
						'Employee.firstname' => 'ASC'
					)
			));
			
		}else{
			$incomes = $this->Income->find('all', array(
					'conditions' => array(
						'AND' => array(
							'Income.payrollperiod_id' => $payrollperiod,
							'Employee.branch_id' => $branch,
						)
					),
					'order' => array(
						'Employee.lastname' => 'ASC',
						'Employee.firstname' => 'ASC'
					)
				));
		}
		
		$period = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
		$this->set('period', $period);
		$this->set('incomes', $incomes);
	}
	
	public function view2($employeeid = null, $payrollperiod = null) {
		$employeeid = $this->Auth->user('employeeno');
		$this->loadModel('Otherductionentry');
		$this->loadModel('Otherearningsentry');
		$this->loadModel('Employee');		
		$this->loadModel('Overtime');
		$this->loadModel('Earningrecord');
		
		$ots = $this->Overtime->find('all', array('conditions' => array('AND' => array('Overtime.payrollperiod_id' => $payrollperiod, 'Overtime.employee_id' => $employeeid))));		
		$income = $this->Income->find('first', array('conditions' => array('AND' => array('Income.payrollperiod_id' => $payrollperiod, 'Income.employee_id' => $employeeid))));
		$employee = $this->Employee->find('first', array('conditions' => array('Employee.id' => $employeeid)));
		$payroll = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
		$deductions = $this->Otherductionentry->find('all', array('conditions' => array('AND' => array('Otherductionentry.payrollperiod_id' => $payrollperiod, 'Otherductionentry.employee_id' => $employeeid))));
		$earnings = $this->Earningrecord->find('all', array('conditions' => array('AND' => array('Earningrecord.payrollperiod_id' => $payrollperiod, 'Earningrecord.employee_id' => $employeeid))));
		
		
		$this->set('payroll', $payroll);
		$this->set('income', $income);
		$this->set('employee', $employee);
		$this->set('ots', $ots);
		$this->set('deductions', $deductions);
		$this->set('earnings', $earnings);
	}
	
	
	
	public function excelreport($payrollperiod = null, $action = null, $branch = null){
		$this->loadModel('Companyprofile');
		if(!empty($branch)){
			$reports = $this->Income->find('all', array(
				'conditions' => array(
					'AND' => array(
						'MONTH(Income.month)' => date('m', strtotime($payrollperiod)), 
						'YEAR(Income.month)' => date('Y', strtotime($payrollperiod)),
						'Employee.branch_id' => $branch
					)
				),
				'order' => array(
					'Employee.department_id' => 'ASC',
					'Employee.lastname' => 'ASC',
					'Employee.firstname' => 'ASC'
				)
			));
		}else{
			$reports = $this->Income->find('all', array(
				'conditions' => array(
					'AND' => array(
						'MONTH(Income.month)' => date('m', strtotime($payrollperiod)), 
						'YEAR(Income.month)' => date('Y', strtotime($payrollperiod))
					)
				),
				'order' => array(
					'Employee.department_id' => 'ASC',
					'Employee.lastname' => 'ASC',
					'Employee.firstname' => 'ASC'
				)
			));
		}
		
		$profile = $this->Companyprofile->find('first');
		$this->set('reports', $reports);
		$this->set('action', $action);
		$this->set('profile', $profile);
		$this->set('payrollperiod', $payrollperiod);
	}
	
	
	public function printpayslip($action = null, $payrollperiod = null, $employeeid = null, $type=null){

		// Check if the URL contains a .pdf extension
		if (preg_match('/\.pdf$/', $this->request->url)) {
			// Remove the .pdf extension
			$redirectUrl = preg_replace('/\.pdf$/', '', $this->request->url);
	
			// Perform the redirect
			return $this->redirect('/' . $redirectUrl, 301); // 301 for permanent redirect
		}

		if(isset($type) && $type=="print"){
			$this->layout = 'print';
		}

		if($action == 1){ //ALL
			$incomes = $this->Income->find('all', array('conditions' => array('Income.payrollperiod_id' => $payrollperiod), 'order' => array('Employee.lastname' => 'ASC')));
			$this->set('incomes', $incomes);			
			
		}else if($action == 2){ //DIVISIONS
			$incomes = $this->Income->find('all', array('conditions' => array('AND' => array('Income.payrollperiod_id' => $payrollperiod, 'Income.division'=> $employeeid)), 'order' => array('Employee.lastname' => 'ASC')));
			$this->set('incomes', $incomes);
		}else if($action == 3){ //DEPARTMENT
			$incomes = $this->Income->find('all', array('conditions' => array('AND' => array('Income.payrollperiod_id' => $payrollperiod, 'Income.department'=> $employeeid)), 'order' => array('Employee.lastname' => 'ASC')));
			$this->set('incomes', $incomes);
		}else if($action == 4){
			$incomes = $this->Income->find('all', array('conditions' => array('AND' => array('Income.payrollperiod_id' => $payrollperiod, 'Income.employee_id'=> $employeeid)), 'order' => array('Employee.lastname' => 'ASC')));
			$this->set('incomes', $incomes);
			
		}else if($action == 5){ //BRANCH
			$incomes = $this->Income->find('all', array('conditions' => array('AND' => array('Income.payrollperiod_id' => $payrollperiod, 'Employee.branch_id'=> $employeeid)), 'order' => array('Employee.lastname' => 'ASC')));
			$this->set('incomes', $incomes);
		}
		
		$payroll = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
		$this->set('payroll', $payroll);

		$this->set('employeeid', $employeeid);
		$this->set('payrollperiod', $payrollperiod);
		$this->set('type', $type);
		$this->set('action', $action);

		
	}
	
	public function changestatus($employeeid = null, $payrollperiod = null, $id = null, $tax = null, $value = null, $taxf = null){
		if($this->Income->updateAll(array("Income.tax" => $tax, "Income.tax1" => $taxf), array("Income.id" => $id))){
				$this->Income->updateAll(array("Income.status" => $value ), array("Income.id" => $id));
				$this->Session->setFlash(__('DATA WAS FINALIZED'), 'success_message');
				return $this->redirect(array('controller' => 'incomes', 'action' => 'view', $employeeid, $payrollperiod));
			}
	}
	
	public function payslip($employeeid = null, $payrollperiod = null, $type=null) {

		// Check if the URL contains a .pdf extension
		if (preg_match('/\.pdf$/', $this->request->url)) {
			// Remove the .pdf extension
			$redirectUrl = preg_replace('/\.pdf$/', '', $this->request->url);
	
			// Perform the redirect
			return $this->redirect('/' . $redirectUrl, 301); // 301 for permanent redirect
		}

		if(isset($type) && $type=="print"){
			$this->layout = 'print';
		}
		
		//$this->response->type('application/pdf'); 
		//$this->response->header('Content-Disposition', 'inline; filename="payslip.pdf"');

		$this->loadModel('Otherductionentry');
		$this->loadModel('Otherearningsentry');
		$this->loadModel('Employee');		
		$this->loadModel('Overtime');
		$this->loadModel('Earningrecord');
		$this->loadModel('Loanpayment');
		
		
		$ots = $this->Overtime->find('all', array('conditions' => array('AND' => array('Overtime.payrollperiod_id' => $payrollperiod, 'Overtime.employee_id' => $employeeid))));		
		$income = $this->Income->find('first', array('conditions' => array('AND' => array('Income.payrollperiod_id' => $payrollperiod, 'Income.employee_id' => $employeeid))));
		$employee = $this->Employee->find('first', array('conditions' => array('Employee.id' => $employeeid)));
		$payroll = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
		$deductions = $this->Otherductionentry->find('all', array('conditions' => array('AND' => array('Otherductionentry.payrollperiod_id' => $payrollperiod, 'Otherductionentry.employee_id' => $employeeid))));
		$earnings = $this->Earningrecord->find('all', array('conditions' => array('AND' => array('Earningrecord.payrollperiod_id' => $payrollperiod, 'Earningrecord.employee_id' => $employeeid))));
		
		
		$this->set('payroll', $payroll);
		$this->set('income', $income);
		$this->set('employee', $employee);
		$this->set('ots', $ots);
		$this->set('deductions', $deductions);
		$this->set('earnings', $earnings);
		$this->set('employeeid', $employeeid);
		$this->set('payrollperiod', $payrollperiod);
		$this->set('type', $type);

		 // Render the view to a variable
		/* $html = $this->renderView('/Income/pdf/payslip'); // Custom function to render view content
        		 
		 // Initialize DOMPDF
		 $dompdf = new Dompdf();
		 $dompdf->loadHtml($html);
		 $dompdf->setPaper('A4', 'portrait');
		 $dompdf->render();
 
		 // Output PDF to browser
		 $dompdf->stream("payslip.pdf", ['Attachment' => 0]);
		 exit;*/

		
	}

	// Helper function to render view to string
    private function renderView($viewPath) {
        ob_start();
        $this->render($viewPath);
        $html = ob_get_clean();
        return $html;
    }

	
	
	
	
	
	public function processall($action = null, $depdiv = null, $payrollperiod = null) {
		$this->loadModel('User');
		$p = $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id'))));
		$period = $p['User']['payrollperiod'];
		
		
		if($period == 0){
			//$this->redirect(array('controller' => 'employees', 'action' => 'index', '0', '0', 1));
		}else{
			$this->set('p', $p);
			
		}
		
		$this->loadModel('Otherearningsentry');
		$this->loadModel('Income');
		$this->loadModel('Loanpayment');
		$this->loadModel('Earningrecord');
		$this->loadModel('Loanentry');
		$this->loadModel('Periodinclude');
		
		$payroll = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $period)));
		$this->set('payroll', $payroll);
		
		if($action == 4){
			$employees = $this->Income->Employee->find('all', array('conditions' => array('Employee.employeetype_id' => $depdiv)));
			$this->set('employees', $employees);
		}else if($action == 2){
			$employees = $this->Income->Employee->find('all', array('conditions' => array('Employee.division_id' => $depdiv)));
			$this->set('employees', $employees);
		}else if($action == 3){
			$employees = $this->Income->Employee->find('all', array('conditions' => array('Employee.department_id' => $depdiv)));
			$this->set('employees', $employees);
		}else if($action == 5){
			$employees = $this->Income->Employee->find('all', array('conditions' => array('Employee.branch_id' => $depdiv)));
			$this->set('employees', $employees);
		}else if($action == 1){
			$employees = $this->Income->Employee->find('all');
			$this->set('employees', $employees);
		}
		
		//$period = $this->Auth->user('payrollperiod');
		if ($this->request->is('post')) {
			foreach($this->data['Income']['employee_id'] as $index => $key):
				$id = $this->data['Income']['employee_id'][$index];
				$absent = $this->data['Income']['absent'][$index];
				$dayswork = $this->data['Income']['dayswork'][$index];
				$income[] = array(
					'Income' => array(
						'id' => $this->data['Income']['id'][$index],
						'payrollperiod_id' => $period,
						'grossincome' => $this->data['Income']['grossincome'][$index],
						'employee_id' => $this->data['Income']['employee_id'][$index],
						'rate' => $this->data['Income']['rate'][$index],
						'monthlyrate' => $this->data['Income']['monthlyrate'][$index],
						'department' => $this->data['Income']['department'][$index],
						'division' => $this->data['Income']['division'][$index],
						'ratetype' => $this->data['Income']['ratetype'][$index],
						'absent' => $this->data['Income']['absent'][$index],
						'dayswork' => $this->data['Income']['dayswork'][$index],
						'adjustments' => $this->data['Income']['adjustments'][$index],
						'sss' => $this->data['Income']['sss'][$index],
						'philhealth' => $this->data['Income']['philhealth'][$index],
						'hdmf' => $this->data['Income']['hdmf'][$index],
						'penalty' => $this->data['Income']['penalty'][$index],
						'advances' => $this->data['Income']['advances'][$index],
						'medical' => $this->data['Income']['medical'][$index],
						'hour' => $this->data['Income']['hour'][$index],
						'minutes' => $this->data['Income']['minutes'][$index],
						'month' => $payroll['Payrollperiod']['fromDate'],
					)
				);
				
				if(empty($this->data['Income']['id'][$index])){
				//OTHER INCOMES		
					$otherearnings = $this->Otherearningsentry->find('all', array('conditions' => array('AND' => array('Otherearningsentry.employee_id' => $id, 'Otherearningsentry.status' => 1))));
					
					if(!empty($otherearnings)){
						foreach ($otherearnings as $earn):
							if($earn['Otherearningsentry']['payprequency'] == 0){
								if($this->data['Income']['ratetype'][$index]== 1){
									$absent = $this->data['Income']['absent'][$index];
									$dayswork = 0;
								}else if($this->data['Income']['ratetype'][$index] == 2){
									$absent = 0;
									$dayswork = $this->data['Income']['dayswork'][$index];
								}
								
								if($this->data['Income']['ratetype'][$index] == 1){
									$value = (12 - $absent) * $earn['Otherearningsentry']['amount'];
								}else if($this->data['Income']['ratetype'][$index] == 2){
									$value = $dayswork * $earn['Otherearningsentry']['amount'] ;
								}
								
								$earning = array(
								'Earningrecord' => array(
									'payrollperiod_id' => $period,
									'employee_id' => $id,
									'otherearningsentry_id' => $earn['Otherearningsentry']['otherearning_id'],
									'ratetype' => $this->data['Income']['ratetype'][$index],
									'daysabsent' => $absent,
									'daysworked' => $dayswork,
									'totalamount' => $value,
									'amount' =>$earn['Otherearningsentry']['amount'],
									)
								);
										
								$this->Earningrecord->create();	
								if($this->Earningrecord->save($earning)){
									
								}
							}if($earn['Otherearningsentry']['payprequency'] == 1 && (date('d', strtotime($payroll['Payrollperiod']['from'])) == 01) || date('d', strtotime($payroll['Payrollperiod']['from'])) == 21|| date('d', strtotime($payroll['Payrollperiod']['from'])) == 26){
								if($this->data['Income']['ratetype'][$index] == 1){
									$absent = $this->data['Income']['absent'][$index];
									$dayswork = 0;
								}else if($this->data['Income']['ratetype'][$index] == 2){
									$absent = 0;
									$dayswork = $this->data['Income']['dayswork'][$index];
								}
								$value = $earn['Otherearningsentry']['amount'];
								
								$earning = array(
								'Earningrecord' => array(
									'payrollperiod_id' => $period,
									'employee_id' => $id,
									'otherearningsentry_id' => $earn['Otherearningsentry']['otherearning_id'],
									'ratetype' => $this->data['Income']['ratetype'][$index],
									'daysabsent' => $absent,
									'daysworked' => $dayswork,
									'totalamount' => $value,
									'amount' =>$earn['Otherearningsentry']['amount'],
									)
								);
										
								$this->Earningrecord->create();	
								if($this->Earningrecord->save($earning)){
									
								}
							}if($earn['Otherearningsentry']['payprequency'] == 2 && (date('d', strtotime($payroll['Payrollperiod']['from'])) == 16) || date('d', strtotime($payroll['Payrollperiod']['from'])) == 11 || date('d', strtotime($payroll['Payrollperiod']['from'])) == 06){
								if($this->data['Income']['ratetype'][$index] == 1){
									$absent = $this->data['Income']['absent'][$index];
									$dayswork = 0;
								}else if($this->data['Income']['ratetype'][$index] == 2){
									$absent = 0;
									$dayswork = $this->data['Income']['dayswork'][$index];
								}
								$value = $earn['Otherearningsentry']['amount'];
								
								$earning = array(
								'Earningrecord' => array(
									'payrollperiod_id' => $period,
									'employee_id' => $id,
									'otherearningsentry_id' => $earn['Otherearningsentry']['otherearning_id'],
									'ratetype' => $this->data['Income']['ratetype'][$index],
									'daysabsent' => $absent,
									'daysworked' => $dayswork,
									'totalamount' => $value,
									'amount' =>$earn['Otherearningsentry']['amount'],
									)
								);
										
								$this->Earningrecord->create();	
								if($this->Earningrecord->save($earning)){
									
								}
							}if($earn['Otherearningsentry']['payprequency'] == 3){
								if($this->data['Income']['ratetype'][$index] == 1){
									$absent = $this->data['Income']['absent'][$index];
									$dayswork = 0;
								}else if($this->data['Income']['ratetype'][$index] == 2){
									$absent = 0;
									$dayswork = $this->data['Income']['dayswork'][$index];
								}
								$value = $earn['Otherearningsentry']['amount'];
								
								$earning = array(
								'Earningrecord' => array(
									'payrollperiod_id' => $period,
									'employee_id' => $id,
									'otherearningsentry_id' => $earn['Otherearningsentry']['otherearning_id'],
									'ratetype' => $this->data['Income']['ratetype'][$index],
									'daysabsent' => $absent,
									'daysworked' => $dayswork,
									'totalamount' => $value,
									'amount' =>$earn['Otherearningsentry']['amount'],
									)
								);
										
								$this->Earningrecord->create();	
								if($this->Earningrecord->save($earning)){
									
								}
							}
						endforeach;
					}
					
					//LOANS
					$loans = $this->Loanentry->find('all', array('conditions' => array('AND' => array('Loanentry.employee_id' => $id, 'Loanentry.status' => 1))));
					
					if(!empty($loans)){
						foreach ($loans as $loan):
							if($payroll['Payrollperiod']['until'] >=  $loan['Loanentry']['startdeduction']){
								$loantype = $loan['Loantype']['id'];			
								if($loan['Loanentry']['deductiontype'] == 0){
									if($payroll['Payrollperiod']['classification_id'] == 1){
										$amount = $loan['Loanentry']['deductionperpayday'];
									}else{
										$amount = 0;
									}
									
																
								}else if($loan['Loanentry']['deductiontype'] == 1){
									if($payroll['Payrollperiod']['classification_id'] == 2){
										$amount = $loan['Loanentry']['deductionperpayday'];
									}else{
										$amount = 0;
									}
									
									
								}else if($loan['Loanentry']['deductiontype'] == 2){
									$amount = $loan['Loanentry']['deductionperpayday'];
									
								}
								
								//ADD
								if($amount > $loan['Loanentry']['balance']){
									$amount = $loan['Loanentry']['balance'];
								}
								
								$loans = array(
									'Loanpayment' => array(
										'payrollperiod_id' => $period,
										'employee_id' => $this->data['Income']['employee_id'][$index],
										'loantype_id' => $loantype,
										'amount' => $amount,
										'loanentry_id' => $loan['Loanentry']['id']
									)
								);
								
								$this->Loanpayment->create();	
								if($this->Loanpayment->save($loans)){
									$newbalance = $loan['Loanentry']['balance'] - $amount;
								
									$status = 1;
									if ($newbalance == 0){
										$status = 0;
									}
									
									$loane = array(
										'Loanentry' => array(
											'id' => $loan['Loanentry']['id'],
											'balance' => $newbalance,
											'status' => $status
										)
									
									);
									
									$this->Loanentry->create();	
									if($this->Loanentry->save($loane)){}
									
								}
								
								
							}
						endforeach;
					}
				}					
			endforeach; //EMPLOYEE
			
			$this->Income->create();	
			
			if($this->Income->saveAll($income)){
				$this->Session->setFlash(__('Successfully saved.'));
				return $this->redirect(array('controller' => 'incomes', 'action' => 'processview', $action, $payrollperiod, $depdiv));
			}else {
				$this->Session->setFlash(__('The loanpayment could not be saved. Please, try again.'));
			}
		}
	}
	
	public function checkdata($employeeid = null, $payrollperiod = null){
		$check = $this->Income->find('first', array('conditions' => array('AND' => array('Income.employee_id' => $employeeid, 'Income.payrollperiod_id' => $payrollperiod))));
		if (isset($this->params['requested'])){
			return $check;
		}
	}
	
	public function finalize($action = null, $payrollperiod = null, $employeeid = null, $payslip = null){
		$this->loadModel('Otherductionentry');
		$this->loadModel('Otherearningsentry');
		$this->loadModel('Employee');		
		$this->loadModel('Overtime');
		$this->loadModel('Loanpayment');
		$this->loadModel('Earningrecord');
		$this->loadModel('Payrollperiod');
		$this->loadModel('Deduction');
		$this->loadModel('Withholdingtax');
		
		$payroll = $this->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
		if($action == 1){ //ALL
			$incomes = $this->Income->find('all', array('conditions' => array('Income.payrollperiod_id' => $payrollperiod), 'order' => array('Income.employee_id' => 'ASC')));
			//$this->set('incomes', $incomes);			
			
		}else if($action == 2){ //DIVISIONS
			$incomes = $this->Income->find('all', array('conditions' => array('AND' => array('Income.payrollperiod_id' => $payrollperiod, 'Income.division'=> $employeeid)), 'order' => array('Income.employee_id' => 'ASC')));
			//$this->set('incomes', $incomes);
		}else if($action == 3){ //DEPARTMENT
			$incomes = $this->Income->find('all', array('conditions' => array('AND' => array('Income.payrollperiod_id' => $payrollperiod, 'Income.department'=> $employeeid, 'Income.status' => 0)), 'order' => array('Income.employee_id' => 'ASC')));
			//$this->set('incomes', $incomes);
		}else if($action == 4){
			$incomes = $this->Income->find('all', array('conditions' => array('AND' => array('Income.payrollperiod_id' => $payrollperiod, 'Income.employee_id'=> $employeeid, 'Income.status' => 0)), 'order' => array('Income.employee_id' => 'ASC')));
		//	$this->set('incomes', $incomes);
		}
		
		//$this->set('employees' as $employee);
		if(!empty($incomes)){
			foreach ($incomes as $income):
				$employeeid = $income['Income']['employee_id'];
				
				//Overtime
				$ots = $this->Overtime->find('all', array('conditions' => array('AND' => array('Overtime.payrollperiod_id' => $payrollperiod, 'Overtime.employee_id' => $employeeid))));
				$totalot = 0;
				if(!empty($ots)){
					foreach ($ots as $ot):
						$totalot = $totalot + $ot['Overtime']['otamount'];
					endforeach;
				}
				
				//DEDUCTIONS
				$deductions = $this->Deduction->find('all', array('conditions' => array('AND' => array('Deduction.payrollperiod_id' => $payrollperiod, 'Deduction.employee_id' => $employeeid))));
				$deductiontotal = 0;
				if(!empty($deductions)){
					foreach ($deductions as $deduction):		
						$deductiontotal = $deductiontotal + $deduction['Otherductionentry']['amount'];
					endforeach;
				}
				
				//LOANS
				$loans = $this->Loanpayment->find('all', array('conditions' => array('Loanpayment.employee_id' => $income['Income']['employee_id'], 'Loanpayment.payrollperiod_id' => $payrollperiod)));
				$totalloans = 0;
				if(!empty($loans)){
					foreach ($loans as $loan):
						$totalloans = $totalloans + $loan['Loanpayment']['amount'];
					endforeach;
				}	
				
				//EARNINGS
				$earnings = $this->Earningrecord->find('all', array('conditions' => array('AND' => array('Earningrecord.payrollperiod_id' => $payrollperiod, 'Earningrecord.employee_id' => $employeeid))));
				$e = 0;
				$totalearnings = 0;
				if(!empty($earnings)){
					foreach ($earnings as $earn):
						$e = $e + $earn['Earningrecord']['totalamount'];
					endforeach;
				}
				
				$a = $income['Income']['grossincome'] + $income['Income']['adjustments'];
				$deductiontotal =  $deductiontotal + $income['Income']['demamount'] + $income['Income']['sss'] +  $income['Income']['philhealth'] +  $income['Income']['hdmf'] +  $income['Income']['advances'] +  $income['Income']['medical'] +  $income['Income']['uniform'] +  $income['Income']['penalty'] +  $income['Income']['tax'] +  $income['Income']['demamount'] + $income['Income']['amount'] +  $income['Income']['absentamount'] + $totalloans;
				
		
				
				
				
			endforeach;
		}
		$this->Session->setFlash(__('DATA WAS FINALIZED'), 'success_message');
		return $this->redirect(array('controller' => 'incomes', 'action' => 'processview', $action, $payrollperiod, $employeeid, 1));
	}
	
	
	public function processview($action = null, $period = null, $depdiv = null, $payslip = null) {
		$this->loadModel('User');
		$p = $this->User->find('first', array('conditions' => array('User.id' => $this->Auth->user('id'))));
		$period = $p['User']['payrollperiod'];
		$this->set('action', $action);
		$this->set('period', $period);
		$this->set('depdiv', $depdiv);
		$this->set('payslip', $payslip);
		
		if($period == 0){
			$this->redirect(array('controller' => 'periodincludes', 'action' => 'index'));
		}else{
			//$this->set('payroll', $period);
			
		}
		
		$this->loadModel('Otherearningsentry');
		$this->loadModel('Income');
		$this->loadModel('Loanpayment');
		$this->loadModel('Earningrecord');
		$this->loadModel('Loanentry');
		$this->loadModel('Periodinclude');
		
		$p = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $period)));
		$this->set('period', $period);
		$payrollperiod = $period;
		$this->set('p', $p);
		
		
		if($action == 1){ //ALL
			$incomes = $this->Income->find('all', array('conditions' => array('Income.payrollperiod_id' => $payrollperiod), 'order' => array('Employee.lastname' => 'ASC')));
			$this->set('incomes', $incomes);	
		}else if($action == 2){ //DIVISIONS
			$incomes = $this->Income->find('all', array('conditions' => array('AND' => array('Income.payrollperiod_id' => $payrollperiod, 'Income.division'=> $depdiv)), 'order' => array('Employee.lastname' => 'ASC')));
			$this->set('incomes', $incomes);
		}else if($action == 3){ //DEPARTMENT
			$incomes = $this->Income->find('all', array('conditions' => array('AND' => array('Income.payrollperiod_id' => $payrollperiod, 'Income.department'=> $depdiv)), 'order' => array('Employee.lastname' => 'ASC')));
			$this->set('incomes', $incomes);
		}else if($action == 4){
			$incomes = $this->Income->find('all', array('conditions' => array('AND' => array('Income.payrollperiod_id' => $payrollperiod, 'Income.employee_id'=> $depdiv)), 'order' => array('Employee.lastname' => 'ASC')));
			$this->set('incomes', $incomes);
		}else if($action == 5){
			$incomes = $this->Income->find('all', array('conditions' => array('AND' => array('Income.payrollperiod_id' => $payrollperiod, 'Employee.branch_id'=> $depdiv)), 'order' => array('Employee.lastname' => 'ASC')));
			$this->set('incomes', $incomes);
		}
	}
	
	public function checkdelete($id = null){
		$yes = $this->Income->find('first', array(
			'conditions' => array(
				'Income.employee_id' => $id
			)));
		if(isset($this->params['requested'])){
			return $yes;
		}
	}
	
	public function searchpayrollperiods($payrollperiod = null){
		$periods = $this->Income->find('all', array('conditions' => array('AND' => array('MONTH(Income.month)' => date('m', strtotime($payrollperiod)), 'YEAR(Income.month)' => date('Y', strtotime($payrollperiod))))));
		if(isset($this->params['requested'])){
			return $periods;
		}
	}
	
	public function payrollregister($employeeid = null, $payrollperiod = null) {
		$this->loadModel('Otherductionentry');
		$this->loadModel('Otherearningsentry');
		$this->loadModel('Employee');		
		$this->loadModel('Overtime');
		$this->loadModel('Earningrecord');
		$this->loadModel('Loanpayment');
		
		$ots = $this->Overtime->find('all', array('conditions' => array('AND' => array('Overtime.payrollperiod_id' => $payrollperiod, 'Overtime.employee_id' => $employeeid))));		
		$income = $this->Income->find('first', array('conditions' => array('AND' => array('Income.payrollperiod_id' => $payrollperiod, 'Income.employee_id' => $employeeid))));
		$employee = $this->Employee->find('first', array('conditions' => array('Employee.id' => $employeeid)));
		$payroll = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
		$deductions = $this->Otherductionentry->find('all', array('conditions' => array('AND' => array('Otherductionentry.payrollperiod_id' => $payrollperiod, 'Otherductionentry.employee_id' => $employeeid))));
		$earnings = $this->Earningrecord->find('all', array('conditions' => array('AND' => array('Earningrecord.payrollperiod_id' => $payrollperiod, 'Earningrecord.employee_id' => $employeeid))));
		
		
		$this->set('payroll', $payroll);
		$this->set('income', $income);
		$this->set('employee', $employee);
		$this->set('ots', $ots);
		$this->set('deductions', $deductions);
		$this->set('earnings', $earnings);
	}
	
	public function addspecial($payrollperiod = null, $id = null){
		$this->loadModel('Employee');
		$this->loadModel('Payrollperiod');
		if ($this->request->is('post')) {
			$this->Income->create();
			if ($this->Income->save($this->request->data)) {
				$this->Session->setFlash(__('Successfully Saved'), 'success_message');
				return $this->redirect(array('action' => 'viewspecial', $id, $payrollperiod));
			} else {
				$this->Session->setFlash(__('Please, try again.'));
			}
			
		}
		$payroll = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
		$this->set('payroll', $payroll);
		$employee = $this->Employee->find('first', array('conditions' => array('Employee.id' => $id)));
		$this->set('employee', $employee);
	}
	
	public function viewspecial($employeeid = null, $payrollperiod = null) {
		$this->loadModel('Otherductionentry');
		$this->loadModel('Otherearningsentry');
		$this->loadModel('Employee');		
		$this->loadModel('Overtime');
		$this->loadModel('Earningrecord');
		
		$ots = $this->Overtime->find('all', array('conditions' => array('AND' => array('Overtime.payrollperiod_id' => $payrollperiod, 'Overtime.employee_id' => $employeeid))));		
		$income = $this->Income->find('first', array('conditions' => array('AND' => array('Income.payrollperiod_id' => $payrollperiod, 'Income.employee_id' => $employeeid))));
		$employee = $this->Employee->find('first', array('conditions' => array('Employee.id' => $employeeid)));
		$payroll = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
		$deductions = $this->Otherductionentry->find('all', array('conditions' => array('AND' => array('Otherductionentry.payrollperiod_id' => $payrollperiod, 'Otherductionentry.employee_id' => $employeeid))));
		$earnings = $this->Earningrecord->find('all', array('conditions' => array('AND' => array('Earningrecord.payrollperiod_id' => $payrollperiod, 'Earningrecord.employee_id' => $employeeid))));
		
		
		$this->set('payroll', $payroll);
		$this->set('income', $income);
		$this->set('employee', $employee);
		$this->set('ots', $ots);
		$this->set('deductions', $deductions);
		$this->set('earnings', $earnings);
	}
	
	public function editspecial($id = null) {
		$this->loadModel('Employee');
		if (!$this->Income->exists($id)) {
			throw new NotFoundException(__('Invalid income'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Income->save($this->request->data)) {
				$this->Session->setFlash(__('The income has been saved.'));
				return $this->redirect(array('action' => 'view', $this->data['Income']['employee_id'], $this->data['Income']['payrollperiod_id']));
			} else {
				$this->Session->setFlash(__('The income could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Income.' . $this->Income->primaryKey => $id));
			$this->request->data = $this->Income->find('first', $options);
		}
		$income = $this->Income->find('first', array('conditions' => array('Income.id' => $id)));
		$payroll = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $income['Income']['payrollperiod_id'])));
		$ratetypes = $this->Income->Ratetype->find('list');
		$users = $this->Income->User->find('list');
		
		$employee = $this->Employee->find('first', array('conditions' => array('Employee.id' => $income['Income']['employee_id'])));
		$this->set('employee', $employee);
		$this->set('payroll', $payroll);
		$this->set(compact('incomes', 'payrollperiods', 'ratetypes', 'users'));
	}
	
	public function selectpayrollperiod3(){
		$employeeid = $this->Auth->user('employeeno');
		$periods = $this->Income->Payrollperiod->find('list', array('order' => array('Payrollperiod.id' => 'DESC'), 'fields' => 'period'));
		$this->set('periods', $periods);
		$this->set('employeeid', $employeeid);
		if ($this->request->is('post')) {
			
			$this->Income->create();
			$branch = $this->data['Income']['branch_id'];
			
			if(empty($this->data['Income']['branch_id'])){
				$branch = 'All';
			}
			
			$bank = $this->data['Income']['bank_id'];
			if(empty($this->data['Income']['bank_id'])){
				$bank = 'All';
			}
			
			$depthead = $this->data['Income']['depthead'];
			
			$option = $this->data['Income']['option'];
			$payrollperiod = $this->data['Income']['period'];
			$search = $this->Income->find('first', array('conditions' => array('AND' => array('Income.payrollperiod_id' => $payrollperiod))));
			if(!empty($search)){
				if($option < 3){
					return $this->redirect(array('action' => 'printreport', $payrollperiod, $option, $branch, $bank, $depthead));
				}else if($option == 3){
					return $this->redirect(array('action' => 'payfile', $payrollperiod, $branch));
				}else if($option == 4){
					return $this->redirect(array('action' => 'textfile', $payrollperiod, $branch));
				}else if($option == 6){
					return $this->redirect(array('action' => 'encryptedview', $payrollperiod, $bank, $branch));
				}
				
			}else{
				$this->Session->setFlash(__('No Data was Found on this period!'));	
			}
		}
		
		$this->loadModel('Branch');
		$this->loadModel('Bank');
		$branches = $this->Branch->find('list', array('order' => array('Branch.name' => 'ASC')));
		$banks = $this->Bank->find('list', array('order' => array('Bank.name' => 'ASC')));
		$this->set(compact('payrollperiods', 'branches', 'banks'));
	}
	
	public function textfile($payrollperiod = null){
		$this->layout = ('text');
		$this->loadModel('Otherearning');
		$earningsentries = $this->Otherearning->find('all');
		$incomes = $this->Income->find('all', array('conditions' => array('Income.payrollperiod_id' => $payrollperiod))); // => $payrollperiod),'order' => array('Income.department' => 'ASC')));
		$period = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
		$this->set('period', $period);
		$this->set('incomes', $incomes);
	}
	
	public function ssslcl($payrollperiod = null, $action = null){
		$this->layout = ('text');
		$this->loadModel('Companyprofile');
		$this->loadModel('Payrollperiod');
		$periods = $this->Payrollperiod->find('all', array('conditions' => array('AND' => array('MONTH(Payrollperiod.from)' => date('m', strtotime($payrollperiod)), 'YEAR(Payrollperiod.from)' => date('Y', strtotime($payrollperiod))))));
		$profile = $this->Companyprofile->find('first');
		$this->set('periods', $periods);
		$this->set('profile', $profile);
		$this->set('date', $payrollperiod);
		$this->set('action', $action);
		
		$employees = $this->Income->Employee->find('all', array('conditions' => array('Employee.employmentstatus_id <' => 4)));
		$this->set('employees', $employees);
	}
	
	public function pagibig($payrollperiod = null, $action = null){
		$this->layout = ('text');
		$this->loadModel('Companyprofile');
		$this->loadModel('Payrollperiod');
		$reports = $this->Income->find('all', array('conditions' => array('AND' => array('MONTH(Income.month)' => date('m', strtotime($payrollperiod)), 'YEAR(Income.month)' => date('Y', strtotime($payrollperiod))))));
		$profile = $this->Companyprofile->find('first');
		$this->set('reports', $reports);
		$this->set('profile', $profile);
		$this->set('date', $payrollperiod);
		$this->set('action', $action);
		
		$employees = $this->Income->Employee->find('all', array('conditions' => array('Employee.employmentstatus_id <' => 4)));
		$this->set('employees', $employees);
	}
	
	public function searchtax($id = null, $payroll = null, $income = null){
		$taxfirst = $this->Income->find('first', array(
			'conditions' => array(
				'AND' => array(
					'Income.employee_id' => $id,
					'Payrollperiod.classification_id' => 1,
					'Income.id <' => $income
				)
			),
			'order' => array(
				'Income.id' => 'DESC'
			)
		));
		
		if(isset($this->params['requested'])){
			return $taxfirst;
		}
	}
	
	
	public function encrypted($payrollperiod = null, $bank = null, $branch = null){
		$this->loadModel('Companyprofile');
		$company = $this->Companyprofile->find('first');
		$this->set('company', $company);
		
		$this->layout = ('text');
		$this->loadModel('Otherearning');
		$earningsentries = $this->Otherearning->find('all');
		
		if($bank == 'All'){			
			if($branch == 'All'){
				$incomes = $this->Income->find('all', array(
					'conditions' => array(
						'AND' => array(
							'Income.payrollperiod_id' => $payrollperiod
						)
					),
					'order' => array(
						'Employee.department_id' => 'ASC',
						'Employee.lastname' => 'ASC',
						'Employee.firstname' => 'ASC'
					)
				));
			}else{
				$incomes = $this->Income->find('all', array(
					'conditions' => array(
						'AND' => array(
							'Income.payrollperiod_id' => $payrollperiod,
							'Employee.branch_id' => $branch
						)
					),
					'order' => array(
						'Employee.department_id' => 'ASC',
						'Employee.lastname' => 'ASC',
						'Employee.firstname' => 'ASC'
					)
				));
			}
			
		}else{
			if($branch == 'All'){
				$incomes = $this->Income->find('all', array(
					'conditions' => array(
						'AND' => array(
							'Income.payrollperiod_id' => $payrollperiod,
							'Employee.dem >' => 0
						)
					),
					'order' => array(
						'Employee.department_id' => 'ASC',
						'Employee.lastname' => 'ASC',
						'Employee.firstname' => 'ASC'
					)
				));
				$period = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
				
			}else{
				$incomes = $this->Income->find('all', array(
					'conditions' => array(
						'AND' => array(
							'Income.payrollperiod_id' => $payrollperiod,
							'Employee.dem >' => 0,
							'Employee.branch_id' => $branch
						)
					),
					'order' => array(
						'Employee.department_id' => 'ASC',
						'Employee.lastname' => 'ASC',
						'Employee.firstname' => 'ASC'
					)
				));
				$period = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
			}
			
		}
		
		
		$period = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
		$this->set('period', $period);
		$this->set('incomes', $incomes);
	}
	
	public function encryptedview($payrollperiod = null, $bank = null, $branch = null){
		if($bank == 'All'){			
			if($branch == 'All'){
				$incomes = $this->Income->find('all', array(
					'conditions' => array(
						'AND' => array(
							'Income.payrollperiod_id' => $payrollperiod
						)
					),
					'order' => array(
						'Employee.department_id' => 'ASC',
						'Employee.lastname' => 'ASC',
						'Employee.firstname' => 'ASC'
					)
				));
			}else{
				$incomes = $this->Income->find('all', array(
					'conditions' => array(
						'AND' => array(
							'Income.payrollperiod_id' => $payrollperiod,
							'Employee.branch_id' => $branch
						)
					),
					'order' => array(
						'Employee.department_id' => 'ASC',
						'Employee.lastname' => 'ASC',
						'Employee.firstname' => 'ASC'
					)
				));
			}
			
		}else{
			if($branch == 'All'){
				$incomes = $this->Income->find('all', array(
					'conditions' => array(
						'AND' => array(
							'Income.payrollperiod_id' => $payrollperiod,
							'Employee.dem >' => 0
						)
					),
					'order' => array(
						'Employee.department_id' => 'ASC',
						'Employee.lastname' => 'ASC',
						'Employee.firstname' => 'ASC'
					)
				));
				$period = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
				
			}else{
				$incomes = $this->Income->find('all', array(
					'conditions' => array(
						'AND' => array(
							'Income.payrollperiod_id' => $payrollperiod,
							'Employee.dem >' => 0,
							'Employee.branch_id' => $branch
						)
					),
					'order' => array(
						'Employee.department_id' => 'ASC',
						'Employee.lastname' => 'ASC',
						'Employee.firstname' => 'ASC'
					)
				));
				$period = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
			}
			
		}
		
		
		$period = $this->Income->Payrollperiod->find('first', array('conditions' => array('Payrollperiod.id' => $payrollperiod)));
		$this->set('period', $period);
		
		if(!empty($incomes)){
			$this->set('incomes', $incomes);	
		}
		
		$this->set('bank', $bank);
		$this->set('branch', $branch);
	}
	
}
