<html lang="en">
<head>
<meta charset="utf-8">
<title>Salary</title>
<style type="text/css">
    html, body {
		width: 100%;
        margin: 25px;
		text-align: left;
		font: 10px Helvetica, Arial, Sans-serif;
    }
	
	table th{
		text-align: left;
		font: 9px Arial, Sans-serif;
	}
	
</style>
</head>
<body>
	<br/>
	<?php
	    $profile = $this->requestAction('companyprofiles/getData');
		//OVERTIME
		$totalot = 0;
		if(!empty($ots)){
			foreach ($ots as $ot):
				$totalot = $totalot + $ot['Overtime']['otamount'];
			endforeach;
		}
		
		$deductiontotal = 0;
		if(!empty($deductions)){
			foreach ($deductions as $deduction):		
				$deductiontotal = $deductiontotal + $deduction['Otherductionentry']['amount'];
			endforeach;
		}
		
		$loans = $this->requestAction(array('controller' => 'loanpayments', 'action' => 'selectloan'), array($payroll['Payrollperiod']['id'], $income['Income']['employee_id']));
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
		
		$b = $employee['Branch']['name'];
		
		echo '<div>';			
			echo '<table class="actions" width="50%" style="border: 0px solid black;">';
				echo '<tr>';
					echo '<th colspan="2" style="font-size: 13px;">
						<b>'.strtoupper($profile['Companyprofile']['name']).'<br/></b>
						'.$profile['Companyprofile']['address'].'<br/>
						Tel #: '.$profile['Companyprofile']['landline'].'
						&nbsp;
					</th>';
				echo '</tr>';
				echo '<tr>';
					echo '<th>BRANCH</th>';
					echo '<th>' . $b . '</th>';
				echo '</tr>';
				echo '<tr>';
					echo '<th>PAYEE</th>';
					echo '<th style="font-size: 11px;"><b>' . strtoupper($employee['Employee']['lastname'] . ', ' . $employee['Employee']['firstname'] . ' ' . $employee['Employee']['middlename']) .'</b>';
				echo '</tr>';
				echo '<tr>';
					echo '<th>DEPARTMENT</th>';
					echo '<th>';
						echo $employee['Department']['name'];
					echo '</th>';
				echo '</tr>';
				echo '<tr>';
					echo '<th>PAYROLL PERIOD</th>';
					echo '<th>' . strtoupper($payroll['Payrollperiod']['period']) . '</th>';
				echo '</tr>';
				echo '<tr>';
					echo '<th>PAYROLL TYPE</th>';
					echo '<th>' . strtoupper($payroll['Payrolltype']['name'] . ' / ' . $payroll['Payrollperiod']['code']) . '</th>';
				echo '</tr>';
			echo '</table>';
			
			echo '<table class="actions" width="50%" style="border: 0px solid black;">';
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
						if($income['Income']['dayswork'] != 0 && $income['Income']['rate'] != 0){
							if($income['Income']['ratetype'] == 1){
								$grossincome = $income['Income']['grossincome'];
								echo number_format($grossincome, 2, '.', ',' );
							}else{								
								$grossincome = $employee['Employee']['dailyrate'] * $income['Income']['dayswork'];
								echo number_format($grossincome, 2, '.', ',' );
							}
						}else{
							$grossincome = $income['Income']['grossincome'];
							echo number_format($grossincome, 2, '.', ',' );
						}
					echo '</th>';
					echo '<th style="width: 5%">&nbsp;</th>';
				echo '</tr>';
				
				echo '<tr>';
					echo '<th style="width: 22%">Daily Rate</th>';
					echo '<th style="width: 3%">:</th>';
					echo '<th style="width: 22%">';
						echo number_format($income['Income']['rate'], 2, '.', ',' );
					echo '</th>';
					echo '<th style="width:6%">&nbsp;</th>';
					echo '<th style="width: 22%">Other Earnings</th>';
					echo '<th style="width: 3%">:</th>';
					echo '<th style="width: 10%; text-align: right;">';
						if($e > 0) { echo number_format($e, 2, '.', ',' ); }else{ echo '-'; }
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
						if($totalot > 0) { echo number_format($totalot, 2, '.', ',' ); }else{ echo '-'; }
					echo '</th>';
					echo '<th style="width: 5%">&nbsp;</th>';
				echo '</tr>';
				
				echo '<tr>';
					echo '<th style="width: 22%">Days Worked</th>';
					echo '<th style="width: 3%">:</th>';
					echo '<th style="width: 22%">';
						if(!empty($income['Income']['dayswork'])){
							echo $income['Income']['dayswork'];
						}else{
							echo '0';
						}
					echo '</th>';
					echo '<th style="width:6%">&nbsp;</th>';
					echo '<th style="width: 22%">Deductions</th>';
					echo '<th style="width: 3%">:</th>';
					echo '<th style="width: 10%;  text-align: right;">';
						if($deductiontotal > 0) { echo number_format($deductiontotal, 2, '.', ',' ); }else{ echo '-'; }
					echo '</th>';
					echo '<th style="width: 5%">&nbsp;</th>';
				echo '</tr>';
				
				$grosspay = $grossincome + $income['Income']['adjustments'] + $e + $totalot;
				echo '<tr>';
					echo '<th style="width: 22%">&nbsp;</th>';
					echo '<th style="width: 3%">&nbsp;</th>';
					echo '<th style="width: 22%">';
						echo  '&nbsp;';
					echo '</th>';
					echo '<th style="width:6%">&nbsp;</th>';
					echo '<th style="width: 22%; font-weight: bold;">GROSS PAY </th>';
					echo '<th colspan="2" style="width: 10%;  text-align: right; font-weight: bold;">';
						echo number_format($grosspay, 2, '.', ',' );
					echo '</th>';
					echo '<th style="width: 5%">&nbsp;</th>';
				echo '</tr>';
				
				$netpay = $grossincome + $income['Income']['adjustments'] + $e + $totalot - ($deductiontotal);		
				echo '<tr>';
					echo '<th style="width: 22%">&nbsp;</th>';
					echo '<th style="width: 3%">&nbsp;</th>';
					echo '<th style="width: 22%">';
						echo  '&nbsp;';
					echo '</th>';
					echo '<th style="width:6%">&nbsp;</th>';
					echo '<th style="width: 22%; font-weight: bold;">NET PAY </th>';
					echo '<th colspan="2" style="width: 10%;  text-align: right; font-weight: bold;">';
						if($netpay > 0) { echo number_format($netpay, 2, '.', ',' ); }else{ echo '-'; }
					echo '</th>';
					echo '<th style="width: 5%">&nbsp;</th>';
				echo '</tr>';				
			echo '</table>';
			
			
			echo '<table class="actions" width="50%" style="border: 0px solid black;">';
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
									if($income['Income']['adjustments'] > 0) { echo number_format($income['Income']['adjustments'], 2, '.', ',' ); }else{ echo '-'; }									
								echo '</td>';
							
							echo '</tr>';
							
					if(!empty($earnings)){
						foreach ($earnings as $earn):
							$earnname = $this->requestAction('otherearnings/getentry/' . $earn['Earningrecord']['otherearningsentry_id']);
							echo '<tr>';
								echo '<td style="50%">';
									if(empty($earnname)){
										echo $earn['Earningrecord']['description'];
									}else{
										echo $earnname['Otherearning']['name'];
									
									}
									
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
									echo 'OVERTIME / LEAVE TAKEN';
								echo '</td>';
							echo '</tr>';

					if(!empty($ots)){
						foreach ($ots as $ot):
							echo '<tr>';
								echo '<td style="50%">';
									echo date('m / d', strtotime($ot['Overtime']['requestddate']));
									if(!empty($ot['Overtime']['referencedate'])){
										echo ' - ' . date('m / d', strtotime($ot['Overtime']['referencedate']));
									}
									 echo '<br/>' .$ot['Overtime']['reason'];
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
							
							if($income['Income']['penalty'] > 0){
								echo '<tr>';
									echo '<td style="50%;">';
										echo 'Health Card';
									echo '</td>';
									echo '<td style="50%; text-align: right;">';
										if($income['Income']['penalty'] > 0) { echo number_format($income['Income']['penalty'], 2, '.', ',' ); }else{ echo '-'; }
									echo '</td>';
								echo '</tr>';
							}
							
							if($income['Income']['uniform'] > 0){
								echo '<tr>';
									echo '<td style="50%;">';
										echo 'Coop Contri';
									echo '</td>';
									echo '<td style="50%; text-align: right;">';
										if($income['Income']['uniform'] > 0) { echo number_format($income['Income']['uniform'], 2, '.', ',' ); }else{ echo '-'; }
									echo '</td>';
								echo '</tr>';
							}
							
							$deds = array('sss', 'philhealth', 'hdmf', 'advances', 'medical', 'penalty', 'tax');
							foreach ($deds as $d){
								if($income['Income'][$d] > 0){
									echo '<tr>';
										echo '<td style="50%;">';
											echo strtoupper($d);
										echo '</td>';
										echo '<td style="50%; text-align: right;">';
											if($income['Income'][$d] > 0) { echo number_format($income['Income'][$d], 2, '.', ',' ); }else{ echo '-'; }
										echo '</td>';
									echo '</tr>';
								}
								
							}
							
							if(!empty($loans)){
								foreach ($loans as $loan):
									if($loan['Loanpayment']['amount'] > 0){
										echo '<tr>';
											echo '<td style="50%">';
												echo $loan['Loantype']['name'];
											echo '</td>';
											echo '<td style="50%; text-align: right;">';
												echo number_format($loan['Loanpayment']['amount'], 2, '.', ',' );
											echo '</td>';
										echo '</tr>';
									}							
								endforeach;
							}	
							
							
							if(!empty($deductions)){
								foreach ($deductions as $deduction):
									if($deduction['Otherductionentry']['amount'] > 0){
										echo '<tr>';
											echo '<td style="50%">';
												echo $deduction['Otherdeduction']['name'];
											echo '</td>';
											echo '<td style="50%; text-align: right;">';
												echo number_format($deduction['Otherductionentry']['amount'], 2, '.', ',' );
											echo '</td>';
										echo '</tr>';
									}
									
								endforeach;
							}
						echo '</table>';
					echo '</td>';
				echo '</tr>';
			echo '</table>';
			
			
		echo '</div>';	
		
	?>
</body>
</html>