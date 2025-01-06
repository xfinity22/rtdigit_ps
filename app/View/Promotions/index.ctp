<div class="promotions index">
	<h2><?php echo __('Promotions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('employee_id'); ?></th>
			<th><?php echo $this->Paginator->sort('position'); ?></th>
			<th><?php echo $this->Paginator->sort('datefrom'); ?></th>
			<th><?php echo $this->Paginator->sort('dateend'); ?></th>
			<th><?php echo $this->Paginator->sort('salary'); ?></th>
			<th><?php echo $this->Paginator->sort('adjustment'); ?></th>
			<th><?php echo $this->Paginator->sort('increase'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($promotions as $promotion): ?>
	<tr>
		<td><?php echo h($promotion['Promotion']['id']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['employee_id']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['position']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['datefrom']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['dateend']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['salary']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['adjustment']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['increase']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $promotion['Promotion']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $promotion['Promotion']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $promotion['Promotion']['id']), array(), __('Are you sure you want to delete # %s?', $promotion['Promotion']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Promotion'), array('action' => 'add')); ?></li>
	</ul>
</div>
