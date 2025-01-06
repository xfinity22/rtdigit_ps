<div class="otherearnings view">
<h2><?php echo __('Otherearning'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($otherearning['Otherearning']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($otherearning['Otherearning']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($otherearning['Otherearning']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Taxableincome'); ?></dt>
		<dd>
			<?php echo h($otherearning['Otherearning']['taxableincome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IncludeinSSS'); ?></dt>
		<dd>
			<?php echo h($otherearning['Otherearning']['includeinSSS']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bonusincentive'); ?></dt>
		<dd>
			<?php echo h($otherearning['Otherearning']['bonusincentive']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Otherearning'), array('action' => 'edit', $otherearning['Otherearning']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Otherearning'), array('action' => 'delete', $otherearning['Otherearning']['id']), array(), __('Are you sure you want to delete # %s?', $otherearning['Otherearning']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Otherearnings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Otherearning'), array('action' => 'add')); ?> </li>
	</ul>
</div>
