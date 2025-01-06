<html lang="en">
<head>
<meta charset="utf-8">
<title>Top Sheet</title>
<style type="text/css">
    html, body {
		width: 100%;
        margin: 25px;
        margin-top: 15px;
		text-align: left;
    }
	
	table .bordered td{
		padding: 3px;
		font-size: 14px;
		font-family: Arial;
		fotn-weight: bold;
	}
	
	table.bordered td, table.bordered th{
		padding: 10px;
		font-size: 14px;
	}
	
	td{
		font-family: Arial;
	}
	
</style>
</head>
<body>
<?php
echo '<h3>' . strtoupper($employ['Employee']['lastname'] . ', ' . $employ['Employee']['firstname'] . ' ' . $employ['Employee']['middlename']) . '</h3>';
echo '<table width="100%" cellpadding="0" cellspacing="0" border="1" class="bordered">';
	echo '<tr>';
		echo '<td rowspan="2" style="width: 140px;">';
			$file_location = APP.'webroot/img/employees/'.DS . $employ['Employee']['picture'];
			if(file_exists($file_location) && $employ['Employee']['picture'] != NULL){
				echo '<img src="' . APP . 'webroot/img/employees/'.$employ['Employee']['picture'] . '"  width="130px" height="130px">';
			}else{
				echo '<img src="' . APP . 'webroot/img/default.png' . '" height="130px">';
			}
		echo '</td>';
		echo '<td>SSS NUMBER</td>';
		echo '<td>PHILHEATH NUMBER</td>';
		echo '<td>TIN NO: <br/> ' . $employ['Employee']['TIN'] . ' </td>';
		
	echo '</tr>';
	
	echo '<tr>';
		echo '<td>' . $employ['Employee']['sssnumber'] . '</td>';
		echo '<td>' . $employ['Employee']['philhealthnumber'] . '</td>';
		echo '<td>PAG-IBIG NO:  <BR/> ' . $employ['Employee']['pagibignumber'] . '</td>';
	echo '</tr>';
	
	echo '<tr>';
		echo '<td>POSITION:</td>';
		echo '<td>' . $employ['Jobtitle']['name'] . '</td>';
		echo '<td>DATE HIRED:</td>';
		echo '<td>' . $employ['Employee']['datehired'] . '</td>';
	echo '</tr>';
	
	echo '<tr>';
		echo '<td>DATE RESIGNED / TERMINATED:</td>';
		echo '<td>' . $employ['Employee']['daterigned'] . '</td>';
	
		echo '<td>REASON FOR TERMINATION:</td>';
		echo '<td>' . $employ['Employee']['daterigned'] . '</td>';
	echo '</tr>';

echo '</table>';

echo '<br/><br/><br/>';

$topsheets = $this->requestAction(array('action' => 'search'), array($employ['Employee']['id'], 1));
echo '<table width="100%" cellpadding="0" cellspacing="0" border="1" class="bordered">';
	echo '<tr>';
		echo '<th colspan="5" style="padding: 0; margin: 0; text-align: left;"><h4 style="padding: 0; margin: 10px;"> COMPENSATION </H4></th>';
	echo '</tr>';
	echo '<tr>';
		echo '<th>DATE</th>';
		echo '<th>BASIC</th>';
		echo '<th>PAF</th>';
		echo '<th>REASON FOR ADJUSTMENT</th>';
		echo '<th>TOTAL SALARY</th>';
	echo '</tr>';
	
foreach ($topsheets as $topsheet):
	echo '<tr>';
		echo '<td>' . $topsheet['Topsheet']['compdate'] . '</td>';
		echo '<td>' . $topsheet['Topsheet']['basic'] . '</td>';
		echo '<td>' . $topsheet['Topsheet']['paf'] . '</td>';
		echo '<td>' . $topsheet['Topsheet']['reasonadjustment'] . '</td>';
		echo '<td>' . $topsheet['Topsheet']['totalsalary'] . '</td>';
	echo '</tr>';
endforeach;
echo '</table>';


//awards
echo '<br/><br/><br/>';
$topsheets = $this->requestAction(array('action' => 'search'), array($employ['Employee']['id'], 2));
echo '<table width="100%" cellpadding="0" cellspacing="0" border="1" class="bordered">';
	echo '<tr>';
		echo '<th colspan="2" style="padding: 0; margin: 0; text-align: left;"><h4 style="padding: 0; margin: 10px;"> AWARD AND RECOGNITION / PROMOTION </H4></th>';
	echo '</tr>';
	echo '<tr>';
		echo '<th style="width: 25%">DATE</th>';
		echo '<th>AWARD / PROMOTION</th>';
	echo '</tr>';
	
foreach ($topsheets as $topsheet):
	echo '<tr>';
		echo '<td>' . $topsheet['Topsheet']['promotiondate'] . '</td>';
		echo '<td>' . $topsheet['Topsheet']['award'] . '</td>';
	echo '</tr>';
endforeach;
echo '</table>';


//MEMOS
echo '<br/><br/><br/>';
$topsheets = $this->requestAction(array('action' => 'search'), array($employ['Employee']['id'], 3));
echo '<table width="100%" cellpadding="0" cellspacing="0" border="1" class="bordered">';
	echo '<tr>';
		echo '<th colspan="2" style="padding: 0; margin: 0; text-align: left;"><h4 style="padding: 0; margin: 10px;"> MEMOS </H4></th>';
	echo '</tr>';
	echo '<tr>';
		echo '<th style="width: 25%">DATE</th>';
		echo '<th>MEMO</th>';
	echo '</tr>';
	
foreach ($topsheets as $topsheet):
	echo '<tr>';
		echo '<td>' . $topsheet['Topsheet']['memodate'] . '</td>';
		echo '<td>' . $topsheet['Topsheet']['memo'] . '</td>';
	echo '</tr>';
endforeach;
echo '</table>';


//OTHERS
echo '<br/><br/><br/>';
$topsheets = $this->requestAction(array('action' => 'search'), array($employ['Employee']['id'], 4));
echo '<table width="100%" cellpadding="0" cellspacing="0" border="1" class="bordered">';
	echo '<tr>';
		echo '<th colspan="2" style="padding: 0; margin: 0; text-align: left;"><h4 style="padding: 0; margin: 10px;"> OTHERS </H4></th>';
	echo '</tr>';
	echo '<tr>';
		echo '<th style="width: 25%">LABEL</th>';
		echo '<th>DESCRIPTION</th>';
	echo '</tr>';
	
foreach ($topsheets as $topsheet):
	echo '<tr>';
		echo '<td>' . $topsheet['Topsheet']['others1'] . '</td>';
		echo '<td>' . $topsheet['Topsheet']['others2'] . '</td>';
	echo '</tr>';
endforeach;
echo '</table>';



?>
</body>
</html>