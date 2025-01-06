<?php
App::uses('Holidaytype', 'Model');

/**
 * Holidaytype Test Case
 *
 */
class HolidaytypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.holidaytype',
		'app.holiday'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Holidaytype = ClassRegistry::init('Holidaytype');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Holidaytype);

		parent::tearDown();
	}

}
