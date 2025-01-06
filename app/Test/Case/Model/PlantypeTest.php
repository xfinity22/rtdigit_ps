<?php
App::uses('Plantype', 'Model');

/**
 * Plantype Test Case
 *
 */
class PlantypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.plantype'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Plantype = ClassRegistry::init('Plantype');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Plantype);

		parent::tearDown();
	}

}
