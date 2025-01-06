<div class="row">
    <div class="col-md-3">
<div class="sidebars">

		
		<ul class="sidenav nopadding nomargin">
			<li>
				<?php echo $this->Html->image('User-dash.png', ['alt' => 'Home Logo']); ?>
				<?php echo $this->Html->link(
				'Accounts',
				['controller' => 'users', 'action' => 'index'],
				['escape' => false]);
				?>
			</li>
			<li><?php echo $this->Html->image('Home 3.png', ['alt' => 'Dash Logo']); ?>
				<?php echo $this->Html->link(
				'Divisions & Departments',
				['controller' => 'divisions', 'action' => 'index'],
				['escape' => false]);
				?>		
			</li>
			<li class="nodisplay"><?php echo $this->Html->image('Home 3.png', ['alt' => 'Clock Logo']); ?>
					<?php echo $this->Html->link(
					'Departments',
					['controller' => 'departments', 'action' => 'index'],
					['escape' => false]);
					?>
			</li>
			<li><?php echo $this->Html->image('Home 3.png', ['alt' => 'Calendar Logo']); ?>
				<?php echo $this->Html->link(
					'Branches',
					['controller' => 'branches', 'action' => 'index'],
					['escape' => false]);
					?>
			</li>
			<li><?php echo $this->Html->image('List 1.png', ['alt' => 'List Logo']); ?>
				<?php echo $this->Html->link(
					'Employee Type',
					['controller' => 'employeetypes', 'action' => 'index'],
					['escape' => false]);
					?>
			</li>
			<li><?php echo $this->Html->image('Team 1.png', ['alt' => 'Team Logo']); ?>
				<?php echo $this->Html->link(
						'Job Titles',
						['controller' => 'jobtitles', 'action' => 'index'],
						['escape' => false]);
						?>
			</li>
			<li><?php echo $this->Html->image('Setting 1.png', ['alt' => 'Team Logo']); ?>
				<?php echo $this->Html->link(
						'Work Schedules',
						['controller' => 'workschedules', 'action' => 'index', 1],
						['escape' => false]);
						?>
			</li>
			<li><?php echo $this->Html->image('Home 3.png', ['alt' => 'Team Logo']); ?>
				<?php echo $this->Html->link(
						'Banks',
						['controller' => 'banks', 'action' => 'index'],
						['escape' => false]);
						?>
			</li>

			<li><?php echo $this->Html->image('Calendar 1.png', ['alt' => 'Team Logo']); ?>
				<?php echo $this->Html->link(
						'Holidays',
						['controller' => 'holidays', 'action' => 'index'],
						['escape' => false]);
						?>
			</li>

			<li><?php echo $this->Html->image('Calendar 1.png', ['alt' => 'Team Logo']); ?>
				<?php echo $this->Html->link(
						'Other Earning',
						['controller' => 'otherearnings', 'action' => 'index'],
						['escape' => false]);
						?>
			</li>
            <li><?php echo $this->Html->image('Calendar 1.png', ['alt' => 'Team Logo']); ?>
				<?php echo $this->Html->link(
						'Other Deduction',
						['controller' => 'otherdeductions', 'action' => 'index'],
						['escape' => false]);
						?>
			</li>

			

		</ul>
		
    </div>
</div>
</div>
<div class="clear"></div>

