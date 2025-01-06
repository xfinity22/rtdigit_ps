<div class="withholdingtaxes form">
<?php echo $this->Form->create('Withholdingtax'); ?>
	<fieldset>
		<legend><?php echo __('Edit Withholdingtax'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('taxdescription_id');
		echo $this->Form->input('baseamount');
		echo $this->Form->input('endamount');
		echo $this->Form->input('excessof');
		echo $this->Form->input('basetax');
		echo $this->Form->input('percentamount');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Withholdingtax.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Withholdingtax.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Withholdingtaxes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Taxdescriptions'), array('controller' => 'taxdescriptions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taxdescription'), array('controller' => 'taxdescriptions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
