<?php
/**
 * OtherearningsentryFixture
 *
 */
class OtherearningsentryFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'payrollperiod_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'employee_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'otherearning_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'amount' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'payrollperiod_id' => 1,
			'employee_id' => 1,
			'otherearning_id' => 1,
			'amount' => ''
		),
	);

}