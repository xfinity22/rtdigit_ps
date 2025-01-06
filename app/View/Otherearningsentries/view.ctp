<div class="otherearningsentries view">
<h2><?php echo __('Otherearningsentry'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($otherearningsentry['Otherearningsentry']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payrollperiod'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otherearningsentry['Payrollperiod']['id'], array('controller' => 'payrollperiods', 'action' => 'view', $otherearningsentry['Payrollperiod']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otherearningsentry['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $otherearningsentry['Employee']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Otherearning'); ?></dt>
		<dd>
			<?php echo $this->Html->link($otherearningsentry['Otherearning']['name'], array('controller' => 'otherearnings', 'action' => 'view', $otherearningsentry['Otherearning']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($otherearningsentry['Otherearningsentry']['amount']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Otherearningsentry'), array('action' => 'edit', $otherearningsentry['Otherearningsentry']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Otherearningsentry'), array('action' => 'delete', $otherearningsentry['Otherearningsentry']['id']), array(), __('Are you sure you want to delete # %s?', $otherearningsentry['Otherearningsentry']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Otherearningsentries'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Otherearningsentry'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payrollperiods'), array('controller' => 'payrollperiods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payrollperiod'), array('controller' => 'payrollperiods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Otherearnings'), array('controller' => 'otherearnings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Otherearning'), array('controller' => 'otherearnings', 'action' => 'add')); ?> </li>
	</ul>
</div>
