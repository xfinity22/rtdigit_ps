<div class="earningrecords index">
	<h2><?php echo __('Earningrecords'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('otherearningsentry_id'); ?></th>
			<th><?php echo $this->Paginator->sort('payrollperiod_id'); ?></th>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($earningrecords as $earningrecord): ?>
	<tr>
		<td><?php echo h($earningrecord['Earningrecord']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($earningrecord['Otherearningsentry']['id'], array('controller' => 'otherearningsentries', 'action' => 'view', $earningrecord['Otherearningsentry']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($earningrecord['Payrollperiod']['id'], array('controller' => 'payrollperiods', 'action' => 'view', $earningrecord['Payrollperiod']['id'])); ?>
		</td>
		<td><?php echo h($earningrecord['Earningrecord']['amount']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $earningrecord['Earningrecord']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $earningrecord['Earningrecord']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $earningrecord['Earningrecord']['id']), array(), __('Are you sure you want to delete # %s?', $earningrecord['Earningrecord']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Earningrecord'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Otherearningsentries'), array('controller' => 'otherearningsentries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Otherearningsentry'), array('controller' => 'otherearningsentries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payrollperiods'), array('controller' => 'payrollperiods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payrollperiod'), array('controller' => 'payrollperiods', 'action' => 'add')); ?> </li>
	</ul>
</div>
