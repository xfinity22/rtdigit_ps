<div class="parameters view">
<h2><?php echo __('Parameter'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($parameter['Parameter']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Graceperiod'); ?></dt>
		<dd>
			<?php echo h($parameter['Parameter']['graceperiod']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('MinimumOT'); ?></dt>
		<dd>
			<?php echo h($parameter['Parameter']['minimumOT']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Standardworkhours'); ?></dt>
		<dd>
			<?php echo h($parameter['Parameter']['standardworkhours']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Taxexemptedrate'); ?></dt>
		<dd>
			<?php echo h($parameter['Parameter']['taxexemptedrate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maxhdmfcontri'); ?></dt>
		<dd>
			<?php echo h($parameter['Parameter']['maxhdmfcontri']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maxnontaxincentive'); ?></dt>
		<dd>
			<?php echo h($parameter['Parameter']['maxnontaxincentive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vlpermonth'); ?></dt>
		<dd>
			<?php echo h($parameter['Parameter']['vlpermonth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slpermonth'); ?></dt>
		<dd>
			<?php echo h($parameter['Parameter']['slpermonth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nextyeartoearnleave'); ?></dt>
		<dd>
			<?php echo h($parameter['Parameter']['nextyeartoearnleave']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nextmonthtoearnleave'); ?></dt>
		<dd>
			<?php echo h($parameter['Parameter']['nextmonthtoearnleave']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo'); ?></dt>
		<dd>
			<?php echo h($parameter['Parameter']['logo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lateundertimebase Id'); ?></dt>
		<dd>
			<?php echo h($parameter['Parameter']['lateundertimebase_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Parameter'), array('action' => 'edit', $parameter['Parameter']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Parameter'), array('action' => 'delete', $parameter['Parameter']['id']), array(), __('Are you sure you want to delete # %s?', $parameter['Parameter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Parameters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parameter'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lateundertimebases'), array('controller' => 'lateundertimebases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lateundertimebasis'), array('controller' => 'lateundertimebases', 'action' => 'add')); ?> </li>
	</ul>
</div>
