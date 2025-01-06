<div class="medsalarydeductions index">
	<h2><?php echo __('Medsalarydeductions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('employee_id'); ?></th>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($medsalarydeductions as $medsalarydeduction): ?>
	<tr>
		<td><?php echo h($medsalarydeduction['Medsalarydeduction']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($medsalarydeduction['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $medsalarydeduction['Employee']['id'])); ?>
		</td>
		<td><?php echo h($medsalarydeduction['Medsalarydeduction']['amount']); ?>&nbsp;</td>
		<td><?php echo h($medsalarydeduction['Medsalarydeduction']['description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $medsalarydeduction['Medsalarydeduction']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $medsalarydeduction['Medsalarydeduction']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $medsalarydeduction['Medsalarydeduction']['id']), array(), __('Are you sure you want to delete # %s?', $medsalarydeduction['Medsalarydeduction']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Medsalarydeduction'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
