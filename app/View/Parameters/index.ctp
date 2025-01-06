<div class="parameters index">
	<h2><?php echo __('Parameters'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('graceperiod'); ?></th>
			<th><?php echo $this->Paginator->sort('minimumOT'); ?></th>
			<th><?php echo $this->Paginator->sort('standardworkhours'); ?></th>
			<th><?php echo $this->Paginator->sort('taxexemptedrate'); ?></th>
			<th><?php echo $this->Paginator->sort('maxhdmfcontri'); ?></th>
			<th><?php echo $this->Paginator->sort('maxnontaxincentive'); ?></th>
			<th><?php echo $this->Paginator->sort('vlpermonth'); ?></th>
			<th><?php echo $this->Paginator->sort('slpermonth'); ?></th>
			<th><?php echo $this->Paginator->sort('nextyeartoearnleave'); ?></th>
			<th><?php echo $this->Paginator->sort('nextmonthtoearnleave'); ?></th>
			<th><?php echo $this->Paginator->sort('logo'); ?></th>
			<th><?php echo $this->Paginator->sort('lateundertimebase_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($parameters as $parameter): ?>
	<tr>
		<td><?php echo h($parameter['Parameter']['id']); ?>&nbsp;</td>
		<td><?php echo h($parameter['Parameter']['graceperiod']); ?>&nbsp;</td>
		<td><?php echo h($parameter['Parameter']['minimumOT']); ?>&nbsp;</td>
		<td><?php echo h($parameter['Parameter']['standardworkhours']); ?>&nbsp;</td>
		<td><?php echo h($parameter['Parameter']['taxexemptedrate']); ?>&nbsp;</td>
		<td><?php echo h($parameter['Parameter']['maxhdmfcontri']); ?>&nbsp;</td>
		<td><?php echo h($parameter['Parameter']['maxnontaxincentive']); ?>&nbsp;</td>
		<td><?php echo h($parameter['Parameter']['vlpermonth']); ?>&nbsp;</td>
		<td><?php echo h($parameter['Parameter']['slpermonth']); ?>&nbsp;</td>
		<td><?php echo h($parameter['Parameter']['nextyeartoearnleave']); ?>&nbsp;</td>
		<td><?php echo h($parameter['Parameter']['nextmonthtoearnleave']); ?>&nbsp;</td>
		<td><?php echo h($parameter['Parameter']['logo']); ?>&nbsp;</td>
		<td><?php echo h($parameter['Parameter']['lateundertimebase_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $parameter['Parameter']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $parameter['Parameter']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $parameter['Parameter']['id']), array(), __('Are you sure you want to delete # %s?', $parameter['Parameter']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Parameter'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Lateundertimebases'), array('controller' => 'lateundertimebases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lateundertimebasis'), array('controller' => 'lateundertimebases', 'action' => 'add')); ?> </li>
	</ul>
</div>
