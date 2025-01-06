<?php
/**
 * TimelogFixture
 *
 */
class TimelogFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'workschedule_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'date' => array('type' => 'date', 'null' => false, 'default' => null),
		'timein' => array('type' => 'time', 'null' => false, 'default' => null),
		'timeout' => array('type' => 'time', 'null' => false, 'default' => null),
		'late' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'otin' => array('type' => 'time', 'null' => true, 'default' => null),
		'otout' => array('type' => 'time', 'null' => true, 'default' => null),
		'totalot' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'user_id' => 1,
			'workschedule_id' => 1,
			'date' => '2016-02-19',
			'timein' => '04:38:52',
			'timeout' => '04:38:52',
			'late' => 1,
			'otin' => '04:38:52',
			'otout' => '04:38:52',
			'totalot' => 1
		),
	);

}
