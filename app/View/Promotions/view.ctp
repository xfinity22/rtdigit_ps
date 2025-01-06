<div class="promotions view">
<h2><?php echo __('Promotion'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Employee Id'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['employee_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Datefrom'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['datefrom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dateend'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['dateend']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salary'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['salary']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Adjustment'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['adjustment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Increase'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['increase']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Promotion'), array('action' => 'edit', $promotion['Promotion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Promotion'), array('action' => 'delete', $promotion['Promotion']['id']), array(), __('Are you sure you want to delete # %s?', $promotion['Promotion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Promotions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promotion'), array('action' => 'add')); ?> </li>
	</ul>
</div>
