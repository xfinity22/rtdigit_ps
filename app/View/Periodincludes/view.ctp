<div class="periodincludes view">
<h2><?php echo __('Periodinclude'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($periodinclude['Periodinclude']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payrollperiod'); ?></dt>
		<dd>
			<?php echo $this->Html->link($periodinclude['Payrollperiod']['id'], array('controller' => 'payrollperiods', 'action' => 'view', $periodinclude['Payrollperiod']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee'); ?></dt>
		<dd>
			<?php echo $this->Html->link($periodinclude['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $periodinclude['Employee']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Periodinclude'), array('action' => 'edit', $periodinclude['Periodinclude']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Periodinclude'), array('action' => 'delete', $periodinclude['Periodinclude']['id']), array(), __('Are you sure you want to delete # %s?', $periodinclude['Periodinclude']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Periodincludes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Periodinclude'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payrollperiods'), array('controller' => 'payrollperiods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payrollperiod'), array('controller' => 'payrollperiods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
