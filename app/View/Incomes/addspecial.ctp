<br/>

<?php
	echo '<div>';
		echo '<table class="bordered" width="100%">';
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
					echo strtoupper($payroll['Payrolltype']['name']);
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
  <ul>
    <li><a href="#tabs-1">INCOME</a></li>
    
  </ul>
  <div id="tabs-1">
	<?php echo $this->Form->create('Income', array('class' => 'form')); ?>
		<?php
		echo '<table width="100%">';
			if(empty($employee['Employee']['monthlyrate'])){
				$rate = 0;
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
						echo $this->Form->input('employee_id', array('label' => '', 'default' => $employee['Employee']['id'], 'type' => 'hidden'));
						echo $this->Form->input('department', array('label' => '', 'default' => $employee['Employee']['department_id'], 'type' => 'hidden'));
						echo $this->Form->input('grossincome',  array('label' => 'Gross Income ' ));
				echo '</td>';
			echo '</tr>';
			
			
			
		echo '</table>';
	
	?>
  </div>
  
  

  <?php
	echo '<table width="90%" class="employees">';
			echo '<tr>';
				echo '<td >';
					echo $this->Form->input('month', array('type' => 'hidden', 'label' => '', 'value'=> $payroll['Payrollperiod']['from'])); 
					echo $this->Form->end(__('Submit'));
				echo '</td>';
			echo '</tr>';
		echo '</table>';
	
  
  ?>
</div>
 
 
   <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>