<div class="medcheckups form">
<?php echo $this->Form->create('Medcheckup'); ?>
	<fieldset>
		<legend><?php echo __('Edit Medcheckup'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('employee_id');
		echo $this->Form->input('medhospital_id');
		echo $this->Form->input('fees');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Medcheckup.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Medcheckup.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Medcheckups'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Medhospitals'), array('controller' => 'medhospitals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medhospital'), array('controller' => 'medhospitals', 'action' => 'add')); ?> </li>
	</ul>
</div>
