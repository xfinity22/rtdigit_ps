<?php echo $this->element('page_back', ['controller' => 'employees', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'Search Results']); ?>
<hr />

<?php

if(!empty($employees)){ ?>

			<div class="contentindex">
				<table class="table table-condensed default_table">
					 <thead>
					 <tr>
					
						<th>Emp No.</th>
						<th>Fullname</th>
						<th>Division</th>
						<th>Department</th>
						<th>Job Title
						<th>Employment Status</th>
						<th>Employement Type</th>
						<th>Work Schedule</th>
						<th>Actions</th>
					 </tr>
					 </thead>
		<?php 
			$count = 1;
	
			foreach ($employees as $employee): 
					echo '<tr>';
						
						echo '<td>' . $employee['Employee']['employeeno'] . '</td>';
						echo '<td>' . strtoupper($employee['Employee']['lastname'] . ', ' .  $employee['Employee']['firstname'] . ' ' . $employee['Employee']['middlename']) . '</td>';
						echo '<td>' . $employee['Division']['name'] . '</td>';
						echo '<td>' . $employee['Department']['name'] . '</td>';
						echo '<td>' . $employee['Jobtitle']['name'] . '</td>';
						echo '<td>' . $employee['Employmentstatus']['name'] . '</td>';
						echo '<td>' . $employee['Employeetype']['name'] . '</td>';
						echo '<td>' . $employee['Workschedule']['description'] . '</td>';
						echo '<td class="actions">';
							echo $this->Html->link(__('View'), array('action' => 'edit', $employee['Employee']['id']));
							echo '&nbsp;';
							echo $this->Html->link(__('Payroll'), array('controller' => 'incomes', 'action' => 'selectpayrollperiod', $employee['Employee']['id']));
							echo '&nbsp;';
							echo $this->Html->link(__('Leaves'), array('controller' => 'leaves', 'action' => 'view', $employee['Employee']['id']));
							echo '&nbsp;';
							echo $this->Html->link('Loans', array('controller' => 'loanentries', 'action' => 'loanreport', $employee['Employee']['id']));
							echo '&nbsp;';
							echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $employee['Employee']['id']), array(), __('Are you sure you want to delete # %s?', $employee['Employee']['id']));
						echo '</td>';
					echo '</tr>';
				$count++;
			  endforeach;
		}else{
			echo 'Empty Results';
		}
		?>
				</table>
			</div>
		