<?php
$emp = 0;
$amount = 0;
if(!empty($reports)){
	echo 'EH';
	echo ' ';
	echo ' ';
	
	echo date('Y-m-d', strtotime($date));
	$str = '';
	$str = $str . $profile['Companyprofile']['PagibigNumber'];
	$stringLength = strlen($str);
	$a = 15 - $stringLength;
	for ($i = 0; $i < 15; $i++){
		if ($i < $a || empty($str[$i])){
			echo '0';			
		}else{
			echo $str[$i];		
		}
	}
	
	echo 'P';
	echo 'MC';
	
	$str = $profile['Companyprofile']['name'];
	$stringLength = strlen($str);
	for ($i = 0; $i < 100; $i++){
		if ($i < $stringLength){
			echo $str[$i];					
		}else{
			echo ' ';
		}
	}
	
	echo $profile['Companyprofile']['landline'];
	echo "\r\n";
	
	foreach ($reports as $report):
				$emp++;
				echo 'DT';
				
				$str = str_replace('-', '', $report['Employee']['pagibignumber']);
				$stringLength = strlen($str);
				$a = 12 - $stringLength;
				for ($i = 0; $i < 12; $i++){
					if ($i < $a || empty($str[$i])){
						echo '0';			
					}else{
						echo $str[$i];		
					}
				}
				
				$str = '';
				$str = $str . $report['Employee']['employeeno'];
				$stringLength = strlen($str);
				$a = 15 - $stringLength;
				for ($i = 0; $i < 15; $i++){
					if ($i < $stringLength){
						echo $str[$i];					
					}else{
						echo ' ';
					}
				}
				
				
				$str = $report['Employee']['lastname'];
				$stringLength = strlen($str);
				for ($i = 0; $i < 30; $i++){
					if ($i < $stringLength){
						echo $str[$i];					
					}else{
						echo ' ';
					}
				}
				
				$str = $report['Employee']['firstname'];
				$stringLength = strlen($str);
				for ($i = 0; $i < 30; $i++){
					if ($i < $stringLength){
						echo $str[$i];					
					}else{
						echo ' ';
					}
				}
				
				$str = $report['Employee']['middlename'];
				$stringLength = strlen($str);
				for ($i = 0; $i < 30; $i++){
					if ($i < $stringLength){
						echo $str[$i];					
					}else{
						echo ' ';
					}
				}
				
				
				$a = str_replace('.', '', $report['Income']['hdmf']);
				$str = $a;
				$stringLength = strlen($str);
				$a = 13 - $stringLength;
				for ($i = 0; $i < 13; $i++){
					if ($i < $a){
						echo '0';			
					}else{
						echo $a[$i];		
					}
				}
				
				echo '.';
				
				$a = str_replace('.', '', $report['Income']['hdmf']);
				$str = $a;
				$stringLength = strlen($a);
				$a = 13 - $stringLength;
				for ($i = 0; $i < 13; $i++){
					if ($i < $a){
						echo '0';			
					}else{
						echo $a[$i];		
					}
				}
				
				echo '.';
				
				$a = str_replace('-', '', $report['Employee']['TIN']);
				$str = $a;
				$stringLength = strlen($a);
				$a = 15 - $stringLength;
				for ($i = 0; $i < 15; $i++){
					if ($i < $stringLength){
						echo $str[$i];					
					}else{
						echo ' ';
					}
				}
				
				echo ' ';
				echo ' ';
				echo date('Y-m-d', strtotime($report['Employee']['birthdate']));
				echo "\r\n";
				
				
				
	endforeach;
		
}else{
	echo 'Empty';
	echo date('Y-m', strtotime($date));
}



	
	header('Content-type: text/plain');
    header('Content-Disposition: attachment;filename="PAGIBIG_MC.txt"');
?>
