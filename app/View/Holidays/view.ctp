<div class="holidays view">
<h2><?php echo __('Holiday'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($holiday['Holiday']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($holiday['Holiday']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($holiday['Holiday']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Holidaytype'); ?></dt>
		<dd>
			<?php echo $this->Html->link($holiday['Holidaytype']['name'], array('controller' => 'holidaytypes', 'action' => 'view', $holiday['Holidaytype']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Holiday'), array('action' => 'edit', $holiday['Holiday']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Holiday'), array('action' => 'delete', $holiday['Holiday']['id']), array(), __('Are you sure you want to delete # %s?', $holiday['Holiday']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Holidays'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Holiday'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Holidaytypes'), array('controller' => 'holidaytypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Holidaytype'), array('controller' => 'holidaytypes', 'action' => 'add')); ?> </li>
	</ul>
</div>
