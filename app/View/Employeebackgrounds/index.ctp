<div class="employeebackgrounds index">
	<h2><?php echo __('Employeebackgrounds'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('employee_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sex'); ?></th>
			<th><?php echo $this->Paginator->sort('birthdate'); ?></th>
			<th><?php echo $this->Paginator->sort('civilstatus'); ?></th>
			<th><?php echo $this->Paginator->sort('religion'); ?></th>
			<th><?php echo $this->Paginator->sort('height'); ?></th>
			<th><?php echo $this->Paginator->sort('weight'); ?></th>
			<th><?php echo $this->Paginator->sort('fathername'); ?></th>
			<th><?php echo $this->Paginator->sort('fatheraddress'); ?></th>
			<th><?php echo $this->Paginator->sort('fathercontactnumber'); ?></th>
			<th><?php echo $this->Paginator->sort('fatheroccupation'); ?></th>
			<th><?php echo $this->Paginator->sort('mothername'); ?></th>
			<th><?php echo $this->Paginator->sort('motheraddress'); ?></th>
			<th><?php echo $this->Paginator->sort('mothercontactnumber'); ?></th>
			<th><?php echo $this->Paginator->sort('motheroccupation'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($employeebackgrounds as $employeebackground): ?>
	<tr>
		<td><?php echo h($employeebackground['Employeebackground']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($employeebackground['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $employeebackground['Employee']['id'])); ?>
		</td>
		<td><?php echo h($employeebackground['Employeebackground']['sex']); ?>&nbsp;</td>
		<td><?php echo h($employeebackground['Employeebackground']['birthdate']); ?>&nbsp;</td>
		<td><?php echo h($employeebackground['Employeebackground']['civilstatus']); ?>&nbsp;</td>
		<td><?php echo h($employeebackground['Employeebackground']['religion']); ?>&nbsp;</td>
		<td><?php echo h($employeebackground['Employeebackground']['height']); ?>&nbsp;</td>
		<td><?php echo h($employeebackground['Employeebackground']['weight']); ?>&nbsp;</td>
		<td><?php echo h($employeebackground['Employeebackground']['fathername']); ?>&nbsp;</td>
		<td><?php echo h($employeebackground['Employeebackground']['fatheraddress']); ?>&nbsp;</td>
		<td><?php echo h($employeebackground['Employeebackground']['fathercontactnumber']); ?>&nbsp;</td>
		<td><?php echo h($employeebackground['Employeebackground']['fatheroccupation']); ?>&nbsp;</td>
		<td><?php echo h($employeebackground['Employeebackground']['mothername']); ?>&nbsp;</td>
		<td><?php echo h($employeebackground['Employeebackground']['motheraddress']); ?>&nbsp;</td>
		<td><?php echo h($employeebackground['Employeebackground']['mothercontactnumber']); ?>&nbsp;</td>
		<td><?php echo h($employeebackground['Employeebackground']['motheroccupation']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $employeebackground['Employeebackground']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $employeebackground['Employeebackground']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $employeebackground['Employeebackground']['id']), array(), __('Are you sure you want to delete # %s?', $employeebackground['Employeebackground']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Employeebackground'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
