<br/><br/>
<div class="actions">
	<?php
		echo $this->Html->link(__('Finalize All'), array('controller' => 'incomes', 'action' => 'finalize', 1, $payrollperiod));
		echo '&nbsp';
		echo $this->Html->link(__('View All'), array('controller' => 'incomes', 'action' => 'processview', 1, $payrollperiod));
	?>
</div>
<br/><br/>

<table width="100%" class="bordered">
	<tr>
		<th colspan="2">DIVISIONS</th>
	</tr>
	<tr>
		<th>Name</th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($divisions as $division): ?>
	<tr>
		<td><?php echo h($division['Division']['name']); ?>&nbsp;</td>
		<td class="actions">
		<?php
			echo $this->Html->link(__('Finalize All'), array('controller' => 'incomes', 'action' => 'finalize', 2, $payrollperiod, $division['Division']['id']));
			echo '&nbsp';
			echo $this->Html->link(__('View All'), array('controller' => 'incomes', 'action' => 'processview', 2, $payrollperiod, $division['Division']['id']));
		?>
			
		</td>
	</tr>
<?php endforeach; ?>
</table>


<br/><br/>
<table width="100%" class="bordered">
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
			echo $this->Html->link(__('Finalize All'), array('controller' => 'incomes', 'action' => 'finalize', 3, $payrollperiod, $department['Department']['id']));
			echo '&nbsp';
			echo $this->Html->link(__('View All'), array('controller' => 'incomes', 'action' => 'processview', 3, $payrollperiod, $department['Department']['id']));
		?>
		</td>
	</tr>
<?php endforeach; ?>
</table>