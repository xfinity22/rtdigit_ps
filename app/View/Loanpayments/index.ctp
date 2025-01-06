<div class="loanpayments index">
	<h2><?php echo __('Loanpayments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('payrollperiod_id'); ?></th>
			<th><?php echo $this->Paginator->sort('loantype_id'); ?></th>
			<th><?php echo $this->Paginator->sort('amount'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($loanpayments as $loanpayment): ?>
	<tr>
		<td><?php echo h($loanpayment['Loanpayment']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($loanpayment['Payrollperiod']['id'], array('controller' => 'payrollperiods', 'action' => 'view', $loanpayment['Payrollperiod']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($loanpayment['Loantype']['name'], array('controller' => 'loantypes', 'action' => 'view', $loanpayment['Loantype']['id'])); ?>
		</td>
		<td><?php echo h($loanpayment['Loanpayment']['amount']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $loanpayment['Loanpayment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $loanpayment['Loanpayment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $loanpayment['Loanpayment']['id']), array(), __('Are you sure you want to delete # %s?', $loanpayment['Loanpayment']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Loanpayment'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Payrollperiods'), array('controller' => 'payrollperiods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payrollperiod'), array('controller' => 'payrollperiods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Loantypes'), array('controller' => 'loantypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Loantype'), array('controller' => 'loantypes', 'action' => 'add')); ?> </li>
	</ul>
</div>
