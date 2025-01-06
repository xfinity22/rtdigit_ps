<?php ?>
<br/>
<?php
	echo '<H3>Payroll Period: ' . $payroll['Payrollperiod']['period'] . '</h3>';
	echo '<br/>';
	echo '<div class="actions">';
		echo $this->Html->link(__('<< Back'), array('controller' => 'periodincludes', 'action' => 'index'));
	echo '</div>';
	echo $this->Form->create('Income', array('class' => 'form'));
	//echo $this->Form->input('payrollperiod_id', array('class' => 'form'));
	echo '<br/>';
	$a= 0;
if(!empty($employees)){
	foreach ($employees as $employee):
	//$true = $this->requestAction(array('controller' => 'periodincludes', 'action' => 'checkemployee'), array( $employee['Employee']['id'], $payroll['Payrollperiod']['id']));
	$check = $this->requestAction(array('controller' => 'incomes', 'action' => 'checkdata'), array( $employee['Employee']['id'], $payroll['Payrollperiod']['id']));
	if(!empty($check)){
		echo '<input name="data[Income][id][]" value="' . $check['Income']['id'] . '"  type="hidden">';
	}else{
		echo '<input name="data[Income][id][]" type="hidden">';
	}
		$a++;
		echo '<table width="100%" cellpadding="0" cellspacing="0" style="border: 1px solid #ccc; border-right: 0; border-top: 0;">';
			if(empty($employee['Employee']['monthlyrate'])){
				$rate = 0;
			}else{
				$rate = $employee['Employee']['dailyrate'];
			}
			
			if(empty($rate)){
				$rate = 0;
			}
			
			echo '<tr>';
				echo '<th colspan="5" style="background-color: blue; text-align: left; padding: 10px;  color: white;">'. $employee['Employee']['lastname'] . ', ' . $employee['Employee']['firstname'] .'</th>';
				echo '<td>';
					echo '<input name="data[Income][employee_id][]" type="hidden" value="' . $employee['Employee']['id'] . '">';
					echo '<input name="data[Income][monthlyrate][]" value="' . $employee['Employee']['monthlyrate'] . '" type="hidden">';
					echo '<input name="data[Income][rate][]" value="' . $rate . '" type="hidden">';
					echo '<input name="data[Income][department][]" value="' . $employee['Employee']['department_id'] . '" type="hidden">';
					echo '<input name="data[Income][division][]" value="' . $employee['Employee']['division_id'] . '" type="hidden">';
					echo '<input name="data[Income][ratetype][]" value="' . $employee['Employee']['ratetype_id'] . '" type="hidden">';
					
					if($employee['Employee']['ratetype_id'] == 1){
						echo '<input name="data[Income][grossincome][]" value="' . $employee['Employee']['monthlyrate'] / 2 . '" type="hidden">';
					}else if($employee['Employee']['ratetype_id'] == 2){
						echo '<input name="data[Income][grossincome][]" value="' . $employee['Employee']['monthlyrate'] / 2 . '" type="hidden">';
					}
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
			if($employee['Employee']['ratetype_id'] == 1){
				echo '<td class="label">Absent</td>';
				echo '<td class="label">';
					if(!empty($check)){
						echo '<input name="data[Income][absent][]"  value="'.$check['Income']['absent'].'">';
						echo '<input name="data[Income][dayswork][]"  value="'.$check['Income']['dayswork'].'">';
					}else{
						echo '<input name="data[Income][absent][]"  value="0">';
						echo '<input name="data[Income][dayswork][]" value="0"  type="hidden">';
					}
				echo '</td>';
			}else if($employee['Employee']['ratetype_id'] == 2){
				echo '<td class="label">Days Work</td>';
				echo '<td class="label">';
					if(!empty($check)){
						echo '<input name="data[Income][dayswork][]"  value="'.$check['Income']['dayswork'].'">';
						echo '<input name="data[Income][absent][]" value="0" type="hidden">';
					}else{
						echo '<input name="data[Income][dayswork][]"  value="0">';
						echo '<input name="data[Income][absent][]" value="0" type="hidden">';
					}
					
				echo '</td>';
			}else{
				echo '<td class="label">ABSENT / DAYS WORK</td>';
				echo '<td class="label">';
					echo 'INVALID';
				echo '</td>';
			}
			
				echo '<td>Adjustments</td>';
				echo '<td>';
					if(!empty($check)){
						echo '<input name="data[Income][adjustments][]"  value="'.$check['Income']['adjustments'].'">';
					}else{
						echo '<input name="data[Income][adjustments][]"  value="0">';
					}
					
				echo '</td>';
				echo '<td rowspan="8" width="35%" style="border: 1px solid #ccc;" valign="top">';
					
					$otherearnings = $this->requestAction('otherearningsentries/selectentries/' . $employee['Employee']['id']);
					echo '<table class="bordered" width="100%">';
						echo '<thead>';
						echo '<tr >';
							echo '<th colspan = "4" style="text-alig">OTHER EARNINGS</th>';
						echo '</tr>';
						echo '<tr>';
							echo '<th>Type</th>';
							echo '<th>Amount / day</th>';
						echo '</tr>';
						echo '</thead>';
				if(!empty($otherearnings)){
					foreach ($otherearnings as $earn):
					if($earn['Otherearningsentry']['payprequency'] == 0){
						echo '<tr>';
							echo '<td>';
								echo $earn['Otherearning']['name'];
							echo '</td>';
							echo '<td>';
								echo $earn['Otherearningsentry']['amount'];
							echo '</td>';
						echo '</tr>';
					}if($earn['Otherearningsentry']['payprequency'] == 1 && date('d', strtotime($payroll['Payrollperiod']['from'])) == 01){
						echo '<tr>';
							echo '<td>';
								echo $earn['Otherearning']['name'];
							echo '</td>';
							echo '<td>';
								echo $earn['Otherearningsentry']['amount'];
							echo '</td>';
						echo '</tr>';
					}if($earn['Otherearningsentry']['payprequency'] == 2 && date('d', strtotime($payroll['Payrollperiod']['from'])) == 16){
						echo '<tr>';
							echo '<td>';
								echo $earn['Otherearning']['name'];
							echo '</td>';
							echo '<td>';
								echo $earn['Otherearningsentry']['amount'];
							echo '</td>';
						echo '</tr>';
					}if($earn['Otherearningsentry']['payprequency'] == 3){
						echo '<tr>';
							echo '<td>';
								echo $earn['Otherearning']['name'];
							echo '</td>';
							echo '<td>';
								echo $earn['Otherearningsentry']['amount'];
							echo '</td>';
						echo '</tr>';
					}
						
						
						
					endforeach;
				}	
					echo '</table>';	

					$loans = $this->requestAction('loanentries/selectloan/' . $employee['Employee']['id']);
						echo '<br/><br/>';
						echo '<table class="bordered" width="100%">';
							echo '<thead>';
							echo '<tr >';
								echo '<th colspan = "2" style="text-alig">LOANS</th>';
							echo '</tr>';
							echo '<tr>';
								echo '<th>Type</th>';
								echo '<th>Deduction</th>';
							echo '</tr>';
							echo '</thead>';
					if(!empty($loans)){
						foreach ($loans as $loan):
						if($payroll['Payrollperiod']['until'] >=  $loan['Loanentry']['startdeduction']){
							echo '<tr>';			
								echo '<td>';
									echo $loan['Loantype']['name'];
								echo '</td>';
								echo '<td>';
								
									if($loan['Loanentry']['deductiontype'] == 0){
										if($payroll['Payrollperiod']['classification_id'] == 1){
											$amount = $loan['Loanentry']['deductionperpayday'];
											
											if($amount > $loan['Loanentry']['balance']){
												$amount = $loan['Loanentry']['balance'];
												
											}
											
											echo $amount;
										}else{
											echo '0';
										}
										
									}else if($loan['Loanentry']['deductiontype'] == 1){
										if($payroll['Payrollperiod']['classification_id'] == 2){
											$amount = $loan['Loanentry']['deductionperpayday'];
											
											if($amount > $loan['Loanentry']['balance']){
												$amount = $loan['Loanentry']['balance'];
												
											}
											
											echo $amount;
										}else{
											echo '0';
										}
									}else if($loan['Loanentry']['deductiontype'] == 2){
										$amount = $loan['Loanentry']['deductionperpayday'];
											
										if($amount > $loan['Loanentry']['balance']){
											$amount = $loan['Loanentry']['balance'];
										}
											
										echo $amount;
									}
								
								echo '</td>';
							echo '</tr>';
						}else{
							echo 'No data';
						}
						endforeach;
						}
						echo '</table>';
						

				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td colspan="4">&nbsp;</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td colspan="4" style="background-color: #ccc; font-weight: bold; text-align: center">D E D U C T I O N S</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>SSS</td>';
				echo '<td>';
					if(!empty($check)){
						echo '<input name="data[Income][sss][]" value="'.$check['Income']['sss'].'">';
					}else{
						if($payroll['Payrollperiod']['sss'] == 0  && !empty($employee['Employee']['monthlyrate'])){
							$contri = $this->requestAction('ssscontribs/getcontri/'. $employee['Employee']['monthlyrate']);
							$contrif = $contri['Ssscontrib']['eess'];
									
							echo '<input name="data[Income][sss][]" value="' . $contrif . '">';
							echo $this->Form->input('month', array('label' => '', 'value' => $payroll['Payrollperiod']['from'], 'type' => 'hidden'));
						}else{
							echo '<input name="data[Income][sss][]" value="0">';
						}	
					}
					
				echo '</td>';
			
				echo '<td>Philhealth</td>';
				echo '<td>';
					if(!empty($check)){
						echo '<input name="data[Income][philhealth][]" value="'.$check['Income']['philhealth'].'">';
					}else{
						if($payroll['Payrollperiod']['philhealth'] == 0 && !empty($employee['Employee']['monthlyrate'])){
							if($payroll['Payrollperiod']['philhealth'] == 0 && !empty($employee['Employee']['monthlyrate'])){
								// $pcontri = $this->requestAction('philhealths/getcontri/'. $employee['Employee']['monthlyrate']);
								// $contrif = $pcontri['Philhealth']['employeeshare'];
								//echo $this->Form->input('philhealth', array('label' => '', 'value' => $contrif));
								$contrif = ($employee['Employee']['monthlyrate'] * (0.04)) / 2;
								echo '<input name="data[Income][philhealth][]" value="'.$contrif.'">';
							}else{
								echo '<input name="data[Income][philhealth][]" value="0">';
							}
						}else{
							echo '<input name="data[Income][philhealth][]" value="0">';
						}
					}
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>HDMF</td>';
				echo '<td>';
					if(!empty($check)){
						echo '<input name="data[Income][hdmf][]" value="'.$check['Income']['hdmf'].'">';
					}else{
						if($payroll['Payrollperiod']['pagibig'] == 0){
							$h = 0;
							$h = $employee['Employee']['monthlyrate'] * 0.02;
							echo '<input name="data[Income][hdmf][]" value='.$h.'>';
						}else{
							echo '<input name="data[Income][hdmf][]" value="0">';
						}
					}
					
				echo '</td>';
				
				$deduction = $this->requestAction('deductions/searchdeductions/' . $employee['Employee']['id']);
				echo '<td>Health Card</td>';
				echo '<td>';
					$caritas = 0;
					if($payroll['Payrollperiod']['classification_id'] == 2){						
						if(!empty($deduction)){
							$caritas = $deduction['Deduction']['caritas'];
						}
					}
					if(!empty($check)){
						echo '<input name="data[Income][penalty][]" value="'.$check['Income']['penalty'].'">';
					}else{
						echo '<input name="data[Income][penalty][]" value="'.$caritas.'">';
					}
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Advances</td>';
				echo '<td>';
					if(!empty($check)){
						echo '<input name="data[Income][advances][]" value="'.$check['Income']['advances'].'">';
					}else{
						echo '<input name="data[Income][advances][]">';
					}
					
				echo '</td>';
				
				echo '<td>Coop Contri</td>';
				echo '<td>';
					$coop = 0;
					if(!empty($deduction)){
						$coop = $deduction['Deduction']['cooploan'];
					}
					if(!empty($check)){
						echo '<input name="data[Income][uniform][]" value="'.$check['Income']['uniform'].'">';
					}else{
						echo '<input name="data[Income][uniform][]" value="'.$coop.'">';
					}
				echo '</td>';
				
			echo '</tr>';
				echo '<td>Medical</td>';
				echo '<td>';
					if(!empty($check)){
						echo '<input name="data[Income][medical][]" value="'.$check['Income']['medical'].'">';
					}else{
						echo '<input name="data[Income][medical][]" >';	
					}
					
				echo '</td>';
			echo '<tr>';
				
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Late / Hour</td>';
				echo '<td>';
					$lateh = 0;
					$latem = 0;
					$lates = $this->requestAction(array('controller' => 'timelogs', 'action' => 'getlates' ), array($employee['Employee']['id'], $payroll['Payrollperiod']['from'], $payroll['Payrollperiod']['until']));
					if(!empty($lates)){
						foreach($lates as $late):
							$lateh = $lateh + $late['Timelog']['late'];
							$latem = $latem + $late['Timelog']['lateminutes'];
						endforeach;
						$totall = ($lateh * 60 ) + $latem;
						$lateh = floor($totall / 60);
						$latem = $totall % 60;
					}
					if(!empty($check)){
						echo '<input name="data[Income][hour][]" value="' . $check['Income']['hour'] . '">';
					}else{
						echo '<input name="data[Income][hour][]" value="' . $lateh . '">';
					}
				echo '</td>';
				echo '<td>';
					echo 'Minutes';
				echo '</td>';
				echo '<td>';
					if(!empty($check)){
						echo '<input name="data[Income][minutes][]" value="' .  $check['Income']['minutes'] . '" width="50px">';
					}else{
						echo '<input name="data[Income][minutes][]" value="' . $latem . '" width="50px">';
					}
					
				echo '</td>';
			echo '</tr>';
		echo '</table>';
	
	echo '<br/>';
	endforeach;
}	

?>

  

  <?php
if(($a > 0)){
	echo '<table width="100%">';
			echo '<tr>';
				echo '<td style="text-align: right;">';
					echo $this->Form->end(__('SAVE ALL '));
				echo '</td>';
			echo '</tr>';
		echo '</table>';
	}else{
		echo 'This payroll period is already processed';
	}
  
  ?>
</div>
 
 