<?php echo $this->element('page_back', ['controller' => 'otherearnings', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'Other Earning Entries']); ?>
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
						<th><?php echo $this->Paginator->sort('id'); ?></th>
						<th><?php echo $this->Paginator->sort('employee_id'); ?></th>
						<th><?php echo $this->Paginator->sort('otherearning_id'); ?></th>
						<th><?php echo $this->Paginator->sort('amount'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($otherearningsentries as $otherearningsentry): ?>
					<tr>
						<td><?php echo h($otherearningsentry['Otherearningsentry']['id']); ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link($otherearningsentry['Employee']['firstname'] . ' ' . $otherearningsentry['Employee']['lastname'], array('controller' => 'employees', 'action' => 'edit', $otherearningsentry['Employee']['id'])); ?>
						</td>
						<td>
							<?php echo $otherearningsentry['Otherearning']['name']; ?>
						</td>
						<td><?php echo h($otherearningsentry['Otherearningsentry']['amount']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Update'), array('action' => 'edit', $otherearningsentry['Otherearningsentry']['id'], $otherearningsentry['Employee']['id'] )); ?>
							<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $otherearningsentry['Otherearningsentry']['id']), array(), __('Are you sure you want to delete # %s?', $otherearningsentry['Otherearningsentry']['id'])); ?>
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