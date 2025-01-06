<div class="taxdescriptions view">
<h2><?php echo __('Taxdescription'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($taxdescription['Taxdescription']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Taxtype'); ?></dt>
		<dd>
			<?php echo h($taxdescription['Taxdescription']['taxtype']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($taxdescription['Taxdescription']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Taxdescription'), array('action' => 'edit', $taxdescription['Taxdescription']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Taxdescription'), array('action' => 'delete', $taxdescription['Taxdescription']['id']), array(), __('Are you sure you want to delete # %s?', $taxdescription['Taxdescription']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Taxdescriptions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taxdescription'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Withholdingtaxes'), array('controller' => 'withholdingtaxes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Withholdingtax'), array('controller' => 'withholdingtaxes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Withholdingtaxes'); ?></h3>
	<?php if (!empty($taxdescription['Withholdingtax'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Taxdescription Id'); ?></th>
		<th><?php echo __('Baseamount'); ?></th>
		<th><?php echo __('Basetax'); ?></th>
		<th><?php echo __('Percentamount'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($taxdescription['Withholdingtax'] as $withholdingtax): ?>
		<tr>
			<td><?php echo $withholdingtax['id']; ?></td>
			<td><?php echo $withholdingtax['code']; ?></td>
			<td><?php echo $withholdingtax['taxdescription_id']; ?></td>
			<td><?php echo $withholdingtax['baseamount']; ?></td>
			<td><?php echo $withholdingtax['basetax']; ?></td>
			<td><?php echo $withholdingtax['percentamount']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'withholdingtaxes', 'action' => 'view', $withholdingtax['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'withholdingtaxes', 'action' => 'edit', $withholdingtax['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'withholdingtaxes', 'action' => 'delete', $withholdingtax['id']), array(), __('Are you sure you want to delete # %s?', $withholdingtax['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Withholdingtax'), array('controller' => 'withholdingtaxes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
