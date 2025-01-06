<div class="hdmfcontris view">
<h2><?php echo __('Hdmfcontri'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($hdmfcontri['Hdmfcontri']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bracket1'); ?></dt>
		<dd>
			<?php echo h($hdmfcontri['Hdmfcontri']['bracket1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bracket2'); ?></dt>
		<dd>
			<?php echo h($hdmfcontri['Hdmfcontri']['bracket2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pct'); ?></dt>
		<dd>
			<?php echo h($hdmfcontri['Hdmfcontri']['pct']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Hdmfcontri'), array('action' => 'edit', $hdmfcontri['Hdmfcontri']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Hdmfcontri'), array('action' => 'delete', $hdmfcontri['Hdmfcontri']['id']), array(), __('Are you sure you want to delete # %s?', $hdmfcontri['Hdmfcontri']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Hdmfcontris'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hdmfcontri'), array('action' => 'add')); ?> </li>
	</ul>
</div>
