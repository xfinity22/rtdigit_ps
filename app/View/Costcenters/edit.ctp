<div class="costcenters form">
<?php echo $this->Form->create('Costcenter'); ?>
	<fieldset>
		<legend><?php echo __('Edit Costcenter'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Costcenter.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Costcenter.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Costcenters'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>