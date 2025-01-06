<div class="timelogs view">
<h2><?php echo __('Timelog'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($timelog['Timelog']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee Id'); ?></dt>
		<dd>
			<?php echo h($timelog['Timelog']['employee_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Workschedule'); ?></dt>
		<dd>
			<?php echo $this->Html->link($timelog['Workschedule']['id'], array('controller' => 'workschedules', 'action' => 'view', $timelog['Workschedule']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date'); ?></dt>
		<dd>
			<?php echo h($timelog['Timelog']['date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timein'); ?></dt>
		<dd>
			<?php echo h($timelog['Timelog']['timein']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timeout'); ?></dt>
		<dd>
			<?php echo h($timelog['Timelog']['timeout']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Late'); ?></dt>
		<dd>
			<?php echo h($timelog['Timelog']['late']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Otin'); ?></dt>
		<dd>
			<?php echo h($timelog['Timelog']['otin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Otout'); ?></dt>
		<dd>
			<?php echo h($timelog['Timelog']['otout']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Totalot'); ?></dt>
		<dd>
			<?php echo h($timelog['Timelog']['totalot']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Timelog'), array('action' => 'edit', $timelog['Timelog']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Timelog'), array('action' => 'delete', $timelog['Timelog']['id']), array(), __('Are you sure you want to delete # %s?', $timelog['Timelog']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Timelogs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Timelog'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Workschedules'), array('controller' => 'workschedules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Workschedule'), array('controller' => 'workschedules', 'action' => 'add')); ?> </li>
	</ul>
</div>
