<?php echo $this->element('page_title', ['title' => 'Employee Masterlist']); ?>
<?php echo $this->element('submenu/employee'); ?>


<?php
				echo $this->Form->create('Employee', 
				array('class' => 'form', 'url' => array('controller' => 'employees', 'action' => 'search'))); 
?>
<div class="search row">
		<div class="col-md-4 nopadding-right">
				<input type="text" name="data[Employee][keyword]" placeholder="Search Employee.." required class="form-control">
		</div>
		<div class="col-md-4 nopadding-right">		
				<button type="submit" class="btn btn-success btn-xs btn-block">Search</button>
		</div>		

</div>
<hr />
<?php echo $this->Form->end(); ?>

<?php
	$loguser = $this->requestAction('users/loggeduser');
	
	if(!empty($employees)){
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
						<th></th>
						<th>Employee No</th>
						
						<th><?php echo $this->Paginator->sort('fullname'); ?></th>
						<th><?php echo $this->Paginator->sort('dailyrate'); ?></th>
						<th><?php echo $this->Paginator->sort('division_id'); ?></th>
						<th><?php echo $this->Paginator->sort('department_id'); ?></th>
						<th><?php echo $this->Paginator->sort('branch_id'); ?></th>
						<th>Job Title</th>
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
						echo '<td><b>' . $this->Html->link(strtoupper($employee['Employee']['lastname'] . ', ' . $employee['Employee']['firstname'] . ' ' . $employee['Employee']['middlename']), array('action' => 'edit', $employee['Employee']['id'])) . '</b></td>';
						echo '<td>' . $employee['Employee']['dailyrate'] . '</td>';
						echo '<td>' . $employee['Division']['name'] . '</td>';
						echo '<td>' . $employee['Department']['name'] . '</td>';
						echo '<td>' . $employee['Branch']['name'] . '</td>';
						echo '<td>' . $employee['Jobtitle']['name'] . '</td>';
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

			<div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('Prev'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
			</div>
		
	
	
<?php
	}else{
		echo '<br/><br/>Empty';
	} ?>
