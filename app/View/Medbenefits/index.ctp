<div class="medbenefits index">
	<h2><?php echo __('Medbenefits'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('medprovider_id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			<th><?php echo $this->Paginator->sort('employee_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($medbenefits as $medbenefit): ?>
	<tr>
		<td><?php echo h($medbenefit['Medbenefit']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($medbenefit['Medprovider']['name'], array('controller' => 'medproviders', 'action' => 'view', $medbenefit['Medprovider']['id'])); ?>
		</td>
		<td><?php echo h($medbenefit['Medbenefit']['name']); ?>&nbsp;</td>
		<td><?php echo h($medbenefit['Medbenefit']['amount']); ?>&nbsp;</td>
		<td><?php echo h($medbenefit['Medbenefit']['employee_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $medbenefit['Medbenefit']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $medbenefit['Medbenefit']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $medbenefit['Medbenefit']['id']), array(), __('Are you sure you want to delete # %s?', $medbenefit['Medbenefit']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Medbenefit'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Medproviders'), array('controller' => 'medproviders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medprovider'), array('controller' => 'medproviders', 'action' => 'add')); ?> </li>
	</ul>
</div>
