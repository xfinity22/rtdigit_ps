<?php
App::uses('Overtime', 'Model');

/**
 * Overtime Test Case
 *
 */
class OvertimeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.overtime',
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
		'app.otherductionentry',
		'app.otherdeduction',
		'app.employeebackground',
		'app.employeecontactinfo',
		'app.employeeeducationalbackground',
		'app.leave',
		'app.leavetaken',
		'app.vltype',
		'app.leavestatus',
		'app.loanentry',
		'app.loantype',
		'app.otstatus',
		'app.overtimerate',
		'app.overtimetype'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Overtime = ClassRegistry::init('Overtime');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Overtime);

		parent::tearDown();
	}

}