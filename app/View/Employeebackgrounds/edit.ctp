<div class="employeebackgrounds form">
<?php echo $this->Form->create('Employeebackground'); ?>
	<fieldset>
		<legend><?php echo __('Edit Employeebackground'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('employee_id');
		echo $this->Form->input('sex');
		echo $this->Form->input('birthdate');
		echo $this->Form->input('civilstatus');
		echo $this->Form->input('religion');
		echo $this->Form->input('height');
		echo $this->Form->input('weight');
		echo $this->Form->input('fathername');
		echo $this->Form->input('fatheraddress');
		echo $this->Form->input('fathercontactnumber');
		echo $this->Form->input('fatheroccupation');
		echo $this->Form->input('mothername');
		echo $this->Form->input('motheraddress');
		echo $this->Form->input('mothercontactnumber');
		echo $this->Form->input('motheroccupation');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Employeebackground.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Employeebackground.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Employeebackgrounds'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
