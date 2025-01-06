<div class="otstatuses view">
<h2><?php echo __('Otstatus'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($otstatus['Otstatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($otstatus['Otstatus']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Otstatus'), array('action' => 'edit', $otstatus['Otstatus']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Otstatus'), array('action' => 'delete', $otstatus['Otstatus']['id']), array(), __('Are you sure you want to delete # %s?', $otstatus['Otstatus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Otstatuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Otstatus'), array('action' => 'add')); ?> </li>
	</ul>
</div>
