<?php echo $this->element('page_back', ['controller' => 'users', 'action' => 'settings']); ?>
<?php echo $this->element('page_title', ['title' => 'Branches']); ?>
<?php echo $this->element('submenu/branch'); ?>
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
							
							<th><?php echo $this->Paginator->sort('name'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($branches as $branch): ?>
						<tr>
							
							<td><?php echo h($branch['Branch']['name']); ?>&nbsp;</td>
							<td class="actions">
								<?php //echo $this->Html->link(__('View'), array('action' => 'view', $branch['Branch']['id'])); ?>
								<?php echo $this->Html->link(__('Update'), array('action' => 'edit', $branch['Branch']['id'])); ?>
								<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $branch['Branch']['id']), array(), __('Are you sure you want to delete # %s?', $branch['Branch']['id'])); ?>
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