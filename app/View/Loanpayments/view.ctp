<div class="loanpayments view">
<h2><?php echo __('Loanpayment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($loanpayment['Loanpayment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Payrollperiod'); ?></dt>
		<dd>
			<?php echo $this->Html->link($loanpayment['Payrollperiod']['id'], array('controller' => 'payrollperiods', 'action' => 'view', $loanpayment['Payrollperiod']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Loantype'); ?></dt>
		<dd>
			<?php echo $this->Html->link($loanpayment['Loantype']['name'], array('controller' => 'loantypes', 'action' => 'view', $loanpayment['Loantype']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($loanpayment['Loanpayment']['amount']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Loanpayment'), array('action' => 'edit', $loanpayment['Loanpayment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Loanpayment'), array('action' => 'delete', $loanpayment['Loanpayment']['id']), array(), __('Are you sure you want to delete # %s?', $loanpayment['Loanpayment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Loanpayments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Loanpayment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payrollperiods'), array('controller' => 'payrollperiods', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payrollperiod'), array('controller' => 'payrollperiods', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Loantypes'), array('controller' => 'loantypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Loantype'), array('controller' => 'loantypes', 'action' => 'add')); ?> </li>
	</ul>
</div>
