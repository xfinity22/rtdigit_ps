<div class="employeeeducationalbackgrounds form">
<?php echo $this->Form->create('Employeeeducationalbackground'); ?>
	<fieldset>
		<legend><?php echo __('Edit Employeeeducationalbackground'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('employee_id');
		echo $this->Form->input('primaryschool');
		echo $this->Form->input('primarygrad');
		echo $this->Form->input('primarycourse');
		echo $this->Form->input('secondaryschool');
		echo $this->Form->input('secondarygrad');
		echo $this->Form->input('secondarycourse');
		echo $this->Form->input('tertiaryschool');
		echo $this->Form->input('tertiarygrad');
		echo $this->Form->input('tertiarycourse');
		echo $this->Form->input('graduateschool');
		echo $this->Form->input('graduategrad');
		echo $this->Form->input('graduatecourse');
		echo $this->Form->input('postgradschool');
		echo $this->Form->input('postgradgrad');
		echo $this->Form->input('postgradcourse');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Employeeeducationalbackground.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Employeeeducationalbackground.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Employeeeducationalbackgrounds'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
