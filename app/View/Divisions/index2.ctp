<?php echo $this->element('page_back', ['controller' => 'payrollperiods', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'Finalize / View Payroll']); ?>
<hr />

<?php ?>

<div class="actions">
	<?php
		$lo = $this->requestAction('users/loggeduser/');
		//echo $this->Html->link(__('Process All'), array('controller' => 'incomes', 'action' => 'processall', 4, 0, $payrollperiod));
		//echo '&nbsp';
		$payrollperiod = $lo['User']['payrollperiod'];
		echo $this->Html->link(__('Finalize All'), array('controller' => 'incomes', 'action' => 'finalize', 1, $lo['User']['payrollperiod'], 0 ,1));
		echo '&nbsp';
		echo $this->Html->link(__('View All'), array('controller' => 'incomes', 'action' => 'processview', 1, $lo['User']['payrollperiod']));
		echo '&nbsp';
		echo $this->Html->link(__('Print ALL Payslip'), array('controller' => 'incomes', 'action' => 'printpayslip', 'ext' => 'pdf', 1, $payrollperiod), array('target' => '_blank'));
	?>
</div>
<br/><br/>

<br/><br/>
<table class="table table-condensed default_table">
	<tr>
		<th colspan="2">DEPARTMENTS</th>
	</tr>
	<tr>
		<th>Name</th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($departments as $department): ?>
	<tr>
		<td><?php echo h($department['Department']['name']); ?>&nbsp;</td>
		<td class="actions">
		<?php
			//echo $this->Html->link(__('Process All'), array('controller' => 'incomes', 'action' => 'processall', 3, $department['Department']['id'], $payrollperiod));
			//echo '&nbsp';
			//echo $this->Html->link(__('Finalize All'), array('controller' => 'incomes', 'action' => 'finalize', 3, $payrollperiod, $department['Department']['id']));
			//echo '&nbsp';
			echo $this->Html->link(__('View All'), array('controller' => 'incomes', 'action' => 'processview', 3, $payrollperiod, $department['Department']['id']));
			echo '&nbsp';
			echo $this->Html->link(__('Print Payslip'), array('controller' => 'incomes', 'action' => 'printpayslip', 'ext' => 'pdf', 3, $payrollperiod, $department['Department']['id']), array('target' => '_blank'));
		?>
		</td>
	</tr>
<?php endforeach; ?>
</table>

<br/><br/>
<table class="table table-condensed default_table">
	<tr>
		<th colspan="2">BRANCHES</th>
	</tr>
	<tr>
		
		<th>Name</th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($branches as $branch): ?>
	<tr>
		
		<td><?php echo h($branch['Branch']['name']); ?>&nbsp;</td>
		<td class="actions">
		<?php
			//echo $this->Html->link(__('Process All'), array('controller' => 'incomes', 'action' => 'processall', 3, $department['Department']['id'], $payrollperiod));
			//echo '&nbsp';
			//echo $this->Html->link(__('Finalize All'), array('controller' => 'incomes', 'action' => 'finalize', 3, $payrollperiod, $department['Department']['id']));
			//echo '&nbsp';
			echo $this->Html->link(__('View All'), array('controller' => 'incomes', 'action' => 'processview', 5, $payrollperiod, $branch['Branch']['id']));
			echo '&nbsp';
			echo $this->Html->link(__('Print Payslip'), array('controller' => 'incomes', 'action' => 'printpayslip', 'ext' => 'pdf', 5, $payrollperiod, $branch['Branch']['id']), array('target' => '_blank'));
		?>
		</td>
	</tr>
<?php endforeach; ?>
</table>