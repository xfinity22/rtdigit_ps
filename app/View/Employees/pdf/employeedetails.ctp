<html lang="en">
<head>
<meta charset="utf-8">
<title>Employee Details</title>
<style type="text/css">
    html, body {
		width: 100%;
        margin: 25px;
        margin-top: 15px;
		text-align: left;
    }
	
	table td{
		padding: 3px;
		font-size: 14px;
		font-family: Arial;
	}
	
	table.bordered td, table.bordered th{
		padding: 10px;
	}
	
	td{
		font-family: Arial;
	}
	
</style>
</head>
<body>
<?php
echo '<table width="100%" cellpadding="0" cellspacing="0" border="0">';
	echo '<tr>';
		echo '<td valign="top" style="width: 25%;">';
			$file_location = APP.'webroot/img/'.DS . 'jamgood.png';
			if(file_exists($file_location)){
				echo '<img src="' . APP . 'webroot/img/jamgood.png">';
			}
		echo '<td>';
		echo '<td valign="top" style="width: 50%; padding-top: 15px; text-align: center;">';
			echo '#52 Mahogany St., Dagatan<br/>';
			echo 'Lipa City, Batangas<br/>	';
			echo 'Tel: (043) 774-8778'; 
		echo '<td>';
		echo '<td valign="top" style="width: 25%;">&nbsp;<td>';
	echo '</tr>';
echo '</table>';

echo '<hr>';
echo '<table width="100%" cellpadding="0" cellspacing="0" border="0">';
	echo '<tr>';
		echo '<td valign="top" style="width: 75%;">';		
			echo '<table width="100%" cellpadding="0" cellspacing="0" >';
				echo '<tr>';
					echo '<td valign="top" style="width: 40%;">EMPLOYEE #: </td>';
					echo '<td valign="top" style="width: 60%;">'.$employ['Employee']['employeeno'].'</td>';	
				echo '</tr>';
				echo '<tr>';
					echo '<td colspan="2"><h4>PERSONAL DATA</h4></td>';					
				echo '</tr>';
				
				echo '<tr>';
					echo '<td colspan="2">';
						echo '<table width="100%" cellpadding="0" cellspacing="0" >';
							echo '<tr>';
								echo '<td valign="top">NAME:</td>';
								echo '<td valign="top"><b>'.strtoupper($employ['Employee']['lastname']).'</b></td>';	
								echo '<td valign="top"><b>'.strtoupper($employ['Employee']['firstname']).'</b></td>';	
								echo '<td valign="top"><b>'.strtoupper($employ['Employee']['middlename']).'</b></td>';	
							echo '</tr>';
							echo '<tr>';
								echo '<td valign="top">&nbsp;</td>';
								echo '<td valign="top">Last Name</center></td>';	
								echo '<td valign="top">First Name</center></td>';	
								echo '<td valign="top">Middle Name</center></td>';	
							echo '</tr>';
						echo '</table>';
					echo '</td>';
				echo '</tr>';
				
				echo '<tr>';
					echo '<td valign="top" style="width: 30%;">&nbsp;</td>';
					echo '<td valign="top" style="width: 70%;">&nbsp;</td>';	
				echo '</tr>';
				
				echo '<tr>';
					echo '<td valign="top" style="width: 30%;">PRESENT ADDRESS:</td>';
					echo '<td valign="top" style="width: 70%;">'.strtoupper($employ['Employee']['presetaddress']).'</td>';	
				echo '</tr>';
				
				echo '<tr>';
					echo '<td valign="top" style="width: 30%;">PERMANENT ADDRESS:</td>';
					echo '<td valign="top" style="width: 70%;">'.strtoupper($employ['Employee']['permanentaddress']).'</td>';	
				echo '</tr>';
			echo '</table>';
		echo '</td>';
		
		
		echo '<td valign="top" style="width: 25%;">';
			echo 'Date: ' . date('F j, Y');
			echo '<br/>';
			$file_location = APP.'webroot/img/employees/'.DS . $employ['Employee']['picture'];
			if(file_exists($file_location) && $employ['Employee']['picture'] != NULL){
				echo '<img src="' . APP . 'webroot/img/employees/'.$employ['Employee']['picture'] . '"  width="170px" height="170px">';
			}else{
				echo '<img src="' . APP . 'webroot/img/default.png' . '" height="180px">';
			}
		echo '</td>';	
	echo '</tr>';
echo '</table>';

echo '<table width="100%" cellpadding="0" cellspacing="0">';
	
	
	echo '<tr>';
		echo '<td width="30%" valign="top"><br/>Employee No.:</td>';
		echo '<td valign="top">';
			echo '<b><br/>' . strtoupper($employ['Employee']['employeeno'] . '</b>');
		echo '</td>';
		
		echo '<td width="15%" rowspan="13" valign="top">';
			
		echo '</td>';
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Fullname:</td>';
		echo '<td valign="top">';
			echo '<b>' . strtoupper($employ['Employee']['lastname'] . ', ' . $employ['Employee']['firstname'] . ' ' . $employ['Employee']['middlename'] . '</b>');
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Monthly Rate:</td>';
		echo '<td valign="top">';
			echo '<b>' . strtoupper($employ['Employee']['monthlyrate'] . '</b>');
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Department:</td>';
		echo '<td valign="top">';
			echo '<b>' . strtoupper($employ['Department']['name'] . '</b>');
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Employee Type:</td>';
		echo '<td valign="top">';
			echo '<b>' . strtoupper($employ['Employeetype']['name'] . '</b>');
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Employee Status:</td>';
		echo '<td valign="top">';
			echo '<b>' . strtoupper($employ['Employmentstatus']['name'] . '</b>');
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Job Title:</td>';
		echo '<td valign="top">';
			echo '<b>' . strtoupper($employ['Jobtitle']['name'] . '</b>');
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Date Hired:</td>';
		echo '<td valign="top">';
			if(!empty($employ['Employee']['datehired'])){
				echo '<b>' . date('F j, Y', strtotime($employ['Employee']['datehired'])) . '</b>';
			}
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Date Regularized:</td>';
		echo '<td valign="top">';
			if(!empty($employ['Employee']['dateregularized'])){
				echo '<b>' . date('F j, Y', strtotime($employ['Employee']['dateregularized'])) . '</b>';
			}
			
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Date Resign:</td>';
		echo '<td valign="top">';
			if(!empty($employ['Employee']['daterigned'])){
				echo '<b>' . date('F j, Y', strtotime($employ['Employee']['daterigned'])) . '</b>';
			}
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Date Terminated:</td>';
		echo '<td valign="top">';
			if(!empty($employ['Employee']['dateterminated'])){
				echo '<b>' . date('F j, Y', strtotime($employ['Employee']['dateterminated'])) . '</b>';
			}
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td colspan="2">&nbsp;</td>';
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">SSS Number</td>';
		echo '<td valign="top">';
			echo '<b>' . strtoupper($employ['Employee']['sssnumber'] . '</b>');
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Philhealth Number:</td>';
		echo '<td valign="top">';
			echo '<b>' . strtoupper($employ['Employee']['philhealthnumber'] . '</b>');
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Pag-ibig Number:</td>';
		echo '<td valign="top">';
			echo '<b>' . strtoupper($employ['Employee']['pagibignumber'] . '</b>');
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">TIN:</td>';
		echo '<td valign="top">';
			echo '<b>' . strtoupper($employ['Employee']['TIN'] . '</b>');
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td colspan="2">&nbsp;</td>';
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Medical Provider:</td>';
		echo '<td valign="top">';
			echo '<b>' . strtoupper($employ['Medprovider']['name'] . '</b>');
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Plan Type:</td>';
		echo '<td valign="top">';
			echo '<b>' . strtoupper($employ['Plantype']['name'] . '</b>');
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td colspan="2"><br/><br/><b>BASIC INFORMATION</b><br/></td>';
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Sex:</td>';
		echo '<td valign="top">';
			if ($employ['Employee']['sex'] == 0){
				echo '<b>FEMALE</b>';
			}else{
				echo '<b>MALE</b>';
			}
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Birth Date:</td>';
		echo '<td valign="top">';
			echo '<b>' . date('F, j, Y', strtotime($employ['Employee']['birthdate'])) . '</b>';
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Civil Status:</td>';
		echo '<td valign="top">';
			if ($employ['Employee']['civilstatus'] == 0){
				echo '<b>SINGLE</b>';
			}else if ($employ['Employee']['civilstatus'] == 1){
				echo '<b>MARRIED</b>';
			}else if ($employ['Employee']['civilstatus'] == 2){
				echo '<b>SEPARATED</b>';
			}else if ($employ['Employee']['civilstatus'] == 3){
				echo '<b>WIDOW</b>';
			}
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Religion:</td>';
		echo '<td valign="top">';
			echo '<b>' . $employ['Employee']['religion'] . '</b>';
		echo '</td>';	
	echo '</tr>';
	/*
	echo '<tr>';
		echo '<td valign="top">Height:</td>';
		echo '<td valign="top">';
			echo '<b>' . $employ['Employee']['height'] . ' cm</b>';
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Weight:</td>';
		echo '<td valign="top">';
			echo '<b>' . $employ['Employee']['weight'] . ' kgs</b>';
		echo '</td>';	
	echo '</tr>';
	*/
	echo '<tr>';
		echo '<td colspan="2"><br/><br/><b>CONTACT INFORMATION<br/></b></td>';
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Mobile Number:</td>';
		echo '<td valign="top">';
			echo '<b>' . $employ['Employee']['mobilenumber'] . ' </b>';
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Telephone Number:</td>';
		echo '<td valign="top">';
			echo '<b>' . $employ['Employee']['telephonenumber'] . ' </b>';
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Email</td>';
		echo '<td valign="top">';
			echo '<b>' . $employ['Employee']['email'] . ' </b>';
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Permanent Address</td>';
		echo '<td valign="top">';
			echo '<b>' . $employ['Employee']['permanentaddress'] . ' </b>';
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Present Address</td>';
		echo '<td valign="top">';
			echo '<b>' . $employ['Employee']['presetaddress'] . ' </b>';
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td colspan="2"><br/><br/><b>IN CASE OF EMERGENCY CONTACT<br/></b></td>';
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Name / Relationship:</td>';
		echo '<td valign="top">';
			echo '<b>' . $employ['Employee']['econtactname'] . ' / ' . $employ['Employee']['erelationship'] . ' </b>';
		echo '</td>';	
	echo '</tr>';
	
	echo '<tr>';
		echo '<td valign="top">Contact Number / Address:</td>';
		echo '<td valign="top">';
			echo '<b>' . $employ['Employee']['econtactnumber'] . ' / '. $employ['Employee']['ehomeaddress']. '</b>';
		echo '</td>';	
	echo '</tr>';
	

echo '</table>';
	
	echo '<br/><br/><h3>PROMOTIONS</H3>';
	echo '<table class="bordered" width="100%" cellpadding="0" cellspacing="0" border="1">';
			echo '<tr>';
				echo '<th>Position</th>';
				echo '<th>From</th>';
				echo '<th>To</th>';
				echo '<th>Salary</th>';
				echo '<th>Adjustment</th>';
				echo '<th>Increase</th>';
			echo '</tr>';
	if(empty($promotions)){
				
					
	}else{
		foreach ($promotions as $p):
			echo '<tr>';
				echo '<td>' .  $p['Promotion']['position'] .'</td>';
				echo '<td>' .  $p['Promotion']['datefrom'] .'</td>';
				echo '<td>' .  $p['Promotion']['dateend'] .'</td>';
				echo '<td>' .  $p['Promotion']['salary'] .'</td>';
				echo '<td>' .  $p['Promotion']['adjustment'] .'</td>';
				echo '<td>' .  $p['Promotion']['increase'] .'</td>';
			echo '</tr>';
		endforeach;
	}
		echo '</table>';

?>
</body>
</html>