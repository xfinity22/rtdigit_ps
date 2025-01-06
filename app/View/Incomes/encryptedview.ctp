<?php
$gtotal = 0;
$totalnet = 0;
if(!empty($incomes)){
	foreach ($incomes as $income):
		$employee = $this->requestAction('employees/getemployee/' . $income['Income']['employee_id']);
		//if(!empty($employee['Employee']['payrollaccountnumber'])){
			$ots = $this->requestAction(array('controller' => 'overtimes', 'action' => 'overtimes'), array($income['Employee']['id'], $income['Income']['payrollperiod_id']));
			$earnings = $this->requestAction(array('controller' => 'earningrecords', 'action' => 'earnings'), array($income['Employee']['id'], $income['Income']['payrollperiod_id']));
			$loans = $this->requestAction(array('controller' => 'loanpayments', 'action' => 'selectloan'), array($income['Income']['payrollperiod_id'], $income['Employee']['id']));
			$deductions = $this->requestAction(array('controller' => 'otherductionentries', 'action' => 'otherdeducts'), array($income['Employee']['id'], $income['Income']['payrollperiod_id']));
			
			$th = 0;
			$tm = 0;
			$totalot = 0;
			
			if(!empty($ots)){
				$th = 0;
				$tm =0;
				foreach ($ots as $ot):
					$totalot = $totalot + $ot['Overtime']['otamount'];
					$th = $th + $ot['Overtime']['ottotalhours'];
					$tm = $tm + $ot['Overtime']['ottotalminutes'];
				endforeach;
			}
			
			$gross = $income['Income']['grossincome'] + $income['Income']['adjustments'] + $totalot - ($income['Income']['sss'] +  $income['Income']['philhealth'] + $income['Income']['hdmf'] + $income['Income']['advances'] + $income['Income']['medical'] + $income['Income']['uniform'] + $income['Income']['penalty'] + $income['Income']['tax'] + $income['Income']['absentamount'] + $income['Income']['amount']);
		
			$e = 0;
			if(!empty($earnings)){
				foreach ($earnings as $earn):
				$earnname = $this->requestAction('otherearnings/getentry/' . $earn['Earningrecord']['otherearningsentry_id']);
					$e = $e + $earn['Earningrecord']['totalamount'];
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
			
			$ded = $deductiontotal + $totalloans;
			$net = $gross + $e - $ded;			
			
			$gtotal = $gtotal + $net;
			
			
		//}
	endforeach;
}

	
	
	
	$string = number_format($gtotal,2, '', '');
	//echo $string;
	
	$counter = 0;
	$str = '';
	$str = $str . $string;
	$stringLength = strlen($str);
	$a = 15 - $stringLength;
	for ($i = 0; $i < 15; $i++){
		if ($i < $a ){
			echo '0';			
		}else{
			echo $str[$counter];
			$counter++;						
		}
	}
	
	// echo date('Ymd', strtotime($period['Payrollperiod']['until']));
	echo date('Ymd');
	echo '<br/>';			
				
	
	//employees
	if(!empty($incomes)){
		echo '<table class="bordered" style="width: 95%">';
			echo '<tr>';
				echo '<th></th>';
				echo '<th>Employee No</th>';
				echo '<th>Employee</th>';
				echo '<th>Bank Account</th>';
				echo '<th>Net Pay</th>';
				echo '<th>0001002501033481000000000</th>';
			echo '</tr>';
			
			$caa = 0;
			$gtotal = 0;
			foreach ($incomes as $income):
				
				$employee = $this->requestAction('employees/getemployee/' . $income['Income']['employee_id']);
				if(!empty($employee['Employee']['payrollaccountnumber'])){
					$caa++;
					echo '<tr>';
						echo '<td>'.$caa.'</td>';
						echo '<td>'.$employee['Employee']['employeeno'].'</td>';
						echo '<td>'.$employee['Employee']['lastname'] . ', ' . $employee['Employee']['firstname'] . $employee['Employee']['middlename'] . '</td>';
						echo '<td>'.$employee['Employee']['payrollaccountnumber'].'</td>';
						
						$ots = $this->requestAction(array('controller' => 'overtimes', 'action' => 'overtimes'), array($income['Employee']['id'], $income['Income']['payrollperiod_id']));
						$earnings = $this->requestAction(array('controller' => 'earningrecords', 'action' => 'earnings'), array($income['Employee']['id'], $income['Income']['payrollperiod_id']));
						$loans = $this->requestAction(array('controller' => 'loanpayments', 'action' => 'selectloan'), array($income['Income']['payrollperiod_id'], $income['Employee']['id']));
						$deductions = $this->requestAction(array('controller' => 'otherductionentries', 'action' => 'otherdeducts'), array($income['Employee']['id'], $income['Income']['payrollperiod_id']));
						
						$th = 0;
						$tm = 0;
						$totalot = 0;
						
						if(!empty($ots)){
							$th = 0;
							$tm =0;
							foreach ($ots as $ot):
								$totalot = $totalot + $ot['Overtime']['otamount'];
								$th = $th + $ot['Overtime']['ottotalhours'];
								$tm = $tm + $ot['Overtime']['ottotalminutes'];
							endforeach;
						}
						
						$gross = $income['Income']['grossincome'] + $income['Income']['adjustments'] + $totalot - ($income['Income']['sss'] +  $income['Income']['philhealth'] + $income['Income']['hdmf'] + $income['Income']['advances'] + $income['Income']['medical'] + $income['Income']['uniform'] + $income['Income']['penalty'] + $income['Income']['tax'] + $income['Income']['absentamount'] + $income['Income']['amount']);
					
						$e = 0;
						if(!empty($earnings)){
							foreach ($earnings as $earn):
							$earnname = $this->requestAction('otherearnings/getentry/' . $earn['Earningrecord']['otherearningsentry_id']);
								$e = $e + $earn['Earningrecord']['totalamount'];
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
						
						$ded = $deductiontotal + $totalloans;
						$net = $gross + $e - $ded;	
						$gtotal = $gtotal + $net;
						
						echo '<td style="text-align: right">'.number_format($net, 2).'</td>';
						echo '<td>';
							
							echo 'PHP10';
	
							$string = $employee['Employee']['payrollaccountnumber'];
							$counter = 0;
							$str = '';
							$str = $str . $string;
							$stringLength = strlen($str);
							$a = 13 - $stringLength;
							
							$counterrs = '';
							for ($i = 0; $i < 13; $i++){								
								if ($i < $a ){
									echo '0';
									if($i < 4){
										$counterrs = $counterrs . '0';
									}
								}else{
									echo $str[$counter];
									if($i < 4){
										$counterrs = $counterrs . $str[$counter];
									}									
									$counter++;										
								}
							}
							echo $counterrs . '00700';
							
							$string = number_format($net,2, '', '');
							$counter = 0;
							$str = '';
							$str = $str . $string;
							$stringLength = strlen($str);
							$a = 13 - $stringLength;
							for ($i = 0; $i < 13; $i++){
								if ($i < $a ){
									echo '0';			
								}else{
									echo $str[$counter];
									$counter++;						
								}
							}
							
							// echo date('Ymd', strtotime($period['Payrollperiod']['until']));
							// echo date('Ymd');
							
						echo '</td>';
					echo '</tr>';
				}
				$totalnet = $totalnet + $net;
			endforeach;
				echo '<tr style="background-color: green; color: white; font-weight: bold; font-size: 14px;">';
					echo '<td colspan="4">TOTAL AMOUNT</td>';
					echo '<td style="text-align: right">P '.number_format($totalnet,2).'</td>';
					echo '<td>&nbsp;</td>';
				echo '</tr>';
		echo '</table>';
	}
	echo '<br/><br/>';
    echo '<div class="actions">';
		echo $this->Html->link('Export File', array('action' => 'encrypted', $period['Payrollperiod']['id'], $bank, $branch));
	echo '</div>';
	
?>