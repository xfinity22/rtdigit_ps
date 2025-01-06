<div class="payrolltypes index">
	<h2><?php echo __('Payrolltypes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($payrolltypes as $payrolltype): ?>
	<tr>
		<td><?php echo h($payrolltype['Payrolltype']['id']); ?>&nbsp;</td>
		<td><?php echo h($payrolltype['Payrolltype']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $payrolltype['Payrolltype']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $payrolltype['Payrolltype']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $payrolltype['Payrolltype']['id']), array(), __('Are you sure you want to delete # %s?', $payrolltype['Payrolltype']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Payrolltype'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Payrollperiods'), array('controller' => 'payrollperiods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payrollperiod'), array('controller' => 'payrollperiods', 'action' => 'add')); ?> </li>
	</ul>
</div>
