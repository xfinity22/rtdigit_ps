
	<?php
		echo 'PAYROLL SUMMARY<BR/><BR/>';
		echo '<div>';			
			echo '<table class="actions" width="100%" cellpadding="0" cellspacing="0">';
				echo '<tr>';
					echo '<th width="15%">PAYEE</th>';
					echo '<th>' . strtoupper($employee['Employee']['lastname'] . ', ' . $employee['Employee']['firstname'] . ' ' . $employee['Employee']['middlename']) . '</th>';
					echo '<th width="20%">DEPARTMENT</th>';
					echo '<th>' . $employee['Division']['name'] . '</th>';
				echo '</tr>';
				
				echo '<tr>';
					echo '<th>';
						echo 'PAYROLL PERIOD';
					echo '</th>';
					echo '<th>';
						echo strtoupper($payroll['Payrollperiod']['period']);
					echo '</th>';
					echo '<th>';
						echo 'MONTHLY RATE';
					echo '</th>';
					echo '<th>';
						echo number_format($employee['Employee']['monthlyrate'], 0, '.', ',');
					echo '</th>';
				echo '</tr>';
				
			echo '</table>';
		echo '</div>';	
		
		echo '<table width="100%" cellpadding="0" cellspacing="0" >';
				echo '<tr>';
					echo '<td width="100%" class="actions">';
						echo $this->Html->link(__('Print Payslip'), array('action' => 'payslip', 'ext' => 'pdf', $income['Income']['employee_id'], $income['Income']['payrollperiod_id']), array('target' => '_blank'));
						echo '&nbsp;&nbsp;';
						
				if($income['Payrollperiod']['locked'] == 0){
					if($income['Income']['status'] == 0){
						echo $this->Html->link('Update Content', array('controller' => 'incomes', 'action' => 'editspecial', $income['Income']['id'], $income['Income']['payrollperiod_id']));
						echo '&nbsp;&nbsp;';
						
						
						//echo $this->Html->link('Loans', array('controller' => 'loanpayments', 'action' => 'add', $income['Income']['employee_id'], $income['Income']['payrollperiod_id']));
						echo '&nbsp;&nbsp;';
						
						//echo $this->Html->link('Other Incomes', array('controller' => 'earningrecords', 'action' => 'add', $income['Income']['employee_id'], $income['Income']['payrollperiod_id'], $income['Income']['id']));
						echo '&nbsp;&nbsp;';
					}else{
						echo 'Data was Finalized. ';
					}
					
				}else{
					echo 'Payroll Period was locked.';
				}
					echo '</td>';
				echo '</tr>';
			echo '</table>';
		
echo '<table width="98%" border="0"  cellpadding="0" cellspacing="0">';
	echo '<tr>';
	echo '<td width="32%" valign="top">';
		echo '<table class="bordered" width="100%"  cellpadding="0" cellspacing="0">';
			echo '<thead>';
			echo '<tr>';
				echo '<th colspan="2">Basic Pay</th>';
			echo '</tr>';
				echo '<th>Gross Income</th>';
				echo '<td>' . number_format($income['Income']['grossincome'], 2, '.', ',' ) . '</td>';
			echo '</tr>';
			
			echo '</thead>';
			$a = $income['Income']['grossincome'];
		echo '</table>';
	echo '</td>';
	echo '<td width="32%" valign="top">';	
		//EARNINGS
		$e = 0;
		$totalearnings = 0;
		echo '<table class="bordered" width="100%"  cellpadding="0" cellspacing="0">';
			echo '<thead>';
			echo '<tr >';
				echo '<th colspan = "12" style="text-alig">OTHER EARNINGS</th>';
			echo '</tr>';
			echo '<tr>';
				echo '<th>Type</th>';
				echo '<th>Taxable Income</th>';		
				echo '<th>Amount / day</th>';				
				echo '<th>Total Amount</th>';				
						
				echo '<th>Action</th>';				
			echo '</tr>';
			echo '</thead>';
	if(!empty($earnings)){
		foreach ($earnings as $earn):
			$earnname = $this->requestAction('otherearnings/getentry/' . $earn['Earningrecord']['otherearningsentry_id']);
			echo '<tr>';			
				if(empty($earnname)){
					echo '<td>' . $earn['Earningrecord']['description'] . '</td>';
					echo '<td>No</td>';
				}else{
					echo '<td>' . $earnname['Otherearning']['name']  . '</td>';
					echo '<td>';
						if($earnname['Otherearning']['taxableincome'] == 0){
							echo 'No';
						}else if($earnname['Otherearning']['taxableincome'] == 1){
							echo 'Yes';
						}
					echo '</td>';
					if($earnname['Otherearning']['taxableincome'] == 1){
						$totalearnings = $totalearnings + $earn['Earningrecord']['totalamount'];
					}
				}
				
				echo '<td>' . $earn['Earningrecord']['amount']  . '</td>';
				echo '<td>' . $earn['Earningrecord']['totalamount']  . '</td>';
				echo '<td>';
			if($income['Payrollperiod']['locked'] == 0){
				if($income['Income']['status'] == 0){
					echo $this->Html->link('Update | ', array('controller' => 'earningrecords', 'action' => 'edit', $earn['Earningrecord']['id'], $income['Income']['employee_id'], $income['Income']['payrollperiod_id']));
					echo '&nbsp;';
					echo $this->Form->postLink(__('Delete'), array('controller' => 'earningrecords', 'action' => 'delete', $earn['Earningrecord']['id'], $income['Income']['employee_id'], $income['Income']['payrollperiod_id']), array(), __('Are you sure you want to delete this?', $earn['Earningrecord']['id']));
				}
			}	
				echo '</td>';
				
			echo '</tr>';
			
			$e = $e + $earn['Earningrecord']['totalamount'];
			
		endforeach;
	}
		echo '<tr><td colspan="13">';
		if($income['Payrollperiod']['locked'] == 0){
			if($income['Income']['status'] == 0){
				echo '<b>';
				echo $this->Html->link('Add Entry', array('controller' => 'earningrecords', 'action' => 'add2', $income['Income']['employee_id'], $income['Income']['payrollperiod_id']));
			}
		}
			echo '</td></tr>';
		echo '</table>';
	echo '</td>';
	
	$deductiontotal = 0;
	
	
	
	echo '<td width="32%" valign="top">';
		echo '<table class="bordered" width="100%" cellpadding="0" cellspacing="0">';
			echo '<tr>';
				echo '<th colspan = "3" style="text-align: center; font-weight: bold;">OTHER DEDUCTIONS</th>';
			echo '</tr>';

			echo '<tr>';
				echo '<th>Amount</th>';
				echo '<th>Description</th>';
				echo '<th>Actions</th>';
			echo '</tr>';
		
	if(!empty($deductions)){
		foreach ($deductions as $deduction):
			echo '<tr>';			
				echo '<td>' . $deduction['Otherdeduction']['name']  . '</td>';
				echo '<td>' . $deduction['Otherductionentry']['amount']  . '</td>';
				echo '<td colspan="3">';
			if($income['Payrollperiod']['locked'] == 0){
				if($income['Income']['status'] == 0){
					echo $this->Html->link('Update | ', array('controller' => 'otherductionentries', 'action' => 'edit', $deduction['Otherductionentry']['id'], $income['Income']['employee_id'], $income['Income']['payrollperiod_id']));
					echo '&nbsp;';
					echo $this->Form->postLink(__('Delete'), array('controller' => 'otherductionentries', 'action' => 'delete', $deduction['Otherductionentry']['id'], $income['Income']['employee_id'], $income['Income']['payrollperiod_id']), array(), __('Are you sure you want to delete this entry?', $deduction['Otherductionentry']['id'])); 
				}
			}
				echo '</td>';
			echo '</tr>';
			$deductiontotal = $deductiontotal + $deduction['Otherductionentry']['amount'];
		endforeach;
	}
			echo '<tr><td colspan="13">';
		if($income['Payrollperiod']['locked'] == 0){
			if($income['Income']['status'] == 0){	
				echo $this->Html->link('Add Entry', array('controller' => 'otherductionentries', 'action' => 'add', $income['Income']['employee_id'], $income['Income']['payrollperiod_id']));
			}
		}
			echo '</td></tr>';
		echo '</table>';
		
		//LOANS
		$totalloans = 0;
		
	echo '</td>';
	echo '</tr>';
echo '</table>';

$totalot = 0;
echo '<table width="98%" border="0">';
	echo '<tr>';
	
	
	echo '<td width="59%" valign="top">';
	if($payroll['Payrollperiod']['withholdingtax'] == 0 && $income['Income']['grossincome'] > 0){
		//TAX COMPUTATION
		$total = $income['Income']['grossincome'] + $totalot + $totalearnings;		
		$gov = $income['Income']['sss'] + $income['Income']['philhealth']  + $income['Income']['hdmf'];		
		$tard = $income['Income']['amount']+ $income['Income']['absentamount'];		
		$deductions = $gov + $tard;		
		$taxableincome = $total - $deductions;
		
		$tax = $this->requestAction(array('controller' => 'withholdingtaxes', 'action' => 'taxbase'), array($employee['Employee']['withholdingtax_id'], $taxableincome));
		if(empty($tax)){
			$tax1 = 0;
		}else{
			$tax1 = $tax['Withholdingtax']['basetax'];
		}
		
		if(!empty($income['Employee']['withholdingtax_id'])){
			$excess = $taxableincome -  $tax['Withholdingtax']['baseamount'];
			$tax2 = $excess *  ($tax['Withholdingtax']['percentamount']/100);
			$totaltax = $tax1 + $tax2;
		}else{
			$totaltax = 0;
		}
		
		$deductiontotal =  $deductiontotal + $income['Income']['sss'] +  $income['Income']['philhealth'] +  $income['Income']['hdmf'] +  $income['Income']['advances'] +  $income['Income']['medical'] +  $income['Income']['uniform'] +  $income['Income']['penalty'] +  $income['Income']['tax'] +  $income['Income']['amount'] +  +  $income['Income']['absentamount'] +  $totalloans;
		
		
		
		$totalnetincome = ($a +  $e + $totalot) - $deductiontotal;
		echo $totalot;
		/*
		echo 'A: ' , $a . '<br/>';
		echo 'E: ' , $e . '<br/>';
		echo 'TOTAL OT: ' , $totalot . '<br/>';
		echo 'D: ' , $deductiontotal . '<br/>';
		*/
		
		echo '<div class="actions" style="width: 100%">';
			echo '<table class="bordered" width="100%" cellpadding="0" cellspacing="0">';
				
				
				echo '<tr>';
					echo '<td colspan="2" style="font-weight: bold; font-size: 15px; color: red;">TOTAL NET PAY</td>';					
					echo '<td style="font-weight: bold; font-size: 15px; color: red;">' . number_format($totalnetincome, 2, '.', ',' ) . '</td>';					
				echo '</tr>';
				
			echo '</table>';
			
		echo '</div>';
		
		if($income['Income']['status'] != 1){
			echo '<div class="actions" style="width: 80%; font-size: 15px;" >';
				echo $this->Html->link('Finalize Data', array('controller' => 'incomes', 'action' => 'changestatus', $income['Income']['employee_id'], $income['Income']['payrollperiod_id'], $income['Income']['id'], 0, 1));
			echo '<br/><br/><br/><br/></div>';
		}else{
			echo '<div class="actions" style="width: 80%; font-size: 15px; color: red; font-weight: bold;" >';
				echo 'All Data Was Finalized';
			echo '<br/><br/><br/><br/></div>';
			$loguser = $this->requestAction('users/loggeduser');
			if($loguser['User']['usertype_id'] == 1){
				if($income['Payrollperiod']['locked'] == 0){
					if($income['Income']['status'] == 0){
						echo '<div class="actions" style="width: 80%; font-size: 15px;" >';
							echo $this->Html->link('Change Status', array('controller' => 'incomes', 'action' => 'changestatus', $income['Income']['employee_id'], $income['Income']['payrollperiod_id'], $income['Income']['id'], 0, 0));
						echo '<br/><br/><br/><br/></div>';
					}else{
						echo '<div class="actions" style="width: 80%; font-size: 15px;" >';
							echo $this->Html->link('Change Status', array('controller' => 'incomes', 'action' => 'changestatus', $income['Income']['employee_id'], $income['Income']['payrollperiod_id'], $income['Income']['id'], 0, 0));
						echo '<br/><br/><br/><br/></div>';
						
					}
				}	
			}
		}
	}
	
	echo '</td>';
	echo '</tr>';
echo '</table>';
		
?>