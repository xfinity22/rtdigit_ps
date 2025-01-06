 <?php
if(empty($id)){ ?>
	<table width="70%">
		<tr>
			<td valign="top">
				<div class="contentindex">
					<table cellpadding="0" cellspacing="0" class="bordered">
						<thead>
						<tr>
							<td colspan="3" class="actions">
							<?php
								echo $this->Html->link(__('PRINT ALL'), array('action' => 'printemployees', 1));
							?>
							</td>
						</tr>
						<tr>
								<th></th>
								<th>Name</th>
								<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
						</thead>
						<tbody>
						<?php
							$count = 1;
							foreach ($departments as $department): ?>
						<tr>
							<td><?php echo $count; ?>&nbsp;</td>
							<td><?php echo h($department['Department']['name']); ?>&nbsp;</td>
							<td class="actions">
								<?php echo $this->Html->link(__('VIEW'), array('action' => 'listdept', $department['Department']['id'])); ?>
								<?php //echo $this->Html->link(__('Update'), array('action' => 'edit', $department['Department']['id'])); ?>
								<?php // echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $department['Department']['id']), array(), __('Are you sure you want to delete # %s?', $department['Department']['id'])); ?>
							</td>
						</tr>
					<?php
						$count++;
						endforeach; ?>
					</tbody>
				</table>
			</td>
		</tr>
	</table>
<?php
}else{
echo '<h2>' . $dept['Department']['name'] . '</h2>';

?>

	<table width="70%">
		<tr>
			<td valign="top">
				<div class="contentindex">
					<table cellpadding="0" cellspacing="0" class="bordered">
						<thead>
						<tr>
							<td colspan="3" class="actions">
							<?php
								echo $this->Html->link(__('PRINT ALL'), array('action' => 'printemployees', 2, $id));
							?>
							</td>
						</tr>
						<tr>
							<th></th>
							<th>Name</th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
						</thead>
						<tbody>
						<?php
							$count = 1;
							foreach ($departments as $department): ?>
						<tr>
							<td><?php echo $count; ?>&nbsp;</td>
							<td><?php echo strtoupper($department['Employee']['lastname'] . ', ' . $department['Employee']['firstname'] . ' ' . $department['Employee']['middlename']); ?>&nbsp;</td>
							<td class="actions">
							<?php 
								echo $this->Html->link(__('Print Details'), array('controller' => 'employees', 'action' => 'employeedetails', 'ext' => 'pdf', $department['Employee']['id']), array('target' => '_blank'));		
							?>
								<?php echo $this->Html->link(__('VIEW'), array('action' => 'edit', $department['Department']['id'])); ?>
								<?php // echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $department['Department']['id']), array(), __('Are you sure you want to delete # %s?', $department['Department']['id'])); ?>
							</td>
						</tr>
					<?php
						$count++;
						endforeach; ?>
					</tbody>
				</table>
			</td>
		</tr>
	</table>





<?php
} ?>