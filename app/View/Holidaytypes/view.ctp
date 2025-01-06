<div class="holidaytypes view">
<h2><?php echo __('Holidaytype'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($holidaytype['Holidaytype']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($holidaytype['Holidaytype']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Holidaytype'), array('action' => 'edit', $holidaytype['Holidaytype']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Holidaytype'), array('action' => 'delete', $holidaytype['Holidaytype']['id']), array(), __('Are you sure you want to delete # %s?', $holidaytype['Holidaytype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Holidaytypes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Holidaytype'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Holidays'), array('controller' => 'holidays', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Holiday'), array('controller' => 'holidays', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Holidays'); ?></h3>
	<?php if (!empty($holidaytype['Holiday'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Date'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Holidaytype Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($holidaytype['Holiday'] as $holiday): ?>
		<tr>
			<td><?php echo $holiday['id']; ?></td>
			<td><?php echo $holiday['date']; ?></td>
			<td><?php echo $holiday['description']; ?></td>
			<td><?php echo $holiday['holidaytype_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'holidays', 'action' => 'view', $holiday['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'holidays', 'action' => 'edit', $holiday['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'holidays', 'action' => 'delete', $holiday['id']), array(), __('Are you sure you want to delete # %s?', $holiday['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Holiday'), array('controller' => 'holidays', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
