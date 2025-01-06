<?php
App::uses('Lateundertimebasise', 'Model');

/**
 * Lateundertimebasise Test Case
 *
 */
class LateundertimebasiseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.lateundertimebasise'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Lateundertimebasise = ClassRegistry::init('Lateundertimebasise');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Lateundertimebasise);

		parent::tearDown();
	}

}
