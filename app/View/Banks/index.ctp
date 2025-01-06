<?php echo $this->element('page_back', ['controller' => 'users', 'action' => 'settings']); ?>
<?php echo $this->element('page_title', ['title' => 'Banks']); ?>
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
						<th><?php echo $this->Paginator->sort('address'); ?></th>
						<th><?php echo $this->Paginator->sort('accountnumber', 'Account Number'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($banks as $bank): ?>
					<tr>
						
						<td><?php echo h($bank['Bank']['name']); ?>&nbsp;</td>
						<td><?php echo h($bank['Bank']['address']); ?>&nbsp;</td>
						<td><?php echo h($bank['Bank']['accountnumber']); ?>&nbsp;</td>
						<td class="actions">
							<?php //echo $this->Html->link(__('View'), array('action' => 'view', $bank['Bank']['id'])); ?>
							<?php echo $this->Html->link(__('Update'), array('action' => 'edit', $bank['Bank']['id'])); ?>
							<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bank['Bank']['id']), array(), __('Are you sure you want to delete # %s?', $bank['Bank']['id'])); ?>
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