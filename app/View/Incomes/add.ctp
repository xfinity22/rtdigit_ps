<?php echo $this->element('page_back', ['controller' => 'periodincludes', 'action' => 'index', $payrollperiods]); ?>
<?php echo $this->element('page_title', ['title' => 'Employee Payroll']); ?>
<hr />

<?php
    $lateh = 0;
		$latem = 0;
		$lates = $this->requestAction(array('controller' => 'timelogs', 'action' => 'getlates' ), array($employee['Employee']['id'], $payroll['Payrollperiod']['fromDate'], $payroll['Payrollperiod']['untilDAte']));
		//$days_work = $this->requestAction(array('controller' => 'timelogs', 'action' => 'getlates' ), array($employee['Employee']['id'], $payroll['Payrollperiod']['fromDate'], $payroll['Payrollperiod']['untilDAte']));
		$ddd = count($lates);
		$absent_total = 0;
		
		$undertime_total = 0;
		$undetime_c = 0;
		// $employee['Employee']['id'];
		$undertime = $this->requestAction(array('controller' => 'timelogs', 'action' => 'getUndertime' ), array($employee['Employee']['id'], $payroll['Payrollperiod']['fromDate'], $payroll['Payrollperiod']['untilDAte']));
		//echo count($undertime);
		foreach ($undertime as $u){
		    if(!empty($u['Timelog']['timeout'])){
		        //echo $u['Timelog']['timeout'];
		        if($u['Timelog']['timeout'] > date('H:i', strtotime('12:00'))){
		            $totaltime = 9;
		        }else{
		            $totaltime = 4;
		        }
		        $starttimestamp = strtotime('08:00');
                $endtimestamp = strtotime($u['Timelog']['timeout']);
            	 $difference = abs($endtimestamp - $starttimestamp)/3600;
            	$undertime_total = number_format($totaltime - $difference, 2); 
            	list($whole, $decimal) = explode('.', $undertime_total);
            	
                if($decimal == 00){
            	    $undertime_total = $undertime_total * 60;
            	}
            	
            	if($decimal == 50){
            	    $undertime_total = $undertime_total * 60;
            	}
            	
            	if($decimal > 50){
            	    $undertime_total = ($whole + 1) * 60;
            	}elseif($decimal < 50 && $decimal > 0 ){
            	    $undertime_total = ($whole + 0.5) * 60;
            	}
            	
            	$undetime_c = $undetime_c + $undertime_total;
            	//echo $undertime_total;
		    }else{
		        echo 'EMoty';
		    }
		    
		}
		
	//	print_r($undertime);
		
		
		if(!empty($lates)){
		    
		    $lateh = 0;
			$totalUndertimeMinutes = 0;
			foreach($lates as $late):
			    
			    $latemm = 0;
			    $from_time = strtotime($late['Timelog']['timein']);
				if($late['Timelog']['timein'] > '12:00:00'){
    				$halfday = 1;
    				$to_time = strtotime("13:00");
    				$ddd = $ddd - 0.5;
    				$absent_total = $absent_total + 0.5;
    			}else{
    				$to_time = strtotime("08:10");
    			}
    			
    			
    			if($to_time < $from_time){
    				$latemm = round(abs($to_time - $from_time) / 60,2);
    			}else{
    				$latemm = 0;
    			}
    			
    			$latem = $latem + $latemm;
    		
				
			endforeach;
			$totall = ($lateh * 60 ) + $latem;
			$lateh = floor($totall / 60);
			
			
		}
		echo $absent_total = $payroll['Payrollperiod']['dayswork'] - $ddd;
	echo '<div>';
		echo '<table class="table table-condensed default_table" width="100%">';
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
	
?>

<br>
<div id="tabs" style="font-size: 12px;">
  
  <div id="tabs-1">
	<div class="text-danger bold fs-14">INCOME <hr /></div>
	<?php echo $this->Form->create('Income', array('class' => 'form')); ?>
		<?php
		echo '<table width="100%">';
			if(empty($employee['Employee']['monthlyrate'])){
				$rate = 0;
			}else{
				$rate = $employee['Employee']['dailyrate'];
			}
			
			if(empty($rate)){
				$rate = 0;
			}
			
			echo '<tr>';
				echo '<td class="label"></td>';
				echo '<td class="label">';
					echo '<input name="data[Income][payrollperiod_id]" value="' . $payroll['Payrollperiod']['id'] . '" type="hidden">';
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label"></td>';
				echo '<td class="label">';
						echo $this->Form->input('employee_id', array('label' => '', 'value' => $employee['Employee']['id'], 'type' => 'hidden'));
						echo $this->Form->input('rate', array('label' => '', 'value' => $rate, 'type' => 'hidden'));
						echo $this->Form->input('monthlyrate', array('label' => '', 'value' => $employee['Employee']['monthlyrate'], 'type' => 'hidden'));
						echo $this->Form->input('department', array('label' => '', 'value' => $employee['Employee']['department_id'], 'type' => 'hidden'));
						echo $this->Form->input('division', array('label' => '', 'value' => $employee['Employee']['division_id'], 'type' => 'hidden'));
						echo $this->Form->input('ratetype', array('label' => '', 'value' => $employee['Employee']['ratetype_id'], 'type' => 'hidden'));
						
						
						if($employee['Employee']['ratetype_id'] == 1){
						    if($absent_total == 0){
    						    $gross =  $employee['Employee']['monthlyrate'] / 2;
    						}else{
    						    $gross =  $employee['Employee']['dailyrate'] * $ddd;
    						}
								echo $this->Form->input('grossincome',  array('label' => 'Gross1', 'value' => $gross));	 
						}else if($employee['Employee']['ratetype_id'] == 2){
							echo $this->Form->input('grossincome',  array('label' => 'Gross2', 'value' => $ddd * $employee['Income']['dailyrate']));
						}
				echo '</td>';
			echo '</tr>';
			
			
			echo '<tr>';	
			if($employee['Employee']['ratetype_id'] == 1){ //monthly
				echo '<td class="label">ABSENT</td>';
				echo '<td class="label">';
				    
					echo $this->Form->input('absent',  array('label' => '', 'value' => $absent_total));
					echo '<div class="m-t-5 m-l-5 bold text-success">Total Days of Work ' . $ddd . '</div>';
			}else if($employee['Employee']['ratetype_id'] == 2){ //daily
				echo '<td class="label">DAYS WORK</td>';
				echo '<td class="label">';
					echo $this->Form->input('dayswork',  array('label' => '', 'value' => $ddd));
			}else{
				echo '<td class="label">ABSENT / DAYS WORK</td>';
				echo '<td class="label">';
					echo 'INVALID';
			}
			
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Adjustments</td>';
				echo '<td class="label">';
						echo $this->Form->input('adjustments', array('label' => ''));
				echo '</td>';
			echo '</tr>';
			
		echo '</table>';
		
		echo '<table width="90%" class="employees">';
			echo '<tr>';
				echo '<td >';
					echo $this->Form->input('transpo', array('label' => '', 'value'=> $employee['Employee']['transpo'], 'type' => 'hidden'));
					echo $this->Form->input('clothing', array('label' => '', 'value'=> $employee['Employee']['clothing'], 'type' => 'hidden'));
					echo $this->Form->input('phone', array('label' => '', 'value'=> $employee['Employee']['phone'], 'type' => 'hidden'));
					echo $this->Form->input('allowamount', array('label' => '', 'value'=> $employee['Employee']['allowance'], 'type' => 'hidden'));
					//echo $this->Form->input('demamount', array('label' => '', 'value'=> $employee['Employee']['dem'], 'type' => 'hidden'));
					echo $this->Form->input('colaamount', array('label' => '', 'value'=> $employee['Employee']['ecola'], 'type' => 'hidden'));
				echo '</td>';
			echo '</tr>';
		echo '</table>';
	
	?>
  </div>
  
  <div id="tabs-2">
  <div class="text-danger bold fs-14">DEDUCTIONS <hr /></div>
  <?php
		echo '<table width="100%" class="form">';
			echo '<tr>';
				echo '<td colspan="5">GOVERNMENT CONTRIBUTIONS AND LOANS DEDUCTIONS: <b>' . strtoupper(date('F', strtotime($payroll['Payrollperiod']['preriodfrom'])))  . '</b></td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td class="label">SSS</td>';
				echo '<td class="label">';
					if($payroll['Payrollperiod']['sss'] == 0 && !empty($employee['Employee']['monthlyrate'])){
						$contri = $this->requestAction('ssscontribs/getcontri/'. $employee['Employee']['monthlyrate']);
						if(!empty($contri)){
							$contrif = $contri['Ssscontrib']['eess'] + $contri['Ssscontrib']['mandatoryee'];
							$ershare = $contri['Ssscontrib']['ertotal'] + $contri['Ssscontrib']['mandatoryer'];
							$ec = $contri['Ssscontrib']['erec'];
						}else{
							$contrif = 0;
							$ershare = 0;
							$ec = 0;
							$ec = 0;
						}
						
							
						echo '<label style="font-size: 9px;">Employee Share</label><br/><input name="data[Income][sss]" value="' . $contrif . '"><br/><br/>';
						echo '<label style="font-size: 9px;">Employer Share</label><br/><input name="data[Income][ershare]" value="' . $ershare . '"><br/><br/>';
						echo '<label style="font-size: 9px;">EC</label><br/><input name="data[Income][ec]" value="' . $ec . '">';
						echo $this->Form->input('month', array('label' => '', 'value' => $payroll['Payrollperiod']['untilDAte'], 'type' => 'hidden'));
					}else{
						echo $this->Form->input('sss', array('label' => '', 'value' => 0));
					}
					
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Philhealth</td>';
				echo '<td class="label">';
					if($payroll['Payrollperiod']['philhealth'] == 0 && !empty($employee['Employee']['monthlyrate'])){
						// $pcontri = $this->requestAction('philhealths/getcontri/'. $employee['Employee']['monthlyrate']);
						// $contrif = $pcontri['Philhealth']['employeeshare'];
						// if($employee['Employee']['monthlyrate'] > 10000){
							// $contrif = ($employee['Employee']['monthlyrate'] * (3/100))/2;
						// }else{
							// $contrif = 150;
						// }
						
						$contrif = ($employee['Employee']['monthlyrate'] * (0.05)) / 2;
						if ($contrif >= 5000){
						    $contrif = 5000;
						}
						echo $this->Form->input('philhealth', array('label' => '', 'value' => $contrif));
					}else{
						echo $this->Form->input('philhealth', array('label' => '', 'value' => 0));
					}
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td class="label">HDMF</td>';
				echo '<td class="label">';
					if($payroll['Payrollperiod']['pagibig'] == 0){
						$h = 0;
						$h = $employee['Employee']['monthlyrate'] * 0.02;
						echo $this->Form->input('hdmf', array('label' => '', 'default' => 200));
					}else{
						echo $this->Form->input('hdmf', array('label' => '', 'default' => 0));
					}
					
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Tax</td>';
				echo '<td class="label">';
					//$incomeTax = $employee['Employee']['monthlyrate'] * 0.0165;
					//$incomeTax = round($incomeTax, 2);					
					echo $this->Form->input('tax', array('label' => '', 'default' => number_format($incomeTax, 2, ".", "")));	
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td colspan="5" class="label"><br/>Reporting Month<br/>&nbsp; '. $this->Form->input('month', array('type' => 'hidden', 'label' => '', 'value'=> $payroll['Payrollperiod']['preriodfrom'])).'<br/></td>';
			echo '</tr>';
			
			$deduction = $this->requestAction('deductions/searchdeductions/' . $employee['Employee']['id']);
			echo '<tr>';
				echo '<td class="label">Health Card</td>';
				echo '<td class="label">';
					$caritas = 0;
					if($payroll['Payrollperiod']['classification_id'] == 2){						
						if(!empty($deduction)){
							$caritas = $deduction['Deduction']['caritas'];
						}
					}
					echo $this->Form->input('penalty', array('label' => '', 'default' => $caritas));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Coop Contri</td>';
				echo '<td class="label">';
					$coop = 0;
					if(!empty($deduction)){
						$coop = $deduction['Deduction']['cooploan'];
					}
					echo $this->Form->input('uniform', array('label' => '', 'default' => $coop));	
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '</td>';echo '<td class="label">Advances</td>';
				echo '<td class="label">';
					echo $this->Form->input('advances', array('label' => ''));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Medical</td>';
				echo '<td class="label">';
					echo $this->Form->input('medical', array('label' => ''));	
				echo '</td>';
			echo '</tr>';
		echo '</table>';
  ?>
  </div>
  
  <div id="tabs-3">
  <div class="text-danger bold fs-14 m-t-20">LATE & UNDERTIME <hr /></div>
  <?php
		
		
		
		echo '<table class="form">';
			/*echo '<tr>';
				echo '<td class="label">Hour</td>';
				echo '<td class="label">';
					echo $this->Form->input('hour', array('label' => '', 'default'=> $lateh));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label"></td>';
				echo '<td class="label">';
					
				echo '</td>';
			echo '</tr>';*/
			echo '<tr>';
				echo '<td class="label">Lates ( In Minutes )</td>';
				echo '<td class="label">';
					echo $this->Form->input('minutes', array('label' => '', 'default'=> $latem));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Late Amount</td>';
				
				$amount_late = $latem * ($employee['Employee']['hourlyrate']/60);
				echo '<td class="label">';
					echo $this->Form->input('amount', array('label' => '', 'default'=> $amount_late));	 
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td class="label">Undertime ( In Minutes )</td>';
				echo '<td class="label">';
					echo $this->Form->input('hour', array('label' => '', 'default'=> $undetime_c));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Undertime Amount</td>';
				$undertime_Amount = $undetime_c * ($employee['Employee']['hourlyrate']/60);
				echo '<td class="label">';
					echo $this->Form->input('demamount', array('label' => '', 'default'=> $undertime_Amount));	 
				echo '</td>';
					
				echo '</td>';
			echo '</tr>';
		echo '</table>';
		
  ?>
	
  </div>
  
  <div id="tabs-4">
  <div class="text-danger bold fs-14 m-t-20">OTHER EARNINGS & LOANS <hr /></div>
  <?php
		$otherearnings = $this->requestAction('otherearningsentries/selectentries/' . $employee['Employee']['id']);
					echo '<table class="table table-condensed default_table">';
						echo '<thead>';
						echo '<tr >';
							echo '<th colspan = "4" style="text-alig">OTHER EARNINGS</th>';
						echo '</tr>';
						echo '<tr>';
							echo '<th>Type</th>';
							echo '<th>Amount / day</th>';
						echo '</tr>';
						echo '</thead>';
				if(!empty($otherearnings)){
					foreach ($otherearnings as $earn):
					if($earn['Otherearningsentry']['payprequency'] == 0){
						echo '<tr>';
							echo '<td>';
								echo $earn['Otherearning']['name'];
							echo '</td>';
							echo '<td>';
								echo $earn['Otherearningsentry']['amount'];
							echo '</td>';
						echo '</tr>';
					}else if($earn['Otherearningsentry']['payprequency'] == 1 && $payroll['Payrollperiod']['classification_id'] == 1){
						echo '<tr>';
							echo '<td>';
								echo $earn['Otherearning']['name'];
							echo '</td>';
							echo '<td>';
								echo $earn['Otherearningsentry']['amount'];
							echo '</td>';
						echo '</tr>';
					}else if($earn['Otherearningsentry']['payprequency'] == 2 && $payroll['Payrollperiod']['classification_id'] == 2){
						echo '<tr>';
							echo '<td>';
								echo $earn['Otherearning']['name'];
							echo '</td>';
							echo '<td>';
								echo $earn['Otherearningsentry']['amount'];
							echo '</td>';
						echo '</tr>';
					}elseif($earn['Otherearningsentry']['payprequency'] == 3){
						echo '<tr>';
							echo '<td>';
								echo $earn['Otherearning']['name'];
							echo '</td>';
							echo '<td>';
								echo $earn['Otherearningsentry']['amount'];
							echo '</td>';
						echo '</tr>';
					}
						
						
						
					endforeach;
				}	
					echo '</table>';	

					$loans = $this->requestAction('loanentries/selectloan/' . $employee['Employee']['id']);
						
						echo '<table class="table table-condensed default_table">';
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
						//echo $payroll['Payrollperiod']['from'] . ' | ' . $loan['Loanentry']['startdeduction'];
						if($payroll['Payrollperiod']['fromDate'] >= $loan['Loanentry']['startdeduction']){
							echo '<tr>';			
								echo '<td>';
									echo $loan['Loantype']['name'];
								echo '</td>';
								echo '<td>';
									//echo $loan['Loanentry']['deductiontype'] ;
									if($loan['Loanentry']['deductiontype'] == 0){
										$amount = $loan['Loanentry']['deductionperpayday'];
										
										if($amount > $loan['Loanentry']['balance']){
											$amount = $loan['Loanentry']['balance'];
										}
										echo $amount;										
									}elseif($payroll['Payrollperiod']['classification_id'] && $loan['Loanentry']['deductiontype']){
										$amount = $loan['Loanentry']['deductionperpayday'];
										if($amount > $loan['Loanentry']['balance']){
											$amount = $loan['Loanentry']['balance'];
										}
										echo $amount;
									}else{
										echo '0';
									}
								echo '</td>';
							echo '</tr>';
						}else{
							echo 'No data';
						}
						endforeach;
					}
					echo '</table>';
		
  ?>
	
  </div>
  

  <?php
	
					 
	echo '<button type="submit" class="btn btn-success btn-lg">Submit</button>';
				
	echo $this->Form->end();
  
  ?>
</div>
 
 
   <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>