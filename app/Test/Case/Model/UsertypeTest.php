<?php
App::uses('Usertype', 'Model');

/**
 * Usertype Test Case
 *
 */
class UsertypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.usertype',
		'app.user',
		'app.userstatus',
		'app.deduction',
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
		'app.late',
		'app.otherductionentry',
		'app.otherdeduction',
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
		'app.loantype'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Usertype = ClassRegistry::init('Usertype');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Usertype);

		parent::tearDown();
	}

}
