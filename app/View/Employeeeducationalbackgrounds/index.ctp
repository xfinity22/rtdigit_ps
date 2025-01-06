<div class="employeeeducationalbackgrounds index">
	<h2><?php echo __('Employeeeducationalbackgrounds'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('employee_id'); ?></th>
			<th><?php echo $this->Paginator->sort('primaryschool'); ?></th>
			<th><?php echo $this->Paginator->sort('primarygrad'); ?></th>
			<th><?php echo $this->Paginator->sort('primarycourse'); ?></th>
			<th><?php echo $this->Paginator->sort('secondaryschool'); ?></th>
			<th><?php echo $this->Paginator->sort('secondarygrad'); ?></th>
			<th><?php echo $this->Paginator->sort('secondarycourse'); ?></th>
			<th><?php echo $this->Paginator->sort('tertiaryschool'); ?></th>
			<th><?php echo $this->Paginator->sort('tertiarygrad'); ?></th>
			<th><?php echo $this->Paginator->sort('tertiarycourse'); ?></th>
			<th><?php echo $this->Paginator->sort('graduateschool'); ?></th>
			<th><?php echo $this->Paginator->sort('graduategrad'); ?></th>
			<th><?php echo $this->Paginator->sort('graduatecourse'); ?></th>
			<th><?php echo $this->Paginator->sort('postgradschool'); ?></th>
			<th><?php echo $this->Paginator->sort('postgradgrad'); ?></th>
			<th><?php echo $this->Paginator->sort('postgradcourse'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($employeeeducationalbackgrounds as $employeeeducationalbackground): ?>
	<tr>
		<td><?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($employeeeducationalbackground['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $employeeeducationalbackground['Employee']['id'])); ?>
		</td>
		<td><?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['primaryschool']); ?>&nbsp;</td>
		<td><?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['primarygrad']); ?>&nbsp;</td>
		<td><?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['primarycourse']); ?>&nbsp;</td>
		<td><?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['secondaryschool']); ?>&nbsp;</td>
		<td><?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['secondarygrad']); ?>&nbsp;</td>
		<td><?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['secondarycourse']); ?>&nbsp;</td>
		<td><?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['tertiaryschool']); ?>&nbsp;</td>
		<td><?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['tertiarygrad']); ?>&nbsp;</td>
		<td><?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['tertiarycourse']); ?>&nbsp;</td>
		<td><?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['graduateschool']); ?>&nbsp;</td>
		<td><?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['graduategrad']); ?>&nbsp;</td>
		<td><?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['graduatecourse']); ?>&nbsp;</td>
		<td><?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['postgradschool']); ?>&nbsp;</td>
		<td><?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['postgradgrad']); ?>&nbsp;</td>
		<td><?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['postgradcourse']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $employeeeducationalbackground['Employeeeducationalbackground']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $employeeeducationalbackground['Employeeeducationalbackground']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $employeeeducationalbackground['Employeeeducationalbackground']['id']), array(), __('Are you sure you want to delete # %s?', $employeeeducationalbackground['Employeeeducationalbackground']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Employeeeducationalbackground'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
