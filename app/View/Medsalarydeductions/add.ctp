<div class="medsalarydeductions form">
<?php echo $this->Form->create('Medsalarydeduction'); ?>
	<fieldset>
		<legend><?php echo __('Add Medsalarydeduction'); ?></legend>
	<?php
		echo $this->Form->input('employee_id');
		echo $this->Form->input('amount');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Medsalarydeductions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>