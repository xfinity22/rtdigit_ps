<div class="taxdescriptions form">
<?php echo $this->Form->create('Taxdescription'); ?>
	<fieldset>
		<legend><?php echo __('Add Taxdescription'); ?></legend>
	<?php
		echo $this->Form->input('taxtype');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Taxdescriptions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Withholdingtaxes'), array('controller' => 'withholdingtaxes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Withholdingtax'), array('controller' => 'withholdingtaxes', 'action' => 'add')); ?> </li>
	</ul>
</div>
