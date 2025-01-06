<div class="vltypes view">
<h2><?php echo __('Vltype'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($vltype['Vltype']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($vltype['Vltype']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Vltype'), array('action' => 'edit', $vltype['Vltype']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Vltype'), array('action' => 'delete', $vltype['Vltype']['id']), array(), __('Are you sure you want to delete # %s?', $vltype['Vltype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Vltypes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vltype'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Leavetakens'), array('controller' => 'leavetakens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leavetaken'), array('controller' => 'leavetakens', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Leavetakens'); ?></h3>
	<?php if (!empty($vltype['Leavetaken'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Employee Id'); ?></th>
		<th><?php echo __('Vltype Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Leavestatus Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($vltype['Leavetaken'] as $leavetaken): ?>
		<tr>
			<td><?php echo $leavetaken['id']; ?></td>
			<td><?php echo $leavetaken['employee_id']; ?></td>
			<td><?php echo $leavetaken['vltype_id']; ?></td>
			<td><?php echo $leavetaken['date']; ?></td>
			<td><?php echo $leavetaken['leavestatus_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'leavetakens', 'action' => 'view', $leavetaken['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'leavetakens', 'action' => 'edit', $leavetaken['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'leavetakens', 'action' => 'delete', $leavetaken['id']), array(), __('Are you sure you want to delete # %s?', $leavetaken['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Leavetaken'), array('controller' => 'leavetakens', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
