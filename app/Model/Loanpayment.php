<?php
App::uses('AppModel', 'Model');
/**
 * Loanpayment Model
 *
 * @property Payrollperiod $Payrollperiod
 * @property Loantype $Loantype
 */
class Loanpayment extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
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
		'Loantype' => array(
			'className' => 'Loantype',
			'foreignKey' => 'loantype_id',
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
		'Loanentry' => array(
			'className' => 'Loanentry',
			'foreignKey' => 'loanentry_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
