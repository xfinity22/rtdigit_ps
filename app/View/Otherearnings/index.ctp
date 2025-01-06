<?php echo $this->element('page_back', ['controller' => 'users', 'action' => 'settings']); ?>
<?php echo $this->element('page_title', ['title' => 'Other Earning Types']); ?>
<?php echo $this->element('submenu/otherearning'); ?>

<?php
	$options = array('No', 'Yes');
?>
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
							<th><?php echo $this->Paginator->sort('name'); ?></th>
							<th><?php echo $this->Paginator->sort('description'); ?></th>
							<th><?php echo $this->Paginator->sort('taxableincome', 'Taxable Income'); ?></th>
							<th><?php echo $this->Paginator->sort('includeinSSS', 'Include in SSS'); ?></th>
							<th><?php echo $this->Paginator->sort('bonusincentive', 'Bonus Incentive'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($otherearnings as $otherearning): ?>
					<tr>
						<td><?php echo h($otherearning['Otherearning']['id']); ?>&nbsp;</td>
						<td><?php echo h($otherearning['Otherearning']['name']); ?>&nbsp;</td>
						<td><?php echo h($otherearning['Otherearning']['description']); ?>&nbsp;</td>
						<td><?php echo $options[$otherearning['Otherearning']['taxableincome']]; ?>&nbsp;</td>
						<td><?php echo $options[$otherearning['Otherearning']['includeinSSS']]; ?>&nbsp;</td>
						<td><?php echo $options[$otherearning['Otherearning']['bonusincentive']]; ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Update'), array('action' => 'edit', $otherearning['Otherearning']['id'])); ?>
							<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $otherearning['Otherearning']['id']), array(), __('Are you sure you want to delete # %s?', $otherearning['Otherearning']['id'])); ?>
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