<html lang="en">
<head>
<meta charset="utf-8">
<title>COE</title>
<style type="text/css">
    html, body {
		width: 100%;
        margin: 25px;
		text-align: left;
		font: 14px Arial;
		line-height: 1;
		letter-spacing: 1px;
    }
	
	.bordered td, .bordered th{
		padding: 3px;
		font: 14px Arial;
		border: 1px solid black;
		text-align: center;
		
	}
	
	.bordered{
		width: 100%;
		
	}
	
</style>
</head>
<body>
<center><?php echo '<img src="' . APP . 'webroot/img/letterhead.png' . '">';  ?></center>
<?php
echo '<hr><br/>';
echo '<center><h1><u>CERTIFICATE OF EMPLOYMENT</u></H1></center>';

$d = '';
if($employee['Employee']['sex'] == 0){
	$d = 'Ms.';
	if($employee['Employee']['civilstatus'] > 0){
		$d = 'Mrs.';
	}
}else if ($employee['Employee']['sex'] == 1){
	$d = 'Mr.';
}else{
	$d = 'Ms. /Mrs. /Mr.';
}

if($action == 1){
	echo '<p style="margin: 20px; text-align: justify; line-height: 2; font-size: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that <b>' . $d . ' ' . strtoupper($employee['Employee']['firstname'] . ' ' . $employee['Employee']['middlename'] . ' ' . $employee['Employee']['lastname']) . '</b> has been employed with Good Heart Marketing Inc. as<b>' . strtoupper($employee['Jobtitle']['name']) . '</b> since ' . date('F j, Y, ', strtotime($employee['Employee']['datehired'])) . ' up to '. date('F j, Y, ', strtotime($employee['Employee']['daterigned'])) .'</p>';

	echo '<br/><p style="margin: 20px; text-align: justify; line-height: 2; font-size: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This certificate is issued upon the request of <b>' . $d . ' ' . strtoupper($employee['Employee']['lastname']) .'</b> for what legal purpose it may serve.</p>';

	echo '<br/><p style="margin: 20px; text-align: justify; line-height: 2; font-size: 18px;"">Issued this ' .  date('dth day of F Y'). '</p>';
	
}else{
	echo '<p style="margin: 20px; text-align: justify; line-height: 2; font-size: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that <b>' . $d . ' ' . strtoupper($employee['Employee']['firstname'] . ' ' . $employee['Employee']['middlename'] . ' ' . $employee['Employee']['lastname']) . '</b> has been employed with Good Heart Marketing Inc. as<b>' . strtoupper($employee['Jobtitle']['name']) . '</b> since ' . date('F j, Y, ', strtotime($employee['Employee']['datehired'])) . ' up to '. date('F j, Y, ', strtotime($employee['Employee']['daterigned'])) .'</p>';

	echo '<br/><br/><p style="margin: 20px; text-align: justify; line-height: 2; font-size: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This certificate is issued upon the request of <b>' . $d . ' ' . strtoupper($employee['Employee']['lastname']) .'</b> for what legal purpose it may serve.</p>';

	echo '<br/><br/><p style="margin: 20px; text-align: justify; line-height: 2; font-size: 18px;"">Issued this ' .  date('dS') . ' day of ' . date('F Y'). '</p>';


}

echo '<div style="padding: 20px">';
$profilec = $this->requestAction('companyprofiles/findprofile');
if($profilec['Companyprofile']['coefooter'] != ''){
	echo '<br/><br/>';
	echo $profilec['Companyprofile']['coefooter'];
}else{
	echo $this->Html->link('Footer was not set. Click Here Update Footer', array('controller' => 'companyprofiles', 'action' => 'add', 1), array('target' => '_blank'));

}

echo '</div>';

?>
</body>
</html>