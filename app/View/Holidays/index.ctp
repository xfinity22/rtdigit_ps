<?php echo $this->element('page_back', ['controller' => 'users', 'action' => 'settings']); ?>
<?php echo $this->element('page_title', ['title' => 'Holidays']); ?>
<?php echo $this->element('submenu/holiday'); ?>

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
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('date'); ?></th>
						<th><?php echo $this->Paginator->sort('description'); ?></th>
						<th><?php echo $this->Paginator->sort('holidaytype_id'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($holidays as $holiday): ?>
					<tr>
						<td><?php echo h($holiday['Holiday']['id']); ?>&nbsp;</td>
						<td><?php echo date('F j, Y', strtotime($holiday['Holiday']['date'])); ?>&nbsp;</td>
						<td><?php echo h($holiday['Holiday']['description']); ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link($holiday['Holidaytype']['name'], array('controller' => 'holidaytypes', 'action' => 'view', $holiday['Holidaytype']['id'])); ?>
						</td>
						<td class="actions">
							<?php //echo $this->Html->link(__('View'), array('action' => 'view', $holiday['Holiday']['id'])); ?>
							<?php echo $this->Html->link(__('Update'), array('action' => 'edit', $holiday['Holiday']['id'])); ?>
							<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $holiday['Holiday']['id']), array(), __('Are you sure you want to delete # %s?', $holiday['Holiday']['id'])); ?>
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