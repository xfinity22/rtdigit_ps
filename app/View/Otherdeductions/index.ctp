
<?php echo $this->element('page_back', ['controller' => 'users', 'action' => 'settings']); ?>
<?php echo $this->element('page_title', ['title' => 'Other Deductions']); ?>
<?php echo $this->element('submenu/default'); ?>
<div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('Prev'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
			</div>
			<div class="contentindex">
				<table class="table table-condensed default_table">
					<thead>
					<tr>
							
							<th><?php echo $this->Paginator->sort('name'); ?></th>
							<th><?php echo $this->Paginator->sort('description'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($otherdeductions as $otherdeduction): ?>
					<tr>
						
						<td><?php echo h($otherdeduction['Otherdeduction']['name']); ?>&nbsp;</td>
						<td><?php echo h($otherdeduction['Otherdeduction']['description']); ?>&nbsp;</td>
						<td class="actions">
							<?php //echo $this->Html->link(__('View'), array('action' => 'view', $otherdeduction['Otherdeduction']['id'])); ?>
							<?php echo $this->Html->link(__('Update'), array('action' => 'edit', $otherdeduction['Otherdeduction']['id'])); ?>
							<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $otherdeduction['Otherdeduction']['id']), array(), __('Are you sure you want to delete # %s?', $otherdeduction['Otherdeduction']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('Prev'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
			</div>