<?php
/**
 * ParameterFixture
 *
 */
class ParameterFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'graceperiod' => array('type' => 'decimal', 'null' => false, 'default' => '0.00', 'length' => '10,2', 'unsigned' => false),
		'minimumOT' => array('type' => 'decimal', 'null' => false, 'default' => '0.00', 'length' => '10,2', 'unsigned' => false),
		'standardworkhours' => array('type' => 'decimal', 'null' => false, 'default' => '0.00', 'length' => '10,2', 'unsigned' => false),
		'taxexemptedrate' => array('type' => 'decimal', 'null' => false, 'default' => '0.00', 'length' => '10,2', 'unsigned' => false),
		'maxhdmfcontri' => array('type' => 'decimal', 'null' => false, 'default' => '0.00', 'length' => '10,2', 'unsigned' => false),
		'maxnontaxincentive' => array('type' => 'decimal', 'null' => false, 'default' => '0.00', 'length' => '10,2', 'unsigned' => false),
		'vlpermonth' => array('type' => 'decimal', 'null' => false, 'default' => '0.00', 'length' => '10,2', 'unsigned' => false),
		'slpermonth' => array('type' => 'decimal', 'null' => false, 'default' => '0.00', 'length' => '10,2', 'unsigned' => false),
		'nextyeartoearnleave' => array('type' => 'decimal', 'null' => false, 'default' => '0.00', 'length' => '10,2', 'unsigned' => false),
		'nextmonthtoearnleave' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'logo' => array('type' => 'string', 'null' => false, 'default' => '0', 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'lateundertimebase_id' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'graceperiod' => '',
			'minimumOT' => '',
			'standardworkhours' => '',
			'taxexemptedrate' => '',
			'maxhdmfcontri' => '',
			'maxnontaxincentive' => '',
			'vlpermonth' => '',
			'slpermonth' => '',
			'nextyeartoearnleave' => '',
			'nextmonthtoearnleave' => '',
			'logo' => 'Lorem ipsum dolor sit amet',
			'lateundertimebase_id' => 1
		),
	);

}
