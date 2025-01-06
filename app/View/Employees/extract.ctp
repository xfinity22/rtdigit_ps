<?php
	$user = $this->requestAction('users/loggeduser');
	if(!empty($filename)){
?>

	<br/><br/>

	<table cellpadding="0" cellspacing="0" class="bordered">
		<?php
			echo $this->Form->create('Employee');
			
			echo $this->Form->input('division_id', array('empty' => true));
			echo $this->Form->input('department_id', array('empty' => true));
			echo $this->Form->input('branch_id', array('empty' => true));
			$headers = array("", "Remarks", "EMP #", "Last Name", "First Name", "Name Extension", "Middle Name", "Date of Birth", "Hiring Date", "PAGIBIG #", "TIN", "PHIC #", "SSS #")
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
		
			for($i=5; $i<=$heighestRow; $i++){
				$systemid = 0;
				$found = 0;
				$count_Timelog++;
				$employeeno = $objWorksheet->getCell('A'.$i.'')->getValue();
				$temp_lastname = $objWorksheet->getCell('B'.$i.'')->getValue();
				$temp_firstname =   $objWorksheet->getCell('C'.$i.'')->getValue();
				$temp_extension =   $objWorksheet->getCell('D'.$i.'')->getValue();
				$temp_middlename =   $objWorksheet->getCell('E'.$i.'')->getValue();
				$temp_dob =   $objWorksheet->getCell('F'.$i.'')->getValue();
				$temp_datehired =   $objWorksheet->getCell('G'.$i.'')->getValue();
				$temp_pagibig =   $objWorksheet->getCell('H'.$i.'')->getValue();
				$temp_tin =   $objWorksheet->getCell('I'.$i.'')->getValue();
				$temp_phic =   $objWorksheet->getCell('J'.$i.'')->getValue();
				$temp_sss =   $objWorksheet->getCell('K'.$i.'')->getValue();
				$sex =   $objWorksheet->getCell('N'.$i.'')->getValue();
				
				if($sex == 'F'){
					$sex = 0;
				}else if($sex = 'M'){
					$sex = 1;
				}
				
				$errors = '';
				$temp_dob = str_replace('\'', '', $temp_dob);
				$temp_datehired = str_replace('\'', '', $temp_datehired);
				$temp_datehired = str_replace('/', '/01/', $temp_datehired);
					
				if(is_numeric($temp_dob)){
					$dateTime = new DateTime("1899-12-30 + $temp_dob days");
					$temp_dob = $dateTime->format("Y-m-d");					
				}else{
				    if(!empty($temp_dob)){
				        $dob1=trim($temp_dob);//$dob1='dd/mm/yyyy' format
    					list($d, $m, $y) = explode('/', $dob1);
    					$mk=mktime(0, 0, 0, $m, $d, $y);
    					$temp_dob=strftime('%Y-%m-%d',$mk);
				    }else{
				        $temp_dob = '';
				    }
					
				}
				
				if(is_numeric($temp_datehired)){
					$dateTime = new DateTime("1899-12-30 + $temp_datehired days");
					$temp_datehired = $dateTime->format("Y-m-d");					
				}
				
				$getid = $this->requestAction(array('controller' => 'employees', 'action' => 'getid'), array($employeeno, 1));
				if(!empty($getid)){
					$systemid = $getid['Employee']['id'];				
				}else{
					$getid = $this->requestAction(array('controller' => 'employees', 'action' => 'getid'), array($temp_phic, 2));
					if(!empty($getid)){
						$systemid = $getid['Employee']['id'];
					}else{
						$getid = $this->requestAction(array('controller' => 'employees', 'action' => 'getid'), array($temp_tin, 3));
						if(!empty($getid)){
							$systemid = $getid['Employee']['id'];
						}
					}
				}
			?>
				
			<?php	
					$found == 0;
					if($found == 0){
						echo '<tr>';
						echo '<td width="3%" style="color: green; ">OK</td>';
					}else{
						echo '<tr style="background-color: #b30000; font-weight: bold; color: white;">';
						echo '<td style="font-size: 10px;">';
						echo $errors;
						
						echo '</td>';
					}
					$temp_datehired = date('Y-m-d', strtotime($temp_datehired));
					$temp_dob = date('Y-m-d', strtotime($temp_dob));
			?>
									
					<td style="color: orange; "><?php
						$systemid = 0;
						if($systemid != 0){
							echo 'Record Exists!';
						} ?></td>		
					<td><?php echo $employeeno; ?></td>	
					<td><?php echo $temp_lastname; ?></td>							
					<td><?php echo $temp_firstname; ?></td>					
					<td><?php echo $temp_extension; ?></td>					
					<td><?php echo $temp_middlename; ?></td>										
					<td><?php echo $temp_dob; ?></td>										
					<td><?php echo date('F Y', strtotime($temp_datehired)); ?></td>		
					<td><?php echo $temp_pagibig; ?></td>										
					<td><?php echo $temp_tin; ?></td>										
					<td><?php echo $temp_phic; ?></td>																
					<td><?php echo $temp_sss; ?></td>																
				</tr>	
			<?php
				$found_error == 0;
				if($found_error == 0){
					echo '<input type="hidden" name="data[Employee][id][]" value="'.$systemid.'" />';
					echo '<input type="hidden" name="data[Employee][temp_lastname][]" value="'.$temp_lastname.'" />';
					echo '<input type="hidden" name="data[Employee][temp_firstname][]" value="'.$temp_firstname. ' ' . $temp_extension . '" />';
					echo '<input type="hidden" name="data[Employee][temp_middlename][]" value="'.$temp_middlename.'" />';
					echo '<input type="hidden" name="data[Employee][temp_dob][]" value="'.$temp_dob.'" />';
					echo '<input type="hidden" name="data[Employee][temp_datehired][]" value="'.$temp_datehired.'" />';
					echo '<input type="hidden" name="data[Employee][temp_pagibig][]" value="'.$temp_pagibig.'" />';
					echo '<input type="hidden" name="data[Employee][temp_tin][]" value="'.$temp_tin.'" />';
					echo '<input type="hidden" name="data[Employee][temp_phic][]" value="'.$temp_phic.'" />';
					echo '<input type="hidden" name="data[Employee][temp_sss][]" value="'.$temp_sss.'" />';
					echo '<input type="hidden" name="data[Employee][payrollaccountnumber][]" value="'.$objWorksheet->getCell('L'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][dateregularized][]" value="'.$objWorksheet->getCell('M'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][sex][]" value="'.$sex.'" />';
					echo '<input type="hidden" name="data[Employee][civilstatus][]" value="'.$objWorksheet->getCell('O'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][height][]" value="'.$objWorksheet->getCell('P'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][religion][]" value="'.$objWorksheet->getCell('Q'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][weight][]" value="'.$objWorksheet->getCell('R'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][mothername][]" value="'.$objWorksheet->getCell('S'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][motheraddress][]" value="'.$objWorksheet->getCell('T'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][mothercontactnumber][]" value="'.$objWorksheet->getCell('U'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][motheroccupation][]" value="'.$objWorksheet->getCell('V'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][fathername][]" value="'.$objWorksheet->getCell('W'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][fatheraddress][]" value="'.$objWorksheet->getCell('X'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][fathercontactnumber][]" value="'.$objWorksheet->getCell('Y'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][fatheroccupation][]" value="'.$objWorksheet->getCell('Z'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][mobilenumber][]" value="'.$objWorksheet->getCell('AA'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][telephonenumber][]" value="'.$objWorksheet->getCell('AB'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][email][]" value="'.$objWorksheet->getCell('AC'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][permanentaddress][]" value="'.$objWorksheet->getCell('AD'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][presetaddress][]" value="'.$objWorksheet->getCell('AE'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][econtactname][]" value="'.$objWorksheet->getCell('AF'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][econtactnumber][]" value="'.$objWorksheet->getCell('AG'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][ehomeaddress][]" value="'.$objWorksheet->getCell('AH'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][erelationship][]" value="'.$objWorksheet->getCell('AI'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][primaryschool][]" value="'.$objWorksheet->getCell('AJ'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][primarygrad][]" value="'.$objWorksheet->getCell('AK'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][primarycourse][]" value="'.$objWorksheet->getCell('AL'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][secondaryschool][]" value="'.$objWorksheet->getCell('AM'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][secondarygrad][]" value="'.$objWorksheet->getCell('AN'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][secondarycourse][]" value="'.$objWorksheet->getCell('AO'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][tertiaryschool][]" value="'.$objWorksheet->getCell('AP'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][tertiarygrad][]" value="'.$objWorksheet->getCell('AQ'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][tertiarycourse][]" value="'.$objWorksheet->getCell('AR'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][graduateschool][]" value="'.$objWorksheet->getCell('AS'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][graduategrad][]" value="'.$objWorksheet->getCell('AT'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][graduatecourse][]" value="'.$objWorksheet->getCell('AU'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][postgradschool][]" value="'.$objWorksheet->getCell('AV'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][postgradgrad][]" value="'.$objWorksheet->getCell('AW'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][postgradcourse][]" value="'.$objWorksheet->getCell('AX'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][employeeno][]" value="'.$employeeno.'" />';
					
					$daily = $objWorksheet->getCell('AY'.$i.'')->getValue();
					$monthly = $daily * 26;
					$hourly = $daily / 8;
					echo '<input type="hidden" name="data[Employee][monthly][]" value="'.$monthly.'" />';
					echo '<input type="hidden" name="data[Employee][daily][]" value="'.$daily.'" />';
					echo '<input type="hidden" name="data[Employee][hour][]" value="'.$hourly.'" />';
					echo '<input type="hidden" name="data[Employee][bio][]" value="'.$objWorksheet->getCell('BB'.$i.'')->getValue().'" />';
					echo '<input type="hidden" name="data[Employee][branch_id][]" value="'.$objWorksheet->getCell('AZ'.$i.'')->getValue().'" />';
				}
									
			}		?>	
		<?php //} ?>
		<tr class="table-header"><th><?php echo __('Total'); ?></th><th colspan="12" style="text-align: left; padding-left: 10px;"><?php echo $count_Timelog; ?></th></tr>
	</table>	
	
		<?php echo $this->Form->end('Next', array('class' => 'normalbtn', 'title' => 'Submit all information')); ?>	
		<div class="clear"></div>

	<?php  if($found > 0){	?>			
		<div class="error_message" style="margin: 10px 0;"><?php echo __('The system cannot continue, please fix first the findings'); ?></div>		
	
	<div style="margin-top: 2px;"><?php //echo $this->Html->link('Re-upload the file.', array('controller' => 'uploadedfiles', 'action' => 'forupload', $fileid)); ?></div>
	<?php } ?>
<?php }
	//echo $found_error;
?>
<br/><br/><br/><br/>