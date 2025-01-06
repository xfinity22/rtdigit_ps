<div class="otherductionentries index">
	<h2><?php echo __('Otherductionentries'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('payrollperiod_id'); ?></th>
			<th><?php echo $this->Paginator->sort('employee_id'); ?></th>
			<th><?php echo $this->Paginator->sort('otherdeduction_id'); ?></th>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($otherductionentries as $otherductionentry): ?>
	<tr>
		<td><?php echo h($otherductionentry['Otherductionentry']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($otherductionentry['Payrollperiod']['id'], array('controller' => 'payrollperiods', 'action' => 'view', $otherductionentry['Payrollperiod']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($otherductionentry['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $otherductionentry['Employee']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($otherductionentry['Otherdeduction']['name'], array('controller' => 'otherdeductions', 'action' => 'view', $otherductionentry['Otherdeduction']['id'])); ?>
		</td>
		<td><?php echo h($otherductionentry['Otherductionentry']['amount']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $otherductionentry['Otherductionentry']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $otherductionentry['Otherductionentry']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $otherductionentry['Otherductionentry']['id']), array(), __('Are you sure you want to delete # %s?', $otherductionentry['Otherductionentry']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Otherductionentry'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Payrollperiods'), array('controller' => 'payrollperiods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payrollperiod'), array('controller' => 'payrollperiods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Otherdeductions'), array('controller' => 'otherdeductions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Otherdeduction'), array('controller' => 'otherdeductions', 'action' => 'add')); ?> </li>
	</ul>
</div>
