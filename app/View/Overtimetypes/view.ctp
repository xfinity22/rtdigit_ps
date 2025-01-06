<div class="overtimetypes view">
<h2><?php echo __('Overtimetype'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($overtimetype['Overtimetype']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($overtimetype['Overtimetype']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Overtimetype'), array('action' => 'edit', $overtimetype['Overtimetype']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Overtimetype'), array('action' => 'delete', $overtimetype['Overtimetype']['id']), array(), __('Are you sure you want to delete # %s?', $overtimetype['Overtimetype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Overtimetypes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Overtimetype'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Overtimerates'), array('controller' => 'overtimerates', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Overtimerate'), array('controller' => 'overtimerates', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Overtimerates'); ?></h3>
	<?php if (!empty($overtimetype['Overtimerate'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Addonrate'); ?></th>
		<th><?php echo __('Overtimetype Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($overtimetype['Overtimerate'] as $overtimerate): ?>
		<tr>
			<td><?php echo $overtimerate['id']; ?></td>
			<td><?php echo $overtimerate['name']; ?></td>
			<td><?php echo $overtimerate['description']; ?></td>
			<td><?php echo $overtimerate['addonrate']; ?></td>
			<td><?php echo $overtimerate['overtimetype_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'overtimerates', 'action' => 'view', $overtimerate['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'overtimerates', 'action' => 'edit', $overtimerate['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'overtimerates', 'action' => 'delete', $overtimerate['id']), array(), __('Are you sure you want to delete # %s?', $overtimerate['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Overtimerate'), array('controller' => 'overtimerates', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
