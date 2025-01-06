<?php
$emp = 0;
$amount = 0;
if(!empty($periods)){
	echo '00';

	$str = '';
	$str = $str . $profile['Companyprofile']['SSSNumber'];
	$stringLength = strlen($str);
	$a = 10 - $stringLength;
	for ($i = 0; $i < 10; $i++){
		if ($i < $a || empty($str[$i])){
			echo '0';			
		}else{
			echo $str[$i];		
		}
	}
	
	$str = $profile['Companyprofile']['name'];
	$stringLength = strlen($str);
	for ($i = 0; $i < 30; $i++){
		if ($i < $stringLength){
			echo $str[$i];					
		}else{
			echo ' ';
		}
	}
	
	echo date('ym', strtotime($date));
	echo "\r\n";
	
	foreach ($periods as $period):
		$loans = $this->requestAction('loanpayments/loans/ ' . $period['Payrollperiod']['id']);
		if(!empty($loans)){
			foreach($loans as $loan):
				$emp++;
				$employee = $this->requestAction('employees/getemployee/ ' . $loan['Loanpayment']['employee_id']);
				echo '00';
				
				$str = '';
				$str = $str . $employee['Employee']['sssnumber'];
				$stringLength = strlen($str);
				$a = 10 - $stringLength;
				for ($i = 0; $i < 10; $i++){
					if ($i < $a || empty($str[$i])){
						echo '0';			
					}else{
						echo $str[$i];		
					}
				}
				
				
				$str = $employee['Employee']['lastname'];
				$stringLength = strlen($str);
				for ($i = 0; $i < 15; $i++){
					if ($i < $stringLength){
						echo $str[$i];					
					}else{
						echo ' ';
					}
				}
				
				$str = $employee['Employee']['firstname'];
				$stringLength = strlen($str);
				for ($i = 0; $i < 15; $i++){
					if ($i < $stringLength){
						echo $str[$i];					
					}else{
						echo ' ';
					}
				}
				
				$str = $employee['Employee']['middlename'];
				$stringLength = strlen($str);
				for ($i = 0; $i < 2; $i++){
					if ($i == 0){
						echo $str[$i];					
					}else{
						echo ' ';
					}
				}
				
				$type = $this->requestAction('loanentries/type/ ' . $loan['Loanpayment']['loantype_id']);
				if($type['Loanentry']['nextinstallment'] == 0){
					echo 'C';
				}else{
					echo 'S';
				}
				
				echo date('ymd', strtotime($type['Loanentry']['loandate']));
				
				$a = str_replace('.', '', $type['Loanentry']['amount']);
				$str = '';
				$str = $str . $a;
				$stringLength = strlen($str);
				$a = 6 - $stringLength;
				for ($i = 0; $i < 6; $i++){
					if ($i < $a){
						echo '0';			
					}else{
						echo $str[$i];		
					}
				}
				echo '0000000';
				
			
				$str = $str . $loan['Loanpayment']['amount'];
				$stringLength = strlen($str);
				$a = 6 - $stringLength;
				for ($i = 0; $i < 6; $i++){
					if ($i < $a){
						echo '0';			
					}else{
						echo $str[$i];		
					}
				}
				$amount = $amount + $loan['Loanpayment']['amount'];
				echo "\r\n";
			endforeach;	
				
			
		}
		
		
		
	endforeach;
		echo '99';
		
		$str = $emp;
		$stringLength = strlen($str);
		$a = 6 - $stringLength;
		for ($i = 0; $i < 6; $i++){
			if ($i < $a){
				echo '0';			
			}else{
				echo $str;
				$i = 6;
			}
		}
		
		echo '0000000000';
		$a = str_replace('.', '', $amount);
		$str = $str . $amount;
		$stringLength = strlen($str);
		$a = 10 - $stringLength;
		for ($i = 0; $i < 10; $i++){
			if ($i < $a){
				echo '0';			
			}else{
				echo $str;
				$i = 10;	
			}
		}
}else{
	echo 'Empty';
	echo date('Y-m', strtotime($date));
}



	
	header('Content-type: text/plain');
    header('Content-Disposition: attachment;filename="sss_LCL.txt"');
?>
