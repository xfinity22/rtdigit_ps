<h2>EMPLOYEES MASTERFILE<h2/>
<table width="100%" style="margin-top: -40px;">
<?php
	$loguser = $this->requestAction('users/loggeduser');
	if(!empty($employees)){
?>
	<tr>
		<td colspan="10">
			<div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('Prev'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
			</div>
		</td>
	</tr>
	<tr>
		<td width="50px" valign="top">
			<div class="actions">
	<?php		if(empty($message)){ ?>
				<ul>
					<li><?php echo $this->Html->link(__('New Employee'), array('action' => 'add')); ?></li>
					<li><?php echo $this->Html->link(__('Active'), array('action' => 'index')); ?></li>
					<li><?php echo $this->Html->link(__('Resigned / Terminated'), array('action' => 'index', 2)); ?></li>
				</ul>
				<br/><br/>
<?php			} ?>	
			</div>
		</td>
		
		<td valign="top">
			<div class="contentindex">
				<table class="bordered">
					 <thead>
					 <tr>
						<th></th>
						<th>Employee No</th>
						<th>Full Name</th>
						<th><?php echo $this->Paginator->sort('division_id'); ?></th>
						<th><?php echo $this->Paginator->sort('department_id'); ?></th>
						<th>Job Title</th>
						<th>Status</th>
						<th>Type</th>
						<th>Work Schedule</th>
						<th>Actions</th>
					 </tr>
					 </thead>
		<?php 
			$count = 1;
		
			foreach ($employees as $employee): 
					echo '<tr>';
						echo '<td>' . $count . '</td>';
						echo '<td>' . $employee['Employee']['employeeno'] . '</td>';
						echo '<td><b>' . strtoupper($employee['Employee']['fullname']) . '</b></td>';
						echo '<td>' . $employee['Division']['name'] . '</td>';
						echo '<td>' . $employee['Department']['name'] . '</td>';
						echo '<td>' . $employee['Jobtitle']['name'] . '</td>';
						echo '<td>' . $employee['Employmentstatus']['name'] . '</td>';
						echo '<td>' . $employee['Employeetype']['name'] . '</td>';
						echo '<td>' . $employee['Workschedule']['description'] . '</td>';
						echo '<td class="actions">';
							echo $this->Html->link(__('View'), array('action' => 'edit', $employee['Employee']['id']));
							echo '&nbsp;';
							/*
							$check = $this->requestAction(array('controller' => 'incomes', 'action' => 'checkdata'), array( $employee['Employee']['id'], $loguser['User']['payrollperiod']));
							if($loguser['User']['payrollperiod'] == 0){
								echo $this->Html->link(__('Payroll'), array('controller' => 'incomes', 'action' => 'selectpayrollperiod', $employee['Employee']['id']));
							}else if($loguser['User']['payrollperiod'] != 0){
								if(!empty($check)){
									echo $this->Html->link(__('Payroll'), array('controller' => 'incomes', 'action' => 'view', $employee['Employee']['id'], $loguser['User']['payrollperiod']));
								}else{
									echo $this->Html->link(__('Payroll'), array('controller' => 'incomes', 'action' => 'add', $loguser['User']['payrollperiod'] , $employee['Employee']['id']));
								}
							}
							
							echo '&nbsp;';
							*/
							
							echo $this->Html->link(__('Loans'), array('controller' => 'loanentries', 'action' => 'loanreport', $employee['Employee']['id']));
							echo '&nbsp;';
							echo $this->Html->link(__('Leaves'), array('controller' => 'leaves', 'action' => 'view', $employee['Employee']['id']));
							//echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $employee['Employee']['id']), array(), __('Are you sure you want to delete # %s?', $employee['Employee']['id']));
						echo '</td>';
					echo '</tr>';
				$count++;
			  endforeach;
					
			?>
				</table>
			</div>
		</td>
	</tr>
	
	
<?php
	}else{
		echo '<br/><br/>Empty';
	} ?>
</table>