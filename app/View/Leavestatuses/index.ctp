<div class="leavestatuses index">
	<h2><?php echo __('Leavestatuses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($leavestatuses as $leavestatus): ?>
	<tr>
		<td><?php echo h($leavestatus['Leavestatus']['id']); ?>&nbsp;</td>
		<td><?php echo h($leavestatus['Leavestatus']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $leavestatus['Leavestatus']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $leavestatus['Leavestatus']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $leavestatus['Leavestatus']['id']), array(), __('Are you sure you want to delete # %s?', $leavestatus['Leavestatus']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Leavestatus'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Leavetakens'), array('controller' => 'leavetakens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leavetaken'), array('controller' => 'leavetakens', 'action' => 'add')); ?> </li>
	</ul>
</div>
