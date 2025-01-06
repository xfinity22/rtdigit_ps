<div class="overtimes view">
<h2><?php echo __('Overtime'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($overtime['Overtime']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee'); ?></dt>
		<dd>
			<?php echo $this->Html->link($overtime['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $overtime['Employee']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payrollperiod'); ?></dt>
		<dd>
			<?php echo $this->Html->link($overtime['Payrollperiod']['id'], array('controller' => 'payrollperiods', 'action' => 'view', $overtime['Payrollperiod']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rate'); ?></dt>
		<dd>
			<?php echo h($overtime['Overtime']['rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Requestddate'); ?></dt>
		<dd>
			<?php echo h($overtime['Overtime']['requestddate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Referencedate'); ?></dt>
		<dd>
			<?php echo h($overtime['Overtime']['referencedate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('OTbegindate'); ?></dt>
		<dd>
			<?php echo h($overtime['Overtime']['OTbegindate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('OTbegintime'); ?></dt>
		<dd>
			<?php echo h($overtime['Overtime']['OTbegintime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('OTenddate'); ?></dt>
		<dd>
			<?php echo h($overtime['Overtime']['OTenddate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('OTendtime'); ?></dt>
		<dd>
			<?php echo h($overtime['Overtime']['OTendtime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reason'); ?></dt>
		<dd>
			<?php echo h($overtime['Overtime']['reason']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('O Tstatus'); ?></dt>
		<dd>
			<?php echo $this->Html->link($overtime['OTstatus']['name'], array('controller' => 'o_tstatuses', 'action' => 'view', $overtime['OTstatus']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Overtimerate'); ?></dt>
		<dd>
			<?php echo $this->Html->link($overtime['Overtimerate']['name'], array('controller' => 'overtimerates', 'action' => 'view', $overtime['Overtimerate']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datemodified'); ?></dt>
		<dd>
			<?php echo h($overtime['Overtime']['datemodified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($overtime['User']['id'], array('controller' => 'users', 'action' => 'view', $overtime['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Overtime'), array('action' => 'edit', $overtime['Overtime']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Overtime'), array('action' => 'delete', $overtime['Overtime']['id']), array(), __('Are you sure you want to delete # %s?', $overtime['Overtime']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Overtimes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Overtime'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payrollperiods'), array('controller' => 'payrollperiods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payrollperiod'), array('controller' => 'payrollperiods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List O Tstatuses'), array('controller' => 'o_tstatuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New O Tstatus'), array('controller' => 'o_tstatuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Overtimerates'), array('controller' => 'overtimerates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Overtimerate'), array('controller' => 'overtimerates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
