<div class="topsheets index">
	<h2><?php echo __('Topsheets'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('employee_id'); ?></th>
			<th><?php echo $this->Paginator->sort('reasonterminate'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th><?php echo $this->Paginator->sort('compdate'); ?></th>
			<th><?php echo $this->Paginator->sort('basic'); ?></th>
			<th><?php echo $this->Paginator->sort('paf'); ?></th>
			<th><?php echo $this->Paginator->sort('reasonadjustment'); ?></th>
			<th><?php echo $this->Paginator->sort('totalsalary'); ?></th>
			<th><?php echo $this->Paginator->sort('promotiondate'); ?></th>
			<th><?php echo $this->Paginator->sort('award'); ?></th>
			<th><?php echo $this->Paginator->sort('memodate'); ?></th>
			<th><?php echo $this->Paginator->sort('memo'); ?></th>
			<th><?php echo $this->Paginator->sort('others1'); ?></th>
			<th><?php echo $this->Paginator->sort('others2'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($topsheets as $topsheet): ?>
	<tr>
		<td><?php echo h($topsheet['Topsheet']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($topsheet['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $topsheet['Employee']['id'])); ?>
		</td>
		<td><?php echo h($topsheet['Topsheet']['reasonterminate']); ?>&nbsp;</td>
		<td><?php echo h($topsheet['Topsheet']['type']); ?>&nbsp;</td>
		<td><?php echo h($topsheet['Topsheet']['compdate']); ?>&nbsp;</td>
		<td><?php echo h($topsheet['Topsheet']['basic']); ?>&nbsp;</td>
		<td><?php echo h($topsheet['Topsheet']['paf']); ?>&nbsp;</td>
		<td><?php echo h($topsheet['Topsheet']['reasonadjustment']); ?>&nbsp;</td>
		<td><?php echo h($topsheet['Topsheet']['totalsalary']); ?>&nbsp;</td>
		<td><?php echo h($topsheet['Topsheet']['promotiondate']); ?>&nbsp;</td>
		<td><?php echo h($topsheet['Topsheet']['award']); ?>&nbsp;</td>
		<td><?php echo h($topsheet['Topsheet']['memodate']); ?>&nbsp;</td>
		<td><?php echo h($topsheet['Topsheet']['memo']); ?>&nbsp;</td>
		<td><?php echo h($topsheet['Topsheet']['others1']); ?>&nbsp;</td>
		<td><?php echo h($topsheet['Topsheet']['others2']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $topsheet['Topsheet']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $topsheet['Topsheet']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $topsheet['Topsheet']['id']), array(), __('Are you sure you want to delete # %s?', $topsheet['Topsheet']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Topsheet'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
