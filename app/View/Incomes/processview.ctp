<br/>
<?php
	echo '<H3>Payroll Period: ' . $p['Payrollperiod']['period'] . '</h3>';
	echo '<div class="actions">';
		echo $this->Html->link(__('<< Back'), array('controller' => 'divisions', 'action' => 'index2', $p['Payrollperiod']['id']));
	echo '</div>';
	echo '<br/><br/>';
	
if(!empty($incomes)){
	foreach ($incomes as $income):
		echo '<table width="100%" cellpadding="0" cellspacing="0" style="border: 1px solid #ccc; border-right: 0; border-top: 0;">';
			echo '<tr>';
				echo '<th colspan="6" style="background-color: blue; text-align: left; padding: 10px;  color: white;" class="actions">';
					
					if(empty($payslip)){
						echo $this->Html->link('Update Payroll Details', array('controller' => 'incomes', 'action' => 'view', $income['Income']['employee_id'], $income['Income']['payrollperiod_id']));
					}else{
						echo $this->Html->link('View Details', array('controller' => 'incomes', 'action' => 'view', $income['Income']['employee_id'], $income['Income']['payrollperiod_id']));
					}
					
					echo '&nbsp;&nbsp;';
					echo strtoupper($income['Employee']['lastname'] . ', ' . $income['Employee']['firstname']);
				echo '</th>';
				echo '<td>';
					
					if($income['Employee']['ratetype_id'] == 1){
						//echo $income['Employee']['monthlyrate'] / 2;
					}else if($income['Employee']['ratetype_id'] == 2){
						
					}
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
			if($income['Employee']['ratetype_id'] == 1){
				echo '<td class="label">Absent</td>';
				echo '<td class="label">';
					echo $income['Income']['absent'];
				echo '</td>';
			}else if($income['Employee']['ratetype_id'] == 2){
				echo '<td class="label">Days Work</td>';
				echo '<td class="label">';
					echo $income['Income']['dayswork'];
				echo '</td>';
			}else{
				echo '<td class="label">ABSENT / DAYS WORK</td>';
				echo '<td class="label">';
					echo 'INVALID';
				echo '</td>';
			}
			
				echo '<td>Adjustments</td>';
				echo '<td>';
					echo $income['Income']['adjustments'];
				echo '</td>';
				echo '<td rowspan="9" width="25%" style="border: 1px solid #ccc;" valign="top">';
					$e = 0;
					$totalearnings = 0;
					echo '<table class="bordered" width="100%" style="font-size: 11px;">';
						echo '<thead>';
						echo '<tr >';
							echo '<th colspan = "12" style="text-alig">OTHER EARNINGS</th>';
						echo '</tr>';
						echo '<tr>';
							echo '<th>Type</th>';
							echo '<th>Amount / day</th>';						
						echo '</tr>';
						echo '</thead>';
				
				$earnings = $this->requestAction(array('controller' => 'earningrecords', 'action' => 'earnings'), array($income['Income']['employee_id'], $p['Payrollperiod']['id']));
				if(!empty($earnings)){
					foreach ($earnings as $earn):
						$earnname = $this->requestAction('otherearnings/getentry/' . $earn['Earningrecord']['otherearningsentry_id']);
						echo '<tr>';			
							echo '<td>';
								if(empty($earnname)){
										echo $earn['Earningrecord']['description'];
									}else{
										echo $earnname['Otherearning']['name'];
										if($earnname['Otherearning']['taxableincome'] == 1){
											$totalearnings = $totalearnings + $earn['Earningrecord']['totalamount'];
										}
									}
							echo '</td>';
							echo '<td>' . $earn['Earningrecord']['totalamount']  . '</td>';
						echo '</tr>';
						
						$e = $e + $earn['Earningrecord']['totalamount'];
						
					endforeach;
				}
					echo '</table>';
					
					$totalloans = 0;
					$loans = $this->requestAction(array('controller' => 'loanpayments', 'action' => 'selectloan'), array($income['Income']['employee_id'], $p['Payrollperiod']['id']));
						echo '<table class="bordered" width="100%" style="font-size: 11px;">';
							echo '<thead>';
							echo '<tr >';
								echo '<th colspan = "2" style="text-alig">LOANS</th>';
							echo '</tr>';
							echo '<tr>';
								echo '<th>Type</th>';
								echo '<th>Amount</th>';
							echo '</tr>';
							echo '</thead>';
					if(!empty($loans)){
						foreach ($loans as $loan):
							echo '<tr>';			
								echo '<td>';
									echo $loan['Loantype']['name'];
								echo '</td>';
								echo '<td>';
									echo $loan['Loanpayment']['amount'];								
								echo '</td>';
							echo '</tr>';
							$totalloans = $totalloans + $loan['Loanpayment']['amount'];
						endforeach;
					}	
						echo '</table>';
						

				echo '</td>';
				
				
				echo '<td rowspan="9" width="25%" style="border: 1px solid #ccc;" valign="top">';
					$loans = $this->requestAction(array('controller' => 'deductions', 'action' => 'deductions'), array($income['Income']['employee_id'], $p['Payrollperiod']['id']));
						echo '<table class="bordered" width="100%" style="font-size: 11px;">';
							echo '<thead>';
							echo '<tr >';
								echo '<th colspan = "2" style="text-alig">OTHER DEDUCTIONS</th>';
							echo '</tr>';
							echo '<tr>';
								echo '<th>Type</th>';
								echo '<th>Deduction</th>';
							echo '</tr>';
							echo '</thead>';
					if(!empty($deductions)){
						foreach ($deductions as $deduction):
							echo '<tr>';			
								echo '<td>';
									 $deduction['Otherductionentry']['description'];
								echo '</td>';
								echo '<td>';
									echo $deduction['Otherductionentry']['amount'];								
								echo '</td>';
							echo '</tr>';
							$totalloans = $totalloan + $loan['Loanpayment']['amount'];
						endforeach;
					}	
					echo '</table>';
					
					$ots = $this->requestAction(array('controller' => 'overtimes', 'action' => 'overtimes'), array($income['Income']['employee_id'], $p['Payrollperiod']['id']));
						echo '<br/>';
						echo '<table class="bordered" width="100%" style="font-size: 11px;">';
							echo '<thead>';
							echo '<tr>';
								echo '<th colspan = "5" style="text-alig">OVERTIME</th>';
							echo '</tr>';
							echo '<tr>';
								echo '<th>Date</th>';
								echo '<th>Type</th>';
								echo '<th>Hour</th>';
								echo '<th>Minutes</th>';
								echo '<th>Amount</th>';
							echo '</tr>';
							echo '</thead>';
					if(!empty($ots)){
						foreach ($ots as $ot):
							echo '<tr>';											
								echo '<td>' . date('F j, Y', strtotime($ot['Overtime']['referencedate']))  . '</td>';
								echo '<td>' . $ot['Overtimerate']['name']  . '</td>';
								echo '<td>' . $ot['Overtime']['ottotalhours']  . '</td>';
								echo '<td>' . $ot['Overtime']['ottotalminutes']  . '</td>';
								echo '<td>' . number_format($ot['Overtime']['otamount'], 2, '.', ',' )  . '</td>';
							echo '</tr>';
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
				echo '<td>' . $income['Income']['sss']. '</td>';
				echo '<td>Philhealth</td>';
				echo '<td>' . $income['Income']['philhealth']. '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>HDMF</td>';
				echo '<td>' . $income['Income']['hdmf']. '</td>';
			
				echo '<td>Penalty</td>';
				echo '<td>' . $income['Income']['penalty']. '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Advances</td>';
				echo '<td>' . $income['Income']['advances']. '</td>';
				
				echo '<td>Medical</td>';
				echo '<td>' . $income['Income']['medical']. '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Others</td>';
				echo '<td>' . $income['Income']['others']. '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Tax</td>';
				echo '<td>' . $income['Income']['tax']. '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Late / Hour</td>';
				echo '<td>' . $income['Income']['hour']. ' hrs  ' . $income['Income']['minutes'] . ' mins</td>';
				echo '<td>';
					echo '<td>' . $income['Income']['amount']. '</td>';
				echo '</td>';
			echo '</tr>';
		echo '</table>';	
	
	echo '<br/>';
	endforeach;
	
}else{
	echo 'This payroll period is already processed';
	
}
?>

  

  <?php
  if(!empty($incomes)){
	echo '<table width="98%">';
			echo '<tr>';
				echo '<td style="text-align: right;" class="actions">';
					//echo $this->Html->link(__('Print Payslip'), array('controller' => 'incomes', 'action' => 'printpayslip', 'ext' => 'pdf', 1, $p['Payrollperiod']['id']), array('target' => '_blank'));
					echo $this->Html->link(__('Print Payslip'), array('controller' => 'incomes', 'action' => 'printpayslip', 1, $p['Payrollperiod']['id']), array('target' => '_blank'));
					
					echo '&nbsp;&nbsp;';
					echo $this->Html->link(__('Finalize'), array('controller' => 'incomes', 'action' => 'finalize', $action, $period, $depdiv, 1));
				echo '</td>';
			echo '</tr>';
		echo '</table>';
	}
  
  ?>
  <br/><br/<br/>
</div>
 
 