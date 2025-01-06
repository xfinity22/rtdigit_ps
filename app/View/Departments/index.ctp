
<table width="90%">
	<tr>
		<td width="10%"><h2><?php echo __('Departments'); ?></h2></td>
		<td colspan="12">
			<div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('Prev'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
			</div>
		</td>
	</tr>
	<tr>
		<td width="50px" valign="top">
			<div class="actions">
				<ul>
					<li><?php echo $this->Html->link(__('New Department'), array('action' => 'add')); ?></li>
				</ul>
			</div>
		</td>
		
		<td valign="top">
			<div class="contentindex">
				<table cellpadding="0" cellspacing="0" class="bordered">
					<thead>
					<tr>
							<th><?php echo $this->Paginator->sort('id'); ?></th>
							<th><?php echo $this->Paginator->sort('name'); ?></th>
							<th><?php echo $this->Paginator->sort('description'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($departments as $department): ?>
					<tr>
						<td><?php echo h($department['Department']['id']); ?>&nbsp;</td>
						<td><?php echo h($department['Department']['name']); ?>&nbsp;</td>
						<td><?php echo h($department['Department']['description']); ?>&nbsp;</td>
						<td class="actions">
							<?php // echo $this->Html->link(__('View'), array('action' => 'view', $department['Department']['id'])); ?>
							<?php echo $this->Html->link(__('Update'), array('action' => 'edit', $department['Department']['id'])); ?>
							<?php // echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $department['Department']['id']), array(), __('Are you sure you want to delete # %s?', $department['Department']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</td>
	</tr>
</table>