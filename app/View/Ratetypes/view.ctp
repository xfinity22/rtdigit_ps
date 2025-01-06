<div class="ratetypes view">
<h2><?php echo __('Ratetype'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ratetype['Ratetype']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($ratetype['Ratetype']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ratetype'), array('action' => 'edit', $ratetype['Ratetype']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ratetype'), array('action' => 'delete', $ratetype['Ratetype']['id']), array(), __('Are you sure you want to delete # %s?', $ratetype['Ratetype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ratetypes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ratetype'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Incomes'), array('controller' => 'incomes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Income'), array('controller' => 'incomes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Employees'); ?></h3>
	<?php if (!empty($ratetype['Employee'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Employeeno'); ?></th>
		<th><?php echo __('Workschedule Id'); ?></th>
		<th><?php echo __('Division Id'); ?></th>
		<th><?php echo __('Department Id'); ?></th>
		<th><?php echo __('Fullname'); ?></th>
		<th><?php echo __('Lastname'); ?></th>
		<th><?php echo __('Middlename'); ?></th>
		<th><?php echo __('Firstname'); ?></th>
		<th><?php echo __('Costcenter Id'); ?></th>
		<th><?php echo __('Jobtitle Id'); ?></th>
		<th><?php echo __('Datehired'); ?></th>
		<th><?php echo __('Dateregularized'); ?></th>
		<th><?php echo __('Daterigned'); ?></th>
		<th><?php echo __('Dateterminated'); ?></th>
		<th><?php echo __('Employmentstatus Id'); ?></th>
		<th><?php echo __('Employeetype Id'); ?></th>
		<th><?php echo __('FaceID'); ?></th>
		<th><?php echo __('Sssnumber'); ?></th>
		<th><?php echo __('Pagibignumber'); ?></th>
		<th><?php echo __('Philhealthnumber'); ?></th>
		<th><?php echo __('Bank Id'); ?></th>
		<th><?php echo __('Payrollaccountnumber'); ?></th>
		<th><?php echo __('TIN'); ?></th>
		<th><?php echo __('Withholdingtax Id'); ?></th>
		<th><?php echo __('Ratetype Id'); ?></th>
		<th><?php echo __('Payfrequency Id'); ?></th>
		<th><?php echo __('Monthlyrate'); ?></th>
		<th><?php echo __('Dailyrate'); ?></th>
		<th><?php echo __('Hourlyrate'); ?></th>
		<th><?php echo __('Ecola'); ?></th>
		<th><?php echo __('Hdmf'); ?></th>
		<th><?php echo __('Allowance'); ?></th>
		<th><?php echo __('Picture'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($ratetype['Employee'] as $employee): ?>
		<tr>
			<td><?php echo $employee['id']; ?></td>
			<td><?php echo $employee['employeeno']; ?></td>
			<td><?php echo $employee['workschedule_id']; ?></td>
			<td><?php echo $employee['division_id']; ?></td>
			<td><?php echo $employee['department_id']; ?></td>
			<td><?php echo $employee['fullname']; ?></td>
			<td><?php echo $employee['lastname']; ?></td>
			<td><?php echo $employee['middlename']; ?></td>
			<td><?php echo $employee['firstname']; ?></td>
			<td><?php echo $employee['costcenter_id']; ?></td>
			<td><?php echo $employee['jobtitle_id']; ?></td>
			<td><?php echo $employee['datehired']; ?></td>
			<td><?php echo $employee['dateregularized']; ?></td>
			<td><?php echo $employee['daterigned']; ?></td>
			<td><?php echo $employee['dateterminated']; ?></td>
			<td><?php echo $employee['employmentstatus_id']; ?></td>
			<td><?php echo $employee['employeetype_id']; ?></td>
			<td><?php echo $employee['faceID']; ?></td>
			<td><?php echo $employee['sssnumber']; ?></td>
			<td><?php echo $employee['pagibignumber']; ?></td>
			<td><?php echo $employee['philhealthnumber']; ?></td>
			<td><?php echo $employee['bank_id']; ?></td>
			<td><?php echo $employee['payrollaccountnumber']; ?></td>
			<td><?php echo $employee['TIN']; ?></td>
			<td><?php echo $employee['withholdingtax_id']; ?></td>
			<td><?php echo $employee['ratetype_id']; ?></td>
			<td><?php echo $employee['payfrequency_id']; ?></td>
			<td><?php echo $employee['monthlyrate']; ?></td>
			<td><?php echo $employee['dailyrate']; ?></td>
			<td><?php echo $employee['hourlyrate']; ?></td>
			<td><?php echo $employee['ecola']; ?></td>
			<td><?php echo $employee['hdmf']; ?></td>
			<td><?php echo $employee['allowance']; ?></td>
			<td><?php echo $employee['picture']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'employees', 'action' => 'view', $employee['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'employees', 'action' => 'edit', $employee['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'employees', 'action' => 'delete', $employee['id']), array(), __('Are you sure you want to delete # %s?', $employee['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Incomes'); ?></h3>
	<?php if (!empty($ratetype['Income'])): ?>
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
	<?php foreach ($ratetype['Income'] as $income): ?>
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
