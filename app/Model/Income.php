<?php
App::uses('AppModel', 'Model');
/**
 * Income Model
 *
 * @property Employee $Employee
 * @property Payrollperiod $Payrollperiod
 * @property Ratetype $Ratetype
 * @property User $User
 */
class Income extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public function beforeSave($options = array()){
		if(!empty($this->data['Income']['ratetype'] == 2)){
			$this->data['Income']['grossincome'] = $this->data['Income']['rate'] *  $this->data['Income']['dayswork'];
		}else{
			if(!empty($this->data['Income']['absent'])){
				$this->data['Income']['absentamount'] = $this->data['Income']['rate'] * $this->data['Income']['absent'];
			}
		}
			
			//$ =$this->data['Income']['hour'] * ($this->data['Income']['rate'] / 8);
			//$minute =$this->data['Income']['minutes'] * (($this->data['Income']['rate'] / 8) / 60);
			
			
			//$this->data['Income']['amount'] = $hour + $minute;	
		
		
		
	}
 
	public $validate = array(
		'employee_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'payrollperiod_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ratetype' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Employee' => array(
			'className' => 'Employee',
			'foreignKey' => 'employee_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Payrollperiod' => array(
			'className' => 'Payrollperiod',
			'foreignKey' => 'payrollperiod_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ratetype' => array(
			'className' => 'Ratetype',
			'foreignKey' => 'ratetype',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public $hasMany = array(
		'Earningrecord' => array(
			'className' => 'Earningrecord',
			'foreignKey' => 'payrollperiod_id',
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
			'foreignKey' => 'payrollperiod_id',
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
			'foreignKey' => 'payrollperiod_id',
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
			'foreignKey' => 'payrollperiod_id',
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
