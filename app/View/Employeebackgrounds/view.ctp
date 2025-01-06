<div class="employeebackgrounds view">
<h2><?php echo __('Employeebackground'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($employeebackground['Employeebackground']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee'); ?></dt>
		<dd>
			<?php echo $this->Html->link($employeebackground['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $employeebackground['Employee']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sex'); ?></dt>
		<dd>
			<?php echo h($employeebackground['Employeebackground']['sex']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Birthdate'); ?></dt>
		<dd>
			<?php echo h($employeebackground['Employeebackground']['birthdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Civilstatus'); ?></dt>
		<dd>
			<?php echo h($employeebackground['Employeebackground']['civilstatus']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Religion'); ?></dt>
		<dd>
			<?php echo h($employeebackground['Employeebackground']['religion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Height'); ?></dt>
		<dd>
			<?php echo h($employeebackground['Employeebackground']['height']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Weight'); ?></dt>
		<dd>
			<?php echo h($employeebackground['Employeebackground']['weight']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fathername'); ?></dt>
		<dd>
			<?php echo h($employeebackground['Employeebackground']['fathername']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fatheraddress'); ?></dt>
		<dd>
			<?php echo h($employeebackground['Employeebackground']['fatheraddress']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fathercontactnumber'); ?></dt>
		<dd>
			<?php echo h($employeebackground['Employeebackground']['fathercontactnumber']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fatheroccupation'); ?></dt>
		<dd>
			<?php echo h($employeebackground['Employeebackground']['fatheroccupation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mothername'); ?></dt>
		<dd>
			<?php echo h($employeebackground['Employeebackground']['mothername']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Motheraddress'); ?></dt>
		<dd>
			<?php echo h($employeebackground['Employeebackground']['motheraddress']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mothercontactnumber'); ?></dt>
		<dd>
			<?php echo h($employeebackground['Employeebackground']['mothercontactnumber']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Motheroccupation'); ?></dt>
		<dd>
			<?php echo h($employeebackground['Employeebackground']['motheroccupation']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Employeebackground'), array('action' => 'edit', $employeebackground['Employeebackground']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Employeebackground'), array('action' => 'delete', $employeebackground['Employeebackground']['id']), array(), __('Are you sure you want to delete # %s?', $employeebackground['Employeebackground']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Employeebackgrounds'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employeebackground'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
