<div class="medbenefits form">
<?php echo $this->Form->create('Medbenefit'); ?>
	<fieldset>
		<legend><?php echo __('Edit Medbenefit'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('medprovider_id');
		echo $this->Form->input('name');
		echo $this->Form->input('amount');
		echo $this->Form->input('employee_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Medbenefit.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Medbenefit.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Medbenefits'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Medproviders'), array('controller' => 'medproviders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medprovider'), array('controller' => 'medproviders', 'action' => 'add')); ?> </li>
	</ul>
</div>
