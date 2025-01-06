<br/>
<?php 
echo '<div>';			
	echo '<table class="actions" width="100%">';
	echo $this->Form->create('Loanpayment', array('class' => 'form'));
		echo '<tr>';
			echo '<th width="15%">PAYEE</th>';
			echo '<th>' . strtoupper($employee['Employee']['lastname'] . ', ' . $employee['Employee']['firstname'] . ' ' . $employee['Employee']['middlename']) . '</th>';
			echo '<th width="20%">DIVISION / DEPARTMENT</th>';
			echo '<th>' . $employee['Department']['name'] . ' / ' . $employee['Division']['name'] . '</th>';
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

	$loans = $this->requestAction('loanentries/selectloan/' . $employee['Employee']['id']);
	echo '<br/><br/>';
	echo '<table class="bordered" width="100%">';
		echo '<thead>';
		echo '<tr >';
			echo '<th colspan = "2" style="text-alig">LOANS</th>';
		echo '</tr>';
		echo '<tr>';
			echo '<th>Type</th>';
			echo '<th>Deduction</th>';
		echo '</tr>';
		echo '</thead>';
if(!empty($loans)){
	foreach ($loans as $loan):
	if($payroll['Payrollperiod']['until'] >=  $loan['Loanentry']['startdeduction']){
		echo '<tr>';			
			echo '<td>';
				echo '<input type="hidden" name="data[Loanpayment][employee_id][]" value="' . $employee['Employee']['id'] . '">';
				echo '<input type="hidden" name="data[Loanpayment][payrollperiod_id][]" value="' . $payroll['Payrollperiod']['id'] . '">';
				echo '<input type="hidden" name="data[Loanpayment][loantype_id][]" value="' . $loan['Loantype']['id'] .'" class="name">';
				echo $loan['Loantype']['name'];
			echo '</td>';
			echo '<td>';
			
				if($loan['Loanentry']['deductiontype'] == 0){
					if(date('d', strtotime($payroll['Payrollperiod']['until'])) == 15){
						echo '<input type="text" name="data[Loanpayment][amount][]" value="' . $loan['Loanentry']['deductionperpayday'] .'" class="name">';
					}else{
						echo '<input type="text" name="data[Loanpayment][amount][]" value="0" class="name">';
					}
					
				}else if($loan['Loanentry']['deductiontype'] == 1){
					if(date('d', strtotime($payroll['Payrollperiod']['from'])) == 16){
						echo '<input type="text" name="data[Loanpayment][amount][]" value="' . $loan['Loanentry']['deductionperpayday'] .'" class="name">';
					}else{
						echo '<input type="text" name="data[Loanpayment][amount][]" value="0" class="name">';
					}
				}else if($loan['Loanentry']['deductiontype'] == 2){
					echo '<input type="text" name="data[Loanpayment][amount][]" value="' . $loan['Loanentry']['deductionperpayday'] .'" class="name">';
				}
			
			echo '</td>';
		echo '</tr>';
	}
	endforeach;
	}
		echo '<tr>';
			echo '<td colspan="2">';
				 echo $this->Form->end(__('Submit'));
			echo '</td>';
		echo '</tr>';
	echo '</table>';		
?>

<?php ?>