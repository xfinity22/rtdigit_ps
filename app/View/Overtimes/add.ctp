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
						echo strtoupper($payroll['Payrollperiod']['period']);
					echo '</th>';
					echo '<th>';
						echo 'MONTHLY RATE';
					echo '</th>';
					echo '<th>';
						echo number_format($employee['Employee']['monthlyrate'], 2, '.', ',');
					echo '</th>';
				echo '</tr>';
				
			echo '</table>';
		echo '</div>';	
		
		echo $this->Form->create('Overtime');
			echo $this->Form->input('rate', array('label' => '', 'type' => 'hidden', 'value' => $employee['Employee']['dailyrate']));
			echo $this->Form->input('employee_id', array('label' => '', 'type' => 'hidden', 'value' => $employee['Employee']['id']));
			echo $this->Form->input('payrollperiod_id', array('label' => '', 'type' => 'hidden', 'value' => $payroll['Payrollperiod']['id']));		
		echo '<table width="100%" class="form" >';
			echo '<tr>';
				echo '<th colspan="5"><b><h3>OVERTIME / LEAVE ENTRY</h3></b></th>';
			echo '</tr>';
			echo '<tr>';
				echo '<th colspan="5"></th>';
			echo '</tr>';
			echo '<tr>';
				echo '<td class="label">Start Date</td>';
				echo '<td class="label">';
					echo $this->Form->input('requestddate', array('label' => '', 'type' => 'date', 'class' => 'name'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">End Date</td>';
				echo '<td class="label">';
					echo $this->Form->input('referencedate', array('label' => '', 'type' => 'date', 'class' => 'name', 'empty' => true));
				echo '</td>';
			echo '</tr>';
			/* echo '<tr>';
				echo '<td class="label">Begin Date</td>';
				echo '<td class="label">';
					echo $this->Form->input('OTbegindate', array('label' => '', 'type' => 'date', 'class' => 'name'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">End Date</td>';
				echo '<td class="label">';
					echo $this->Form->input('OTenddate', array('label' => '', 'type' => 'date', 'class' => 'name'));
				echo '</td>';
			echo '</tr>';
			*/
			echo '<tr>';
				echo '<td class="label">Begin Time</td>';
				echo '<td class="label">';
					echo $this->Form->input('OTbegintime', array('label' => '', 'type' => 'time', 'class' => 'name', 'selected' => '08:00:00'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">End Time</td>';
				echo '<td class="label">';
					echo $this->Form->input('OTendtime', array('label' => '', 'type' => 'time', 'class' => 'name', 'selected' => '16:00:00'));
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td class="label">Overtime Rate</td>';
				echo '<td class="label">';
						echo '<select name="data[Overtime][overtimerate_id]" class="select-style">';
						foreach($otrate as $ot):
							echo '<option value="' . $ot['Overtimerate']['id'] . '">' . $ot['Overtimerate']['name'] . ' / ' . $ot['Overtimerate']['addonrate'] . '</option>';
						endforeach;
					echo '</select>';
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">OT Status</td>';
				echo '<td class="label" >';
					echo '<select name="data[Overtime][OTstatus_id]" class="select-style">';
						foreach($otstatuses as $ot):
							
							if($ot['OTstatus']['id'] != 2){
								echo '<option value="' . $ot['OTstatus']['id'] . '">' . $ot['OTstatus']['name'] . '</option>';
							}else{
								echo '<option value="' . $ot['OTstatus']['id'] . '" selected>' . $ot['OTstatus']['name'] . '</option>';
							}
						endforeach;
					echo '</select>';
					
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td class="label" valign="top">Reason</td>';
				echo '<td class="label">';
					echo $this->Form->input('reason', array('label' => '', 'type' => 'textarea', 'class' => 'name'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label"></td>';
				echo '<td class="label" style="text-align: right; padding-right: 100px;">';
					echo $this->Form->end(__('Submit'));
				echo '</td>';				
			echo '</tr>';
			
		echo '</table>';
?>