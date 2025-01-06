<div class="ssscontribs view">
<h2><?php echo __('Ssscontrib'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ssscontrib['Ssscontrib']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rangestart'); ?></dt>
		<dd>
			<?php echo h($ssscontrib['Ssscontrib']['rangestart']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rangeend'); ?></dt>
		<dd>
			<?php echo h($ssscontrib['Ssscontrib']['rangeend']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Msc'); ?></dt>
		<dd>
			<?php echo h($ssscontrib['Ssscontrib']['msc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Erss'); ?></dt>
		<dd>
			<?php echo h($ssscontrib['Ssscontrib']['erss']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Eess'); ?></dt>
		<dd>
			<?php echo h($ssscontrib['Ssscontrib']['eess']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Toatlss'); ?></dt>
		<dd>
			<?php echo h($ssscontrib['Ssscontrib']['toatlss']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Erec'); ?></dt>
		<dd>
			<?php echo h($ssscontrib['Ssscontrib']['erec']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ertotal'); ?></dt>
		<dd>
			<?php echo h($ssscontrib['Ssscontrib']['ertotal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Eetotal'); ?></dt>
		<dd>
			<?php echo h($ssscontrib['Ssscontrib']['eetotal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total'); ?></dt>
		<dd>
			<?php echo h($ssscontrib['Ssscontrib']['total']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ssscontrib'), array('action' => 'edit', $ssscontrib['Ssscontrib']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ssscontrib'), array('action' => 'delete', $ssscontrib['Ssscontrib']['id']), array(), __('Are you sure you want to delete # %s?', $ssscontrib['Ssscontrib']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ssscontribs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ssscontrib'), array('action' => 'add')); ?> </li>
	</ul>
</div>
