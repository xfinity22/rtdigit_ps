<div class="hdmfcontris form">
<?php echo $this->Form->create('Hdmfcontri'); ?>
	<fieldset>
		<legend><?php echo __('Add Hdmfcontri'); ?></legend>
	<?php
		echo $this->Form->input('bracket1');
		echo $this->Form->input('bracket2');
		echo $this->Form->input('pct');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Hdmfcontris'), array('action' => 'index')); ?></li>
	</ul>
</div>
