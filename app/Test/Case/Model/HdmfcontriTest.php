<?php
App::uses('Hdmfcontri', 'Model');

/**
 * Hdmfcontri Test Case
 *
 */
class HdmfcontriTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.hdmfcontri'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Hdmfcontri = ClassRegistry::init('Hdmfcontri');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Hdmfcontri);

		parent::tearDown();
	}

}
