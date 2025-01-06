<?php echo $this->element('page_back', ['controller' => 'payrollperiods', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'Process Payroll']); ?>
<hr />

<?php
// echo 'PERIOD: ' . $period . '<br/>';
// echo 'ID: ' . $id;
$loguser = $this->requestAction('users/loggeduser');

echo '<div class="row">';
	echo '<div class="col-md-4">';	
			
				
						echo '<div class="fs-12 bold text-warning">Select your default payrollperiod.</div>';
						echo $this->Form->create('User');
							if($period != 0){
								echo $this->Form->input('payrollperiod_id', array('class' => 'noradius bold form-control', 'label' => '', 'value' => $loguser['User']['payrollperiod']));
							}else{
								echo $this->Form->input('payrollperiod_id', array('class' => 'noradius bold form-control', 'label' => ''));
							}
						echo '<button class="submit" class="btn btn-danger btn-xs">Submit</button>';
						echo $this->Form->end();


		if($loguser['User']['payrollperiod'] != 0){
				//echo '<div class="actions" style="margin-left: 30px;">' . $this->Html->link(__('Process All'), array('controller' => 'incomes', 'action' => 'processall', 1, 0, $loguser['User']['payrollperiod'])) . '</div>';
					
				
				echo '<table class="table table-condensed default_table">';
					echo '<tr>';
						echo '<th>PROCESS PAYROLL BY JOB TITLE</th>';
					echo '</tr>';	
				foreach ($employeetypes as $type):
					echo '<tr><td class="actions">>> ';
						echo $this->Html->link(strtoupper($type['Employeetype']['name']), array('controller' => 'incomes', 'action' => 'processall', 4, $type['Employeetype']['id'], $loguser['User']['payrollperiod']));
					echo '</td></tr>';
				endforeach;
					echo '</tr>';
				echo '</table>';
				
			}
		
	echo '</div>';

	if($loguser['User']['payrollperiod'] != 0){

		echo '<div class="col-md-8">';
		
			
				echo '<table class="table table-condensed default_table">';
					echo '<tr>';
						echo '<td width="25px">LEGEND:</td>';
						echo '<td>Processed Payroll</td>';
					echo '</tr>';
					
					/*echo '<tr>';
						echo '<td colspan="2">';
							echo '<div class="paging">';
								echo $this->Paginator->prev('< ' . __('Prev'), array(), null, array('class' => 'prev disabled'));
								echo $this->Paginator->numbers(array('separator' => ''));
								echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled'));			
							echo '</div>';
						echo '</td>';
					echo '</tr>';
					*/
				echo '</table>';
				
				
				echo '<table class="table table-condensed default_table">';
					echo '<thead>';
					echo '<tr>';
					
						echo '<th>Emp No</th>';
						echo '<th>Full Name</th>';
						echo '<th>Division</th>';
						echo '<th>Department</th>';
						echo '<th>Branch</th>';
						echo '<th>Rate</th>';
						echo '<th>Type</th>';
						echo '<th>Action</th>';
					echo '</tr>';
					echo '</thead>';
				echo '<tbody>';
		$count = 1;
		if(!empty($employees)){
		foreach ($employees as $employee):
			$check = $this->requestAction(array('controller' => 'incomes', 'action' => 'checkdata'), array($employee['Employee']['id'], $loguser['User']['payrollperiod']));
				if(!empty($check)){
					echo '<tr style="background-color: #ffff80;">';
				}else{
					echo '<tr>';				
				}
						//echo '<td>' . $count . '</td>';
						echo '<td><b>' . $employee['Employee']['employeeno'] . '</b></td>';
						echo '<td><b>' . strtoupper($employee['Employee']['lastname'] . ', ' . $employee['Employee']['firstname'] . ' ' . $employee['Employee']['middlename']) . '</b></td>';
						echo '<td>' . $employee['Division']['name'] . '</td>';
						echo '<td>' . $employee['Department']['name'] . '</td>';
						echo '<td>' . $employee['Branch']['name'] . '</td>';
						echo '<td>' . $employee['Employee']['dailyrate'] . '</td>';
						echo '<td>' . $employee['Employeetype']['name'] . '</td>';
						echo '<td class="actions">';
							if($loguser['User']['payrollperiod'] == 0){
								echo $this->Html->link(__('Payroll'), array('controller' => 'incomes', 'action' => 'selectpayrollperiod', $employee['Employee']['id']));
							}else if($loguser['User']['payrollperiod'] != 0){
								if(!empty($check)){
									echo $this->Html->link(__('Payroll'), array('controller' => 'incomes', 'action' => 'view', $employee['Employee']['id'], $loguser['User']['payrollperiod']));
									echo '&nbsp;';
									echo $this->Html->link('Remove', array('controller' => 'incomes', 'action' => 'delete', $check['Income']['id'], $employee['Employee']['id'], $loguser['User']['payrollperiod']), array(), __('Are you sure you want to delete # %s?', $check['Income']['id']));
								}else{
									echo $this->Html->link(__('Payroll'), array('controller' => 'incomes', 'action' => 'add', $loguser['User']['payrollperiod'] , $employee['Employee']['id']));
									echo '&nbsp;';
									//echo $this->Form->postLink(__('Remove'), array('action' => 'delete', $periodinclude['Periodinclude']['id'], $periodinclude['Periodinclude']['payrollperiod_id']), array(), __('Are you sure you want to delete # %s?', $periodinclude['Periodinclude']['id']));
								}
								
									
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
	}
echo '</div>';

?>