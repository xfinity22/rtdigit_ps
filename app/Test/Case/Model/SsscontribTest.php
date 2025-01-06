<?php
App::uses('Ssscontrib', 'Model');

/**
 * Ssscontrib Test Case
 *
 */
class SsscontribTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.ssscontrib'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Ssscontrib = ClassRegistry::init('Ssscontrib');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Ssscontrib);

		parent::tearDown();
	}

}
