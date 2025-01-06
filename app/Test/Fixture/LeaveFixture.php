<?php
/**
 * LeaveFixture
 *
 */
class LeaveFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'employee_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'vactionleave' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'sickleave' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'total' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
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
			'employee_id' => 1,
			'vactionleave' => 1,
			'sickleave' => 1,
			'total' => 1
		),
	);

}
