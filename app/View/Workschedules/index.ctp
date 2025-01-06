<?php echo $this->element('page_back', ['controller' => 'users', 'action' => 'settings']); ?>
<?php echo $this->element('page_title', ['title' => 'Work Schedules']); ?>
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
							
							<th><?php echo $this->Paginator->sort('description'); ?></th>
							<th><?php echo $this->Paginator->sort('timein', 'Time In'); ?></th>
							<th><?php echo $this->Paginator->sort('timeout', 'Time Out'); ?></th>
							<th><?php echo $this->Paginator->sort('minimumworkhours', 'Minimum Work Hours'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($workschedules as $workschedule): ?>
					<tr>
						
						<td><?php echo h($workschedule['Workschedule']['description']); ?>&nbsp;</td>
						<td><?php echo h($workschedule['Workschedule']['timein']); ?>&nbsp;</td>
						<td><?php echo h($workschedule['Workschedule']['timeout']); ?>&nbsp;</td>
						<td><?php echo h($workschedule['Workschedule']['minimumworkhours']); ?>&nbsp;</td>
						<td class="actions">
							<?php //echo $this->Html->link(__('View'), array('action' => 'view', $workschedule['Workschedule']['id'])); ?>
							<?php echo $this->Html->link(__('Update'), array('action' => 'edit', $workschedule['Workschedule']['id'])); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $workschedule['Workschedule']['id']), array(), __('Are you sure you want to delete # %s?', $workschedule['Workschedule']['id'])); ?>
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