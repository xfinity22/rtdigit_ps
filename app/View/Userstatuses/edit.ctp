<div class="userstatuses form">
<?php echo $this->Form->create('Userstatus'); ?>
	<fieldset>
		<legend><?php echo __('Edit Userstatus'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Userstatus.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Userstatus.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Userstatuses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
