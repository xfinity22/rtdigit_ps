<div class="uploadedfiles form">
<?php echo $this->Form->create('Uploadedfile'); ?>
	<fieldset>
		<legend><?php echo __('Edit Uploadedfile'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('filename');
		echo $this->Form->input('dateuploaded');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Uploadedfile.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Uploadedfile.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Uploadedfiles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
