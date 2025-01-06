<?php echo $this->element('page_back', ['controller' => 'overtimerates', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'PhilHealth Contribution Table']); ?>
<hr />

	<table class="table table-condensed default_table">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th>Range Start</th>
			<th>Range End</th>
			<th>Salary Base</th>
			<th>Total Emp</th>
			<th>Employee Share</th>
			<th>Employer Share</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($philhealths as $philhealth): ?>
	<tr>
		<td><?php echo h($philhealth['Philhealth']['id']); ?>&nbsp;</td>
		<td><?php echo h($philhealth['Philhealth']['rangestart']); ?>&nbsp;</td>
		<td><?php echo h($philhealth['Philhealth']['rangeend']); ?>&nbsp;</td>
		<td><?php echo h($philhealth['Philhealth']['salarybase']); ?>&nbsp;</td>
		<td><?php echo h($philhealth['Philhealth']['totalmp']); ?>&nbsp;</td>
		<td><?php echo h($philhealth['Philhealth']['employeeshare']); ?>&nbsp;</td>
		<td><?php echo h($philhealth['Philhealth']['employershare']); ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $philhealth['Philhealth']['id'])); ?>
			<?php echo $this->Html->link(__('Update'), array('action' => 'edit', $philhealth['Philhealth']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $philhealth['Philhealth']['id']), array(), __('Are you sure you want to delete # %s?', $philhealth['Philhealth']['id'])); ?>
		</td>
	</tr>
	
<?php endforeach; ?>
	</tbody>
	<tr>
		<td colspan="12">
			<div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('Prev'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
			</div>
		</td>
	</tr>
	</table>
	