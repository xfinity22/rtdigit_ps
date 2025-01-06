<div class="medcheckups view">
<h2><?php echo __('Medcheckup'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($medcheckup['Medcheckup']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee'); ?></dt>
		<dd>
			<?php echo $this->Html->link($medcheckup['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $medcheckup['Employee']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medhospital'); ?></dt>
		<dd>
			<?php echo $this->Html->link($medcheckup['Medhospital']['name'], array('controller' => 'medhospitals', 'action' => 'view', $medcheckup['Medhospital']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fees'); ?></dt>
		<dd>
			<?php echo h($medcheckup['Medcheckup']['fees']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Medcheckup'), array('action' => 'edit', $medcheckup['Medcheckup']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Medcheckup'), array('action' => 'delete', $medcheckup['Medcheckup']['id']), array(), __('Are you sure you want to delete # %s?', $medcheckup['Medcheckup']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Medcheckups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medcheckup'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Medhospitals'), array('controller' => 'medhospitals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medhospital'), array('controller' => 'medhospitals', 'action' => 'add')); ?> </li>
	</ul>
</div>
