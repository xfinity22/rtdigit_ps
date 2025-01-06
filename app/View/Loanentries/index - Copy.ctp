<?php
echo '<h2>Employees\' Loan</h2>';
echo '<table cellpadding="0" cellspacing="0" class="bordered" width="90%">'; ?>
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('loantype_id', 'Name'); ?></th>
			<th>Type</th>
			<th><?php echo $this->Paginator->sort('employee_id'); ?></th>
			<th>Loan Date</th>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			<th>Deduction Type</th>
			
			<th>Deduction</th>
			<th>Start of Deduction</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php
		foreach ($loanentries as $loanentry):
		$types=array('Deduction', 'Loan');
	?>
	<tr>
		<td><?php echo h($loanentry['Loanentry']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($loanentry['Loantype']['name'], array('controller' => 'loantypes', 'action' => 'edit', $loanentry['Loantype']['id'])); ?>
		</td>
		<td>
			<?php
			if ($loanentry['Loantype']['nextloannumber'] > -1){
				echo $types[$loanentry['Loantype']['nextloannumber']];
			}
			//echo $loanentry['Loantype']['nextloannumber'];
			?>
		</td>
		
		<td>
			<?php echo $this->Html->link($loanentry['Employee']['firstname'] . ' ' . $loanentry['Employee']['lastname'], array('controller' => 'employees', 'action' => 'view', $loanentry['Employee']['id'])); ?>
		</td>
		<td><?php echo h($loanentry['Loanentry']['loandate']); ?>&nbsp;</td>
		<td><?php echo h($loanentry['Loanentry']['amount']); ?>&nbsp;</td>
		<td><?php
			if ($loanentry['Loanentry']['deductiontype'] == 0){
				echo 'First Half';
			}else if ($loanentry['Loanentry']['deductiontype'] == 1){
				echo 'Second Half';
			}else if ($loanentry['Loanentry']['deductiontype'] == 2){
				echo 'Every Payday';
			}
		
		?></td>
		<td><?php echo h($loanentry['Loanentry']['deductionperpayday']); ?>&nbsp;</td>
		<td><?php echo h($loanentry['Loanentry']['startdeduction']); ?>&nbsp;</td>
		<td class="actions">
			<?php // echo $this->Html->link(__('View'), array('action' => 'view', $loanentry['Loanentry']['id'])); ?>
			<?php echo $this->Html->link(__('Update'), array('action' => 'edit', $loanentry['Loanentry']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $loanentry['Loanentry']['id']), array(), __('Are you sure you want to delete # %s?', $loanentry['Loanentry']['id'])); ?>
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

