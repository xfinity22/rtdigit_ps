<div class="medhospitals view">
<h2><?php echo __('Medhospital'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($medhospital['Medhospital']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($medhospital['Medhospital']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medprovider Id'); ?></dt>
		<dd>
			<?php echo h($medhospital['Medhospital']['medprovider_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Medhospital'), array('action' => 'edit', $medhospital['Medhospital']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Medhospital'), array('action' => 'delete', $medhospital['Medhospital']['id']), array(), __('Are you sure you want to delete # %s?', $medhospital['Medhospital']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Medhospitals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medhospital'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Medcheckups'), array('controller' => 'medcheckups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medcheckup'), array('controller' => 'medcheckups', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Medcheckups'); ?></h3>
	<?php if (!empty($medhospital['Medcheckup'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Employee Id'); ?></th>
		<th><?php echo __('Medhospital Id'); ?></th>
		<th><?php echo __('Fees'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($medhospital['Medcheckup'] as $medcheckup): ?>
		<tr>
			<td><?php echo $medcheckup['id']; ?></td>
			<td><?php echo $medcheckup['employee_id']; ?></td>
			<td><?php echo $medcheckup['medhospital_id']; ?></td>
			<td><?php echo $medcheckup['fees']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'medcheckups', 'action' => 'view', $medcheckup['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'medcheckups', 'action' => 'edit', $medcheckup['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'medcheckups', 'action' => 'delete', $medcheckup['id']), array(), __('Are you sure you want to delete # %s?', $medcheckup['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Medcheckup'), array('controller' => 'medcheckups', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
