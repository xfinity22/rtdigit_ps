<div class="philhealths form">
<?php echo $this->Form->create('Philhealth'); ?>
	<fieldset>
		<legend><?php echo __('Add Philhealth'); ?></legend>
	<?php
		echo $this->Form->input('rangestart');
		echo $this->Form->input('rangeend');
		echo $this->Form->input('salarybase');
		echo $this->Form->input('totalmp');
		echo $this->Form->input('employeeshare');
		echo $this->Form->input('employershare');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Philhealths'), array('action' => 'index')); ?></li>
	</ul>
</div>
