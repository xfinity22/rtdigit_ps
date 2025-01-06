<div class="plantypes view">
<h2><?php echo __('Plantype'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($plantype['Plantype']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($plantype['Plantype']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Plantype'), array('action' => 'edit', $plantype['Plantype']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Plantype'), array('action' => 'delete', $plantype['Plantype']['id']), array(), __('Are you sure you want to delete # %s?', $plantype['Plantype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Plantypes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Plantype'), array('action' => 'add')); ?> </li>
	</ul>
</div>
