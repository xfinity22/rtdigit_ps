<?php
/**
 * PayrollperiodFixture
 *
 */
class PayrollperiodFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'code' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'from' => array('type' => 'date', 'null' => false, 'default' => null),
		'until' => array('type' => 'date', 'null' => false, 'default' => null),
		'withholdingtax' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 3, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'sss' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 3, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'philhealth' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 3, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pagibig' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 3, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'financialyear' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'period' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'payrolltype_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'classification_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'payfrequency_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'code' => 'Lorem ip',
			'from' => '2016-01-28',
			'until' => '2016-01-28',
			'withholdingtax' => 'L',
			'sss' => 'L',
			'philhealth' => 'L',
			'pagibig' => 'L',
			'financialyear' => 1,
			'period' => 1,
			'payrolltype_id' => 1,
			'classification_id' => 1,
			'payfrequency_id' => 1
		),
	);

}
