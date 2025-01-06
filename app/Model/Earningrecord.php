<?php
App::uses('AppModel', 'Model');
/**
 * Earningrecord Model
 *
 * @property Otherearningsentry $Otherearningsentry
 * @property Payrollperiod $Payrollperiod
 */
class Earningrecord extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Otherearningsentry' => array(
			'className' => 'Otherearningsentry',
			'foreignKey' => 'otherearningsentry_id',
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
		'Employee' => array(
			'className' => 'Employee',
			'foreignKey' => 'employee_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
