<?php
/*print_r($otherearnings);

echo '<br/><br/><br/>';

$err = array();
$z = 0;
foreach ($otherearnings as $otherearning):
	echo $err[$z] = $otherearning['Earningrecord']['otherearningsentry_id'] . ' | ' . $otherearning['Otherearning']['name'] . '<br/>';
	$z++;
endforeach; 


print_r($otherdeductions);

echo '<br/><br/><br/>';
$err = array();
$z = 0;
foreach ($otherdeductions as $otherdeduction):
	echo $err[$z] = $otherdeduction['Otherductionentry']['otherdeduction_id'] . ' | ' . $otherdeduction['Otherdeduction1']['name'] . '<br/>';
	$z++;
endforeach; 


print_r($loantypes);
print_r($incomes);

echo '<br/><br/><br/>';
$err = array();
$z = 0;
foreach ($loantypes as $loantype):
	echo $err[$z] = $loantype['Loanpayment']['loantype_id'] . ' | ' . $loantype['Loantype1']['name'] . '<br/>';
	$z++;
endforeach;*/
// print_r($incomes);

foreach ($incomes as $i){
	echo $i['Employee']['department_id'] . ' | ' . $i['Employee']['lastname'] . ' ' . $i['Employee']['firstname'] . '<br/>';
	
}
?>