<?php
$totalnet = 0;
$gtotal = 0;
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
/*	echo $company['Companyprofile']['name'];
	echo "\r\n";	;
	echo 'PAYROLL PERIOD: (' . $income['Payrollperiod']['code'] . ') ' . date('m/d/Y', strtotime($income['Payrollperiod']['from'])) . ' - ' .  date('m/d/Y', strtotime($income['Payrollperiod']['until']));
	echo "\r\n";	
	echo 'DATE PROCESSED: ' . date('F j, Y'); 

	echo "\r\n";	
	echo "\r\n";	
	echo '-------------------------------------------------------------------------';
	echo "\r\n";	
	echo "\r\n";	*/
	echo 'PHP010491064500001';
	echo date('mdy');
	echo '200';
	
	$string = number_format($gtotal,2, '', '');
	//echo $string;
	
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
	
	// echo date('Ymd');
	// echo date('Ymd', strtotime($period['Payrollperiod']['until']));
	echo "\r\n";			
				
	
	//employees
	if(!empty($incomes)){
		foreach ($incomes as $income):
			$employee = $this->requestAction('employees/getemployee/' . $income['Income']['employee_id']);
			if(!empty($employee['Employee']['payrollaccountnumber'])){
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
				echo "\r\n";	
				
			}
		endforeach;

	}
	

	header('Content-type: text/plain');
    header('Content-Disposition: attachment;filename="Encrypted_File.txt"');
?>