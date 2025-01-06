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
		font-size: 14px;
    }
	
	table td{
		padding: 3px;
		font-size: 14px;
		font-family: Arial;
	}
	
	table.bordered td, table.bordered th{
		padding: 3px;
		padding-top: 5px;
		padding-bottom: 5px;
		text-align: left;
	}
	
	td{
		font-family: Arial;
	}
	
</style>
</head>
<body>
<?php
	echo '<h7 style="font-size: 14px">LOAN REPORTS</h7><BR/><h3>' . STRTOUPPER($employee['Employee']['lastname'] . ', ' .  $employee['Employee']['firstname'] . ' ' .  $employee['Employee']['middlename']) . '</H3>';
	echo '<br/><br/>';
	
	foreach ($loans as $loanentry):
		echo '<table cellpadding="0" cellspacing="0" border="1" width="100%" class="bordered">';
			echo '<tr>';
				echo '<th colspan="3">' . strtoupper($loanentry['Loantype']['name']) . ' PAYMENTS </th>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td colspan="3">';
					if($loanentry['Loanentry']['status'] == 0){
						$status = 'Paid';
					}else if($loanentry['Loanentry']['status'] == 1){
						$status = 'Not Yet Paid';
					}else if($loanentry['Loanentry']['status'] == 2){
						$status = 'Inactive';
					}
					
					echo '<table border="0" style="margin: 0" width="100%">';
						echo '<tr>';
							echo '<td style="padding: 0; border: 0; width: 20%">LOAN START: </td>';
							echo '<td style="padding: 0; border: 0; width: 30%"><b> ' . date('F j, Y', strtotime($loanentry['Loanentry']['startdeduction'])) . '</b></td>';
						
							echo '<td style="padding: 0; border: 0; width: 20%">LOAN AMOUNT: </td>';
							echo '<td style="padding: 0; border: 0; width: 30%"><b> ' . $loanentry['Loanentry']['amount'] . '</b></td>';
						echo '</tr>';
						echo '<tr>';
							echo '<td style="padding: 0; border: 0;">BALANCE: </td>';
							echo '<td style="padding: 0; border: 0;"><b> ' . $loanentry['Loanentry']['balance'] . '</td>';
						
							echo '<td style="padding: 0; border: 0;">STATUS: </td>';
							echo '<td style="padding: 0; border: 0;"><b> ' . $status . '</td>';
						echo '</tr>';
					echo '</table>';
				echo '</td>';
			echo '</tr>';
			
			$payments = $this->requestAction(array('controller' => 'loanpayments', 'action' => 'loanpayment'), array($loanentry['Loanentry']['employee_id'], $loanentry['Loantype']['id']));
			$total = 0;
			$count = 1;
			if(!empty($payments)){	
				foreach($payments as $pay):
					echo '<tr><td width="15px">'. $count . '</td><td width="50%">' . $pay['Payrollperiod']['period'] .'</td><td>' . number_format($pay['Loanpayment']['amount'],2)  . '</td></tr>';
					$total = $total + $pay['Loanpayment']['amount'];
					$count++;
				endforeach;
				echo '<tr><td>&nbsp;</td><td width="30%" ><b>TOTAL PAYMENTS</b></td><td><b>' . number_format($total,2) . '</b></td></tr>';
			}else{
				echo '<tr> <td colspan="3" style="border: 1px solid gray;"><b>EMPTY</b></td></tr>';
			}
		echo '</table>';
		echo '<br/><br/>';
	
		
	endforeach;	
	
?>	
	
</body>
</html>
