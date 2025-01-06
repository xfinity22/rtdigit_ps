<?php
App::uses('Jobtitle', 'Model');

/**
 * Jobtitle Test Case
 *
 */
class JobtitleTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.jobtitle',
		'app.employee',
		'app.workschedule',
		'app.division',
		'app.department',
		'app.costcenter',
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
		$this->Jobtitle = ClassRegistry::init('Jobtitle');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Jobtitle);

		parent::tearDown();
	}

}