<div class="lates view">
<h2><?php echo __('Late'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($late['Late']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee'); ?></dt>
		<dd>
			<?php echo $this->Html->link($late['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $late['Employee']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payrollperiod'); ?></dt>
		<dd>
			<?php echo $this->Html->link($late['Payrollperiod']['id'], array('controller' => 'payrollperiods', 'action' => 'view', $late['Payrollperiod']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rate'); ?></dt>
		<dd>
			<?php echo h($late['Late']['rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hour'); ?></dt>
		<dd>
			<?php echo h($late['Late']['hour']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Minutes'); ?></dt>
		<dd>
			<?php echo h($late['Late']['minutes']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($late['Late']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datemodified'); ?></dt>
		<dd>
			<?php echo h($late['Late']['datemodified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($late['User']['id'], array('controller' => 'users', 'action' => 'view', $late['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Late'), array('action' => 'edit', $late['Late']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Late'), array('action' => 'delete', $late['Late']['id']), array(), __('Are you sure you want to delete # %s?', $late['Late']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Lates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Late'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payrollperiods'), array('controller' => 'payrollperiods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payrollperiod'), array('controller' => 'payrollperiods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
