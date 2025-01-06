<?php
App::uses('Medprovider', 'Model');

/**
 * Medprovider Test Case
 *
 */
class MedproviderTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.medprovider'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Medprovider = ClassRegistry::init('Medprovider');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Medprovider);

		parent::tearDown();
	}

}
