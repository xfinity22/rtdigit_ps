<div class="classifications view">
<h2><?php echo __('Classification'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($classification['Classification']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($classification['Classification']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Classification'), array('action' => 'edit', $classification['Classification']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Classification'), array('action' => 'delete', $classification['Classification']['id']), array(), __('Are you sure you want to delete # %s?', $classification['Classification']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Classifications'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Classification'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payrollperiods'), array('controller' => 'payrollperiods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payrollperiod'), array('controller' => 'payrollperiods', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Payrollperiods'); ?></h3>
	<?php if (!empty($classification['Payrollperiod'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('From'); ?></th>
		<th><?php echo __('Until'); ?></th>
		<th><?php echo __('Withholdingtax'); ?></th>
		<th><?php echo __('Sss'); ?></th>
		<th><?php echo __('Philhealth'); ?></th>
		<th><?php echo __('Pagibig'); ?></th>
		<th><?php echo __('Financialyear'); ?></th>
		<th><?php echo __('Period'); ?></th>
		<th><?php echo __('Payrolltype Id'); ?></th>
		<th><?php echo __('Classification Id'); ?></th>
		<th><?php echo __('Payfrequency Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($classification['Payrollperiod'] as $payrollperiod): ?>
		<tr>
			<td><?php echo $payrollperiod['id']; ?></td>
			<td><?php echo $payrollperiod['code']; ?></td>
			<td><?php echo $payrollperiod['from']; ?></td>
			<td><?php echo $payrollperiod['until']; ?></td>
			<td><?php echo $payrollperiod['withholdingtax']; ?></td>
			<td><?php echo $payrollperiod['sss']; ?></td>
			<td><?php echo $payrollperiod['philhealth']; ?></td>
			<td><?php echo $payrollperiod['pagibig']; ?></td>
			<td><?php echo $payrollperiod['financialyear']; ?></td>
			<td><?php echo $payrollperiod['period']; ?></td>
			<td><?php echo $payrollperiod['payrolltype_id']; ?></td>
			<td><?php echo $payrollperiod['classification_id']; ?></td>
			<td><?php echo $payrollperiod['payfrequency_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'payrollperiods', 'action' => 'view', $payrollperiod['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'payrollperiods', 'action' => 'edit', $payrollperiod['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'payrollperiods', 'action' => 'delete', $payrollperiod['id']), array(), __('Are you sure you want to delete # %s?', $payrollperiod['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Payrollperiod'), array('controller' => 'payrollperiods', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
