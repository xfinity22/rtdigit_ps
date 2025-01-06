<div class="employeecontactinfos view">
<h2><?php echo __('Employeecontactinfo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($employeecontactinfo['Employeecontactinfo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee'); ?></dt>
		<dd>
			<?php echo $this->Html->link($employeecontactinfo['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $employeecontactinfo['Employee']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobilenumber'); ?></dt>
		<dd>
			<?php echo h($employeecontactinfo['Employeecontactinfo']['mobilenumber']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telephonenumber'); ?></dt>
		<dd>
			<?php echo h($employeecontactinfo['Employeecontactinfo']['telephonenumber']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($employeecontactinfo['Employeecontactinfo']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Permanentaddress'); ?></dt>
		<dd>
			<?php echo h($employeecontactinfo['Employeecontactinfo']['permanentaddress']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Presetaddress'); ?></dt>
		<dd>
			<?php echo h($employeecontactinfo['Employeecontactinfo']['presetaddress']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Econtactname'); ?></dt>
		<dd>
			<?php echo h($employeecontactinfo['Employeecontactinfo']['econtactname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Econtactnumber'); ?></dt>
		<dd>
			<?php echo h($employeecontactinfo['Employeecontactinfo']['econtactnumber']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ehomeaddress'); ?></dt>
		<dd>
			<?php echo h($employeecontactinfo['Employeecontactinfo']['ehomeaddress']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Erelationship'); ?></dt>
		<dd>
			<?php echo h($employeecontactinfo['Employeecontactinfo']['erelationship']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Employeecontactinfo'), array('action' => 'edit', $employeecontactinfo['Employeecontactinfo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Employeecontactinfo'), array('action' => 'delete', $employeecontactinfo['Employeecontactinfo']['id']), array(), __('Are you sure you want to delete # %s?', $employeecontactinfo['Employeecontactinfo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Employeecontactinfos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employeecontactinfo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
