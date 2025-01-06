<div class="earningrecords view">
<h2><?php echo __('Earningrecord'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($earningrecord['Earningrecord']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Otherearningsentry'); ?></dt>
		<dd>
			<?php echo $this->Html->link($earningrecord['Otherearningsentry']['id'], array('controller' => 'otherearningsentries', 'action' => 'view', $earningrecord['Otherearningsentry']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payrollperiod'); ?></dt>
		<dd>
			<?php echo $this->Html->link($earningrecord['Payrollperiod']['id'], array('controller' => 'payrollperiods', 'action' => 'view', $earningrecord['Payrollperiod']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($earningrecord['Earningrecord']['amount']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Earningrecord'), array('action' => 'edit', $earningrecord['Earningrecord']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Earningrecord'), array('action' => 'delete', $earningrecord['Earningrecord']['id']), array(), __('Are you sure you want to delete # %s?', $earningrecord['Earningrecord']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Earningrecords'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Earningrecord'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Otherearningsentries'), array('controller' => 'otherearningsentries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Otherearningsentry'), array('controller' => 'otherearningsentries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payrollperiods'), array('controller' => 'payrollperiods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payrollperiod'), array('controller' => 'payrollperiods', 'action' => 'add')); ?> </li>
	</ul>
</div>
