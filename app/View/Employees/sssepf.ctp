<?php
$emp = 0;
if(!empty($employees)){
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
	
	echo 'SSS';
	echo "\r\n";
	
	foreach ($employees as $employee):
				$emp++;
				echo '20';
				
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
				
				echo date('mdY', strtotime($employee['Employee']['birthdate']));
				echo "\r\n";
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

}
	header('Content-type: text/plain');
    header('Content-Disposition: attachment;filename="sss_EPF.txt"');
?>