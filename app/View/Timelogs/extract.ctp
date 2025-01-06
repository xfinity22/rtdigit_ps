<?php
	$user = $this->requestAction('users/loggeduser');
	if(!empty($filename)){
?>

	<br/><br/>

	<table cellpadding="0" cellspacing="0" class="bordered">
		<?php
			echo $this->Form->create('Timelog');
			$headers = array("", "Employee Name", "Date", "Time In", "Morning Out", "Afternoon In", "Time Out", "Late", "Remarks","UT In","UT Out")
		?>
		<thead>
		<tr class="table-header" style="text-align: left;">
			<?php foreach($headers as $header): ?>
				<?php echo '<th>'.$header.'</th>'; ?>
			<?php endforeach; ?>
		</tr>
		</thead>
		<?php 

		
		$count_Timelog= 0;
		$table_alter=0;
		$namec=0;
		$found_error=0;
		$tempe = 0;
		
			for($i=5; $i<=$heighestRow; $i++){
				$temp_empoyeeid = $objWorksheet->getCell('A'.$i.'')->getValue();
				//if(!empty($objWorksheet->getCell('E'.$i.'')->getValue() || !empty($objWorksheet->getCell('H'.$i.'')->getValue()))){
					if(empty($temp_empoyeeid)){
						$temp_empoyeeid = $tempe;
					}else{
						$tempe = $temp_empoyeeid;
					}
					
					
					$found = 0;
					$count_Timelog++;
					
					$name =   $objWorksheet->getCell('B'.$i.'')->getValue();
					$temp_day =   $objWorksheet->getCell('C'.$i.'')->getValue();
					$temp_timein =   $objWorksheet->getCell('E'.$i.'')->getValue();
					$temp_timeout =   $objWorksheet->getCell('H'.$i.'')->getValue();
					//$temp_late =   $objWorksheet->getCell('F'.$i.'')->getValue();
					$temp_otin =   $objWorksheet->getCell('F'.$i.'')->getValue();
					$temp_otout =   $objWorksheet->getCell('G'.$i.'')->getValue();
					$remarks =   $objWorksheet->getCell('I'.$i.'')->getValue();
					$udertimein =   $objWorksheet->getCell('J'.$i.'')->getValue();
					$undertimeout =   $objWorksheet->getCell('K'.$i.'')->getValue();
					
					
					$errors = '';
					
					$emp = $this->requestAction('employees/getemployeenum/' . $temp_empoyeeid);
					if(!empty($emp)){
						$employee_id = $emp['Employee']['id'];
						$workschedule = $emp['Employee']['workschedule_id'];
					}else{
						$found_error++;
						$found++;
						$errors = $errors. ' Employee Number was not found in the system ';
					}
					
				if(!empty($emp)){
					if(!empty($temp_timein)){
						$dec = $temp_timein;
						$temp_timein = date('H:i:s', mktime(0,0,0)+86400*$dec);
					}
					
					if(!empty($temp_timeout)){
						$dec = $temp_timeout;
						$temp_timeout = date('H:i:s', mktime(0,0,0)+86400*$dec);
					}
					
					if(!empty($temp_otin)){
						$dec = $temp_otin;
						$temp_otin = date('H:i:s', mktime(0,0,0)+86400*$dec);
					}
					
					if(!empty($temp_otout)){
						$dec = $temp_otout;
						$temp_otout = date('H:i:s', mktime(0,0,0)+86400*$dec);
					}
					
					//check lates
					if(!empty($to_time) && !empty($from_time)){
						$to_time = strtotime($temp_timein);
						$from_time = strtotime($emp['Workschedule']['timein']);
						if($to_time > $from_time){
							$totalminutes =  round(abs($to_time - $from_time) / 60, 2);
							$temp_late =  floor($totalminutes / 60);
							$temp_latemin  =  $totalminutes % 60;
						}else{
							$temp_late =  0;
							$temp_latemin  =  0;
						}					
					}else{
						$temp_late =  0;
						$temp_latemin  =  0;
						
					}
						
					if(is_numeric($temp_day)){
						$dateTime = new DateTime("1899-12-30 + $temp_day days");
						$temp_day = $dateTime->format("Y-m-d");					
					}else{
						$found++;
						$found_error++;
						$errors = $errors. ' Invalid Date Format ';
					}
				?>
					
				<?php
						if($found == 0){
							echo '<tr>';
							echo '<td width="3%" style="color: green; ">OK</td>';
						}else{
							echo '<tr style="background-color: #b30000; font-weight: bold; color: white;">';
							echo '<td style="font-size: 10px;">';
							echo $errors;
							echo '</td>';
						}
				?>
										
						<td><?php echo $name; ?></td>												
						<td><?php echo $temp_day; ?></td>					
						<td><?php echo $temp_timein; ?></td>
						<td><?php echo $temp_otin; ?></td>										
						<td><?php echo $temp_otout; ?></td>						
						<td><?php echo $temp_timeout; ?></td>										
						<td><?php echo $temp_late . ' HR ' . $temp_latemin . ' MIN'; ?></td>																	
																															
						<td><?php echo $remarks; ?></td>																									
						<td><?php echo $udertimein; ?></td>																									
						<td><?php echo $undertimeout; ?></td>																									
					</tr>	
				<?php
					//if($found_error == 0){
						echo '<input type="hidden" name="data[Timelog][employee_id][]" value="'.$employee_id.'" />';							
						echo '<input type="hidden" name="data[Timelog][workschedule][]" value="'.$workschedule.'" />';							
						echo '<input type="hidden" name="data[Timelog][temp_empoyeeid][]" value="'.$temp_empoyeeid.'" />';							
						echo '<input type="hidden" name="data[Timelog][temp_day][]" value="'.$temp_day.'" />';							
						echo '<input type="hidden" name="data[Timelog][temp_timein][]" value="'.$temp_timein.'" />';						
						echo '<input type="hidden" name="data[Timelog][temp_timeout][]"  value="'.$temp_timeout.'" />'; 				
						echo '<input type="hidden" name="data[Timelog][temp_late][]"  value="'.$temp_late.'" />'; 
						echo '<input type="hidden" name="data[Timelog][temp_latemin][]"  value="'.$temp_latemin.'" />'; 
						echo '<input type="hidden" name="data[Timelog][temp_otin][]"  value="'.$temp_otin.'" />'; 
						echo '<input type="hidden" name="data[Timelog][temp_otout][]"  value="'.$temp_otout.'" />'; 
						echo '<input type="hidden" name="data[Timelog][remarks][]"  value="'.strtoupper($remarks).'" />'; 
						echo '<input type="hidden" name="data[Timelog][udertimein][]"  value="'.$udertimein.'" />'; 
						echo '<input type="hidden" name="data[Timelog][undertimeout][]"  value="'.$undertimeout.'" />'; 
						
						
					//}
				}	
				//}				
			}
			
			 //} ?>
		<tr class="table-header"><th><?php echo __('Total'); ?></th><th colspan="12" style="text-align: left; padding-left: 10px;"><?php echo $count_Timelog; ?></th></tr>
	</table>	
	<?php if($found == 0){	?>			
		<?php echo $this->Form->end('Continue Extract File', array('class' => 'normalbtn', 'title' => 'Submit all information')); ?>	
		<div class="clear"></div>
	<?php } ?>
	<?php  if($found > 0){	?>			
		<div class="error_message" style="margin: 10px 0;"><?php echo __('The system cannot continue, please fix first the findings'); ?></div>		
	
	<div style="margin-top: 2px;"><?php echo $this->Html->link('Re-upload the file.', array('controller' => 'uploadedfiles', 'action' => 'forupload', $fileid)); ?></div>
	<?php } ?>
<?php }
	//echo $found_error;
?>
<br/><br/><br/><br/>