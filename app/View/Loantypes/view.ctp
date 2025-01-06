<div class="loantypes view">
<h2><?php echo __('Loantype'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($loantype['Loantype']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($loantype['Loantype']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nextloannumber'); ?></dt>
		<dd>
			<?php echo h($loantype['Loantype']['nextloannumber']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Loantype'), array('action' => 'edit', $loantype['Loantype']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Loantype'), array('action' => 'delete', $loantype['Loantype']['id']), array(), __('Are you sure you want to delete # %s?', $loantype['Loantype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Loantypes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Loantype'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Loanentries'), array('controller' => 'loanentries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Loanentry'), array('controller' => 'loanentries', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Loanentries'); ?></h3>
	<?php if (!empty($loantype['Loanentry'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Loantype Id'); ?></th>
		<th><?php echo __('Employee Id'); ?></th>
		<th><?php echo __('Loandate'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Deductionperpayday'); ?></th>
		<th><?php echo __('Startdeduction'); ?></th>
		<th><?php echo __('Nextinstallment'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($loantype['Loanentry'] as $loanentry): ?>
		<tr>
			<td><?php echo $loanentry['id']; ?></td>
			<td><?php echo $loanentry['loantype_id']; ?></td>
			<td><?php echo $loanentry['employee_id']; ?></td>
			<td><?php echo $loanentry['loandate']; ?></td>
			<td><?php echo $loanentry['amount']; ?></td>
			<td><?php echo $loanentry['deductionperpayday']; ?></td>
			<td><?php echo $loanentry['startdeduction']; ?></td>
			<td><?php echo $loanentry['nextinstallment']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'loanentries', 'action' => 'view', $loanentry['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'loanentries', 'action' => 'edit', $loanentry['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'loanentries', 'action' => 'delete', $loanentry['id']), array(), __('Are you sure you want to delete # %s?', $loanentry['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Loanentry'), array('controller' => 'loanentries', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
