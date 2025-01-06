<div class="overtimes index">
	<h2><?php echo __('Overtimes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('employee_id'); ?></th>
			<th><?php echo $this->Paginator->sort('payrollperiod_id'); ?></th>
			<th><?php echo $this->Paginator->sort('rate'); ?></th>
			<th><?php echo $this->Paginator->sort('requestddate'); ?></th>
			<th><?php echo $this->Paginator->sort('referencedate'); ?></th>
			<th><?php echo $this->Paginator->sort('OTbegindate'); ?></th>
			<th><?php echo $this->Paginator->sort('OTbegintime'); ?></th>
			<th><?php echo $this->Paginator->sort('OTenddate'); ?></th>
			<th><?php echo $this->Paginator->sort('OTendtime'); ?></th>
			<th><?php echo $this->Paginator->sort('reason'); ?></th>
			<th><?php echo $this->Paginator->sort('OTstatus_id'); ?></th>
			<th><?php echo $this->Paginator->sort('overtimerate_id'); ?></th>
			<th><?php echo $this->Paginator->sort('datemodified'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($overtimes as $overtime): ?>
	<tr>
		<td><?php echo h($overtime['Overtime']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($overtime['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $overtime['Employee']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($overtime['Payrollperiod']['id'], array('controller' => 'payrollperiods', 'action' => 'view', $overtime['Payrollperiod']['id'])); ?>
		</td>
		<td><?php echo h($overtime['Overtime']['rate']); ?>&nbsp;</td>
		<td><?php echo h($overtime['Overtime']['requestddate']); ?>&nbsp;</td>
		<td><?php echo h($overtime['Overtime']['referencedate']); ?>&nbsp;</td>
		<td><?php echo h($overtime['Overtime']['OTbegindate']); ?>&nbsp;</td>
		<td><?php echo h($overtime['Overtime']['OTbegintime']); ?>&nbsp;</td>
		<td><?php echo h($overtime['Overtime']['OTenddate']); ?>&nbsp;</td>
		<td><?php echo h($overtime['Overtime']['OTendtime']); ?>&nbsp;</td>
		<td><?php echo h($overtime['Overtime']['reason']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($overtime['OTstatus']['name'], array('controller' => 'o_tstatuses', 'action' => 'view', $overtime['OTstatus']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($overtime['Overtimerate']['name'], array('controller' => 'overtimerates', 'action' => 'view', $overtime['Overtimerate']['id'])); ?>
		</td>
		<td><?php echo h($overtime['Overtime']['datemodified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($overtime['User']['id'], array('controller' => 'users', 'action' => 'view', $overtime['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $overtime['Overtime']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $overtime['Overtime']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $overtime['Overtime']['id']), array(), __('Are you sure you want to delete # %s?', $overtime['Overtime']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Overtime'), array('action' => 'add')); ?></li>
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
