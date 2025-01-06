<h2>Plan Types</h2>
<table width="90%" style="margin-top: -40px;">
	<tr>
		
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
					<li><?php echo $this->Html->link(__('New Plan Type'), array('action' => 'add')); ?></li>
					<li><?php echo $this->Html->link(__('List All'), array('action' => 'index')); ?></li>
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
							<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($plantypes as $plantype): ?>
					<tr>
						<td><?php echo h($plantype['Plantype']['id']); ?>&nbsp;</td>
						<td><?php echo h($plantype['Plantype']['name']); ?>&nbsp;</td>
						<td class="actions">
							<?php //echo $this->Html->link(__('View'), array('action' => 'view', $plantype['Plantype']['id'])); ?>
							<?php echo $this->Html->link(__('Update'), array('action' => 'edit', $plantype['Plantype']['id'])); ?>
							<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $plantype['Plantype']['id']), array(), __('Are you sure you want to delete # %s?', $plantype['Plantype']['id'])); ?>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</td>
	</tr>
</table>