<?php
App::uses('Otstatus', 'Model');

/**
 * Otstatus Test Case
 *
 */
class OtstatusTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.otstatus'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Otstatus = ClassRegistry::init('Otstatus');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Otstatus);

		parent::tearDown();
	}

}
