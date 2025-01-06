<div class="deductions index">
	<h2><?php echo __('Deductions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('employee_id'); ?></th>
			<th><?php echo $this->Paginator->sort('payrollperiod_id'); ?></th>
			<th><?php echo $this->Paginator->sort('rate'); ?></th>
			<th><?php echo $this->Paginator->sort('caritas'); ?></th>
			<th><?php echo $this->Paginator->sort('cooploan'); ?></th>
			<th><?php echo $this->Paginator->sort('hdmf'); ?></th>
			<th><?php echo $this->Paginator->sort('hdmfLoan'); ?></th>
			<th><?php echo $this->Paginator->sort('sssLoan'); ?></th>
			<th><?php echo $this->Paginator->sort('advances'); ?></th>
			<th><?php echo $this->Paginator->sort('medical'); ?></th>
			<th><?php echo $this->Paginator->sort('uniform'); ?></th>
			<th><?php echo $this->Paginator->sort('penalty'); ?></th>
			<th><?php echo $this->Paginator->sort('tax'); ?></th>
			<th><?php echo $this->Paginator->sort('absentdays'); ?></th>
			<th><?php echo $this->Paginator->sort('absentamount'); ?></th>
			<th><?php echo $this->Paginator->sort('others'); ?></th>
			<th><?php echo $this->Paginator->sort('datemodified'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($deductions as $deduction): ?>
	<tr>
		<td><?php echo h($deduction['Deduction']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($deduction['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $deduction['Employee']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($deduction['Payrollperiod']['id'], array('controller' => 'payrollperiods', 'action' => 'view', $deduction['Payrollperiod']['id'])); ?>
		</td>
		<td><?php echo h($deduction['Deduction']['rate']); ?>&nbsp;</td>
		<td><?php echo h($deduction['Deduction']['caritas']); ?>&nbsp;</td>
		<td><?php echo h($deduction['Deduction']['cooploan']); ?>&nbsp;</td>
		<td><?php echo h($deduction['Deduction']['hdmf']); ?>&nbsp;</td>
		<td><?php echo h($deduction['Deduction']['hdmfLoan']); ?>&nbsp;</td>
		<td><?php echo h($deduction['Deduction']['sssLoan']); ?>&nbsp;</td>
		<td><?php echo h($deduction['Deduction']['advances']); ?>&nbsp;</td>
		<td><?php echo h($deduction['Deduction']['medical']); ?>&nbsp;</td>
		<td><?php echo h($deduction['Deduction']['uniform']); ?>&nbsp;</td>
		<td><?php echo h($deduction['Deduction']['penalty']); ?>&nbsp;</td>
		<td><?php echo h($deduction['Deduction']['tax']); ?>&nbsp;</td>
		<td><?php echo h($deduction['Deduction']['absentdays']); ?>&nbsp;</td>
		<td><?php echo h($deduction['Deduction']['absentamount']); ?>&nbsp;</td>
		<td><?php echo h($deduction['Deduction']['others']); ?>&nbsp;</td>
		<td><?php echo h($deduction['Deduction']['datemodified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($deduction['User']['id'], array('controller' => 'users', 'action' => 'view', $deduction['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $deduction['Deduction']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $deduction['Deduction']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $deduction['Deduction']['id']), array(), __('Are you sure you want to delete # %s?', $deduction['Deduction']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Deduction'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payrollperiods'), array('controller' => 'payrollperiods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payrollperiod'), array('controller' => 'payrollperiods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
