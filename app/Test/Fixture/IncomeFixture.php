<?php
/**
 * IncomeFixture
 *
 */
class IncomeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'employee_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'payrollperiod_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'rate' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'ratetype_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'dayswork' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'grossincome' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'adjustments' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'deminimis' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'allowance' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'cola' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'datemodified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			
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
			'employee_id' => 1,
			'payrollperiod_id' => 1,
			'rate' => '',
			'ratetype_id' => 1,
			'dayswork' => 1,
			'grossincome' => '',
			'adjustments' => '',
			'deminimis' => '',
			'allowance' => '',
			'cola' => '',
			'datemodified' => '2016-01-28 08:45:00',
			'user_id' => 1
		),
	);

}
