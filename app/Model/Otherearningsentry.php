<?php
App::uses('AppModel', 'Model');
/**
 * Otherearningsentry Model
 *
 * @property Payrollperiod $Payrollperiod
 * @property Employee $Employee
 * @property Otherearning $Otherearning
 */
class Otherearningsentry extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Payrollperiod' => array(
			'className' => 'Payrollperiod',
			'foreignKey' => 'payrollperiod_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Employee' => array(
			'className' => 'Employee',
			'foreignKey' => 'employee_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Otherearning' => array(
			'className' => 'Otherearning',
			'foreignKey' => 'otherearning_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Earningrecord' => array(
			'className' => 'Earningrecord',
			'foreignKey' => 'otherearning_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
