<br/>
<?php if(!empty($employees)){ ?>
<table width="100%">
	<tr>
		
		<td valign="top">
			<div class="contentindex">
				<table class="bordered">
					 <thead>
					 <tr>
						<th></th>
						<th><Employee Number</th>
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
						echo '<td>' . $count . '</td>';
						echo '<td>' . $employee['Employee']['employeeno'] . '</td>';
						echo '<td>' . $employee['Employee']['fullname'] . '</td>';
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
							//echo $this->Html->link(__('Loans'), array('controller' => 'incomes', 'action' => 'selectpayrollperiod', $employee['Employee']['id']));
							echo '&nbsp;';
							//echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $employee['Employee']['id']), array(), __('Are you sure you want to delete # %s?', $employee['Employee']['id']));
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
		</td>
	</tr>
</table>