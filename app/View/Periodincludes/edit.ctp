<div class="periodincludes form">
<?php echo $this->Form->create('Periodinclude'); ?>
	<fieldset>
		<legend><?php echo __('Edit Periodinclude'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('payrollperiod_id');
		echo $this->Form->input('employee_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Periodinclude.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Periodinclude.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Periodincludes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Payrollperiods'), array('controller' => 'payrollperiods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payrollperiod'), array('controller' => 'payrollperiods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
