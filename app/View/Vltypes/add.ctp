<div class="vltypes form">
<?php echo $this->Form->create('Vltype'); ?>
	<fieldset>
		<legend><?php echo __('Add Vltype'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Vltypes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Leavetakens'), array('controller' => 'leavetakens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leavetaken'), array('controller' => 'leavetakens', 'action' => 'add')); ?> </li>
	</ul>
</div>
