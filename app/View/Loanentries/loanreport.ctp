<?php
echo '<h7 style="font-size: 14px">LOAN REPORTS</h7><BR/><h3>' . STRTOUPPER($employee['Employee']['lastname'] . ', ' .  $employee['Employee']['firstname'] . ' ' .  $employee['Employee']['middlename']) . '</H3>';
echo '<br/><br/>';

echo '<div class="actions">';
	echo $this->Html->link('ADD LOAN', array('action' => 'add', $employee['Employee']['id']));
	echo '&nbsp;';
	if(!empty($loans)){
		echo $this->Html->link('PRINT ALL', array('action' => 'printloan', 'ext' => 'pdf', $employee['Employee']['id']), array('target' => '_blank'));
	}
echo '</div>';
echo '<br/><br/>';


foreach ($loans as $loanentry):

	
	
echo '<table cellpadding="0" cellspacing="0" border="0" width="90%" class="bordered">';
	echo '<tr >';
	if($loanentry['Loanentry']['status'] == 0){
		echo '<th colspan="3" class="actions" style="background-color: green; color: white; padding: 15px; padding-left: 5px;"><b>';
	}else{
		echo '<th colspan="3" class="actions" style="background-color: red; color: white; padding: 15px; padding-left: 5px;"><b>';
	}
			echo $this->Html->link(__('Update Details'), array('action' => 'edit', $loanentry['Loanentry']['id'])); 
			echo '&nbsp;&nbsp;';
			echo $this->Html->link(__('PRINT PDF'), array('action' => 'printloan', 'ext' => 'pdf', $loanentry['Loanentry']['employee_id'], $loanentry['Loanentry']['id']), array('target' => '_blank'));
			echo '&nbsp;&nbsp;';			
			echo strtoupper($loanentry['Loantype']['name']) . ' PAYMENTS';
?>
		</B></th>
		
		
	<tr>
		<td colspan="3">
		<?php
			if($loanentry['Loanentry']['status'] == 0){
				$status = 'Paid';
			}else if($loanentry['Loanentry']['status'] == 1){
				$status = 'Not Yet Paid';
			}else if($loanentry['Loanentry']['status'] == 2){
				$status = 'Inactive';
			}
			
			echo '<table border="0" style="margin: 0" width="100%">';
				echo '<tr>';
					echo '<td style="padding: 0; border: 0; width: 8%">LOAN START: </td>';
					echo '<td style="padding-left: 10px; border: 0; width: 17%"><b> ' . date('F j, Y', strtotime($loanentry['Loanentry']['startdeduction'])) . '</b></td>';
					echo '<td style="padding: 0; border: 0; width: 8%">LOAN AMOUNT: </td>';
					echo '<td style="padding-left: 10px; border: 0; width: 17%"><b> ' . $loanentry['Loanentry']['amount'] . '</b></td>';
					echo '<td style="padding: 0; border: 0; width: 8%">BALANCE: </td>';
					echo '<td style="padding-left: 10px; border: 0; width: 17%"><b> ' . $loanentry['Loanentry']['balance'] . '</td>';
					echo '<td style="padding: 0; border: 0; width: 8%">STATUS: </td>';
					echo '<td style="padding-left: 10px; border: 0; width: 17%"><b> ' . $status . '</td>';
				echo '</tr>';
			echo '</table>';

		?>
		</td>
	</tr>
		
		<?php
		$payments = $this->requestAction(array('controller' => 'loanpayments', 'action' => 'loanpayment'), array($loanentry['Loanentry']['employee_id'], $loanentry['Loantype']['id']));
		$total = 0;
		$count = 1;
		if(!empty($payments)){	
			foreach($payments as $pay):
				echo '<tr><td width="15px">'. $count . '</td><td width="30%">' . $pay['Payrollperiod']['period'] .'</td><td>' . number_format($pay['Loanpayment']['amount'],2)  . '</td></tr>';
				$total = $total + $pay['Loanpayment']['amount'];
				$count++;
			endforeach;
			echo '<tr style="color: red;"><td>&nbsp;</td><td width="30%"><b>TOTAL PAYMENTS</b></td><td><b>' . number_format($total,2) . '</b></td></tr>';
			
			
			
		}else{
			echo '<tr style="color: red;"> <td colspan="3"><b>EMPTY</b></td></tr>';
		}
		
		?>
		</td>
	</tr>
	</table>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	</p>
	
