<div class="uploadedfiles view">
<h2><?php echo __('Uploadedfile'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($uploadedfile['Uploadedfile']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($uploadedfile['User']['id'], array('controller' => 'users', 'action' => 'view', $uploadedfile['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Filename'); ?></dt>
		<dd>
			<?php echo h($uploadedfile['Uploadedfile']['filename']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dateuploaded'); ?></dt>
		<dd>
			<?php echo h($uploadedfile['Uploadedfile']['dateuploaded']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Uploadedfile'), array('action' => 'edit', $uploadedfile['Uploadedfile']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Uploadedfile'), array('action' => 'delete', $uploadedfile['Uploadedfile']['id']), array(), __('Are you sure you want to delete # %s?', $uploadedfile['Uploadedfile']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Uploadedfiles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uploadedfile'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
