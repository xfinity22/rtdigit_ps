<?php
App::uses('Otherearning', 'Model');

/**
 * Otherearning Test Case
 *
 */
class OtherearningTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.otherearning'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Otherearning = ClassRegistry::init('Otherearning');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Otherearning);

		parent::tearDown();
	}

}
