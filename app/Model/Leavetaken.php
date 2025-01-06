<?php
App::uses('AppModel', 'Model');
/**
 * Leavetaken Model
 *
 * @property Employee $Employee
 * @property Vltype $Vltype
 * @property Leavestatus $Leavestatus
 */
class Leavetaken extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public function beforeSave($options = array()){
		if($this->data['Leavetaken']['day'] != 0.5){
			$month_start = date('Y-m-d', strtotime($from = $this->data['Leavetaken']['date']));
			$month_end = date('Y-m-d', strtotime($from = $this->data['Leavetaken']['dateto']));
			$days = 0;
			for ($i=$month_start; $i<=$month_end; $var++){
				$i = date('Y-m-d', strtotime($i .' +1 day'));
				$days++;			
			}
			$this->data['Leavetaken']['day'] = $days;
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
		'vltype_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'date' => array(
			'date' => array(
				'rule' => array('date'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'dateto' => array(
			'date' => array(
				'rule' => array('date'),
				'message' => 'Invalid',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'leavestatus_id' => array(
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
		'Vltype' => array(
			'className' => 'Vltype',
			'foreignKey' => 'vltype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Leavestatus' => array(
			'className' => 'Leavestatus',
			'foreignKey' => 'leavestatus_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
