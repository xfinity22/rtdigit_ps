<?php echo $this->element('page_title', ['title' => 'Tables']); ?>
<?php echo $this->element('submenu/table'); ?>

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
						<th></th>
						<th><?php echo $this->Paginator->sort('name'); ?></th>
						<th><?php echo $this->Paginator->sort('description'); ?></th>
						<th><?php echo $this->Paginator->sort('percent'); ?></th>
						<th><?php echo $this->Paginator->sort('overtimetype_id'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					 </tr>
					 </thead>
		<?php 
			$count = 1;
			foreach ($overtimerates as $overtimerate): 
					echo '<tr>'; ?>
						<td><?php echo h($overtimerate['Overtimerate']['id']); ?>&nbsp;</td>
						<td><?php echo h($overtimerate['Overtimerate']['name']); ?>&nbsp;</td>
						<td><?php echo h($overtimerate['Overtimerate']['description']); ?>&nbsp;</td>
						<td><?php echo h($overtimerate['Overtimerate']['addonrate']); ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link($overtimerate['Overtimetype']['name'], array('controller' => 'overtimetypes', 'action' => 'view', $overtimerate['Overtimetype']['id'])); ?>
						</td>
						<td class="actions">
							<?php // echo $this->Html->link(__('View'), array('action' => 'view', $overtimerate['Overtimerate']['id'])); ?>
							<?php echo $this->Html->link(__('Update'), array('action' => 'edit', $overtimerate['Overtimerate']['id'])); ?>
							<?php // echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $overtimerate['Overtimerate']['id']), array(), __('Are you sure you want to delete # %s?', $overtimerate['Overtimerate']['id'])); ?>
						</td>
		<?php			echo '</tr>';
				$count++;
			  endforeach		
		?>
				</table>
			
				<div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('Prev'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
			</div>

			