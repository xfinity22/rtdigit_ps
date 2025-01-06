<h2><?php echo 'Loan Reports'; ?></h2>	
	
	<table cellpadding="0" cellspacing="0" border="0" width="90%" class="bordered">
	<tr>
		<th colspan="3" class="actions"><b>
			<?php echo $this->Html->link(__('Update Details'), array('action' => 'edit', $loan['Loanentry']['id'])); ?>
			<?php echo $this->Html->link(__('PRINT PDF'), array('action' => 'printloan', 'ext' => 'pdf', $loan['Loanentry']['employee_id'], $loan['Loanentry']['id']), array('target' => '_blank')); ?>
			<?php echo strtoupper($loan['Loantype']['name']) . ' PAYMENTS'; ?>
		</B></th>
		
		
		<?php
		$payments = $this->requestAction(array('controller' => 'loanpayments', 'action' => 'loanpayment'), array($loan['Loanentry']['employee_id'], $loan['Loantype']['id']));
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

	</tbody>
	</table>
	<p>
	</div>

