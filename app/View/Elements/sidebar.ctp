<?php 
	$loguser = $this->requestAction('users/loggeduser');
	$types = $this->requestAction('employeetypes/relatedvariables');
	$divisions = $this->requestAction('divisions/relatedvariables');
	$departments = $this->requestAction('departments/relatedvariables');
	$user = $this->requestAction('users/loggeduser/');
?>
<div class="sidebar">
	<div class="container">
		<?php echo $this->Html->image('LOGO 1.png', ['alt' => 'Logo', 'class' => 'sidebar-logo']); ?>		
		<ul class="sidenav">
			<li>
				<?php echo $this->Html->image('Home 3.png', ['alt' => 'Home Logo']); ?>
				<?php echo $this->Html->link(
				'Home',
				['controller' => 'companyprofiles', 'action' => 'view'],
				['escape' => false]);
				?>
			</li>
			<li><?php echo $this->Html->image('User-dash.png', ['alt' => 'Dash Logo']); ?>
				<?php echo $this->Html->link(
				'Master Data',
				['controller' => 'employees', 'action' => 'index'],
				['escape' => false]);
				?>		
			</li>
			<li><?php echo $this->Html->image('List 1.png', ['alt' => 'Clock Logo']); ?>
					<?php echo $this->Html->link(
					'Medical Data',
					['controller' => 'medhospitals', 'action' => 'index'],
					['escape' => false]);
					?>
			</li>
			<li><?php echo $this->Html->image('Calendar 1.png', ['alt' => 'Calendar Logo']); ?>
				<?php echo $this->Html->link(
					'Tables',
					['controller' => 'overtimerates', 'action' => 'index'],
					['escape' => false]);
					?>
			</li>
			<li><?php echo $this->Html->image('List 1.png', ['alt' => 'List Logo']); ?>
				<?php echo $this->Html->link(
					'Payroll',
					['controller' => 'payrollperiods', 'action' => 'index'],
					['escape' => false]);
					?>
			</li>
			<li><?php echo $this->Html->image('Team 1.png', ['alt' => 'Team Logo']); ?>
				<?php echo $this->Html->link(
						'Deductions',
						['controller' => 'loantypes', 'action' => 'index'],
						['escape' => false]);
						?>
			</li>
			<li><?php echo $this->Html->image('Setting 1.png', ['alt' => 'Team Logo']); ?>
				<?php echo $this->Html->link(
						'Reports',
						['controller' => 'incomes', 'action' => 'selectpayrollperiod2', 1],
						['escape' => false]);
						?>
			</li>
			<li><?php echo $this->Html->image('Clock 2 1.png', ['alt' => 'Team Logo']); ?>
				<?php echo $this->Html->link(
						'Maintenance',
						['controller' => 'timelogs', 'action' => 'index'],
						['escape' => false]);
						?>
			</li>

			<li><?php echo $this->Html->image('Setting 1.png', ['alt' => 'Team Logo']); ?>
				<?php echo $this->Html->link(
						'Settings',
						['controller' => 'users', 'action' => 'settings'],
						['escape' => false]);
						?>
			</li>

			<li><?php echo $this->Html->image('Out 2.png', ['alt' => 'Team Logo']); ?>
				<?php echo $this->Html->link(
						'Log Out',
						['controller' => 'users', 'action' => 'logout'],
						['escape' => false]);
						?>
			</li>

			

		</ul>
		<div class="sidebar-bottom-logo">
			<div>
				<p>POWERED BY</p>
				<?php echo $this->Html->image('rgs_logo.png', ['alt' => 'Logo']); ?>		
			</div>
		</div>
	</div>
</div>
