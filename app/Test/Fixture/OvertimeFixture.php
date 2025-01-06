<?php
/**
 * OvertimeFixture
 *
 */
class OvertimeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'employee_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'payrollperiod_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'rate' => array('type' => 'float', 'null' => false, 'default' => null, 'unsigned' => false),
		'requestddate' => array('type' => 'date', 'null' => false, 'default' => null),
		'referencedate' => array('type' => 'date', 'null' => false, 'default' => null),
		'OTbegindate' => array('type' => 'date', 'null' => true, 'default' => null),
		'OTbegintime' => array('type' => 'time', 'null' => false, 'default' => null),
		'OTenddate' => array('type' => 'date', 'null' => false, 'default' => null),
		'OTendtime' => array('type' => 'time', 'null' => false, 'default' => null),
		'reason' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'OTstatus_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'overtimerate_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'datemodified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'user_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'payrollperiod_id' => 1,
			'rate' => 1,
			'requestddate' => '2016-01-28',
			'referencedate' => '2016-01-28',
			'OTbegindate' => '2016-01-28',
			'OTbegintime' => '08:46:23',
			'OTenddate' => '2016-01-28',
			'OTendtime' => '08:46:23',
			'reason' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'OTstatus_id' => 1,
			'overtimerate_id' => 1,
			'datemodified' => '2016-01-28 08:46:23',
			'user_id' => 1
		),
	);

}
