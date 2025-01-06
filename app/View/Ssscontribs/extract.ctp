<?php
	$user = $this->requestAction('users/loggeduser');
	if(!empty($filename)){
?>

	<br/><br/>
	<table cellpadding="0" cellspacing="0" class="bordered" width="90%">
		<?php
			echo $this->Form->create('Ssscontrib');
			
			
		?>
		<thead>
		<tr class="table-header" style="text-align: left;">
			<tr>
				<th rowspan="3">Range Start</th>
				<th rowspan="3">Range Start</th>
				<th rowspan="3">Range End</th>
				<th colspan="2">Monthly Salary Credit</th>
				<th></th>
				<th colspan="12">Amount of Contribution</th>
				
			</tr>
			
			<tr>
				<th>Regular SS</th>
				<th rowspan="2">Mandatory Provident Fund</th>
				<th  rowspan="2">Wisp</th>
				<th colspan="3">Regular</th>
				<th colspan="3">EC</th>
				<th colspan="3">Wisp</th>
				<th colspan="3">Total</th>
				
			</tr>
			
			<tr>
				<th>EC</th>		
				<th>ER</th>		
				<th>EE</th>		
				<th>TOTAL</th>		
				<th>ER</th>		
				<th>EE</th>		
				<th>TOTAL</th>		
				<th>ER</th>		
				<th>E</th>		
				<th>TOTAL</th>
				<th>ER</th>		
				<th>EC</th>		
				<th>TOTAL</th>					
			</tr>
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
				$rangestart = $objWorksheet->getCell('A'.$i.'')->getValue();
				$rangeend = $objWorksheet->getCell('B'.$i.'')->getValue();
				$msc =   $objWorksheet->getCell('C'.$i.'')->getValue();
				$mandatory =   $objWorksheet->getCell('D'.$i.'')->getValue();
				$wisp =   $objWorksheet->getCell('E'.$i.'')->getValue();
				$erss =   $objWorksheet->getCell('F'.$i.'')->getValue();
				$eess =   $objWorksheet->getCell('G'.$i.'')->getValue();
				$toatlss =   $objWorksheet->getCell('H'.$i.'')->getValue();
				$erec =   $objWorksheet->getCell('I'.$i.'')->getValue();
				$EE =   $objWorksheet->getCell('J'.$i.'')->getValue();
				$eetotal =   $objWorksheet->getCell('K'.$i.'')->getValue();
				$erw =   $objWorksheet->getCell('L'.$i.'')->getValue();
				$eew =   $objWorksheet->getCell('M'.$i.'')->getValue();
				$wtotal =   $objWorksheet->getCell('N'.$i.'')->getValue();
				$ertotal =   $objWorksheet->getCell('O'.$i.'')->getValue();
				$eetotal =   $objWorksheet->getCell('P'.$i.'')->getValue();
				$total =   $objWorksheet->getCell('Q'.$i.'')->getValue();
				
				
				$errors = '';
				
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
			?>					

						
					<td><?php echo $rangestart; ?></td>							
					<td><?php echo $rangeend; ?></td>					
					<td><?php echo $msc; ?></td>					
					<td><?php echo $mandatory; ?></td>										
					<td><?php echo $wisp; ?></td>										
					<td><?php echo $erss; ?></td>										
					<td><?php echo $eess; ?></td>										
					<td><?php echo $toatlss; ?></td>							
					<td><?php echo $erec; ?></td>										
					<td><?php echo $EE; ?></td>										
					<td><?php echo $eetotal; ?></td>										
					<td><?php echo $erw; ?></td>																
					<td><?php echo $eew; ?></td>																
					<td><?php echo $wtotal; ?></td>																
					<td><?php echo $ertotal; ?></td>																
					<td><?php echo $eetotal; ?></td>																
					<td><?php echo $total; ?></td>																
				</tr>	
			<?php
				$found_error == 0;
				if($found_error == 0){
					echo '<input type="hidden" name="data[Ssscontrib][rangestart][]" value="'.$rangestart.'" />';
					echo '<input type="hidden" name="data[Ssscontrib][rangeend][]" value="'.$rangeend.'" />';
					echo '<input type="hidden" name="data[Ssscontrib][msc][]" value="'.$msc.'" />';
					echo '<input type="hidden" name="data[Ssscontrib][mandatory][]" value="'.$mandatory.'" />';
					echo '<input type="hidden" name="data[Ssscontrib][erss][]" value="'.$erss.'" />';
					echo '<input type="hidden" name="data[Ssscontrib][eess][]" value="'.$eess.'" />';
					echo '<input type="hidden" name="data[Ssscontrib][toatlss][]" value="'.$toatlss.'" />';
					echo '<input type="hidden" name="data[Ssscontrib][erec][]" value="'.$erec.'" />';
					echo '<input type="hidden" name="data[Ssscontrib][eetotal][]" value="'.$eetotal.'" />';
					echo '<input type="hidden" name="data[Ssscontrib][ertotal][]" value="'.$ertotal.'" />';
					echo '<input type="hidden" name="data[Ssscontrib][total][]" value="'.$total.'" />';
				}
									
			}		?>	
		<?php //} ?>
		
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