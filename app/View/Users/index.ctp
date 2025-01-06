<?php echo $this->element('page_back', ['controller' => 'users', 'action' => 'settings']); ?>
<?php echo $this->element('page_title', ['title' => 'Accounts']); ?>
<?php echo $this->element('submenu/accounts'); ?>
<div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('Prev'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
			</div>

	<table class="table table-condensed default_table">
	<thead>
	<tr>
		<th><?php echo $this->Paginator->sort('firstname'); ?></th>
		<th><?php echo $this->Paginator->sort('lastname'); ?></th>
		<th>Username</th>
		<th>Status</th>
		<th>User Type</th>
		<th>Last Access</th>
		<th>Last IP</th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['firstname']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['lastname']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
		
		<td>
			<?php echo $this->Html->link($user['Userstatus']['name'], array('controller' => 'userstatuses', 'action' => 'view', $user['Userstatus']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($user['Usertype']['name'], array('controller' => 'usertypes', 'action' => 'view', $user['Usertype']['id'])); ?>
		</td>
		
		<td><?php echo h($user['User']['lastaccess']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['lastip']); ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Update'), array('action' => 'edit', $user['User']['id'], 1)); ?>
			<?php echo $this->Html->link(__('Change Password'), array('action' => 'edit', $user['User']['id'], 2)); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), array(), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
<div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('Prev'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
			</div>

