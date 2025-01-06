<?php
App::uses('Otherductionentry', 'Model');

/**
 * Otherductionentry Test Case
 *
 */
class OtherductionentryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.otherductionentry',
		'app.payrollperiod',
		'app.payrolltype',
		'app.classification',
		'app.payfrequency',
		'app.employee',
		'app.workschedule',
		'app.division',
		'app.department',
		'app.costcenter',
		'app.jobtitle',
		'app.employmentstatus',
		'app.employeetype',
		'app.bank',
		'app.withholdingtax',
		'app.taxdescription',
		'app.ratetype',
		'app.income',
		'app.user',
		'app.userstatus',
		'app.usertype',
		'app.deduction',
		'app.late',
		'app.overtime',
		'app.otstatus',
		'app.overtimerate',
		'app.overtimetype',
		'app.employeebackground',
		'app.employeecontactinfo',
		'app.employeeeducationalbackground',
		'app.leave',
		'app.leavetaken',
		'app.vltype',
		'app.leavestatus',
		'app.loanentry',
		'app.loantype',
		'app.otherdeduction'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Otherductionentry = ClassRegistry::init('Otherductionentry');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Otherductionentry);

		parent::tearDown();
	}

}
