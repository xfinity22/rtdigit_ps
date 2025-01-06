<div class="medcheckups index">
	<h2><?php echo __('Medcheckups'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('employee_id'); ?></th>
			<th><?php echo $this->Paginator->sort('medhospital_id'); ?></th>
			<th><?php echo $this->Paginator->sort('fees'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($medcheckups as $medcheckup): ?>
	<tr>
		<td><?php echo h($medcheckup['Medcheckup']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($medcheckup['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $medcheckup['Employee']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($medcheckup['Medhospital']['name'], array('controller' => 'medhospitals', 'action' => 'view', $medcheckup['Medhospital']['id'])); ?>
		</td>
		<td><?php echo h($medcheckup['Medcheckup']['fees']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $medcheckup['Medcheckup']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $medcheckup['Medcheckup']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $medcheckup['Medcheckup']['id']), array(), __('Are you sure you want to delete # %s?', $medcheckup['Medcheckup']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Medcheckup'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Medhospitals'), array('controller' => 'medhospitals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medhospital'), array('controller' => 'medhospitals', 'action' => 'add')); ?> </li>
	</ul>
</div>
