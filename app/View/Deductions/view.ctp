<div class="deductions view">
<h2><?php echo __('Deduction'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($deduction['Deduction']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee'); ?></dt>
		<dd>
			<?php echo $this->Html->link($deduction['Employee']['id'], array('controller' => 'employees', 'action' => 'view', $deduction['Employee']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payrollperiod'); ?></dt>
		<dd>
			<?php echo $this->Html->link($deduction['Payrollperiod']['id'], array('controller' => 'payrollperiods', 'action' => 'view', $deduction['Payrollperiod']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rate'); ?></dt>
		<dd>
			<?php echo h($deduction['Deduction']['rate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Caritas'); ?></dt>
		<dd>
			<?php echo h($deduction['Deduction']['caritas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cooploan'); ?></dt>
		<dd>
			<?php echo h($deduction['Deduction']['cooploan']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hdmf'); ?></dt>
		<dd>
			<?php echo h($deduction['Deduction']['hdmf']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('HdmfLoan'); ?></dt>
		<dd>
			<?php echo h($deduction['Deduction']['hdmfLoan']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SssLoan'); ?></dt>
		<dd>
			<?php echo h($deduction['Deduction']['sssLoan']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Advances'); ?></dt>
		<dd>
			<?php echo h($deduction['Deduction']['advances']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medical'); ?></dt>
		<dd>
			<?php echo h($deduction['Deduction']['medical']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Uniform'); ?></dt>
		<dd>
			<?php echo h($deduction['Deduction']['uniform']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Penalty'); ?></dt>
		<dd>
			<?php echo h($deduction['Deduction']['penalty']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tax'); ?></dt>
		<dd>
			<?php echo h($deduction['Deduction']['tax']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Absentdays'); ?></dt>
		<dd>
			<?php echo h($deduction['Deduction']['absentdays']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Absentamount'); ?></dt>
		<dd>
			<?php echo h($deduction['Deduction']['absentamount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Others'); ?></dt>
		<dd>
			<?php echo h($deduction['Deduction']['others']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datemodified'); ?></dt>
		<dd>
			<?php echo h($deduction['Deduction']['datemodified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($deduction['User']['id'], array('controller' => 'users', 'action' => 'view', $deduction['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Deduction'), array('action' => 'edit', $deduction['Deduction']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Deduction'), array('action' => 'delete', $deduction['Deduction']['id']), array(), __('Are you sure you want to delete # %s?', $deduction['Deduction']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Deductions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Deduction'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Employees'), array('controller' => 'employees', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Employee'), array('controller' => 'employees', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payrollperiods'), array('controller' => 'payrollperiods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payrollperiod'), array('controller' => 'payrollperiods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
