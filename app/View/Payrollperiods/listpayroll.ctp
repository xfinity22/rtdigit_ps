<table width="100%">
	
	<tr>
		
		
		<td valign="top">
			<div class="contentindex">
				<table class="bordered">
					 <thead>
						<th colspan="2">SELECT PAYROLL PERIOD</th>
					 </thead>
					 
		<?php 
			$loguser = $this->requestAction('users/loggeduser');
			$count = 1;
			foreach ($payrollperiods as $payrollperiod): 
					echo '<tr>';
						echo '<td>' . $count . '</td>';
						echo '<td class="actions">';
						
							echo $this->Html->link($payrollperiod['Payrollperiod']['period'], array('controller' => 'incomes', 'action' => 'view', $employeeid, $payrollperiod['Payrollperiod']['id']));
							echo '<br/><br/>';
						echo '</td>';
						
					echo '</tr>';
				$count++;
			  endforeach		
		?>
				</table>
			</div>
		</td>
	</tr>
</table>

