<br/>

<?php
	$loguser = $this->requestAction('users/loggeduser'); 
	echo '<div>';		
		echo '<table class="bordered" width="100%">';
			echo '<tr>';
				echo '<th width="15%">EMPLOYEE</th>';
				echo '<th width="35%">' . strtoupper($employee['Employee']['lastname'] . ', ' . $employee['Employee']['firstname'] . ' ' . $employee['Employee']['middlename']) . '</th>';
				
				echo '<th colspan="5">' . 'AVAILABLE LEAVE FOR THE YEAR OF ' . $year . '</th>';
				echo '<th class="actions">'; 
					echo '<center>';
				if($loguser['User']['usertype_id'] != 4){
					if(!empty($leave)){
						echo $this->Html->link('Update', array('controller' => 'leaves', 'action' => 'edit', $leave['Leave']['id'], $employee['Employee']['id'], $year));
					}else{
						echo $this->Html->link('Update', array('controller' => 'leaves', 'action' => 'add', $employee['Employee']['id'], $year));
					}
				}
					echo '</center>';
				echo '</th>';
			echo '</tr>';
			
			$slc = 0;
			$vlc = 0;
			$total = 0;
			echo '<tr>';
				echo '<th >DIVISION / DEPARTMENT</th>';
				echo '<th>' . $employee['Division']['name'] . ' / ' . $employee['Department']['name'] . '<th>';
					echo 'VACATION LEAVE';
				echo '</th>';
				echo '<th>';
				
					if(!empty($leave)){
						echo $leave['Leave']['vactionleave'];
						$vlc = $leave['Leave']['vactionleave'];
						
					}else{
						echo '0';
					}					
				echo '</th>';
				echo '<th>';
					echo 'SICK LEAVE';
				echo '</th>';
				echo '<th>';
					if(!empty($leave)){
						echo $leave['Leave']['sickleave'];
						$slc = $leave['Leave']['sickleave'];
					}else{
						echo '0';
					}					
				echo '</th>';
				echo '<th>';
					echo 'TOTAL LEAVE';
				echo '</th>';
				echo '<th>';
					if(!empty($leave)){
						echo $leave['Leave']['total'];
						$total = $leave['Leave']['total'];
					}else{
						echo '0';
					}
				echo '</th>';
			echo '</tr>';
				$sl = 0;
				$vl = 0;
				$sd = 0;
				$t = 0;
			if(!empty($leaves)){
				
				foreach ($leaves as $leave):
					if($leave['Vltype']['id'] == 1){
						if($leave['Leavetaken']['leavestatus_id'] == 2){
							$vl = $vl + $leave['Leavetaken']['day'];
						}
					}else if($leave['Vltype']['id'] == 2){
						if($leave['Leavetaken']['leavestatus_id'] == 2){
							$sl = $sl + $leave['Leavetaken']['day'];
						}
					}else if($leave['Vltype']['id'] == 3){
						if($leave['Leavetaken']['leavestatus_id'] == 2){
							$sd = $sd + $leave['Leavetaken']['day'];
						}
					}
				endforeach;
				$t = $sl + $vl;
			}
			
			
			echo '<tr>';
				echo '<th colspan="2"></th>';
				echo '<th style="color: red;">';
					echo 'USED VACATION LEAVE';
				echo '</th>';
				
				echo '<th style="color: red;">';				
					if(!empty($leave)){
						echo $vlc - $vl;
					}else{
						echo '0';
					}					
				echo '</th>';
				
				echo '<th style="color: red;">';
					echo 'USED SICK LEAVE';
				echo '</th>';
				echo '<th style="color: red;">';
					if(!empty($leave)){
						echo $slc - $sl;
					}else{
						echo '0';
					}					
				echo '</th>';
				
				echo '<th style="color: red;">';
					echo 'TOTAL LEAVE';
				echo '</th>';
				
				echo '<th style="color: red;">';
					if(!empty($leave)){
						echo $total - $t;
					}else{
						echo '0';
					}
				echo '</th>';
			echo '</tr>';	
		echo '</table>';
		
		
		
		
	echo '</div>';
	echo '<br/><br/>';
	echo '<div class="actions">';
		
		echo $this->Html->link('<< Previous Year', array('action' => 'view', $employee['Employee']['id'], $year-1));
		echo '&nbsp;&nbsp;';
		echo $this->Html->link('Next Year >>', array('action' => 'view', $employee['Employee']['id'], $year+1));
		echo '&nbsp;&nbsp;';
		echo $this->Html->link('File Leave', array('controller' => 'leavetakens', 'action' => 'add', $employee['Employee']['id'], $year));
		echo '&nbsp;&nbsp;';		
		echo '<br/><br/>';
		
	echo '</div>';
	
	echo '<br/><br/><div>';
		
		
	if(!empty($leaves)){
		$sl = 0;
		$vl = 0;
		$sd = 0;
		foreach ($leaves as $leave):
			if($leave['Vltype']['id'] == 1){
				if($leave['Leavetaken']['leavestatus_id'] == 2){
					$vl++;
				}
			}else if($leave['Vltype']['id'] == 2){
				if($leave['Leavetaken']['leavestatus_id'] == 2){
					$sl++;
				}
			}else if($leave['Vltype']['id'] == 3){
				if($leave['Leavetaken']['leavestatus_id'] == 2){
					$sd++;
				}
			}
		endforeach;
	
		echo '<table class="bordered" width="60%">';
			echo '<tr>';
				echo '<th colspan="7">LEAVE TAKEN FOR YEAR ' . $year . '</th>';
			echo '</tr>';
			echo '<tr>';
				
				echo '<th>Leave Type</th>';
				echo '<th>Days</th>';
				echo '<th>Date From</th>';				
				echo '<th>To</th>';				
				echo '<th>Reason</th>';				
				echo '<th>Status</th>';				
				echo '<th>Actions</th>';				
			echo '</tr>';
			
		
		foreach ($leaves as $leave):
			if($leave['Vltype'] == 1){
				if($leave['Leavestatus']['id'] == 2){
					$vl++;
				}
			}else if($leave['Vltype'] == 2){
				if($leave['Leavestatus']['id'] == 2){
					$sl++;
				}
			}else if($leave['Vltype'] == 3){
				if($leave['Leavestatus']['id'] == 2){
					$sd++;
				}
			}
			
			echo '<tr>';
				echo '<td>' . $leave['Vltype']['name'] . '</td>';
				echo '<td>' . $leave['Leavetaken']['day'] . '</td>';
				echo '<td>' . date('F j, Y', strtotime($leave['Leavetaken']['date'])) . '</td>';
				echo '<td>' . date('F j, Y', strtotime($leave['Leavetaken']['dateto'])) . '</td>';
				echo '<td>' . $leave['Leavetaken']['reason'] . '</td>';
				echo '<td>' . $leave['Leavestatus']['name'] . '</td>';				
				echo '<td class="actions">';
					echo $this->Html->link('Update', array('controller' => 'leavetakens', 'action' => 'edit', $leave['Leavetaken']['id'],$employee['Employee']['id'], $year));
					echo '&nbsp;';
					echo $this->Form->postLink(__('Delete'), array('controller' => 'leavetakens', 'action' => 'delete', $leave['Leavetaken']['id'], $leave['Leavetaken']['employee_id'], $year), array(), __('Are you sure you want to delete this entry?', $leave['Leavetaken']['id']));
				echo '</td>';				
			echo '<tr>';
		endforeach;
	}else{
		echo '<div style="background-color: red; color: white; padding: 10px; font-weight: bold;">';
			echo 'NO LEAVE ENTRY FOR YEAR ' . $year;
		echo '</div><br/><br/>';
	}
	/*
		echo '<tr>';
			echo '<td colspan="3">';
				echo $this->Html->link('Update', array('controller' => 'leaves', 'action' => 'add', $employee['Employee']['id'], $year));
			echo '</td>';
		echo '</tr>';
	*/
		echo '</table>';
	echo '</div>';
	
	
	

?> 