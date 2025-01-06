<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Userstatus'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Userstatus']['name'], array('controller' => 'userstatuses', 'action' => 'view', $user['Userstatus']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usertype'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Usertype']['name'], array('controller' => 'usertypes', 'action' => 'view', $user['Usertype']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Firstname'); ?></dt>
		<dd>
			<?php echo h($user['User']['firstname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastname'); ?></dt>
		<dd>
			<?php echo h($user['User']['lastname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastaccess'); ?></dt>
		<dd>
			<?php echo h($user['User']['lastaccess']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastip'); ?></dt>
		<dd>
			<?php echo h($user['User']['lastip']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Userstatuses'), array('controller' => 'userstatuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Userstatus'), array('controller' => 'userstatuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usertypes'), array('controller' => 'usertypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usertype'), array('controller' => 'usertypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Deductions'), array('controller' => 'deductions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Deduction'), array('controller' => 'deductions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Incomes'), array('controller' => 'incomes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Income'), array('controller' => 'incomes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lates'), array('controller' => 'lates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Late'), array('controller' => 'lates', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Overtimes'), array('controller' => 'overtimes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Overtime'), array('controller' => 'overtimes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Deductions'); ?></h3>
	<?php if (!empty($user['Deduction'])): ?>
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
	<?php foreach ($user['Deduction'] as $deduction): ?>
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
	<?php if (!empty($user['Income'])): ?>
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
	<?php foreach ($user['Income'] as $income): ?>
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
	<?php if (!empty($user['Late'])): ?>
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
	<?php foreach ($user['Late'] as $late): ?>
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
	<h3><?php echo __('Related Overtimes'); ?></h3>
	<?php if (!empty($user['Overtime'])): ?>
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
	<?php foreach ($user['Overtime'] as $overtime): ?>
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
