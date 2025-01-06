<?php echo $this->element('page_title', ['title' => 'Medical Providers']); ?>
<?php echo $this->element('submenu/medical'); ?>

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
							<th><?php echo $this->Paginator->sort('amount'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($medproviders as $medprovider): ?>
					<tr>
						
						<td><?php echo h($medprovider['Medprovider']['name']); ?>&nbsp;</td>
						<td><?php echo h($medprovider['Medprovider']['amount']); ?>&nbsp;</td>
						<td class="actions">
							<?php //echo $this->Html->link(__('View'), array('action' => 'view', $medprovider['Medprovider']['id'])); ?>
							<?php echo $this->Html->link(__('Update'), array('action' => 'edit', $medprovider['Medprovider']['id'])); ?>
							<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $medprovider['Medprovider']['id']), array(), __('Are you sure you want to delete # %s?', $medprovider['Medprovider']['id'])); ?>
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