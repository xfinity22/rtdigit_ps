<div class="lateundertimebases form">
<?php echo $this->Form->create('Lateundertimebase'); ?>
	<fieldset>
		<legend><?php echo __('Edit Lateundertimebase'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Lateundertimebase.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Lateundertimebase.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Lateundertimebases'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Parameters'), array('controller' => 'parameters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parameter'), array('controller' => 'parameters', 'action' => 'add')); ?> </li>
	</ul>
</div>
