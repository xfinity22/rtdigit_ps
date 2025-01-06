<?php
App::uses('Lateundertimebase', 'Model');

/**
 * Lateundertimebase Test Case
 *
 */
class LateundertimebaseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.lateundertimebase',
		'app.parameter',
		'app.lateundertimebasis'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Lateundertimebase = ClassRegistry::init('Lateundertimebase');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Lateundertimebase);

		parent::tearDown();
	}

}
