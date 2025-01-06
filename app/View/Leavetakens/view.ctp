<div class="leavetakens view">
<h2><?php echo __('Leavetaken'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($leavetaken['Leavetaken']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee'); ?></dt>
		<dd>
			<?php echo $this->Html->link($leavetaken['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $leavetaken['Employee']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vltype'); ?></dt>
		<dd>
			<?php echo $this->Html->link($leavetaken['Vltype']['name'], array('controller' => 'vltypes', 'action' => 'view', $leavetaken['Vltype']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($leavetaken['Leavetaken']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Leavestatus'); ?></dt>
		<dd>
			<?php echo $this->Html->link($leavetaken['Leavestatus']['name'], array('controller' => 'leavestatuses', 'action' => 'view', $leavetaken['Leavestatus']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Leavetaken'), array('action' => 'edit', $leavetaken['Leavetaken']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Leavetaken'), array('action' => 'delete', $leavetaken['Leavetaken']['id']), array(), __('Are you sure you want to delete # %s?', $leavetaken['Leavetaken']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Leavetakens'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leavetaken'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vltypes'), array('controller' => 'vltypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vltype'), array('controller' => 'vltypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Leavestatuses'), array('controller' => 'leavestatuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Leavestatus'), array('controller' => 'leavestatuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
