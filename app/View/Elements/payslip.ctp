<?php
		$totalot = 0;
		$ots = $this->requestAction(array('controller' => 'overtimes', 'action' => 'overtimes'), array($income['Payrollperiod']['id'], $income['Income']['employee_id']));
		$deductions = $this->requestAction(array('controller' => 'deductions', 'action' => 'deductions'), array($income['Payrollperiod']['id'], $income['Income']['employee_id']));
		$loans = $this->requestAction(array('controller' => 'loanpayments', 'action' => 'selectloan'), array($income['Payrollperiod']['id'], $income['Income']['employee_id']));
		$earnings = $this->requestAction(array('controller' => 'earningrecords', 'action' => 'earnings'), array($income['Payrollperiod']['id'], $income['Income']['employee_id']));
		$employee = $this->requestAction('employees/getemployee/' . $income['Income']['employee_id']);
		
		if(!empty($ots)){
			foreach ($ots as $ot):
				$totalot = $ot['Overtime']['otamount'];
			endforeach;
		}
		
		$deductiontotal = 0;
		if(!empty($deductions)){
			foreach ($deductions as $deduction):		
				$deductiontotal = $deductiontotal + $deduction['Otherductionentry']['amount'];
			endforeach;
		}
		
		$totalloans = 0;
		if(!empty($loans)){
			foreach ($loans as $loan):
				$totalloans = $totalloans + $loan['Loanpayment']['amount'];
			endforeach;
		}	
		
		$e = 0;
		if(!empty($earnings)){
			foreach ($earnings as $earn):
				$e = $e + $earn['Earningrecord']['totalamount'];
			endforeach;
		}
		
		$deductiontotal =  $deductiontotal + $income['Income']['sss'] +  $income['Income']['philhealth'] +  $income['Income']['hdmf'] +  $income['Income']['advances'] +  $income['Income']['medical'] +  $income['Income']['uniform'] +  $income['Income']['penalty'] +  $income['Income']['tax'] +  $income['Income']['amount'] +  $income['Income']['absentamount'] + $totalloans;
		
		
		echo '<div>';			
			echo '<table class="actions" width="50%" style="border: 1px solid black;">';
				echo '<tr>';
					echo '<th>PAYEE</th>';
					echo '<th>' . strtoupper($employee['Employee']['lastname'] . ', ' . $employee['Employee']['firstname'] . ' ' . $employee['Employee']['middlename']) . ' - ' . $employee['Jobtitle']['description'];
				echo '</tr>';
				echo '<tr>';
					echo '<th>DEPT/DIV</th>';
					echo '<th>' . $employee['Department']['name'] . ' / ' . $employee['Division']['name'] . '</th>';
				echo '</tr>';
				echo '<tr>';
					echo '<th>PAYROLL PERIOD</th>';
					echo '<th>' . strtoupper($income['Payrollperiod']['period']) . '</th>';
				echo '</tr>';
			echo '</table>';
			
			echo '<table class="actions" width="50%" style="border: 1px solid black;">';
				echo '<tr>';
					echo '<th style="width: 22%">Account Number</th>';
					echo '<th style="width: 3%">:</th>';
					echo '<th style="width: 15%">';
						echo strtoupper($employee['Employee']['payrollaccountnumber']);
					echo '</th>';
					echo '<th style="width:6%">&nbsp;</th>';
					echo '<th style="width: 22%">BASIC PAY</th>';
					echo '<th style="width: 3%">:</th>';
					echo '<th style="width: 10%;  text-align: right;">';
						if($income['Income']['ratetype'] == 1){
							$grossincome = $employee['Employee']['monthlyrate'] / 2;
							echo number_format($grossincome, 2, '.', ',' );
						}else{
							$grossincome = $employee['Employee']['dailyrate'] * $income['Income']['daysworked'];
							echo number_format($grossincome, 2, '.', ',' );
						}
					echo '</th>';
					echo '<th style="width: 5%">&nbsp;</th>';
				echo '</tr>';
				
				echo '<tr>';
					echo '<th style="width: 22%">Daily Rate</th>';
					echo '<th style="width: 3%">:</th>';
					echo '<th style="width: 22%">';
						echo number_format($employee['Employee']['dailyrate'], 2, '.', ',' );
					echo '</th>';
					echo '<th style="width:6%">&nbsp;</th>';
					echo '<th style="width: 22%">Other Earnings</th>';
					echo '<th style="width: 3%">:</th>';
					echo '<th style="width: 10%; text-align: right;">';
						echo number_format($e, 2, '.', ',' );
					echo '</th>';
					echo '<th style="width: 5%">&nbsp;</th>';
				echo '</tr>';
				
				echo '<tr>';
					echo '<th style="width: 22%">Employee No</th>';
					echo '<th style="width: 3%">:</th>';
					echo '<th style="width: 22%">';
						echo $employee['Employee']['employeeno'];
					echo '</th>';
					echo '<th style="width:6%">&nbsp;</th>';
					echo '<th style="width: 22%">Overtime</th>';
					echo '<th style="width: 3%">:</th>';
					echo '<th style="width: 10%;  text-align: right;">';
						echo number_format($totalot, 2, '.', ',' );
					echo '</th>';
					echo '<th style="width: 5%">&nbsp;</th>';
				echo '</tr>';
				
				echo '<tr>';
					echo '<th style="width: 22%"></th>';
					echo '<th style="width: 3%">:</th>';
					echo '<th style="width: 22%">';
						//echo $employee['Ratetype']['name'];
					echo '</th>';
					echo '<th style="width:6%">&nbsp;</th>';
					echo '<th style="width: 22%">Deductions</th>';
					echo '<th style="width: 3%">:</th>';
					echo '<th style="width: 10%;  text-align: right;">';
						echo number_format($deductiontotal, 2, '.', ',' );
					echo '</th>';
					echo '<th style="width: 5%">&nbsp;</th>';
				echo '</tr>';
				
				$netpay = $grossincome + $income['Income']['adjustments'] + $e + $totalot - ($deductiontotal);		
				echo '<tr>';
					echo '<th style="width: 22%"></th>';
					echo '<th style="width: 3%">:</th>';
					echo '<th style="width: 22%">';
						//echo $employee['Ratetype']['name'];
					echo '</th>';
					echo '<th style="width:6%">&nbsp;</th>';
					echo '<th style="width: 22%; font-weight: bold;">NET PAY</th>';
					echo '<th style="width: 3%">:</th>';
					echo '<th style="width: 10%;  text-align: right; font-weight: bold;">';
						echo number_format($netpay, 2, '.', ',' );
					echo '</th>';
					echo '<th style="width: 5%">&nbsp;</th>';
				echo '</tr>';				
			echo '</table>';			
			
			echo '<table class="actions" width="50%" style="border: 1px solid black;">';
				echo '<tr>';
					echo '<td style="50%" valign="top">';
						echo '<table width="100%">';
							echo '<tr>';
								echo '<td colspan="2">';
									echo 'ITEMIZED EARNINGS';
								echo '</td>';
							echo '</tr>';
							echo '<tr>';
								echo '<td style="50%">';
									echo 'Adjustment';
								echo '</td>';
								echo '<td style="50%; text-align: right;">';
									echo number_format($income['Income']['adjustments'], 2, '.', ',' );
								echo '</td>';
							
							echo '</tr>';
							
					if(!empty($earnings)){
						foreach ($earnings as $earn):
							$earnname = $this->requestAction('otherearnings/getentry/' . $earn['Earningrecord']['otherearningsentry_id']);
							echo '<tr>';
								echo '<td style="50%">';
									echo $earnname['Otherearning']['name'];
								echo '</td>';
								echo '<td style="50%; text-align: right;">';
									echo number_format($earn['Earningrecord']['totalamount'], 2, '.', ',' );
								echo '</td>';
							echo '</tr>';
						endforeach;
					}
							echo '<tr>';
								echo '<td colspan="2"></td>';
							echo '</tr>';
							echo '<tr>';
								echo '<td colspan="2">';
									echo 'OVERTIME';
								echo '</td>';
							echo '</tr>';

					if(!empty($ots)){
						foreach ($ots as $ot):
							echo '<tr>';
								echo '<td style="50%">';
									 echo $ot['Overtime']['referencedate'];
								echo '</td>';
								echo '<td style="50%; text-align: right;">';
									echo number_format($ot['Overtime']['otamount'], 2, '.', ',' );
								echo '</td>';
							echo '</tr>';
						endforeach;
					}
						echo '</table>';
					echo '</td>';
					
					//deductions
					echo '<td style="50%"  valign="top"	>';
						echo '<table width="100%">';
							echo '<tr>';
								echo '<td colspan="2">';
									echo 'ITEMIZED DEDUCTIONS';
								echo '</td>';
							echo '</tr>';
							
							echo '<tr>';
								echo '<td style="50%;">';
									echo 'SSS';
								echo '</td>';
								echo '<td style="50%; text-align: right;">';
									echo number_format($income['Income']['sss'], 2, '.', ',' );
								echo '</td>';
							echo '</tr>';
							
							echo '<tr>';
								echo '<td style="50%">';
									echo 'Philhealth';
								echo '</td>';
								echo '<td style="50%; text-align: right;">';
									echo number_format($income['Income']['philhealth'], 2, '.', ',' );
								echo '</td>';
							echo '</tr>';
							
							echo '<tr>';
								echo '<td style="50%">';
									echo 'HDMF';
								echo '</td>';
								echo '<td style="50%; text-align: right;">';
									echo number_format($income['Income']['hdmf'], 2, '.', ',' );
								echo '</td>';
							echo '</tr>';
							
							echo '<tr>';
								echo '<td style="50%">';
									echo 'Advances';
								echo '</td>';
								echo '<td style="50%; text-align: right;">';
									echo number_format($income['Income']['advances'], 2, '.', ',' );
								echo '</td>';
							echo '</tr>';
							
							echo '<tr>';
								echo '<td style="50%">';
									echo 'Medical';
								echo '</td>';
								echo '<td style="50%; text-align: right;">';
									echo number_format($income['Income']['medical'], 2, '.', ',' );
								echo '</td>';
							echo '</tr>';
							
							echo '<tr>';
								echo '<td style="50%">';
									echo 'Uniform';
								echo '</td>';
								echo '<td style="50%; text-align: right;">';
									echo number_format($income['Income']['uniform'], 2, '.', ',' );
								echo '</td>';
							echo '</tr>';
							
							echo '<tr>';
								echo '<td style="50%">';
									echo 'Penalty';
								echo '</td>';
								echo '<td style="50%; text-align: right;">';
									echo number_format($income['Income']['penalty'], 2, '.', ',' );
								echo '</td>';
							echo '</tr>';
							
							echo '<tr>';
								echo '<td style="50%">';
									echo 'Tax';
								echo '</td>';
								echo '<td style="50%; text-align: right;">';
									echo number_format($income['Income']['tax'], 2, '.', ',' );
								echo '</td>';
							echo '</tr>';
							
							echo '<tr>';
								echo '<td style="50%">';
									echo 'AWOL';
								echo '</td>';
								echo '<td style="50%; text-align: right;">';
									echo number_format($income['Income']['absentamount'], 2, '.', ',' );
								echo '</td>';
							echo '</tr>';
							
							echo '<tr>';
								echo '<td style="50%">';
									echo 'Late';
								echo '</td>';
								echo '<td style="50%; text-align: right;">';
									echo number_format($income['Income']['amount'], 2, '.', ',' );
								echo '</td>';
							echo '</tr>';
							
					if(!empty($loans)){
						foreach ($loans as $loan):
							echo '<tr>';
								echo '<td style="50%">';
									echo $loan['Loantype']['name'];
								echo '</td>';
								echo '<td style="50%; text-align: right;">';
									echo number_format($loan['Loanpayment']['amount'], 2, '.', ',' );
								echo '</td>';
							echo '</tr>';
						endforeach;
					}	
					
					if(!empty($deductions)){
						foreach ($deductions as $deduction):
							echo '<tr>';
								echo '<td style="50%">';
									echo $deduction['Otherductionentry']['description'];
								echo '</td>';
								echo '<td style="50%; text-align: right;">';
									echo number_format($deduction['Otherductionentry']['amount'], 2, '.', ',' );
								echo '</td>';
							echo '</tr>';
						endforeach;
					}
						echo '</table>';
					echo '</td>';
				echo '</tr>';
				echo '</table>';
?>