<?php
App::uses('Medbenefit', 'Model');

/**
 * Medbenefit Test Case
 *
 */
class MedbenefitTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.medbenefit',
		'app.medproviders'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Medbenefit = ClassRegistry::init('Medbenefit');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Medbenefit);

		parent::tearDown();
	}

}
