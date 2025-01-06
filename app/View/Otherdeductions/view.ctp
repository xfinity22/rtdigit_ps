<div class="otherdeductions view">
<h2><?php echo __('Otherdeduction'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($otherdeduction['Otherdeduction']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($otherdeduction['Otherdeduction']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($otherdeduction['Otherdeduction']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Otherdeduction'), array('action' => 'edit', $otherdeduction['Otherdeduction']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Otherdeduction'), array('action' => 'delete', $otherdeduction['Otherdeduction']['id']), array(), __('Are you sure you want to delete # %s?', $otherdeduction['Otherdeduction']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Otherdeductions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Otherdeduction'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Otherductionentries'), array('controller' => 'otherductionentries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Otherductionentry'), array('controller' => 'otherductionentries', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Otherductionentries'); ?></h3>
	<?php if (!empty($otherdeduction['Otherductionentry'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Payrollperiod Id'); ?></th>
		<th><?php echo __('Employee Id'); ?></th>
		<th><?php echo __('Otherdeduction Id'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($otherdeduction['Otherductionentry'] as $otherductionentry): ?>
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
