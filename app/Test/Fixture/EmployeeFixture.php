<?php
/**
 * EmployeeFixture
 *
 */
class EmployeeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'employeeno' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'unique'),
		'workschedule_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'division_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'department_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'fullname' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'lastname' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'middlename' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'firstname' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'costcenter_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'jobtitle_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'datehired' => array('type' => 'date', 'null' => false, 'default' => null),
		'dateregularized' => array('type' => 'date', 'null' => true, 'default' => null),
		'daterigned' => array('type' => 'date', 'null' => true, 'default' => null),
		'dateterminated' => array('type' => 'date', 'null' => true, 'default' => null),
		'employmentstatus_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'employeetype_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'faceID' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'sssnumber' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 40, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'pagibignumber' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 40, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'philhealthnumber' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 40, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'bank_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'payrollaccountnumber' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'TIN' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'withholdingtax_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'ratetype_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'payfrequency_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'monthlyrate' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'dailyrate' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'hourlyrate' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'ecola' => array('type' => 'biginteger', 'null' => true, 'default' => null, 'unsigned' => false),
		'hdmf' => array('type' => 'biginteger', 'null' => true, 'default' => null, 'unsigned' => false),
		'allowance' => array('type' => 'decimal', 'null' => true, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'picture' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'employeeno' => array('column' => 'employeeno', 'unique' => 1)
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
			'employeeno' => 1,
			'workschedule_id' => 1,
			'division_id' => 1,
			'department_id' => 1,
			'fullname' => 'Lorem ipsum dolor sit amet',
			'lastname' => 'Lorem ipsum dolor sit amet',
			'middlename' => 'Lorem ipsum dolor sit amet',
			'firstname' => 'Lorem ipsum dolor sit amet',
			'costcenter_id' => 1,
			'jobtitle_id' => 1,
			'datehired' => '2016-01-28',
			'dateregularized' => '2016-01-28',
			'daterigned' => '2016-01-28',
			'dateterminated' => '2016-01-28',
			'employmentstatus_id' => 1,
			'employeetype_id' => 1,
			'faceID' => 'Lorem ipsum dolor sit amet',
			'sssnumber' => 'Lorem ipsum dolor sit amet',
			'pagibignumber' => 'Lorem ipsum dolor sit amet',
			'philhealthnumber' => 'Lorem ipsum dolor sit amet',
			'bank_id' => 1,
			'payrollaccountnumber' => 'Lorem ipsum dolor sit amet',
			'TIN' => 'Lorem ipsum dolor sit amet',
			'withholdingtax_id' => 1,
			'ratetype_id' => 1,
			'payfrequency_id' => 1,
			'monthlyrate' => 1,
			'dailyrate' => 1,
			'hourlyrate' => 1,
			'ecola' => '',
			'hdmf' => '',
			'allowance' => '',
			'picture' => 'Lorem ipsum dolor sit amet'
		),
	);

}
