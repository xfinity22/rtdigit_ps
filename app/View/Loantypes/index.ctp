<?php echo $this->element('page_title', ['title' => 'Loan Types']); ?>
<?php echo $this->element('submenu/loantype'); ?>


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
	


	<table class="table table-condensed default_table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('nextloannumber', 'Type'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php
	$i = 0;
	foreach ($loantypes as $loantype):
		$i++;
		$types=array('Deduction', 'Loan');
	?>
	<tr>
		<td><?php echo $i; ?>&nbsp;</td>
		<td><?php echo h($loantype['Loantype']['name']); ?>&nbsp;</td>
		<td><?php if(!empty($loantype['Loantype']['nextloannumber'])){ echo $types[$loantype['Loantype']['nextloannumber']]; } ?>&nbsp;</td>
		<td class="actions">
			<?php // echo $this->Html->link(__('View'), array('action' => 'view', $loantype['Loantype']['id'])); ?>
			<?php echo $this->Html->link(__('Update'), array('action' => 'edit', $loantype['Loantype']['id'])); ?>
			<?php // echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $loantype['Loantype']['id']), array(), __('Are you sure you want to delete # %s?', $loantype['Loantype']['id'])); ?>
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
