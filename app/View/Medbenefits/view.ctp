<div class="medbenefits view">
<h2><?php echo __('Medbenefit'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($medbenefit['Medbenefit']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medprovider'); ?></dt>
		<dd>
			<?php echo $this->Html->link($medbenefit['Medprovider']['name'], array('controller' => 'medproviders', 'action' => 'view', $medbenefit['Medprovider']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($medbenefit['Medbenefit']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($medbenefit['Medbenefit']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee Id'); ?></dt>
		<dd>
			<?php echo h($medbenefit['Medbenefit']['employee_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Medbenefit'), array('action' => 'edit', $medbenefit['Medbenefit']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Medbenefit'), array('action' => 'delete', $medbenefit['Medbenefit']['id']), array(), __('Are you sure you want to delete # %s?', $medbenefit['Medbenefit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Medbenefits'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medbenefit'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Medproviders'), array('controller' => 'medproviders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medprovider'), array('controller' => 'medproviders', 'action' => 'add')); ?> </li>
	</ul>
</div>
