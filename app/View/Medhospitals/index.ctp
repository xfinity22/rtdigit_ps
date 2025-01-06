<?php echo $this->element('page_title', ['title' => 'Medical Hospitals']); ?>
<?php echo $this->element('submenu/medical'); ?>

			<div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('Prev'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
			</div>
		
				<table class="table table-condensed dafault_table">
					<thead>
					<tr>
							
							<th>Hospital Name</th>
							<th>Provider</th>
							<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($medhospitals as $medhospital): ?>
					<tr>
						
						<td><?php echo h($medhospital['Medhospital']['name']); ?>&nbsp;</td>
						<td><?php echo h($medhospital['Medhospital']['medprovider_id']); ?>&nbsp;</td>
						<td class="actions">
							<?php //echo $this->Html->link(__('View'), array('action' => 'view', $medhospital['Medhospital']['id'])); ?>
							<?php echo $this->Html->link(__('Update'), array('action' => 'edit', $medhospital['Medhospital']['id'])); ?>
							<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $medhospital['Medhospital']['id']), array(), __('Are you sure you want to delete # %s?', $medhospital['Medhospital']['id'])); ?>
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
