<div class="payrollperiods view">
<h2><?php echo __('Payrollperiod'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($payrollperiod['Payrollperiod']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($payrollperiod['Payrollperiod']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('From'); ?></dt>
		<dd>
			<?php echo h($payrollperiod['Payrollperiod']['from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Until'); ?></dt>
		<dd>
			<?php echo h($payrollperiod['Payrollperiod']['until']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Withholdingtax'); ?></dt>
		<dd>
			<?php echo h($payrollperiod['Payrollperiod']['withholdingtax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sss'); ?></dt>
		<dd>
			<?php echo h($payrollperiod['Payrollperiod']['sss']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Philhealth'); ?></dt>
		<dd>
			<?php echo h($payrollperiod['Payrollperiod']['philhealth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pagibig'); ?></dt>
		<dd>
			<?php echo h($payrollperiod['Payrollperiod']['pagibig']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Financialyear'); ?></dt>
		<dd>
			<?php echo h($payrollperiod['Payrollperiod']['financialyear']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Period'); ?></dt>
		<dd>
			<?php echo h($payrollperiod['Payrollperiod']['period']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payrolltype'); ?></dt>
		<dd>
			<?php echo $this->Html->link($payrollperiod['Payrolltype']['name'], array('controller' => 'payrolltypes', 'action' => 'view', $payrollperiod['Payrolltype']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Classification'); ?></dt>
		<dd>
			<?php echo $this->Html->link($payrollperiod['Classification']['name'], array('controller' => 'classifications', 'action' => 'view', $payrollperiod['Classification']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payfrequency'); ?></dt>
		<dd>
			<?php echo $this->Html->link($payrollperiod['Payfrequency']['name'], array('controller' => 'payfrequencies', 'action' => 'view', $payrollperiod['Payfrequency']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Payrollperiod'), array('action' => 'edit', $payrollperiod['Payrollperiod']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Payrollperiod'), array('action' => 'delete', $payrollperiod['Payrollperiod']['id']), array(), __('Are you sure you want to delete # %s?', $payrollperiod['Payrollperiod']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Payrollperiods'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payrollperiod'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payrolltypes'), array('controller' => 'payrolltypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payrolltype'), array('controller' => 'payrolltypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Classifications'), array('controller' => 'classifications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classification'), array('controller' => 'classifications', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payfrequencies'), array('controller' => 'payfrequencies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payfrequency'), array('controller' => 'payfrequencies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Deductions'), array('controller' => 'deductions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Deduction'), array('controller' => 'deductions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Incomes'), array('controller' => 'incomes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Income'), array('controller' => 'incomes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lates'), array('controller' => 'lates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Late'), array('controller' => 'lates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Otherductionentries'), array('controller' => 'otherductionentries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Otherductionentry'), array('controller' => 'otherductionentries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Overtimes'), array('controller' => 'overtimes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Overtime'), array('controller' => 'overtimes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Deductions'); ?></h3>
	<?php if (!empty($payrollperiod['Deduction'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Employee Id'); ?></th>
		<th><?php echo __('Payrollperiod Id'); ?></th>
		<th><?php echo __('Rate'); ?></th>
		<th><?php echo __('Sss'); ?></th>
		<th><?php echo __('Philhealth'); ?></th>
		<th><?php echo __('Hdmf'); ?></th>
		<th><?php echo __('HdmfLoan'); ?></th>
		<th><?php echo __('SssLoan'); ?></th>
		<th><?php echo __('Advances'); ?></th>
		<th><?php echo __('Medical'); ?></th>
		<th><?php echo __('Uniform'); ?></th>
		<th><?php echo __('Penalty'); ?></th>
		<th><?php echo __('Tax'); ?></th>
		<th><?php echo __('Absentdays'); ?></th>
		<th><?php echo __('Absentamount'); ?></th>
		<th><?php echo __('Others'); ?></th>
		<th><?php echo __('Datemodified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($payrollperiod['Deduction'] as $deduction): ?>
		<tr>
			<td><?php echo $deduction['id']; ?></td>
			<td><?php echo $deduction['employee_id']; ?></td>
			<td><?php echo $deduction['payrollperiod_id']; ?></td>
			<td><?php echo $deduction['rate']; ?></td>
			<td><?php echo $deduction['sss']; ?></td>
			<td><?php echo $deduction['philhealth']; ?></td>
			<td><?php echo $deduction['hdmf']; ?></td>
			<td><?php echo $deduction['hdmfLoan']; ?></td>
			<td><?php echo $deduction['sssLoan']; ?></td>
			<td><?php echo $deduction['advances']; ?></td>
			<td><?php echo $deduction['medical']; ?></td>
			<td><?php echo $deduction['uniform']; ?></td>
			<td><?php echo $deduction['penalty']; ?></td>
			<td><?php echo $deduction['tax']; ?></td>
			<td><?php echo $deduction['absentdays']; ?></td>
			<td><?php echo $deduction['absentamount']; ?></td>
			<td><?php echo $deduction['others']; ?></td>
			<td><?php echo $deduction['datemodified']; ?></td>
			<td><?php echo $deduction['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'deductions', 'action' => 'view', $deduction['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'deductions', 'action' => 'edit', $deduction['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'deductions', 'action' => 'delete', $deduction['id']), array(), __('Are you sure you want to delete # %s?', $deduction['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Deduction'), array('controller' => 'deductions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Incomes'); ?></h3>
	<?php if (!empty($payrollperiod['Income'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Employee Id'); ?></th>
		<th><?php echo __('Payrollperiod Id'); ?></th>
		<th><?php echo __('Rate'); ?></th>
		<th><?php echo __('Ratetype Id'); ?></th>
		<th><?php echo __('Dayswork'); ?></th>
		<th><?php echo __('Grossincome'); ?></th>
		<th><?php echo __('Adjustments'); ?></th>
		<th><?php echo __('Deminimis'); ?></th>
		<th><?php echo __('Allowance'); ?></th>
		<th><?php echo __('Cola'); ?></th>
		<th><?php echo __('Datemodified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($payrollperiod['Income'] as $income): ?>
		<tr>
			<td><?php echo $income['id']; ?></td>
			<td><?php echo $income['employee_id']; ?></td>
			<td><?php echo $income['payrollperiod_id']; ?></td>
			<td><?php echo $income['rate']; ?></td>
			<td><?php echo $income['ratetype_id']; ?></td>
			<td><?php echo $income['dayswork']; ?></td>
			<td><?php echo $income['grossincome']; ?></td>
			<td><?php echo $income['adjustments']; ?></td>
			<td><?php echo $income['deminimis']; ?></td>
			<td><?php echo $income['allowance']; ?></td>
			<td><?php echo $income['cola']; ?></td>
			<td><?php echo $income['datemodified']; ?></td>
			<td><?php echo $income['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'incomes', 'action' => 'view', $income['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'incomes', 'action' => 'edit', $income['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'incomes', 'action' => 'delete', $income['id']), array(), __('Are you sure you want to delete # %s?', $income['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Income'), array('controller' => 'incomes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Lates'); ?></h3>
	<?php if (!empty($payrollperiod['Late'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Employee Id'); ?></th>
		<th><?php echo __('Payrollperiod Id'); ?></th>
		<th><?php echo __('Rate'); ?></th>
		<th><?php echo __('Hour'); ?></th>
		<th><?php echo __('Minutes'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Datemodified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($payrollperiod['Late'] as $late): ?>
		<tr>
			<td><?php echo $late['id']; ?></td>
			<td><?php echo $late['employee_id']; ?></td>
			<td><?php echo $late['payrollperiod_id']; ?></td>
			<td><?php echo $late['rate']; ?></td>
			<td><?php echo $late['hour']; ?></td>
			<td><?php echo $late['minutes']; ?></td>
			<td><?php echo $late['amount']; ?></td>
			<td><?php echo $late['datemodified']; ?></td>
			<td><?php echo $late['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'lates', 'action' => 'view', $late['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'lates', 'action' => 'edit', $late['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'lates', 'action' => 'delete', $late['id']), array(), __('Are you sure you want to delete # %s?', $late['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Late'), array('controller' => 'lates', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Otherductionentries'); ?></h3>
	<?php if (!empty($payrollperiod['Otherductionentry'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Payrollperiod Id'); ?></th>
		<th><?php echo __('Employee Id'); ?></th>
		<th><?php echo __('Otherdeduction Id'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($payrollperiod['Otherductionentry'] as $otherductionentry): ?>
		<tr>
			<td><?php echo $otherductionentry['id']; ?></td>
			<td><?php echo $otherductionentry['payrollperiod_id']; ?></td>
			<td><?php echo $otherductionentry['employee_id']; ?></td>
			<td><?php echo $otherductionentry['otherdeduction_id']; ?></td>
			<td><?php echo $otherductionentry['amount']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'otherductionentries', 'action' => 'view', $otherductionentry['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'otherductionentries', 'action' => 'edit', $otherductionentry['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'otherductionentries', 'action' => 'delete', $otherductionentry['id']), array(), __('Are you sure you want to delete # %s?', $otherductionentry['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Otherductionentry'), array('controller' => 'otherductionentries', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Overtimes'); ?></h3>
	<?php if (!empty($payrollperiod['Overtime'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Employee Id'); ?></th>
		<th><?php echo __('Payrollperiod Id'); ?></th>
		<th><?php echo __('Rate'); ?></th>
		<th><?php echo __('Requestddate'); ?></th>
		<th><?php echo __('Referencedate'); ?></th>
		<th><?php echo __('OTbegindate'); ?></th>
		<th><?php echo __('OTbegintime'); ?></th>
		<th><?php echo __('OTenddate'); ?></th>
		<th><?php echo __('OTendtime'); ?></th>
		<th><?php echo __('Reason'); ?></th>
		<th><?php echo __('OTstatus Id'); ?></th>
		<th><?php echo __('Overtimerate Id'); ?></th>
		<th><?php echo __('Datemodified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($payrollperiod['Overtime'] as $overtime): ?>
		<tr>
			<td><?php echo $overtime['id']; ?></td>
			<td><?php echo $overtime['employee_id']; ?></td>
			<td><?php echo $overtime['payrollperiod_id']; ?></td>
			<td><?php echo $overtime['rate']; ?></td>
			<td><?php echo $overtime['requestddate']; ?></td>
			<td><?php echo $overtime['referencedate']; ?></td>
			<td><?php echo $overtime['OTbegindate']; ?></td>
			<td><?php echo $overtime['OTbegintime']; ?></td>
			<td><?php echo $overtime['OTenddate']; ?></td>
			<td><?php echo $overtime['OTendtime']; ?></td>
			<td><?php echo $overtime['reason']; ?></td>
			<td><?php echo $overtime['OTstatus_id']; ?></td>
			<td><?php echo $overtime['overtimerate_id']; ?></td>
			<td><?php echo $overtime['datemodified']; ?></td>
			<td><?php echo $overtime['user_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'overtimes', 'action' => 'view', $overtime['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'overtimes', 'action' => 'edit', $overtime['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'overtimes', 'action' => 'delete', $overtime['id']), array(), __('Are you sure you want to delete # %s?', $overtime['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Overtime'), array('controller' => 'overtimes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
