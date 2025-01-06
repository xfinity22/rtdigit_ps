<?php
/**
 * LoanentryFixture
 *
 */
class LoanentryFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'loantype_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'employee_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'loandate' => array('type' => 'date', 'null' => false, 'default' => null),
		'amount' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'deductionperpayday' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'startdeduction' => array('type' => 'date', 'null' => false, 'default' => null),
		'nextinstallment' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'loantype_id' => 1,
			'employee_id' => 1,
			'loandate' => '2016-01-28',
			'amount' => '',
			'deductionperpayday' => 1,
			'startdeduction' => '2016-01-28',
			'nextinstallment' => 1
		),
	);

}
