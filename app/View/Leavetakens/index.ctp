<div class="leavetakens index">
	<h2><?php echo __('Leavetakens'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('employee_id'); ?></th>
			<th><?php echo $this->Paginator->sort('vltype_id'); ?></th>
			<th><?php echo $this->Paginator->sort('date'); ?></th>
			<th><?php echo $this->Paginator->sort('leavestatus_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($leavetakens as $leavetaken): ?>
	<tr>
		<td><?php echo h($leavetaken['Leavetaken']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($leavetaken['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $leavetaken['Employee']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($leavetaken['Vltype']['name'], array('controller' => 'vltypes', 'action' => 'view', $leavetaken['Vltype']['id'])); ?>
		</td>
		<td><?php echo h($leavetaken['Leavetaken']['date']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($leavetaken['Leavestatus']['name'], array('controller' => 'leavestatuses', 'action' => 'view', $leavetaken['Leavestatus']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $leavetaken['Leavetaken']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $leavetaken['Leavetaken']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $leavetaken['Leavetaken']['id']), array(), __('Are you sure you want to delete # %s?', $leavetaken['Leavetaken']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Leavetaken'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vltypes'), array('controller' => 'vltypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vltype'), array('controller' => 'vltypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Leavestatuses'), array('controller' => 'leavestatuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leavestatus'), array('controller' => 'leavestatuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
