<?php echo $this->element('page_back', ['controller' => 'users', 'action' => 'settings']); ?>
<?php echo $this->element('page_title', ['title' => 'Division & Department']); ?>
<?php echo $this->element('submenu/division'); ?>


<table class="table table-condensed default_table">
	<tr>
		<th colspan="2">DIVISIONS</th>
	</tr>
	<tr>
		<th width="50%">Name</th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($divisions as $division): ?>
	<tr>
		<td><?php echo h($division['Division']['name']); ?>&nbsp;</td>
		<td class="actions">
		<?php
			//echo $this->Html->link(__('Print Payslip'), array('controller' => 'incomes', 'action' => 'printpayslip', 'ext' => 'pdf', 2, $payrollperiod, $division['Division']['id']), array('target' => '_blank'));
			echo $this->Html->link(__('Update'), array('action' => 'edit', $division['Division']['id']));
		?>
			
		</td>
	</tr>
<?php endforeach; ?>
</table>


<br/><br/>
<table class="table table-condensed default_table">
	<tr>
		<th colspan="2">DEPARTMENTS</th>
	</tr>
	<tr>
		<th width="50%">Name</th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($departments as $department): ?>
	<tr>
		<td><?php echo h($department['Department']['name']); ?>&nbsp;</td>
		<td class="actions">
		<?php
			//echo $this->Html->link(__('Print Payslip'), array('controller' => 'incomes', 'action' => 'printpayslip', 'ext' => 'pdf', 3, $payrollperiod, $department['Department']['id']), array('target' => '_blank'));
			echo $this->Html->link(__('Update'), array('controller' => 'departments', 'action' => 'edit', $payrollperiod, $department['Department']['id']));
		?>
		</td>
	</tr>
<?php endforeach; ?>
</table>