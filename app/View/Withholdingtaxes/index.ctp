<?php echo $this->element('page_back', ['controller' => 'overtimerates', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'With Holding Taxes Table']); ?>
<hr />

	<table class="table table-condensed default_table">
	<thead>
	<tr>
		
			<th>Tax Type</th>
			<th>Description</th>
			<th style="text-align: center;"><?php echo $this->Paginator->sort('Factor'); ?></th>
			<th style="text-align: right;">Base Amount</th>
			<th style="text-align: right;">End Amount</th>
			<th style="text-align: right;">Excess Of</th>
			<th style="text-align: right;">Percentage Tax</th>
			<th  style="text-align: center;">Percent Amount</th>
			<th class="actions"  style="text-align: center;"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($withholdingtaxes as $withholdingtax): ?>
	<tr>
		
		<td ><?php echo $withholdingtax['Taxdescription']['taxtype']; ?>&nbsp;</td>
		<td>
			<?php echo $withholdingtax['Taxdescription']['description']; ?>
		</td>
		<td style="text-align: center;"><?php echo h($withholdingtax['Withholdingtax']['Factor']); ?>&nbsp;</td>
		<td style="text-align: right;"><?php echo number_format($withholdingtax['Withholdingtax']['baseamount'], '2', '.', ','); ?>&nbsp;</td>
		<td style="text-align: right;"><?php echo number_format($withholdingtax['Withholdingtax']['endamount'], '2', '.', ','); ?>&nbsp;</td>
		<td style="text-align: right;"><?php echo number_format($withholdingtax['Withholdingtax']['excessof'], '2', '.', ','); ?>&nbsp;</td>
		<td style="text-align: right;"><?php echo number_format($withholdingtax['Withholdingtax']['basetax'], '2', '.', ','); ?>&nbsp;</td>
		<td style="text-align: center;"><?php echo h($withholdingtax['Withholdingtax']['percentamount']) . '%'; ?>&nbsp;</td>
		<td class="actions"  style="text-align: center;">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $withholdingtax['Withholdingtax']['id'])); ?>
			<?php echo $this->Html->link(__('Update'), array('action' => 'edit', $withholdingtax['Withholdingtax']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $withholdingtax['Withholdingtax']['id']), array(), __('Are you sure you want to delete # %s?', $withholdingtax['Withholdingtax']['id'])); ?>
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