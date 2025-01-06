<div class="withholdingtaxes view">
<h2><?php echo __('Withholdingtax'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($withholdingtax['Withholdingtax']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Taxdescription'); ?></dt>
		<dd>
			<?php echo $this->Html->link($withholdingtax['Taxdescription']['id'], array('controller' => 'taxdescriptions', 'action' => 'view', $withholdingtax['Taxdescription']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Factor'); ?></dt>
		<dd>
			<?php echo h($withholdingtax['Withholdingtax']['Factor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Baseamount'); ?></dt>
		<dd>
			<?php echo h($withholdingtax['Withholdingtax']['baseamount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Basetax'); ?></dt>
		<dd>
			<?php echo h($withholdingtax['Withholdingtax']['basetax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Percentamount'); ?></dt>
		<dd>
			<?php echo h($withholdingtax['Withholdingtax']['percentamount']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Withholdingtax'), array('action' => 'edit', $withholdingtax['Withholdingtax']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Withholdingtax'), array('action' => 'delete', $withholdingtax['Withholdingtax']['id']), array(), __('Are you sure you want to delete # %s?', $withholdingtax['Withholdingtax']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Withholdingtaxes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Withholdingtax'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Taxdescriptions'), array('controller' => 'taxdescriptions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taxdescription'), array('controller' => 'taxdescriptions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Employees'); ?></h3>
	<?php if (!empty($withholdingtax['Employee'])): ?>
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
		<th><?php echo __('Dem'); ?></th>
		<th><?php echo __('Picture'); ?></th>
		<th><?php echo __('Sex'); ?></th>
		<th><?php echo __('Birthdate'); ?></th>
		<th><?php echo __('Civilstatus'); ?></th>
		<th><?php echo __('Religion'); ?></th>
		<th><?php echo __('Height'); ?></th>
		<th><?php echo __('Weight'); ?></th>
		<th><?php echo __('Fathername'); ?></th>
		<th><?php echo __('Fatheraddress'); ?></th>
		<th><?php echo __('Fathercontactnumber'); ?></th>
		<th><?php echo __('Fatheroccupation'); ?></th>
		<th><?php echo __('Mothername'); ?></th>
		<th><?php echo __('Motheraddress'); ?></th>
		<th><?php echo __('Mothercontactnumber'); ?></th>
		<th><?php echo __('Motheroccupation'); ?></th>
		<th><?php echo __('Mobilenumber'); ?></th>
		<th><?php echo __('Telephonenumber'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Permanentaddress'); ?></th>
		<th><?php echo __('Presetaddress'); ?></th>
		<th><?php echo __('Econtactname'); ?></th>
		<th><?php echo __('Econtactnumber'); ?></th>
		<th><?php echo __('Ehomeaddress'); ?></th>
		<th><?php echo __('Erelationship'); ?></th>
		<th><?php echo __('Primaryschool'); ?></th>
		<th><?php echo __('Primarygrad'); ?></th>
		<th><?php echo __('Primarycourse'); ?></th>
		<th><?php echo __('Secondaryschool'); ?></th>
		<th><?php echo __('Secondarygrad'); ?></th>
		<th><?php echo __('Secondarycourse'); ?></th>
		<th><?php echo __('Tertiaryschool'); ?></th>
		<th><?php echo __('Tertiarygrad'); ?></th>
		<th><?php echo __('Tertiarycourse'); ?></th>
		<th><?php echo __('Graduateschool'); ?></th>
		<th><?php echo __('Graduategrad'); ?></th>
		<th><?php echo __('Graduatecourse'); ?></th>
		<th><?php echo __('Postgradschool'); ?></th>
		<th><?php echo __('Postgradgrad'); ?></th>
		<th><?php echo __('Postgradcourse'); ?></th>
		<th><?php echo __('Transpo'); ?></th>
		<th><?php echo __('Clothing'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($withholdingtax['Employee'] as $employee): ?>
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
			<td><?php echo $employee['dem']; ?></td>
			<td><?php echo $employee['picture']; ?></td>
			<td><?php echo $employee['sex']; ?></td>
			<td><?php echo $employee['birthdate']; ?></td>
			<td><?php echo $employee['civilstatus']; ?></td>
			<td><?php echo $employee['religion']; ?></td>
			<td><?php echo $employee['height']; ?></td>
			<td><?php echo $employee['weight']; ?></td>
			<td><?php echo $employee['fathername']; ?></td>
			<td><?php echo $employee['fatheraddress']; ?></td>
			<td><?php echo $employee['fathercontactnumber']; ?></td>
			<td><?php echo $employee['fatheroccupation']; ?></td>
			<td><?php echo $employee['mothername']; ?></td>
			<td><?php echo $employee['motheraddress']; ?></td>
			<td><?php echo $employee['mothercontactnumber']; ?></td>
			<td><?php echo $employee['motheroccupation']; ?></td>
			<td><?php echo $employee['mobilenumber']; ?></td>
			<td><?php echo $employee['telephonenumber']; ?></td>
			<td><?php echo $employee['email']; ?></td>
			<td><?php echo $employee['permanentaddress']; ?></td>
			<td><?php echo $employee['presetaddress']; ?></td>
			<td><?php echo $employee['econtactname']; ?></td>
			<td><?php echo $employee['econtactnumber']; ?></td>
			<td><?php echo $employee['ehomeaddress']; ?></td>
			<td><?php echo $employee['erelationship']; ?></td>
			<td><?php echo $employee['primaryschool']; ?></td>
			<td><?php echo $employee['primarygrad']; ?></td>
			<td><?php echo $employee['primarycourse']; ?></td>
			<td><?php echo $employee['secondaryschool']; ?></td>
			<td><?php echo $employee['secondarygrad']; ?></td>
			<td><?php echo $employee['secondarycourse']; ?></td>
			<td><?php echo $employee['tertiaryschool']; ?></td>
			<td><?php echo $employee['tertiarygrad']; ?></td>
			<td><?php echo $employee['tertiarycourse']; ?></td>
			<td><?php echo $employee['graduateschool']; ?></td>
			<td><?php echo $employee['graduategrad']; ?></td>
			<td><?php echo $employee['graduatecourse']; ?></td>
			<td><?php echo $employee['postgradschool']; ?></td>
			<td><?php echo $employee['postgradgrad']; ?></td>
			<td><?php echo $employee['postgradcourse']; ?></td>
			<td><?php echo $employee['transpo']; ?></td>
			<td><?php echo $employee['clothing']; ?></td>
			<td><?php echo $employee['phone']; ?></td>
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
