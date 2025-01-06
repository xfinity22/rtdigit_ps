<div class="otherductionentries view">
<h2><?php echo __('Otherductionentry'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($otherductionentry['Otherductionentry']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payrollperiod'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otherductionentry['Payrollperiod']['id'], array('controller' => 'payrollperiods', 'action' => 'view', $otherductionentry['Payrollperiod']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otherductionentry['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $otherductionentry['Employee']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Otherdeduction'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otherductionentry['Otherdeduction']['name'], array('controller' => 'otherdeductions', 'action' => 'view', $otherductionentry['Otherdeduction']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($otherductionentry['Otherductionentry']['amount']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Otherductionentry'), array('action' => 'edit', $otherductionentry['Otherductionentry']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Otherductionentry'), array('action' => 'delete', $otherductionentry['Otherductionentry']['id']), array(), __('Are you sure you want to delete # %s?', $otherductionentry['Otherductionentry']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Otherductionentries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Otherductionentry'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payrollperiods'), array('controller' => 'payrollperiods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payrollperiod'), array('controller' => 'payrollperiods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Otherdeductions'), array('controller' => 'otherdeductions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Otherdeduction'), array('controller' => 'otherdeductions', 'action' => 'add')); ?> </li>
	</ul>
</div>
