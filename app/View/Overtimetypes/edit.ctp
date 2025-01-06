<div class="overtimetypes form">
<?php echo $this->Form->create('Overtimetype'); ?>
	<fieldset>
		<legend><?php echo __('Edit Overtimetype'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Overtimetype.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Overtimetype.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Overtimetypes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Overtimerates'), array('controller' => 'overtimerates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Overtimerate'), array('controller' => 'overtimerates', 'action' => 'add')); ?> </li>
	</ul>
</div>
