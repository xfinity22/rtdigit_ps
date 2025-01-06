<div class="medsalarydeductions view">
<h2><?php echo __('Medsalarydeduction'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($medsalarydeduction['Medsalarydeduction']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee'); ?></dt>
		<dd>
			<?php echo $this->Html->link($medsalarydeduction['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $medsalarydeduction['Employee']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($medsalarydeduction['Medsalarydeduction']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($medsalarydeduction['Medsalarydeduction']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Medsalarydeduction'), array('action' => 'edit', $medsalarydeduction['Medsalarydeduction']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Medsalarydeduction'), array('action' => 'delete', $medsalarydeduction['Medsalarydeduction']['id']), array(), __('Are you sure you want to delete # %s?', $medsalarydeduction['Medsalarydeduction']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Medsalarydeductions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medsalarydeduction'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
