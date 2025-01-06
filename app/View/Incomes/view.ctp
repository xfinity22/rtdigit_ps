<?php echo $this->element('page_back', ['controller' => 'periodincludes', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'Payroll Summary']); ?>
<div class="btngroup">

<?php echo $this->Html->link(__('Print Payslip'), 
	['controller' => 'incomes', 'action' => 'payslip', $income['Income']['employee_id'], $income['Income']['payrollperiod_id'], 'print'], 
	['target' => '_blank', 'escape' => false, 'class' => 'text-black nounderline']);
?>

<?php 
	if($income['Payrollperiod']['locked'] == 0){
		if($income['Income']['status'] == 0){
			echo $this->Html->link(__('Update Content'), 
				['controller' => 'incomes', 'action' => 'edit', $income['Income']['id'], $income['Income']['payrollperiod_id']], 
				['escape' => false, 'class' => 'text-black nounderline']);

		}
	}
?>



</div>
<hr />
<?php
	if(!empty($income)){
		
		echo '<div class="m-b-20">';			
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
						echo 'MONTHLY RATE / RATE';
					echo '</th>';
					echo '<th>';
						echo number_format($income['Income']['monthlyrate'], 2, '.', ',') . ' / ' . number_format($income['Income']['rate'], 2, '.', ',');
					echo '</th>';
				echo '</tr>';
				
			echo '</table>';
		echo '</div>';	
	?>




	<?php 
		/*echo '<table width="100%" cellpadding="0" cellspacing="0" >';
				echo '<tr>';
					echo '<td width="100%" class="actions">';
						//echo $this->Html->link(__('Print Payslip'), array('action' => 'payslip', $income['Income']['employee_id'], $income['Income']['payrollperiod_id']), array('target' => '_blank'));
						echo $this->Html->link(__('Print Payslip'), array('action' => 'payslip', 'ext' => 'pdf', $income['Income']['employee_id'], $income['Income']['payrollperiod_id'], 'print'), array('target' => '_blank'));
						//echo '&nbsp;&nbsp;';
						//echo $this->Html->link(__('Payroll Register'), array('action' => 'payrollregister', $income['Income']['employee_id'], $income['Income']['payrollperiod_id']));
						echo '&nbsp;&nbsp;';
				if($income['Payrollperiod']['locked'] == 0){
					if($income['Income']['status'] == 0){
						echo $this->Html->link('Update Content', array('controller' => 'incomes', 'action' => 'edit', $income['Income']['id'], $income['Income']['payrollperiod_id']));
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
			echo '</table>';*/
		
echo '<table width="98%" border="0"  cellpadding="0" cellspacing="0">';
	echo '<tr>';
	echo '<td width="32%" valign="top">';
		echo '<table class="bordered" width="100%"  cellpadding="0" cellspacing="0">';
			echo '<thead>';
			echo '<tr>';
				echo '<th colspan="2">Basic Pay</th>';
			echo '</tr>';
			echo '<tr>';
			if($income['Income']['ratetype'] == 1){
				echo '<th>Days Absent</th>';
				echo '<td>' . $income['Income']['absent']  . '</td>';
			}else{
				echo '<th>Days Work</th>';
				echo '<td>' . $income['Income']['dayswork']  . '</td>';
			}
			echo '</tr>';
			echo '<tr>';
				echo '<th>Gross Income</th>';
				echo '<td>' . number_format($income['Income']['grossincome'], 2, '.', ',' ) . '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<th>Adjustments</th>';
				echo '<td>' .  number_format($income['Income']['adjustments'], 2, '.', ',' ) . '</td>';
			echo '</tr>';
			echo '</thead>';
			$a = $income['Income']['grossincome'] + $income['Income']['adjustments'];
		echo '</table>';
		
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
	
	$nontaxable = 0;
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
					}else{
						$nontaxable = $nontaxable  + $earn['Earningrecord']['totalamount'];
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
	
	echo '<td width="32%"  valign="top">';
		//DEDUCTIONS
		$deductiontotal = 0;
		echo '<table class="bordered" width="100%"  cellpadding="0" cellspacing="0">';
			echo '<thead>';
			echo '<tr >';
				echo '<th colspan = "2" style="text-alig">DEDUCTIONS</th>';
			echo '</tr>';
			echo '<tr>';
				echo '<th>SSS</th>';
				echo '<td>' . $income['Income']['sss']  . '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<th>Philhealth</th>';
				echo '<td>' . $income['Income']['philhealth']  . '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<th>HDMF</th>';
				echo '<td>' . $income['Income']['hdmf']  . '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<th>Advances</th>';
				echo '<td>' . $income['Income']['advances']  . '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<th>Medical</th>';
				echo '<td>' . $income['Income']['medical']  . '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<th>Coop Contri</th>';
				echo '<td>' . $income['Income']['uniform']  . '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<th>Caritas</th>';
				echo '<td>' . $income['Income']['penalty']  . '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<th>Tax</th>';
				echo '<td>' . $income['Income']['tax']  . '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<th>SD Leave / Absent</th>';
				echo '<td>' . $income['Income']['absentamount']  . '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<th>Lates</th>';
				echo '<td>' . $income['Income']['minutes'] . ' min</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<th>Lates Amount</th>';
				echo '<td>' . $income['Income']['amount']  . '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<th>Undertime</th>';
				echo '<td>' . $income['Income']['hour'] . ' min</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<th>Undertime Amount</th>';
				echo '<td>' . $income['Income']['demamount']  . '</td>';
			echo '</tr>';
			echo '</thead>';
		echo '</table>';
	
	echo '</td>';
	
	
	echo '<td width="32%" valign="top">';
		echo '<table class="bordered" width="100%" cellpadding="0" cellspacing="0">';
			echo '<tr>';
				echo '<th colspan = "3" style="text-align: center; font-weight: bold;">OTHER DEDUCTIONS</th>';
			echo '</tr>';

			echo '<tr>';
				echo '<th>Description</th>';
				echo '<th>Amount</th>';
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
		//$loans = $this->requestAction(array('controller' => 'loanpayments', 'action' => 'selectloan'), array($payroll['Payrollperiod']['id'], $income['Income']['employee_id']));
		echo '<table class="bordered" width="100%">';
			echo '<thead>';
			echo '<tr >';
				echo '<th colspan = "12" style="text-alig">LOANS / DEDUCTIONS</th>';
			echo '</tr>';
			echo '<tr>';
				echo '<th>Type</th>';
				echo '<th>Deduction</th>';				
				echo '<th>Actions</th>';				
			echo '</tr>';
			echo '</thead>';
	if(!empty($loans)){
		foreach ($loans as $loan):
			echo '<tr>';			
				echo '<td>' . $loan['Loantype']['name']  . '</td>';
				echo '<td>' . $loan['Loanpayment']['amount']  . '</td>';
				echo '<td>'; 
			if($income['Payrollperiod']['locked'] == 0){
				if($income['Income']['status'] == 0){
					echo $this->Html->link('Update | ', array('controller' => 'loanpayments', 'action' => 'edit', $loan['Loanpayment']['id'], $income['Income']['employee_id'], $income['Income']['payrollperiod_id']));
					echo '&nbsp;';
					echo $this->Form->postLink(__('Delete'), array('controller' => 'loanpayments', 'action' => 'delete', $loan['Loanpayment']['id'], $income['Income']['employee_id'], $income['Income']['payrollperiod_id']), array(), __('Are you sure you want to delete this?'));
				}
			}
				echo '</td>';
			echo '</tr>';
			$totalloans = $totalloans + $loan['Loanpayment']['amount'];
		endforeach;
	}else{
		//echo 'Empty';
	}
		echo '<tr><td colspan="13">';
		if($income['Payrollperiod']['locked'] == 0){
			if($income['Income']['status'] == 0){		
				echo $this->Html->link('Add Entry', array('controller' => 'loanentries', 'action' => 'add2', $income['Income']['employee_id'], $income['Income']['payrollperiod_id']));
			}
		}
			echo '</td></tr>';
		echo '</table>';
	echo '</td>';
	echo '</tr>';
echo '</table>';


echo '<table width="98%" border="0">';
	echo '<tr>';
	echo '<td width="59%" valign="top">';
		//OVERTIME
		$totalot = 0;
		echo '<table class="bordered" width="100%"  cellpadding="0" cellspacing="0">';
			echo '<thead>';
			echo '<tr >';
				echo '<th colspan = "12" style="text-alig">OVERTIME / LEAVE TAKEN / HOLIDAY PAY</th>';
			echo '</tr>';
			echo '<tr>';
				echo '<th>Date</th>';
				echo '<th>Days</th>';
				echo '<th>Time In</th>';
				echo '<th>Time Out</th>';
				echo '<th>Reason</th>';
				echo '<th>OT Status</th>';
				echo '<th>Overtime Type</th>';
				echo '<th>Add On</th>';
				echo '<th>Hours</th>';
				echo '<th>Minutes</th>';
				echo '<th>Total</th>';
				echo '<th>Actions</th>';
			echo '</tr>';
			echo '</thead>';
	if(!empty($ots)){
		$th = 0;
		$tm =0;
		foreach ($ots as $ot):
			echo '<tr>';			
				echo '<td>';
					echo date('F j, Y', strtotime($ot['Overtime']['requestddate']));
					if(!empty($ot['Overtime']['referencedate'])){
						echo ' - ' . date('F j, Y', strtotime($ot['Overtime']['referencedate']));
					}
				echo '</td>';
				echo '<td>' . $ot['Overtime']['day']  . '</td>';
				echo '<td>' . $ot['Overtime']['requestddate']  . '</td>';
				echo '<td>' . $ot['Overtime']['referencedate']  . '</td>';
				echo '<td>' . $ot['Overtime']['reason']  . '</td>';
				echo '<td>' . $ot['OTstatus']['name']  . '</td>';
				echo '<td>' . $ot['Overtimerate']['name']  . '</td>';
				echo '<td>' . $ot['Overtime']['otaddon']  . '</td>';
				echo '<td>' . $ot['Overtime']['ottotalhours']  . '</td>';
				echo '<td>' . $ot['Overtime']['ottotalminutes']  . '</td>';
				echo '<td>' . number_format($ot['Overtime']['otamount'], 2, '.', ',' )  . '</td>';
				echo '<td>';
			if($income['Payrollperiod']['locked'] == 0){
				if($income['Income']['status'] == 0){
					echo $this->Html->link('Update | ', array('controller' => 'overtimes', 'action' => 'edit', $ot['Overtime']['id'], $income['Income']['employee_id'], $income['Income']['payrollperiod_id']));
					echo '&nbsp;';
					echo $this->Form->postLink(__('Delete'), array('controller' =>'overtimes', 'action' => 'delete', $ot['Overtime']['id'],  $income['Income']['employee_id'], $income['Income']['payrollperiod_id']), array(), __('Are you sure you want to delete this entry?', $ot['Overtime']['id']));
				}
			}
				echo '</td>';
			echo '</tr>';
			$totalot = $totalot + $ot['Overtime']['otamount'];
			$th = $th + $ot['Overtime']['ottotalhours'];
			$tm = $tm + $ot['Overtime']['ottotalminutes'];
		endforeach;
		
			echo '<tr>';
				echo '<td colspan="8" style="text-align: right; padding-right: 20px;"><b>TOTAL HOURS</b></td>';
				echo '<td colspan="4"><b>' . $th . ' hrs ' . $tm . ' mins </b></td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td colspan="8" style="text-align: right; padding-right: 20px;"><b>TOTAL AMOUNT</b></td>';
				echo '<td colspan="4"><b>' .  number_format($totalot, 2, '.', ',' ) . '</b></td>';
			echo '</tr>';
	}		
			echo '<tr >';
				echo '<td colspan = "12">';
			if($income['Payrollperiod']['locked'] == 0){
				if($income['Income']['status'] == 0){
					echo $this->Html->link('Add Entry', array('controller' => 'overtimes', 'action' => 'add', $income['Income']['employee_id'], $income['Income']['payrollperiod_id']));
				}
			}
				echo '</td>';
			echo '</tr>';
		echo '</table>';
	echo '</td>';
	
	echo '<td width="59%" valign="top">';
	// if($income['Income']['grossincome'] > 0 ){
		$tax_fh = 0;
		$taxfirst = $this->requestAction(array('action' => 'searchtax'), array($income['Employee']['id'], $income['Income']['payrollperiod_id'], $income['Income']['id']));
		if(!empty($taxfirst)){
			$tax_fh = $taxfirst['Income']['tax1'];
		}
		
		$total = 0;
		$tax = 0;
		$tax1 = 0;
		$tax2 = 0;
		$excess = 0;
		$gov = 0;
		$tard = 0;
		$totaltax = 0;
		//$deductiontotal = 0;
		$totalnetincome = 0;
		$totalot;
		
		//TAX COMPUTATION
		$total = $income['Income']['grossincome'] + $totalot + $totalearnings;		
		$gov = $income['Income']['sss'] + $income['Income']['philhealth']  + $income['Income']['hdmf'];		
		$tard = $income['Income']['amount']+ $income['Income']['absentamount'] + $income['Income']['demamount'];		
		$deductions = $gov + $tard;		
		$taxableincome = $total - $deductions;
		
		if(!empty($employee['Employee']['withholdingtax_id'])){
			$tax = $this->requestAction(array('controller' => 'withholdingtaxes', 'action' => 'taxbase'), array($employee['Employee']['withholdingtax_id'], $taxableincome));
			if(empty($tax)){
				$tax1 = 0;
			}else{
				$tax1 = $tax['Withholdingtax']['basetax'];
			}
		}

		$percentamount = isset($tax['Withholdingtax']['percentamount']) ? $tax['Withholdingtax']['percentamount'] : 0;
		$baseamount    = isset($tax['Withholdingtax']['baseamount']) ? $tax['Withholdingtax']['baseamount'] : 0;
		$basetax 	   = isset($tax['Withholdingtax']['baseamount']) ? $tax['Withholdingtax']['basetax'] : 0;

		$excess = $taxableincome -  $baseamount;
		$tax2 = $excess *  ($percentamount/100);
		$totaltax = $tax1 + $tax2;
		
		
		$deductiontotal =  $deductiontotal + $income['Income']['sss'] +  $income['Income']['philhealth'] +  $income['Income']['hdmf'] +  $income['Income']['advances'] +  $income['Income']['medical'] +  $income['Income']['uniform'] +  $income['Income']['penalty'] +  $income['Income']['amount'] +  +  $income['Income']['absentamount'] +  $totalloans;
		
		$otherdeductions = $deductiontotal - ($income['Income']['sss'] +  $income['Income']['philhealth'] +  $income['Income']['hdmf']);
		
		$taxf = $totaltax;
		
		
		
		if($payroll['Payrollperiod']['classification_id'] != 2){
			$totaltax =0;
		}
		
		if($employee['Employee']['notax'] == 0){
			$taxf = 0;
			$totaltax = 0;
		}
		
		$totalnetincome = $total - ($otherdeductions + $gov + $totaltax + $tax_fh) + $nontaxable;
		
		echo '<div class="actions" style="width: 100%">';
			echo '<table class="bordered" width="100%" cellpadding="0" cellspacing="0">';
				echo '<thead>';
				echo '<tr >';
					echo '<th colspan = "12" style="text-alig">TAX COMPUTATION</th>';
				echo '</tr>';
				
				echo '<tr>';
					echo '<td>Monthly Salary</td>';					
					echo '<td>';
						echo $aa = number_format($employee['Employee']['monthlyrate'], 2, '.', ',' );
					echo '</td>';
					echo '<td>';
						echo number_format($employee['Employee']['monthlyrate'], 2, '.', ',' );
					echo '</td>';					
				echo '</tr>';
				
				echo '<tr>';
					echo '<td>Government Contribution</td>';					
					echo '<td>&nbsp;</td>';
					echo '<td>(' . number_format($gov, 2, '.', ',' ) . ')</td>';					
				echo '</tr>';

                $taxableIncome = $employee['Employee']['monthlyrate'] - $gov;
                echo '<tr>';
					echo '<td>Taxable Amount</td>';					
					echo '<td>&nbsp;</td>';
					echo '<td>(' . number_format($taxableIncome, 2, '.', ',' ) . ')</td>';					
				echo '</tr>';
				
				
				$annualTaxableIncome = $taxableIncome * 12; // Convert to annual income
				$taxableIncome = $employee['Employee']['monthlyrate'] - $gov;
                echo '<tr>';
					echo '<td>Anual Taxable Income</td>';					
					echo '<td>&nbsp;</td>';
					echo '<td>(' . number_format($annualTaxableIncome, 2, '.', ',' ) . ')</td>';					
				echo '</tr>';
				
        		$brackets = [
        			['from' => 0, 'to' => 250000, 'fixTax' => 0, 'rateOnExcess' => 0],
        			['from' => 250000, 'to' => 400000, 'div' => '20833.33', 'fixTax' => 0, 'rateOnExcess' => 0.15],
        			['from' => 400000, 'to' => 800000, 'div' => '33333.33', 'fixTax' => 22500, 'rateOnExcess' => 0.20],
        			['from' => 800000, 'to' => 2000000, 'div' => '66666.67', 'fixTax' => 102500, 'rateOnExcess' => 0.25],
        			['from' => 2000000, 'to' => 8000000, 'div' => '166666.67', 'fixTax' => 402500, 'rateOnExcess' => 0.30],
        			['from' => 8000000, 'to' => PHP_INT_MAX, 'div' => '666666.67', 'fixTax' => 2202500, 'rateOnExcess' => 0.35],
        		];
        	
        		// Compute tax based on the applicable bracket
        		$range = '';
        		$rateOnExcess = 0;
        		$text = '';
        		$div = 0;
        		foreach ($brackets as $bracket) {
        			if ($annualTaxableIncome > $bracket['from']) {
        				$text .= '(' . $taxableIncome . '-' . (isset($bracket['div']) ? $bracket['div'] : '') . ') * ' . $bracket['rateOnExcess'];
        				$range = $bracket['from'] . ' - ' . $bracket['to'];
        				$rateOnExcess = $bracket['rateOnExcess'];
        				$div = isset($bracket['div']) ? $bracket['div'] : '';
        			} else {
        				break;
        			}
        		}
				
				echo '<tr>';
					echo '<td colspan="2">RANGE</td>';	
					echo '<td>' . $range . '</td>';	
				echo '</tr>';
				
				echo '<tr>';
					echo '<td colspan="2">Rate on Excess</td>';	
					echo '<td>' . $rateOnExcess . '</td>';	
				echo '</tr>';
				
				echo '<tr>';
					echo '<td colspan="3">(' . $taxableIncome . '-' . $div . ') * ' . $rateOnExcess . '</td>';	
				echo '</tr>';
				
				echo '<tr>';
					echo '<td colspan="2" style="font-weight: bold; font-size: 15px;">TOTAL TAX DUE</td>';	
					echo '<td style="font-weight: bold; font-size: 15px;">' . number_format($income['Income']['tax'], 3, '.', ',' ) . '</td>';					
				echo '</tr>';
				
				echo '<tr>';
					echo '<td colspan="2">Non Taxable Income</td>';					
					echo '<td>' . number_format($nontaxable, 2, '.', ',' ) . '</td>';					
				echo '</tr>';
				
				echo '<tr>';
					echo '<td colspan="2">Other Deductions & Loans</td>';					
					echo '<td>' . number_format($otherdeductions, 2, '.', ',' ) . '</td>';					
				echo '</tr>';
				
				echo '<tr>';
					echo '<td colspan="2" style="font-weight: bold; font-size: 15px; color: red;">TOTAL NET PAY</td>';					
					echo '<td style="font-weight: bold; font-size: 15px; color: red;">' . number_format($totalnetincome, 2, '.', ',' ) . '</td>';					
				echo '</tr>';
				
				
			echo '</table>';
			
		echo '</div>';
		
		
		
		if($income['Income']['status'] != 1){
			
			echo '<div class="actions" style="width: 80%; font-size: 15px;" >';
				echo $this->Html->link('Finalize Data', array('controller' => 'incomes', 'action' => 'changestatus', $income['Income']['employee_id'], $income['Income']['payrollperiod_id'], $income['Income']['id'], $totaltax, 1, $taxf));
			echo '<br/></div>';
		}else{
			echo '<div class="actions" style="width: 80%; font-size: 15px; color: red; font-weight: bold;" >';
				echo 'All Data Was Finalized';
			echo '<br/></div>';
			$loguser = $this->requestAction('users/loggeduser');
			if($loguser['User']['usertype_id'] == 1){
				if($income['Payrollperiod']['locked'] == 0){
					if($income['Income']['status'] == 0){
						echo '<div class="actions" style="width: 80%; font-size: 15px;" >';
							echo $this->Html->link('Change Status', array('controller' => 'incomes', 'action' => 'changestatus', $income['Income']['employee_id'], $income['Income']['payrollperiod_id'], $income['Income']['id'], $totaltax, 0));
						echo '<br/></div>';
					}else{
						if($income['Employee']['withholdingtax_id'] == 0 || empty($income['Employee']['withholdingtax_id'])){
							$totaltax = 0;
						}
						
						
						echo '<div class="actions" style="width: 80%; font-size: 15px;" >';
							echo $this->Html->link('Change Status', array('controller' => 'incomes', 'action' => 'changestatus', $income['Income']['employee_id'], $income['Income']['payrollperiod_id'], $income['Income']['id'], $totaltax, 0));
						echo '<br/></div>';
						
					}
				}	
			}
		}
		echo '<div class="actions">';
			echo $this->Html->link('Delete Data', array('controller' => 'incomes', 'action' => 'delete', $income['Income']['id'], $income['Employee']['id'], $income['Payrollperiod']['id']), array(), __('Are you sure you want to delete # %s?'));
		echo '</div>';
	// }else{
		// echo 'Withholding Tax Type Not Declared.<br/><br/>';
		// echo '<div class="actions">';
			// echo $this->Html->link('Delete Data', array('controller' => 'incomes', 'action' => 'delete', $income['Income']['id'], $income['Employee']['id'], $income['Payrollperiod']['id']), array(), __('Are you sure you want to delete # %s?'));
		// echo '</div>';
	// }
	echo '</td>';
	echo '</tr>';
echo '</table>';
	}else{
		echo 'Empty';
		
	}	
?>