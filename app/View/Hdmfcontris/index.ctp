<?php echo $this->element('page_back', ['controller' => 'overtimerates', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'HDMF Contribution Table']); ?>
<hr />

	<table class="table table-condensed default_table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('bracket1'); ?></th>
			<th><?php echo $this->Paginator->sort('bracket2'); ?></th>
			<th><?php echo $this->Paginator->sort('pct'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($hdmfcontris as $hdmfcontri): ?>
	<tr>
		<td><?php echo h($hdmfcontri['Hdmfcontri']['id']); ?>&nbsp;</td>
		<td><?php echo h($hdmfcontri['Hdmfcontri']['bracket1']); ?>&nbsp;</td>
		<td><?php echo h($hdmfcontri['Hdmfcontri']['bracket2']); ?>&nbsp;</td>
		<td><?php echo h($hdmfcontri['Hdmfcontri']['pct']); ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $hdmfcontri['Hdmfcontri']['id'])); ?>
			<?php echo $this->Html->link(__('Update'), array('action' => 'edit', $hdmfcontri['Hdmfcontri']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $hdmfcontri['Hdmfcontri']['id']), array(), __('Are you sure you want to delete # %s?', $hdmfcontri['Hdmfcontri']['id'])); ?>
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
