<?php
App::uses('Timelog', 'Model');

/**
 * Timelog Test Case
 *
 */
class TimelogTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.timelog',
		'app.user',
		'app.userstatus',
		'app.usertype',
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
		'app.loantype',
		'app.promotion'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Timelog = ClassRegistry::init('Timelog');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Timelog);

		parent::tearDown();
	}

}
