<div class="employeeeducationalbackgrounds view">
<h2><?php echo __('Employeeeducationalbackground'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee'); ?></dt>
		<dd>
			<?php echo $this->Html->link($employeeeducationalbackground['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $employeeeducationalbackground['Employee']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Primaryschool'); ?></dt>
		<dd>
			<?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['primaryschool']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Primarygrad'); ?></dt>
		<dd>
			<?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['primarygrad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Primarycourse'); ?></dt>
		<dd>
			<?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['primarycourse']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Secondaryschool'); ?></dt>
		<dd>
			<?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['secondaryschool']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Secondarygrad'); ?></dt>
		<dd>
			<?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['secondarygrad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Secondarycourse'); ?></dt>
		<dd>
			<?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['secondarycourse']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tertiaryschool'); ?></dt>
		<dd>
			<?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['tertiaryschool']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tertiarygrad'); ?></dt>
		<dd>
			<?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['tertiarygrad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tertiarycourse'); ?></dt>
		<dd>
			<?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['tertiarycourse']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Graduateschool'); ?></dt>
		<dd>
			<?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['graduateschool']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Graduategrad'); ?></dt>
		<dd>
			<?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['graduategrad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Graduatecourse'); ?></dt>
		<dd>
			<?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['graduatecourse']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Postgradschool'); ?></dt>
		<dd>
			<?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['postgradschool']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Postgradgrad'); ?></dt>
		<dd>
			<?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['postgradgrad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Postgradcourse'); ?></dt>
		<dd>
			<?php echo h($employeeeducationalbackground['Employeeeducationalbackground']['postgradcourse']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Employeeeducationalbackground'), array('action' => 'edit', $employeeeducationalbackground['Employeeeducationalbackground']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Employeeeducationalbackground'), array('action' => 'delete', $employeeeducationalbackground['Employeeeducationalbackground']['id']), array(), __('Are you sure you want to delete # %s?', $employeeeducationalbackground['Employeeeducationalbackground']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Employeeeducationalbackgrounds'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employeeeducationalbackground'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
	</ul>
</div>
