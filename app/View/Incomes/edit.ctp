<?php echo $this->element('page_back', ['controller' => 'incomes', 'action' => 'view/'.$income['Income']['employee_id'].'/'.$payrollperiod]); ?>
<?php echo $this->element('page_title', ['title' => 'Update Employee Payroll']); ?>
<hr />

<?php
	echo '<div>';
		echo '<table class="table table-condensed default_table">';
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
<div id="tabs">
  
  <div id="tabs-1" class="nodisplay">
  	<div class="text-danger bold fs-14">INCOME <hr /></div>
	<?php echo $this->Form->create('Income', array('class' => 'form')); ?>
		<?php
		echo '<table width="100%">';
			echo '<tr>';
				echo '<td class="label"></td>';
				echo '<td class="label">';
					echo '<input name="data[Income][payrollperiod_id]" value="' . $payroll['Payrollperiod']['id'] . '" type="hidden">';
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label"></td>';
				echo '<td class="label">';
						echo $this->Form->input('id');
						echo $this->Form->input('employee_id', array('label' => '', 'default' => $employee['Employee']['id'], 'type' => 'hidden'));
						echo $this->Form->input('rate', array('label' => '', 'value' => $employee['Employee']['dailyrate'], 'type' => 'hidden'));
						echo $this->Form->input('department', array('label' => '', 'default' => $employee['Employee']['department_id'], 'type' => 'hidden'));
						echo $this->Form->input('division', array('label' => '', 'default' => $employee['Employee']['division_id'], 'type' => 'hidden'));
						echo $this->Form->input('ratetype', array('label' => '', 'default' => $employee['Employee']['ratetype_id'], 'type' => 'hidden'));
						if($employee['Employee']['ratetype_id'] == 1){
								echo $this->Form->input('grossincome',  array('label' => '', 'default' => $employee['Employee']['monthlyrate'] / 2, 'type' => 'hidden'));
						}else if($employee['Employee']['ratetype_id'] == 2){
							
						}
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';	
			if($employee['Employee']['ratetype_id'] == 1){
				echo '<td class="label">ABSENT</td>';
				echo '<td class="label">';
					echo $this->Form->input('absent',  array('label' => '', 'default' => 0));
			}else if($employee['Employee']['ratetype_id'] == 2){
				echo '<td class="label">DAYS WORK</td>';
				echo '<td class="label">';
					echo $this->Form->input('dayswork',  array('label' => '', 'default' => 0));
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
			
			/*
			echo '<tr>';
				echo '<td class="label">ALLOWANCE</td>';
				echo '<td class="label">';
						echo $this->Form->input('allowance', array('label' => '', 'value'=> $employee['Employee']['allowance']));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Cola</td>';
				echo '<td class="label">';
						echo $this->Form->input('cola', array('label' => '', 'value'=> $employee['Employee']['ecola']));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td class="label">Transpo Allowance</td>';
				echo '<td class="label">';
						echo $this->Form->input('deminimis', array('label' => '', 'value'=> $employee['Employee']['transpo']));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Clothing Allowance</td>';
				echo '<td class="label">';
						echo $this->Form->input('deminimis', array('label' => '', 'value'=> $employee['Employee']['clothing']));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td class="label">Phone Allowance</td>';
				echo '<td class="label">';
						echo $this->Form->input('deminimis', array('label' => '', 'value'=> $employee['Employee']['phone']));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label"></td>';
				echo '<td class="label">';
						
				echo '</td>';
			echo '</tr>';
			*/
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
		echo '<table width="100%" class="form m-b-30">';
			
			echo '<tr>';
				echo '<td class="label">SSS</td>';
				echo '<td class="label">';
					if($payroll['Payrollperiod']['sss'] == 0){
					//	$contri = $this->requestAction('ssscontribs/getcontri/'. $employee['Employee']['monthlyrate']);
						//echo $this->Form->input('sss', array('label' => ''));
						echo '<label style="font-size: 9px;">Employer Share</label><br/><input name="data[Income][sss]" value="' . $this->data['Income']['sss'] . '"><br/><br/>';
						echo '<label style="font-size: 9px;">Employer Share</label><br/><input name="data[Income][ershare]" value="' . $this->data['Income']['ershare'] . '"><br/><br/>';
						echo '<label style="font-size: 9px;">Employer Share</label><br/><input name="data[Income][ec]" value="' . $this->data['Income']['ec'] . '"><br/><br/>';
						
						echo $this->Form->input('month', array('label' => '', 'value' => $payroll['Payrollperiod']['untilDAte'], 'type' => 'hidden'));
					}else{
						echo $this->Form->input('sss', array('label' => '', 'value' => 0));
					}
					
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Philhealth</td>';
				echo '<td class="label">';
					if($payroll['Payrollperiod']['philhealth'] == 0){
					//	$pcontri = $this->requestAction('philhealths/getcontri/'. $employee['Employee']['monthlyrate']);
						echo $this->Form->input('philhealth', array('label' => ''));	
					}else{
						echo $this->Form->input('philhealth', array('label' => '', 'value' => 0));
					}
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td class="label">HDMF</td>';
				echo '<td class="label">';
					if($payroll['Payrollperiod']['pagibig'] == 0){
						echo $this->Form->input('hdmf', array('label' => '', 'default' => 100));
					}else{
						echo $this->Form->input('hdmf', array('label' => '', 'default' => 0));
					}
					
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Tax</td>';
				echo '<td class="label">';
					echo $this->Form->input('tax', array('label' => ''));	
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td colspan="5">&nbsp;</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td class="label">Health Card</td>';
				echo '<td class="label">';
					echo $this->Form->input('penalty', array('label' => ''));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Coop Contri</td>';
				echo '<td class="label">';
					echo $this->Form->input('uniform', array('label' => ''));	
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td class="label">Medical</td>';
				echo '<td class="label">';
					echo $this->Form->input('medical', array('label' => ''));
				echo '</td>';
				echo '<td width="10%"></td>';
				
				echo '<td class="label">Advances</td>';
				echo '<td class="label">';
					echo $this->Form->input('advances', array('label' => ''));	
				echo '</td>';
			echo '</tr>';
			
		echo '</table>';
  ?>
  </div>
  
  <div id="tabs-3" class="nodisplay">
  <div class="text-danger bold fs-14">LATE & UNDERTIME <hr /></div>
  <?php
		echo '<table width="100%" class="form">';
			echo '<tr>';
				echo '<td class="label">Hour</td>';
				echo '<td class="label">';
					echo $this->Form->input('hour', array('label' => '', 'default'=> 0));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label"></td>';
				echo '<td class="label">';
					
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td class="label">Minute</td>';
				echo '<td class="label">';
					echo $this->Form->input('minutes', array('label' => '', 'default'=> 0));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label"></td>';
				echo '<td class="label">';
					
				echo '</td>';
			echo '</tr>';
		echo '</table>';
		
  ?>
	
  </div>

  <?php
		echo '<button type="submit" class="btn btn-success btn-lg">Save Changes</button>';
				
		echo $this->Form->end();
  
  ?>
</div>
 
 <SCRIPT language="javascript" type="text/javascript">
	function dailyrate(){
		a=Number(document.Rate.daily.value);
		c=a*26
		d=a/8;
		document.Rate.number1.value=c;
		document.Rate.hourly.value=d;
	}
</SCRIPT>
 
   <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>