<?php
App::uses('AppModel', 'Model');

class Employee extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public function beforeSave($options = array()){
		
		if(empty($this->data['Employee']['save'])){
			$this->data['Employee']['fullname'] = $this->data['Employee']['firstname'] . ' ' . $this->data['Employee']['middlename'] . ' ' . $this->data['Employee']['lastname'];
		}
		
		if(!empty($this->data['Employee']['ratetype_id'])){
			if($this->data['Employee']['ratetype_id'] == 1){
				if(!empty($this->data['Employee']['monthlyrate'])){
					$this->data['Employee']['dailyrate'] = $this->data['Employee']['monthlyrate'] / 26;
					$this->data['Employee']['hourlyrate'] = $this->data['Employee']['dailyrate'] / 8;
				}
			}else if($this->data['Employee']['ratetype_id'] == 2){
				if(!empty($this->data['Employee']['dailyrate'])){
					$this->data['Employee']['hourlyrate'] = $this->data['Employee']['dailyrate'] / 8;
					$this->data['Employee']['monthlyrate'] = $this->data['Employee']['dailyrate'] * 26;
				}
			}
		}else{
			$this->data['Employee']['ratetype_id'] = 2;
			
		}
	}
	
 
	public $validate = array(
			
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Workschedule' => array(
			'className' => 'Workschedule',
			'foreignKey' => 'workschedule_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Division' => array(
			'className' => 'Division',
			'foreignKey' => 'division_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Department' => array(
			'className' => 'Department',
			'foreignKey' => 'department_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Costcenter' => array(
			'className' => 'Costcenter',
			'foreignKey' => 'costcenter_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Jobtitle' => array(
			'className' => 'Jobtitle',
			'foreignKey' => 'jobtitle_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Employmentstatus' => array(
			'className' => 'Employmentstatus',
			'foreignKey' => 'employmentstatus_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Employeetype' => array(
			'className' => 'Employeetype',
			'foreignKey' => 'employeetype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Bank' => array(
			'className' => 'Bank',
			'foreignKey' => 'bank_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Withholdingtax' => array(
			'className' => 'Withholdingtax',
			'foreignKey' => 'withholdingtax_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ratetype' => array(
			'className' => 'Ratetype',
			'foreignKey' => 'ratetype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Payfrequency' => array(
			'className' => 'Payfrequency',
			'foreignKey' => 'payfrequency_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Medprovider' => array(
			'className' => 'Medprovider',
			'foreignKey' => 'medprovider_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Plantype' => array(
			'className' => 'Plantype',
			'foreignKey' => 'plantype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Branch' => array(
			'className' => 'Branch',
			'foreignKey' => 'branch_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Deduction' => array(
			'className' => 'Deduction',
			'foreignKey' => 'employee_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Employeebackground' => array(
			'className' => 'Employeebackground',
			'foreignKey' => 'employee_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Employeecontactinfo' => array(
			'className' => 'Employeecontactinfo',
			'foreignKey' => 'employee_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Employeeeducationalbackground' => array(
			'className' => 'Employeeeducationalbackground',
			'foreignKey' => 'employee_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Income' => array(
			'className' => 'Income',
			'foreignKey' => 'employee_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Late' => array(
			'className' => 'Late',
			'foreignKey' => 'employee_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Leave' => array(
			'className' => 'Leave',
			'foreignKey' => 'employee_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Leavetaken' => array(
			'className' => 'Leavetaken',
			'foreignKey' => 'employee_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Loanentry' => array(
			'className' => 'Loanentry',
			'foreignKey' => 'employee_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Otherductionentry' => array(
			'className' => 'Otherductionentry',
			'foreignKey' => 'employee_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Overtime' => array(
			'className' => 'Overtime',
			'foreignKey' => 'employee_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Promotion' => array(
			'className' => 'Promotion',
			'foreignKey' => 'employee_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Timelog' => array(
			'className' => 'Timelog',
			'foreignKey' => 'employee_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Earningrecord' => array(
			'className' => 'Earningrecord',
			'foreignKey' => 'employee_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Loanpayment' => array(
			'className' => 'Loanpayment',
			'foreignKey' => 'employee_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Periodinclude' => array(
			'className' => 'Periodinclude',
			'foreignKey' => 'employee_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Topsheet' => array(
			'className' => 'Topsheet',
			'foreignKey' => 'employee_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
