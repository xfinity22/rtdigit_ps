<?php
App::uses('Philhealth', 'Model');

/**
 * Philhealth Test Case
 *
 */
class PhilhealthTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.philhealth'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Philhealth = ClassRegistry::init('Philhealth');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Philhealth);

		parent::tearDown();
	}

}
