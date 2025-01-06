<?php
if(!empty($incomes)){
	foreach ($incomes as $income):
		$employee = $this->requestAction('employees/getemployee/' . $income['Income']['employee_id']);
		if(!empty($employee['Employee']['dem'] == 0)){
			$ots = $this->requestAction(array('controller' => 'overtimes', 'action' => 'overtimes'), array($income['Employee']['id'], $income['Income']['payrollperiod_id']));
			$earnings = $this->requestAction(array('controller' => 'earningrecords', 'action' => 'earnings'), array($income['Employee']['id'], $income['Income']['payrollperiod_id']));
			$loans = $this->requestAction(array('controller' => 'loanpayments', 'action' => 'selectloan'), array($income['Income']['payrollperiod_id'], $income['Employee']['id']));
			$deductions = $this->requestAction(array('controller' => 'deductions', 'action' => 'deductions'), array($income['Employee']['id'], $income['Income']['payrollperiod_id']));
			
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
			
			$str = '';
			$str = $str . $employee['Employee']['payrollaccountnumber'];
			$stringLength = strlen($str);
			$a = 12 - $stringLength;
			
			
			for ($i = 0; $i < 12; $i++){
				if ($i < $a || empty($str[$i])){
					echo '0';			
				}else{
					echo $str[$i];		
				}
				
			}

			$value = 50;
			
			$str = $employee['Employee']['lastname'] . ', ' . $employee['Employee']['firstname'] . ' ' . $employee['Employee']['middlename'];
			$stringLength = strlen($str);
			for ($i = 0; $i < 50; $i++){
				if ($i < $stringLength){
					echo $str[$i];					
				}else{
					echo ' ';
				}
				
			}
			echo number_format($net,2,".","")."\n";
			echo "\r\n";
		}
		endforeach;
}



	
	header('Content-type: text/plain');
    header('Content-Disposition: attachment;filename="casa_payfile.txt"');
?>
