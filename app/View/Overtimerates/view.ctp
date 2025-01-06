<div class="overtimerates view">
<h2><?php echo __('Overtimerate'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($overtimerate['Overtimerate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($overtimerate['Overtimerate']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($overtimerate['Overtimerate']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Addonrate'); ?></dt>
		<dd>
			<?php echo h($overtimerate['Overtimerate']['addonrate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Overtimetype'); ?></dt>
		<dd>
			<?php echo $this->Html->link($overtimerate['Overtimetype']['name'], array('controller' => 'overtimetypes', 'action' => 'view', $overtimerate['Overtimetype']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Overtimerate'), array('action' => 'edit', $overtimerate['Overtimerate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Overtimerate'), array('action' => 'delete', $overtimerate['Overtimerate']['id']), array(), __('Are you sure you want to delete # %s?', $overtimerate['Overtimerate']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Overtimerates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Overtimerate'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Overtimetypes'), array('controller' => 'overtimetypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Overtimetype'), array('controller' => 'overtimetypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Overtimes'), array('controller' => 'overtimes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Overtime'), array('controller' => 'overtimes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Overtimes'); ?></h3>
	<?php if (!empty($overtimerate['Overtime'])): ?>
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
	<?php foreach ($overtimerate['Overtime'] as $overtime): ?>
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
