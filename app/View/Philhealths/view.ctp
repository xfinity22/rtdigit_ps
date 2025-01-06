<div class="philhealths view">
<h2><?php echo __('Philhealth'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($philhealth['Philhealth']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rangestart'); ?></dt>
		<dd>
			<?php echo h($philhealth['Philhealth']['rangestart']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rangeend'); ?></dt>
		<dd>
			<?php echo h($philhealth['Philhealth']['rangeend']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salarybase'); ?></dt>
		<dd>
			<?php echo h($philhealth['Philhealth']['salarybase']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Totalmp'); ?></dt>
		<dd>
			<?php echo h($philhealth['Philhealth']['totalmp']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employeeshare'); ?></dt>
		<dd>
			<?php echo h($philhealth['Philhealth']['employeeshare']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employershare'); ?></dt>
		<dd>
			<?php echo h($philhealth['Philhealth']['employershare']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Philhealth'), array('action' => 'edit', $philhealth['Philhealth']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Philhealth'), array('action' => 'delete', $philhealth['Philhealth']['id']), array(), __('Are you sure you want to delete # %s?', $philhealth['Philhealth']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Philhealths'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Philhealth'), array('action' => 'add')); ?> </li>
	</ul>
</div>
