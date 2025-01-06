<?php echo $this->element('page_back', ['controller' => 'users', 'action' => 'settings']); ?>
<?php echo $this->element('page_title', ['title' => 'Employee Types']); ?>
<?php echo $this->element('submenu/default'); ?>

<div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('Prev'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
			</div>

			Note: Data with Data Relations are not allowed to delete.
			<div class="contentindex">
				<table class="table table-condensed default_table">
					<thead>
							<th><?php echo $this->Paginator->sort('name'); ?></th>
							<th><?php echo $this->Paginator->sort('description'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($employeetypes as $employeetype): ?>
					<tr>
						<td><?php echo h($employeetype['Employeetype']['name']); ?>&nbsp;</td>
						<td><?php echo h($employeetype['Employeetype']['desciption']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__('View'), array('action' => 'view', $employeetype['Employeetype']['id'])); ?>
							<?php echo $this->Html->link(__('Update'), array('action' => 'edit', $employeetype['Employeetype']['id'])); ?>
							<?php
							$yes = $this->requestAction('employees/checkdelete/' . $employeetype['Employeetype']['id']);
							if(empty($yes)){
								echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $employeetype['Employeetype']['id']), array(), __('Are you sure you want to delete # %s?', $employeetype['Employeetype']['id']));
							}?>
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
