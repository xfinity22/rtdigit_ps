<?php
		
		echo $this->Form->create('Overtime');
			echo $this->Form->input('id');
		echo '<table width="100%" class="form" >';
			echo '<tr>';
				echo '<th colspan="5"><b><h3>UPDATE OVERTIME ENTRY</h3></b></th>';
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
					echo $this->Form->input('OTbegintime', array('label' => '', 'type' => 'time', 'class' => 'name'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">End Time</td>';
				echo '<td class="label">';
					echo $this->Form->input('OTendtime', array('label' => '', 'type' => 'time', 'class' => 'name'));
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td class="label">Overtime Rate</td>';
				echo '<td class="label">';
						echo '<select name="data[Overtime][overtimerate_id]" class="select-style">';
						foreach($otrate as $ot):
							if($this->data['Overtime']['overtimerate_id'] == $ot['Overtimerate']['id']){
								echo '<option value="' . $ot['Overtimerate']['id'] . '" selected>' . $ot['Overtimerate']['name'] . ' / ' . $ot['Overtimerate']['addonrate'] . '</option>';
							}else{
								echo '<option value="' . $ot['Overtimerate']['id'] . '">' . $ot['Overtimerate']['name'] . ' / ' . $ot['Overtimerate']['addonrate'] . '</option>';
							}
							
							
						endforeach;
					echo '</select>';
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">OT Status</td>';
				echo '<td class="label" >';
					echo '<select name="data[Overtime][OTstatus_id]" class="select-style">';
						foreach($otstatuses as $ot):
							if($ots['Overtime']['OTstatus_id'] == $ot['OTstatus']['id']){
								echo '<option value="' . $ot['OTstatus']['id'] . '" selected>' . $ot['OTstatus']['name'] . '</option>';
							}else{
								echo '<option value="' . $ot['OTstatus']['id'] . '">' . $ot['OTstatus']['name'] . '</option>';
							}
						endforeach;
					echo '</select>';
					
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td class="label" valign="top">Reason</td>';
				echo '<td class="label">';
					echo $this->Form->input('reason', array('label' => '', 'type' => 'textarea', 'class' => 'name'));
					echo $this->Form->input('otamount', array('type' => 'hidden'));
					echo $this->Form->input('rate', array('type' => 'hidden'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label"></td>';
				echo '<td class="label" style="text-align: right; padding-right: 100px;">';
					echo $this->Form->end(__('Submit'));
				echo '</td>';				
			echo '</tr>';
			
		echo '</table>';
?>