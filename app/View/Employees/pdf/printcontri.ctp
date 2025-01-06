<html lang="en">
<head>
<meta charset="utf-8">
<title>EMPLOYEE CONTRIBUTIONS</title>
<style type="text/css">
    html, body {
		width: 100%;
        margin: 25px;
		text-align: left;
		font: 12px Helvetica, Arial, Sans-serif;
    }
	
	.bordered td, .bordered th{
		padding: 3px;
		font-size: 14px;
		font-family: TImes New Roman;
		border: 1px solid black;
		font: 12px Helvetica, Arial, Sans-serif;
		text-align: center;
		
	}
	
	.bordered{
		width: 100%;
		font: 12px Helvetica, Arial, Sans-serif;
	}
	
</style>
</head>
<body>
<?php
echo '<h4>EMPLOYEE\'S CONTRIBUTIONS</H4>';
echo 'NAME: <b>' . $employ['Employee']['lastname'] . ', ' . $employ['Employee']['firstname'] . ' ' . $employ['Employee']['middlename'] . '</b>';
echo '<br/>YEAR: <b>' . $year . '</b>';
echo '<br/>TYPE: <b>';
	if($action == 1){
		echo 'SSS CONTRIBUTIONS';
	}else if($action == 2){
		echo 'PHILHEALTH CONTRIBUTIONS';
	}else if($action == 3){
		echo 'HDMF CONTRIBUTIONS';
	}else if($action == 4){
		echo 'TAX';
	}
	
	echo '<br/><br/>';
if(!empty($contris)){
	if($action == 1){
		echo '<br/><H4 style="font-weight: bold;">SSS CONTRIBUTIONS YEAR ' . $year . '</h4>';
	}else if($action == 2){
		echo '<br/><H4 style="font-weight: bold;">PHILHEALTH CONTRIBUTIONS YEAR ' . $year . '</h4>';
	}else if($action == 3){
		echo '<br/><H4 style="font-weight: bold;">HDMF CONTRIBUTIONS YEAR ' . $year . '</h4>';
	}else if($action == 4){
		echo '<br/><H4 style="font-weight: bold;">TAX YEAR ' . $year . '</h4>';
	}
	
	echo '<table cellpadding="0" cellspacing="0" class="bordered" width="50%">';
		echo '<thead>';
	
		echo '<tr>';
			echo '<th>&nbsp;</th>';
			echo '<th>MONTH</th>';
			echo '<th>AMOUNT</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		$i = 0;
		foreach($contris as $contri):
			$i++;
			echo '<tr>';
				echo '<td>' . $i . '</td>';
				echo '<td>' . date('F Y', strtotime($contri['Income']['month'])). '</td>';
				echo '<td>';
					if($action == 1){
						echo $contri['Income']['sss'];
					}else if($action == 2){
						echo $contri['Income']['philhealth'];
					}else if($action == 3){
						echo $contri['Income']['hdmf'];
					}else if($action == 4){
						echo $contri['Income']['tax'];
					}
				echo '</td>';
			echo '</tr>';
		endforeach;
		echo '</tbody>';
	echo '</table>';
}
?>
</body>
</hrml>