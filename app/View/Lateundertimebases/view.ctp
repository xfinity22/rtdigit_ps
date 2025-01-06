<div class="lateundertimebases view">
<h2><?php echo __('Lateundertimebase'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($lateundertimebase['Lateundertimebase']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($lateundertimebase['Lateundertimebase']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Lateundertimebase'), array('action' => 'edit', $lateundertimebase['Lateundertimebase']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Lateundertimebase'), array('action' => 'delete', $lateundertimebase['Lateundertimebase']['id']), array(), __('Are you sure you want to delete # %s?', $lateundertimebase['Lateundertimebase']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Lateundertimebases'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lateundertimebase'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Parameters'), array('controller' => 'parameters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parameter'), array('controller' => 'parameters', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Parameters'); ?></h3>
	<?php if (!empty($lateundertimebase['Parameter'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Graceperiod'); ?></th>
		<th><?php echo __('MinimumOT'); ?></th>
		<th><?php echo __('Standardworkhours'); ?></th>
		<th><?php echo __('Taxexemptedrate'); ?></th>
		<th><?php echo __('Maxhdmfcontri'); ?></th>
		<th><?php echo __('Maxnontaxincentive'); ?></th>
		<th><?php echo __('Vlpermonth'); ?></th>
		<th><?php echo __('Slpermonth'); ?></th>
		<th><?php echo __('Nextyeartoearnleave'); ?></th>
		<th><?php echo __('Nextmonthtoearnleave'); ?></th>
		<th><?php echo __('Logo'); ?></th>
		<th><?php echo __('Lateundertimebase Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($lateundertimebase['Parameter'] as $parameter): ?>
		<tr>
			<td><?php echo $parameter['id']; ?></td>
			<td><?php echo $parameter['graceperiod']; ?></td>
			<td><?php echo $parameter['minimumOT']; ?></td>
			<td><?php echo $parameter['standardworkhours']; ?></td>
			<td><?php echo $parameter['taxexemptedrate']; ?></td>
			<td><?php echo $parameter['maxhdmfcontri']; ?></td>
			<td><?php echo $parameter['maxnontaxincentive']; ?></td>
			<td><?php echo $parameter['vlpermonth']; ?></td>
			<td><?php echo $parameter['slpermonth']; ?></td>
			<td><?php echo $parameter['nextyeartoearnleave']; ?></td>
			<td><?php echo $parameter['nextmonthtoearnleave']; ?></td>
			<td><?php echo $parameter['logo']; ?></td>
			<td><?php echo $parameter['lateundertimebase_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'parameters', 'action' => 'view', $parameter['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'parameters', 'action' => 'edit', $parameter['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'parameters', 'action' => 'delete', $parameter['id']), array(), __('Are you sure you want to delete # %s?', $parameter['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Parameter'), array('controller' => 'parameters', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
