<div class="medreports view">
<h2><?php echo __('Medreport'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($medreport['Medreport']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee'); ?></dt>
		<dd>
			<?php echo $this->Html->link($medreport['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $medreport['Employee']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($medreport['Medreport']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filename'); ?></dt>
		<dd>
			<?php echo h($medreport['Medreport']['filename']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Medreport'), array('action' => 'edit', $medreport['Medreport']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Medreport'), array('action' => 'delete', $medreport['Medreport']['id']), array(), __('Are you sure you want to delete # %s?', $medreport['Medreport']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Medreports'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Medreport'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
