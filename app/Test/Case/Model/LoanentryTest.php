<?php
App::uses('Loanentry', 'Model');

/**
 * Loanentry Test Case
 *
 */
class LoanentryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.loanentry',
		'app.loantype',
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
		'app.payrollperiod',
		'app.payrolltype',
		'app.classification',
		'app.payfrequency',
		'app.deduction',
		'app.user',
		'app.userstatus',
		'app.usertype',
		'app.late',
		'app.overtime',
		'app.otstatus',
		'app.overtimerate',
		'app.overtimetype',
		'app.otherductionentry',
		'app.otherdeduction',
		'app.employeebackground',
		'app.employeecontactinfo',
		'app.employeeeducationalbackground',
		'app.leave',
		'app.leavetaken',
		'app.vltype',
		'app.leavestatus'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Loanentry = ClassRegistry::init('Loanentry');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Loanentry);

		parent::tearDown();
	}

}
