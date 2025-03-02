<div class="companyprofiles index">
	<h2><?php echo __('Companyprofiles'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('landline'); ?></th>
			<th><?php echo $this->Paginator->sort('employees'); ?></th>
			<th><?php echo $this->Paginator->sort('natureofbusiness'); ?></th>
			<th><?php echo $this->Paginator->sort('dateestablished'); ?></th>
			<th><?php echo $this->Paginator->sort('owner'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($companyprofiles as $companyprofile): ?>
	<tr>
		<td><?php echo h($companyprofile['Companyprofile']['id']); ?>&nbsp;</td>
		<td><?php echo h($companyprofile['Companyprofile']['name']); ?>&nbsp;</td>
		<td><?php echo h($companyprofile['Companyprofile']['address']); ?>&nbsp;</td>
		<td><?php echo h($companyprofile['Companyprofile']['landline']); ?>&nbsp;</td>
		<td><?php echo h($companyprofile['Companyprofile']['employees']); ?>&nbsp;</td>
		<td><?php echo h($companyprofile['Companyprofile']['natureofbusiness']); ?>&nbsp;</td>
		<td><?php echo h($companyprofile['Companyprofile']['dateestablished']); ?>&nbsp;</td>
		<td><?php echo h($companyprofile['Companyprofile']['owner']); ?>&nbsp;</td>
		<td><?php echo h($companyprofile['Companyprofile']['email']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $companyprofile['Companyprofile']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $companyprofile['Companyprofile']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $companyprofile['Companyprofile']['id']), array(), __('Are you sure you want to delete # %s?', $companyprofile['Companyprofile']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Companyprofile'), array('action' => 'add')); ?></li>
	</ul>
</div>
