<br/>
<?php 
echo '<div>';			
	echo '<table class="actions" width="100%">';
	echo $this->Form->create('Earningrecord', array('class' => 'form'));
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

$otherearnings = $this->requestAction('otherearningsentries/selectentries/' . $employee['Employee']['id']);
	echo '<br/><br/>';
	echo '<table class="bordered" width="100%">';
		echo '<thead>';
		echo '<tr >';
			echo '<th colspan = "4" style="text-alig">OTHER EARNINGS</th>';
		echo '</tr>';
		echo '<tr>';
			echo '<th>Type</th>';
			echo '<th>Amount / day</th>';
			if($employee['Employee']['ratetype_id'] == 1){
				echo '<th>Absent</th>';
			}else if($employee['Employee']['ratetype_id'] == 2){
				echo '<th>Days Work</th>';
			}
			echo '<th>Total</th>';
		echo '</tr>';
		echo '</thead>';
if(!empty($otherearnings)){
	foreach ($otherearnings as $earn):
	if($earn['Otherearningsentry']['payprequency'] == 0){
		echo '<tr>';
			echo '<td>';
				echo '<input type="hidden" name="data[Earningrecord][ratetype_id][]" value="' . $employee['Employee']['ratetype_id'] . '">';
				echo '<input type="hidden" name="data[Earningrecord][employee_id][]" value="' . $employee['Employee']['id'] . '">';
				echo '<input type="hidden" name="data[Earningrecord][payrollperiod_id][]" value="' . $payroll['Payrollperiod']['id'] . '">';
				echo '<input type="hidden" name="data[Earningrecord][otherearningsentry_id][]" value="' . $earn['Otherearning']['id'] .'" class="name">';
				echo $earn['Otherearning']['name'];
			echo '</td>';
			echo '<td>';
				echo '<input type="text" name="data[Earningrecord][amount][]" value="' . $earn['Otherearningsentry']['amount'] .'" class="name">';
			echo '</td>';
			echo '<td>';
				if($employee['Employee']['ratetype_id'] == 1){
					echo '<input name="data[Earningrecord][daysabsent][]" value="' . $income['Income']['absent'] . '"  class="name">';
					echo '<input name="data[Earningrecord][daysworked][]" value="0" type="hidden">';
				}else if($employee['Employee']['ratetype_id'] == 2){
					echo '<input name="data[Earningrecord][daysabsent][]" value="0" type="hidden">';
					echo '<input name="data[Earningrecord][daysworked][]" value="' . $income['Income']['dayswork'] . '"  class="name">';
				}
			echo '</td>';
			echo '<td>';
				if($employee['Employee']['ratetype_id'] == 1){
					$value = (15 - $income['Income']['absent']) * $earn['Otherearningsentry']['amount'];
					echo '<input name="data[Earningrecord][totalamount][]" value="' . $value . '"  class="name">';
				}else if($employee['Employee']['ratetype_id'] == 2){
					$value = $income['Income']['dayswork'] * $earn['Otherearningsentry']['amount'] ;
					echo '<input name="data[Earningrecord][totalamount][]" value="' . $value . '" class="name">';
				}
			echo '</td>';
		echo '</tr>';
	}if($earn['Otherearningsentry']['payprequency'] == 1 && date('d', strtotime($payroll['Payrollperiod']['from'])) == 01){
		echo '<tr>';
			echo '<td>';
				echo '<input type="hidden" name="data[Earningrecord][ratetype_id][]" value="' . $employee['Employee']['ratetype_id'] . '">';
				echo '<input type="hidden" name="data[Earningrecord][employee_id][]" value="' . $employee['Employee']['id'] . '">';
				echo '<input type="hidden" name="data[Earningrecord][payrollperiod_id][]" value="' . $payroll['Payrollperiod']['id'] . '">';
				echo '<input type="hidden" name="data[Earningrecord][otherearningsentry_id][]" value="' . $earn['Otherearning']['id'] .'" class="name">';
				echo $earn['Otherearning']['name'];
			echo '</td>';
			echo '<td>';
				echo '<input type="text" name="data[Earningrecord][amount][]" value="' . $earn['Otherearningsentry']['amount'] .'" class="name">';
			echo '</td>';
			echo '<td>';
				if($employee['Employee']['ratetype_id'] == 1){
					echo '<input name="data[Earningrecord][daysabsent][]" value="' . $income['Income']['absent'] . '"  class="name">';
					echo '<input name="data[Earningrecord][daysworked][]" value="0" type="hidden">';
				}else if($employee['Employee']['ratetype_id'] == 2){
					echo '<input name="data[Earningrecord][daysabsent][]" value="0" type="hidden">';
					echo '<input name="data[Earningrecord][daysworked][]" value="' . $income['Income']['dayswork'] . '"  class="name">';
				}
			echo '</td>';
			echo '<td>';
				echo '<input name="data[Earningrecord][totalamount][]" value="' . $earn['Otherearningsentry']['amount'] . '" class="name">';
			echo '<td>';
			echo '</td>';
		echo '</tr>';
	}if($earn['Otherearningsentry']['payprequency'] == 2 && date('d', strtotime($payroll['Payrollperiod']['from'])) == 16){
		echo '<tr>';
			echo '<td>';
				echo '<input type="hidden" name="data[Earningrecord][ratetype_id][]" value="' . $employee['Employee']['ratetype_id'] . '">';
				echo '<input type="hidden" name="data[Earningrecord][employee_id][]" value="' . $employee['Employee']['id'] . '">';
				echo '<input type="hidden" name="data[Earningrecord][payrollperiod_id][]" value="' . $payroll['Payrollperiod']['id'] . '">';
				echo '<input type="hidden" name="data[Earningrecord][otherearningsentry_id][]" value="' . $earn['Otherearning']['id'] .'" class="name">';
				echo $earn['Otherearning']['name'];
			echo '</td>';
			echo '<td>';
				echo '<input type="text" name="data[Earningrecord][amount][]" value="' . $earn['Otherearningsentry']['amount'] .'" class="name">';
			echo '</td>';
			echo '<td>';
				if($employee['Employee']['ratetype_id'] == 1){
					echo '<input name="data[Earningrecord][daysabsent][]" value="' . $income['Income']['absent'] . '"  class="name">';
					echo '<input name="data[Earningrecord][daysworked][]" value="0" type="hidden">';
				}else if($employee['Employee']['ratetype_id'] == 2){
					echo '<input name="data[Earningrecord][daysabsent][]" value="0" type="hidden">';
					echo '<input name="data[Earningrecord][daysworked][]" value="' . $income['Income']['dayswork'] . '"  class="name">';
				}
			echo '</td>';
			echo '<td>';
				echo '<input name="data[Earningrecord][totalamount][]" value="' . $earn['Otherearningsentry']['amount'] . '" class="name">';
			echo '<td>';
			echo '</td>';
		echo '</tr>';
	}if($earn['Otherearningsentry']['payprequency'] == 3){
		echo '<tr>';
			echo '<td>';
				echo '<input type="hidden" name="data[Earningrecord][ratetype_id][]" value="' . $employee['Employee']['ratetype_id'] . '">';
				echo '<input type="hidden" name="data[Earningrecord][employee_id][]" value="' . $employee['Employee']['id'] . '">';
				echo '<input type="hidden" name="data[Earningrecord][payrollperiod_id][]" value="' . $payroll['Payrollperiod']['id'] . '">';
				echo '<input type="hidden" name="data[Earningrecord][otherearningsentry_id][]" value="' . $earn['Otherearning']['id'] .'" class="name">';
				echo $earn['Otherearning']['name'];
			echo '</td>';
			echo '<td>';
				echo '<input type="text" name="data[Earningrecord][amount][]" value="' . $earn['Otherearningsentry']['amount'] .'" class="name">';
			echo '</td>';
			echo '<td>';
				if($employee['Employee']['ratetype_id'] == 1){
					echo '<input name="data[Earningrecord][daysabsent][]" value="' . $income['Income']['absent'] . '"  class="name">';
					echo '<input name="data[Earningrecord][daysworked][]" value="0" type="hidden">';
				}else if($employee['Employee']['ratetype_id'] == 2){
					echo '<input name="data[Earningrecord][daysabsent][]" value="0" type="hidden">';
					echo '<input name="data[Earningrecord][daysworked][]" value="' . $income['Income']['dayswork'] . '"  class="name">';
				}
			echo '</td>';
			echo '<td>';
				echo '<input name="data[Earningrecord][totalamount][]" value="' . $earn['Otherearningsentry']['amount'] . '" class="name">';
			echo '<td>';
			echo '</td>';
		echo '</tr>';
	}
		
		
		
	endforeach;
	}
		echo '<tr>';
			echo '<td colspan="4">';
				 echo $this->Form->end(__('Submit'));
			echo '</td>';
		echo '</tr>';
	echo '</table>';		
?>