<div class="payrolltypes form">
<?php echo $this->Form->create('Payrolltype'); ?>
	<fieldset>
		<legend><?php echo __('Edit Payrolltype'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Payrolltype.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Payrolltype.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Payrolltypes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Payrollperiods'), array('controller' => 'payrollperiods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payrollperiod'), array('controller' => 'payrollperiods', 'action' => 'add')); ?> </li>
	</ul>
</div>
