<?php
$loguser = $this->requestAction('users/loggeduser');
$types = $this->requestAction('employeetypes/relatedvariables');
$divisions = $this->requestAction('divisions/relatedvariables');
$departments = $this->requestAction('departments/relatedvariables');
$user = $this->requestAction('users/loggeduser/');

if($user['User']['usertype_id'] == 4){ ?>
	<div id='cssmenu'>
	<ul>
		<li><?php echo $this->Html->link('Dashboard', array('controller' => 'employees', 'action' => 'dashboard', $user['User']['employeeno'])); ?></li>
		<li><?php echo $this->Html->link('My Profile', array('controller' => 'employees', 'action' => 'view', $user['User']['employeeno'])); ?></li>
		<li><?php echo $this->Html->link('View Paysllip', array('controller' => 'payrollperiods', 'action' => 'listpayroll', $user['User']['employeeno'])); ?></li>
		<li class='active has-sub'><a href='#'><span>Leaves</span></a>
			<ul style="margin-left: -70px;">
				<li class='has-sub'><?php echo $this->Html->link('File Leave', array('controller' => 'leavetakens', 'action' => 'add', $user['User']['employeeno'])); ?>
					<ul>
						<li><?php echo $this->Html->link('View All', array('controller' => 'leaves', 'action' => 'view', $user['User']['employeeno'])); ?></li>
					</ul>
				</li>
			</ul>
		</li>
		<li><?php echo $this->Html->link('Change Password', array('controller' => 'users', 'action' => 'changepassword', $user['User']['id'])); ?></li>
		<li><?php echo $this->Html->link('Log out', array('controller' => 'users', 'action' => 'logout')); ?></li>
	</ul>
	</div>
	
<?php 
}else{ ?>
<div id='cssmenu'>
	<ul>
		<li><?php echo $this->Html->link('Home', array('controller' => 'companyprofiles', 'action' => 'view')); ?></li>
		<li class='active has-sub'><a href='#'><span>Master Data</span></a>
			<ul style="margin-left: -104px;">
				<li class='has-sub'><?php echo $this->Html->link('Employees', array('controller' => 'employees', 'action' => 'index')); ?>
					<ul>
						<li><?php echo $this->Html->link('Add', array('controller' => 'employees', 'action' => 'add')); ?></li>
						<li><?php echo $this->Html->link('Print', array('controller' => 'employees', 'action' => 'listdept')); ?></li>
						<li><?php echo $this->Html->link('SSS EPF', array('controller' => 'employees', 'action' => 'sssepf')); ?></li>
						
					</ul>
				</li>
				<li class='has-sub'><?php echo $this->Html->link('Accounts', array('controller' => 'users', 'action' => 'index')); ?>
					<ul>
						<li><?php echo $this->Html->link('Add', array('controller' => 'users', 'action' => 'add')); ?></li>
						<li><?php echo $this->Html->link('All', array('controller' => 'users', 'action' => 'index')); ?></li>
						
					</ul>
				</li>
				
				<li class='has-sub'><?php echo $this->Html->link('Divisions', array('controller' => 'divisions', 'action' => 'index')); ?>
					<ul>
						<li><?php echo $this->Html->link('Add', array('controller' => 'divisions', 'action' => 'add')); ?></li>
					
					</ul>
				</li>
				
				<li class='has-sub'><?php echo $this->Html->link('Departments', array('controller' => 'departments', 'action' => 'index')); ?>
					<ul>
						<li><?php echo $this->Html->link('Add', array('controller' => 'departments', 'action' => 'add')); ?></li>
					</ul>
				</li>
				
				<li class='has-sub'><?php echo $this->Html->link('Branches', array('controller' => 'branches', 'action' => 'index')); ?>
					<ul>
						<li><?php echo $this->Html->link('Add', array('controller' => 'branches', 'action' => 'add')); ?></li>
					
					</ul>
				</li>
				
				<li class='has-sub'><?php echo $this->Html->link('Employee Type', array('controller' => 'employeetypes', 'action' => 'index')); ?>
					<ul>
						<li><?php echo $this->Html->link('Add', array('controller' => 'employeetypes', 'action' => 'add')); ?></li>
					</ul>
				</li>
				<li class='has-sub'><?php echo $this->Html->link('Job Titles', array('controller' => 'jobtitles', 'action' => 'index')); ?>
					<ul>
						<li><?php echo $this->Html->link('Add', array('controller' => 'jobtitles', 'action' => 'add')); ?></li>
					</ul>
				</li>
				<li class='has-sub'><?php echo $this->Html->link('Work Schedules', array('controller' => 'workschedules', 'action' => 'index')); ?>
					<ul>
						<li><?php echo $this->Html->link('Add', array('controller' => 'workschedules', 'action' => 'add')); ?></li>
					</ul>
				</li>
				<li class='has-sub'><?php echo $this->Html->link('Banks', array('controller' => 'banks', 'action' => 'index')); ?>
					<ul>
						<li><?php echo $this->Html->link('Add', array('controller' => 'banks', 'action' => 'add')); ?></li>
					</ul>
				</li>
				<li class='has-sub'><?php echo $this->Html->link('Holidays', array('controller' => 'holidays', 'action' => 'index')); ?>
					<ul>
						<li><?php echo $this->Html->link('Add', array('controller' => 'holidays', 'action' => 'add')); ?></li>
					</ul>
				</li>
				<li class='has-sub'><?php echo $this->Html->link('Other Earning', array('controller' => 'otherearnings', 'action' => 'index')); ?>
					<ul>
						<li><?php echo $this->Html->link('Add', array('controller' => 'otherearnings', 'action' => 'add')); ?></li>
					</ul>
				</li>
				<li class='has-sub'><?php echo $this->Html->link('Other Deduction', array('controller' => 'otherdeductions', 'action' => 'index')); ?>
					<ul>
						<li><?php echo $this->Html->link('Add', array('controller' => 'otherdeductions', 'action' => 'add')); ?></li>
					</ul>
				</li>
				<?php /* ?>
				<li class='has-sub'><?php echo $this->Html->link('Cost Centers', array('controller' => 'costcenters', 'action' => 'index')); ?>
					<ul>
						<li><?php echo $this->Html->link('Add', array('controller' => 'costcenters', 'action' => 'add')); ?></li>
					</ul>
				</li>
				<?php */ ?> 
				<li class='has-sub'><?php echo $this->Html->link('Medical Data', array('controller' => 'medhospitals', 'action' => 'index')); ?>
					<ul>
						<li><?php echo $this->Html->link('HMO Providers', array('controller' => 'medproviders', 'action' => 'index')); ?>
							<ul>
								<li><?php echo $this->Html->link('Add', array('controller' => 'medproviders', 'action' => 'add')); ?></li>
							</ul>
						</li>
						<li><?php echo $this->Html->link('Hospitals', array('controller' => 'medhospitals', 'action' => 'index')); ?>
							<ul>
								<li><?php echo $this->Html->link('Add', array('controller' => 'medhospitals', 'action' => 'add')); ?></li>
							</ul>
						</li>
						<?php /*
						<li><?php echo $this->Html->link('Benefits', array('controller' => 'medbenefits', 'action' => 'index')); ?>
							<ul>
								<li><?php echo $this->Html->link('Add', array('controller' => 'medbenefits', 'action' => 'add')); ?></li>
							</ul>
						</li>
						
						*/ ?>
						<li><?php echo $this->Html->link('Type of Plan', array('controller' => 'plantypes', 'action' => 'index')); ?>
							<ul>
								<li><?php echo $this->Html->link('Add', array('controller' => 'plantypes', 'action' => 'add')); ?></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class='has-sub'><li class='last'><?php echo $this->Html->link('Payroll Parameters', array('controller' => 'parameters', 'action' => 'add')); ?></li>
				<li class='has-sub'><li class='last'><?php echo $this->Html->link('Company Profiles', array('controller' => 'companyprofiles', 'action' => 'view')); ?></li>
			</ul>
		</li>
		
		<li class='active has-sub'><a href='#'><span>Tables</span></a>
			<ul style=" margin-left: -72px;">
				<li><?php echo $this->Html->link('Overtime Table', array('controller' => 'overtimerates', 'action' => 'index')); ?></li>
				
				<li><?php echo $this->Html->link('SSS Table', array('controller' => 'ssscontribs', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link('Philhealth Table', array('controller' => 'philhealths', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link('HDMF Table', array('controller' => 'hdmfcontris', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link('Withholding Tax Table', array('controller' => 'withholdingtaxes', 'action' => 'index')); ?></li>
			</ul>
		</li>
		
		<li class='active has-sub'><a href='#'><span>Payroll</span></a>
			<ul style=" margin-left: -74px;">
				<li class='has-sub'><?php echo $this->Html->link('Payroll Periods', array('controller' => 'payrollperiods', 'action' => 'index')); ?>
					<ul>
						<li><?php echo $this->Html->link('Add', array('controller' => 'payrollperiods', 'action' => 'add')); ?></li>
					</ul>
				</li>
				
				<?php
				/* 
				<li class='has-sub'><?php echo $this->Html->link('Process Payroll', array('controller' => 'incomes', 'action' => 'processall')); ?>
				<?php
					if(!empty($types)){
						echo '<ul>';
						foreach ($types as $type):
								echo '<li>';
									echo $this->Html->link(__($type['Employeetype']['name']), array('controller' => 'incomes', 'action' => 'processall',1, $type['Employeetype']['id']));
								echo '</li>';						
						endforeach;
						echo '</ul>';
					}					
				?>					
				</li>
				<li class='has-sub'><?php echo $this->Html->link('Process By Division ', array('controller' => 'payrollperiods', 'action' => 'index')); ?>
				<?php
					if(!empty($divisions)){
						echo '<ul>';
						foreach ($divisions as $type):
								echo '<li>';
									echo $this->Html->link(__($type['Division']['name']), array('controller' => 'incomes', 'action' => 'processall', 2, $type['Division']['id']));
								echo '</li>';						
						endforeach;
						echo '</ul>';
					}					
				?>					
				</li>
				
				<li class='has-sub'><?php echo $this->Html->link('Process By Department ', array('controller' => 'payrollperiods', 'action' => 'index')); ?>
				<?php
					if(!empty($departments)){
						echo '<ul>';
						foreach ($departments as $type):
								echo '<li>';
									echo $this->Html->link(__($type['Department']['name']), array('controller' => 'incomes', 'action' => 'processall', 3, $type['Department']['id']));
								echo '</li>';						
						endforeach;
						echo '</ul>';
					}					
				?>					
				</li>
				*/ ?>
				
				<li><?php echo $this->Html->link(__('Process Payroll'), array('controller' => 'periodincludes', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('Finalize / View'), array('controller' => 'divisions', 'action' => 'index2', $loguser['User']['payrollperiod'])); ?></li>
				<li><?php echo $this->Html->link(__('Special'), array('controller' => 'payrollperiods', 'action' => 'add2', $loguser['User']['payrollperiod'])); ?></li>
			</ul>
		</li>
		
		<li class='active has-sub'><a href='#'><span>Loans / Deductions</span></a>
			<ul style=" margin-left: -149px;">
				<li class='has-sub'><?php echo $this->Html->link('Loan / Deductions Types', array('controller' => 'loantypes', 'action' => 'index')); ?>
					<ul>
						<li><?php echo $this->Html->link('Add', array('controller' => 'loantypes', 'action' => 'add')); ?></li>
					</ul>
				</li>
				<li class='has-sub'><?php echo $this->Html->link('Active Loans', array('controller' => 'loanentries', 'action' => 'index')); ?>
					<ul>
						<li><?php echo $this->Html->link('Add', array('controller' => 'loanentries', 'action' => 'add')); ?></li>
					</ul>			
				</li>
				<li><?php echo $this->Html->link('Inactive / Paid Loans', array('controller' => 'loanentries', 'action' => 'inactiveloans')); ?>
			</ul>
		</li>
		
		
		<li class='active has-sub'><a href='#'><span>Reports</span></a>
			<ul style=" margin-left: -78px;">
				<li><?php echo $this->Html->link('Withholding Tax Summary', array('controller' => 'incomes', 'action' => 'selectpayrollperiod2', 1)); ?></li>
				<li class='has-sub'><?php echo $this->Html->link('SSS Contribution Summary', array('controller' => 'incomes', 'action' => 'selectpayrollperiod2', 2)); ?>
					<ul>
						<li><?php echo $this->Html->link('SSS LCL', array('controller' => 'incomes', 'action' => 'selectpayrollperiod2', 8)); ?></li>
					</ul>
				</li>
				
				<li class='has-sub'><?php echo $this->Html->link('Pag-ibig Contribution Summary', array('controller' => 'incomes', 'action' => 'selectpayrollperiod2', 4)); ?>
					<ul>
						<li><?php echo $this->Html->link('Pag-ibig MC', array('controller' => 'incomes', 'action' => 'selectpayrollperiod2', 9)); ?></li>
					</ul>
				</li>
				<li><?php echo $this->Html->link('Philhealth Contribution Summary', array('controller' => 'incomes', 'action' => 'selectpayrollperiod2', 3)); ?></li>
				<li><?php echo $this->Html->link('SSS Loan Payment Report', array('controller' => 'incomes', 'action' => 'selectpayrollperiod2', 5)); ?></li> 
				<li><?php echo $this->Html->link('HDMF Loan Payment Report', array('controller' => 'incomes', 'action' => 'selectpayrollperiod2', 6)); ?></li> 
				<li><?php echo $this->Html->link('Payroll Reports', array('controller' => 'incomes', 'action' => 'selectpayrollperiod3', 7)); ?></li>
			</ul>
		</li>
		
		<li class='active has-sub'><?php echo $this->Html->link('Maintenance', array('controller' => 'timelogs', 'action' => 'index')); ?>
			<ul style=" margin-left: -107px;">
				<li class='active has-sub'><?php echo $this->Html->link('Time Logs', array('controller' => 'timelogs', 'action' => 'index')); ?>
					<ul>
						<li><?php echo $this->Html->link('Upload', array('controller' => 'uploadedfiles', 'action' => 'add')); ?></li>				
					</ul>
				</li>
				
				<li><?php echo $this->Html->link('Back Up', array('controller' => 'employees', 'action' => 'db_mysql_dump')); ?></li>	
				
				<li><a href="http://localhost/phpmyadmin/db_import.php?db=payroll&token=1a060e45de54b9206326d4ef0e9a40a7" target="_blank">Restore</a></li>

				<li><?php echo $this->Html->link('Upload Existing Employees', array('controller' => 'uploadedfiles', 'action' => 'add2')); ?></li>	
				<li class='has-sub'><?php echo $this->Html->link('Contributions', array('controller' => 'employees', 'action' => 'index')); ?>
					<ul>
						<li><?php echo $this->Html->link('Upload SSS', array('controller' => 'uploadedfiles', 'action' => 'add2', 'sss')); ?></li>
						<li><?php echo $this->Html->link('Upload Philhealth', array('controller' => 'uploadedfiles', 'action' => 'uploadtable', 'philhealth')); ?></li>
						
					</ul>
				</li>
				<li><?php echo $this->Html->link('Set Default COE Footer', array('controller' => 'companyprofiles', 'action' => 'add', 1)); ?></li>	
			</ul>
		</li>
		
		
		<li><?php echo $this->Html->link('Log out', array('controller' => 'users', 'action' => 'logout')); ?></li>
		<li class='last'>
			<div style="height: 20px; margin-top: 7px;" class="search">
				<?php
				echo $this->Form->create('Employee', array('class' => 'form-wrapper cf', 'url' => array('controller' => 'employees', 'action' => 'search'))); 
				echo '<input type="text" name="data[Employee][keyword]" placeholder="Search Employee.." required class="inputsearch">'; ?>
				
				<?php echo $this->Form->end(__('Search', array('type' => 'hidden', 'class'=> 'button1'))); ?>
			</div>
		</li>
		<li class='last'>
			
		</li>
	</ul>
</div>

<?php } 
if($loguser['User']['usertype_id'] != 4){
echo '<div style="background-color: white; padding: 10px; font-weight: bold; color: red; font-size: 13px; border-bottom: 1px solid #ccc; font-family: Arial; " class="default">';	
	if($loguser['User']['payrollperiod'] == 0){
		echo $this->Html->link(__('No Selected Default. Click to Update'), array('controller' => 'payrollperiods', 'action' => 'index'));
	}else{
		echo 'Default: ';
		$period = $this->requestAction('payrollperiods/selectperiod/' . $loguser['User']['payrollperiod']);
		echo $period['Payrollperiod']['period'];
		//echo $this->Html->link(__('Set As Default'), array('controller' => 'users', 'action' => 'changestatus', $payrollperiod['Payrollperiod']['id']));
	}
echo '</div>';
}

?>