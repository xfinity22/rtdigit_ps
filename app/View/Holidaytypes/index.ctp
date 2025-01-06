<?php echo $this->element('page_back', ['controller' => 'holidays', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'Holiday Types']); ?>
<hr />

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
							<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($holidaytypes as $holidaytype): ?>
					<tr>
						
						<td><?php echo h($holidaytype['Holidaytype']['name']); ?>&nbsp;</td>
						<td class="actions">
							<?php //echo $this->Html->link(__('View'), array('action' => 'view', $holidaytype['Holidaytype']['id'])); ?>
							<?php echo $this->Html->link(__('Update'), array('action' => 'edit', $holidaytype['Holidaytype']['id'])); ?>
							<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $holidaytype['Holidaytype']['id']), array(), __('Are you sure you want to delete # %s?', $holidaytype['Holidaytype']['id'])); ?>
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