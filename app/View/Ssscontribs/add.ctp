<div class="ssscontribs form">
<?php echo $this->Form->create('Ssscontrib'); ?>
	<fieldset>
		<legend><?php echo __('Add Ssscontrib'); ?></legend>
	<?php
		echo $this->Form->input('rangestart');
		echo $this->Form->input('rangeend');
		echo $this->Form->input('msc');
		echo $this->Form->input('erss');
		echo $this->Form->input('eess');
		echo $this->Form->input('toatlss');
		echo $this->Form->input('erec');
		echo $this->Form->input('ertotal');
		echo $this->Form->input('eetotal');
		echo $this->Form->input('mandatoryee');
		echo $this->Form->input('mandatoryer');
		echo $this->Form->input('mandatorytotal');
		echo $this->Form->input('mandatory');
		echo $this->Form->input('total');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ssscontribs'), array('action' => 'index')); ?></li>
	</ul>
</div>
