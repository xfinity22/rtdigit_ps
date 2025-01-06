<?php
/**
 * PromotionFixture
 *
 */
class PromotionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'position' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'datefrom' => array('type' => 'date', 'null' => false, 'default' => null),
		'dateend' => array('type' => 'date', 'null' => true, 'default' => null),
		'salary' => array('type' => 'decimal', 'null' => false, 'default' => null, 'length' => '10,2', 'unsigned' => false),
		'adjustment' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'increase' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
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
			'position' => 'Lorem ipsum dolor sit amet',
			'datefrom' => '2016-02-17',
			'dateend' => '2016-02-17',
			'salary' => '',
			'adjustment' => 1,
			'increase' => 1
		),
	);

}
