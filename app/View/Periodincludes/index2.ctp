<?php
	$loguser = $this->requestAction('users/loggeduser');
?>
<b><h4>SPECIAL PAYROLL</h4></b>
<table>
	<tr>
		<td width="15%" valign="top">
			<?php
			echo '<table class="form">';
				echo '<tr>';
					echo '<td valign="top">';
						echo '<font color= "red"><b>Select your default payrollperiod.</font></b><br/><br/>';
						if(!empty($periods)){
							echo $this->Form->create('Employee');
								echo '<select name="data[Employee][period]">';
									echo '<option value="0"></option>';
									foreach($periods as $period):
										if($period['Payrollperiod']['id'] == $loguser['User']['payrollperiod']){
											echo '<option value="' . $period['Payrollperiod']['id'] . '" selected>' . $period['Payrollperiod']['period'] . '</option>';
										}else{
											echo '<option value="' . $period['Payrollperiod']['id'] . '">' . $period['Payrollperiod']['period'] . '</option>';
										}
										
									endforeach;
								echo '</select>';		
						echo $this->Form->end('Submit');
						}
						
					echo '</td>';
				echo '</tr>';
			echo '</table>';
			echo '<br/>';
	
			?>
		</td>
		<td width="2%">
		</td>
		<td valign="top"><br/>
			<table width="300px" border="0" align=""center">
				<tr>
					<td width="25px">LEGEND:</td>
					<td style="background-color: #ffff80; font-weight: bold;">Processed Payroll</td>
				</tr>

			</table>
			
			<table cellpadding="0" cellspacing="0" class="bordered" width="98%">
			<thead>
			<tr>
				<th></th>
				<th>Employee No</th>
				<th>Full Name</th>
				<th>Division</th>
				<th>Department</th>
				<th>Job Title</th>
				<th>Status</th>
				<th>Type</th>
				<th>Work Schedule</th>
				<th>Actions</th>
			</tr>
			</thead>
			<tbody>
<?php
	
	$count = 1;
	foreach ($periodincludes as $periodinclude):
		if($loguser['User']['payrollperiod'] == $periodinclude['Periodinclude']['payrollperiod_id']){
			$employee = $this->requestAction('employees/getemployee/' . $periodinclude['Periodinclude']['employee_id']);
			$check = $this->requestAction(array('controller' => 'incomes', 'action' => 'checkdata'), array( $employee['Employee']['id'], $loguser['User']['payrollperiod']));
			if(!empty($check)){
				echo '<tr style="background-color: #ffff80;">';
			}else{
				echo '<tr>';				
			}
						echo '<td>' . $count . '</td>';
						echo '<td><b>' . $employee['Employee']['employeeno'] . '</b></td>';
						echo '<td><b>' . strtoupper($employee['Employee']['lastname'] . ', ' . $employee['Employee']['firstname'] . ' ' . $employee['Employee']['middlename']) . '</b></td>';
						echo '<td>' . $employee['Division']['name'] . '</td>';
						echo '<td>' . $employee['Department']['name'] . '</td>';
						echo '<td>' . $employee['Jobtitle']['name'] . '</td>';
						echo '<td>' . $employee['Employmentstatus']['name'] . '</td>';
						echo '<td>' . $employee['Employeetype']['name'] . '</td>';
						echo '<td>' . $employee['Workschedule']['description'] . '</td>';
						echo '<td class="actions">';
						
						if($loguser['User']['payrollperiod'] == 0){
							echo $this->Html->link(__('Payroll'), array('controller' => 'incomes', 'action' => 'selectpayrollperiod', $employee['Employee']['id']));
						}else if($loguser['User']['payrollperiod'] != 0){
							if(!empty($check)){
								echo $this->Html->link(__('Payroll'), array('controller' => 'incomes', 'action' => 'viewspecial', $employee['Employee']['id'], $loguser['User']['payrollperiod']));
							}else{
								echo $this->Html->link(__('Payroll'), array('controller' => 'incomes', 'action' => 'addspecial', $loguser['User']['payrollperiod'] , $employee['Employee']['id']));
								echo '&nbsp;';
								echo $this->Form->postLink(__('Remove'), array('action' => 'delete', $periodinclude['Periodinclude']['id']), array(), __('Are you sure you want to delete # %s?', $periodinclude['Periodinclude']['id']));
							}
						}
							
						echo '&nbsp;';
							
							
							
					echo '</tr>';
		$count++;
		}
	endforeach;
?>
			</tbody>
			</table>
		</td>
	</tr>
</table>