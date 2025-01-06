<?php
App::uses('Periodinclude', 'Model');

/**
 * Periodinclude Test Case
 *
 */
class PeriodincludeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.periodinclude',
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
		'app.medprovider',
		'app.medbenefit',
		'app.medhospital',
		'app.medcheckup',
		'app.plantype',
		'app.employeebackground',
		'app.employeecontactinfo',
		'app.employeeeducationalbackground',
		'app.leave',
		'app.leavetaken',
		'app.vltype',
		'app.leavestatus',
		'app.loanentry',
		'app.loantype',
		'app.otherductionentry',
		'app.otherdeduction',
		'app.promotion',
		'app.timelog',
		'app.earningrecord',
		'app.otherearningsentry',
		'app.otherearning',
		'app.loanpayment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Periodinclude = ClassRegistry::init('Periodinclude');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Periodinclude);

		parent::tearDown();
	}

}
