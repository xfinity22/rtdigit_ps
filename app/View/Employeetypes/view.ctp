<?php echo $this->element('page_back', ['controller' => 'employeetypes', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'Employee Type Details']); ?>
<hr />

<table class="table table-condensed default_table">
	<tr>
	
		<td valign="top">
			<div class="contentindex">
				<h2><?php echo '&nbsp;&nbsp;&nbsp;' . h($employeetype['Employeetype']['name']) . ' EMPLOYEES'; ?></h2>
				<br/><?php if (!empty($employeetype['Employee'])): ?>
				
				<table class="table table-condensed default_table">
				<tr>
					<th width="5%"></th>
					<th><?php echo __('Employeeno'); ?></th>
					<th><?php echo __('Fullname'); ?></th>
					<th><?php echo __('Datehired'); ?></th>
					
					<th class="actions">&nbsp;</th>
				</tr>
				<?php foreach ($employeetype['Employee'] as $employee): ?>
					<tr>
						<th></th>
						<td ><?php echo $employee['employeeno']; ?></td>
						<td><?php echo $employee['fullname']; ?></td>
						<td><?php echo $employee['datehired']; ?></td>
						<td class="actions"><?php echo $this->Html->link('VIEW', array('controller' => 'employees', 'action' => 'edit', $employee['id'])); ?></td>
					</tr>
				<?php endforeach; ?>
				</table>
			<?php endif; ?>
		</td>
	</tr>
</table>