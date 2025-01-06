<div class="leavestatuses form">
<?php echo $this->Form->create('Leavestatus'); ?>
	<fieldset>
		<legend><?php echo __('Edit Leavestatus'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Leavestatus.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Leavestatus.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Leavestatuses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Leavetakens'), array('controller' => 'leavetakens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leavetaken'), array('controller' => 'leavetakens', 'action' => 'add')); ?> </li>
	</ul>
</div>
