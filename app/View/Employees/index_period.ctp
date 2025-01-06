<?php
$loguser = $this->requestAction('users/loggeduser');
echo '<table cellpadding="0" cellspacing="0" class="bordered" width="98%">';
				echo '<thead>';
				echo '<tr>';
					echo '<th></th>';
					echo '<th>Employee No</th>';
					echo '<th>Full Name</th>';
					echo '<th>Department</th>';
					echo '<th>Branch</th>';
					echo '<th>Daily Rate</th>';
					// echo '<th>Type</th>';
					echo '<th>Actions</th>';
				echo '</tr>';
				echo '</thead>';
			echo '<tbody>';
	$count = 1;
	if(!empty($employees)){
	foreach ($employees as $employee):
		// $check = $this->requestAction(array('controller' => 'incomes', 'action' => 'checkdata'), array($employee['Employee']['id'], $loguser['User']['payrollperiod']));
			// if(!empty($check)){
				echo '<tr style="background-color: #ffff80;">';
			// }else{
				// echo '<tr>';				
			// }
					echo '<td>' . $count . '</td>';
					echo '<td><b>' . $employee['Employee']['employeeno'] . '</b></td>';
					echo '<td><b>' . strtoupper($employee['Employee']['lastname'] . ', ' . $employee['Employee']['firstname'] . ' ' . $employee['Employee']['middlename']) . '</b></td>';
					echo '<td>' . $employee['dept']['deptname'] . '</td>';
					echo '<td>' . $employee['B']['bname'] . '</td>';
					echo '<td>' . $employee['Employee']['dailyrate'] . '</td>';
					// echo '<td>' . $employee['Employeetype']['name'] . '</td>';
					echo '<td class="actions">';
						if($loguser['User']['payrollperiod'] == 0){
							echo $this->Html->link(__('Payroll'), array('controller' => 'incomes', 'action' => 'selectpayrollperiod', $employee['Employee']['id']));
						}else if($loguser['User']['payrollperiod'] != 0){
							// if(!empty($check)){
								// echo $this->Html->link(__('Payroll'), array('controller' => 'incomes', 'action' => 'view', $employee['Employee']['id'], $loguser['User']['payrollperiod']));
								// echo '&nbsp;';
								// echo $this->Html->link('Remove', array('controller' => 'incomes', 'action' => 'delete', $check['Income']['id'], $employee['Employee']['id'], $loguser['User']['payrollperiod']), array(), __('Are you sure you want to delete # %s?', $check['Income']['id']));
							// }else{
								// echo $this->Html->link(__('Payroll'), array('controller' => 'incomes', 'action' => 'add', $loguser['User']['payrollperiod'] , $employee['Employee']['id']));
								// echo '&nbsp;';
								//echo $this->Form->postLink(__('Remove'), array('action' => 'delete', $periodinclude['Periodinclude']['id'], $periodinclude['Periodinclude']['payrollperiod_id']), array(), __('Are you sure you want to delete # %s?', $periodinclude['Periodinclude']['id']));
							// }
							
								
						}
							
						echo '&nbsp;';
							
							
							
					echo '</tr>';
		$count++;
	//	}
		$count++;
	endforeach;
	}
			echo '</tbody>';
			echo '</table>';
			
			?>