<div class="overtimetypes form">
<?php echo $this->Form->create('Overtimetype'); ?>
	<fieldset>
		<legend><?php echo __('Add Overtimetype'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>