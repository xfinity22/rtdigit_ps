<?php
App::uses('AppModel', 'Model');
/**
 * Overtime Model
 *
 * @property Employee $Employee
 * @property Payrollperiod $Payrollperiod
 * @property OTstatus $OTstatus
 * @property Overtimerate $Overtimerate
 * @property User $User
 */
class Overtime extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public function beforeSave($options = array()){
		if(empty($this->data['Overtime']['referencedate'])){
			$to_time = strtotime($this->data['Overtime']['OTendtime']);
			$from_time = strtotime($this->data['Overtime']['OTbegintime']);
			$totalminutes=  round(abs($to_time - $from_time) / 60, 2);
			$this->data['Overtime']['ottotalhours'] =  floor($totalminutes / 60);
			$this->data['Overtime']['ottotalminutes']  =  $totalminutes % 60;
			
			if($this->data['Overtime']['ottotalhours'] > 8){
				$this->data['Overtime']['ottotalhours'] = 8;
				$this->data['Overtime']['ottotalminutes'] = 0;
			}
			
			$this->data['Overtime']['otamount']  = (($this->data['Overtime']['rate'] / 8 / 60 ) * $this->data['Overtime']['otaddon']) * $totalminutes;
		}else{
			$month_start = date('Y-m-d', strtotime($from = $this->data['Overtime']['requestddate']));
			$month_end = date('Y-m-d', strtotime($from = $this->data['Overtime']['referencedate']));
			$days = 0;
			for ($i=$month_start; $i<=$month_end; $var++){
				$i = date('Y-m-d', strtotime($i .' +1 day'));
				$days++;			
			}
			$this->data['Overtime']['day'] = $days;
			
			$this->data['Overtime']['otamount']  = ($this->data['Overtime']['rate']) * $this->data['Overtime']['otaddon'] * $this->data['Overtime']['day'];
		}
		
		
		
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
		'rate' => array(
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
		'Otstatus' => array(
			'className' => 'Otstatus',
			'foreignKey' => 'Otstatus_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Overtimerate' => array(
			'className' => 'Overtimerate',
			'foreignKey' => 'overtimerate_id',
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
}
