<div class="lates index">
	<h2><?php echo __('Lates'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('employee_id'); ?></th>
			<th><?php echo $this->Paginator->sort('payrollperiod_id'); ?></th>
			<th><?php echo $this->Paginator->sort('rate'); ?></th>
			<th><?php echo $this->Paginator->sort('hour'); ?></th>
			<th><?php echo $this->Paginator->sort('minutes'); ?></th>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			<th><?php echo $this->Paginator->sort('datemodified'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($lates as $late): ?>
	<tr>
		<td><?php echo h($late['Late']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($late['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $late['Employee']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($late['Payrollperiod']['id'], array('controller' => 'payrollperiods', 'action' => 'view', $late['Payrollperiod']['id'])); ?>
		</td>
		<td><?php echo h($late['Late']['rate']); ?>&nbsp;</td>
		<td><?php echo h($late['Late']['hour']); ?>&nbsp;</td>
		<td><?php echo h($late['Late']['minutes']); ?>&nbsp;</td>
		<td><?php echo h($late['Late']['amount']); ?>&nbsp;</td>
		<td><?php echo h($late['Late']['datemodified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($late['User']['id'], array('controller' => 'users', 'action' => 'view', $late['User']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $late['Late']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $late['Late']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $late['Late']['id']), array(), __('Are you sure you want to delete # %s?', $late['Late']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Late'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payrollperiods'), array('controller' => 'payrollperiods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payrollperiod'), array('controller' => 'payrollperiods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
