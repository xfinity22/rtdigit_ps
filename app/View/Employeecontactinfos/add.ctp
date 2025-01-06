<div class="employeecontactinfos form">
<?php echo $this->Form->create('Employeecontactinfo'); ?>
	<fieldset>
		<legend><?php echo __('Add Employeecontactinfo'); ?></legend>
	<?php
		echo $this->Form->input('employee_id');
		echo $this->Form->input('mobilenumber');
		echo $this->Form->input('telephonenumber');
		echo $this->Form->input('email');
		echo $this->Form->input('permanentaddress');
		echo $this->Form->input('presetaddress');
		echo $this->Form->input('econtactname');
		echo $this->Form->input('econtactnumber');
		echo $this->Form->input('ehomeaddress');
		echo $this->Form->input('erelationship');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Employeecontactinfos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
