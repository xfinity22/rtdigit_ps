<?php ?>
<table width="50%">
	<tr>
		<td valign="top">
			<div class="contentindex">
				<table class="bordered form" style="padding: 0px;">
					 <thead>
					 <tr>
						<th>Select Payroll Period</th>
					 </tr>
					 </thead>
					  <tr>
						<td style="padding: 20px; font-size: 15px;">
						<br/>
						<?php 
							echo $this->Form->create('Income');
								echo 'Select Payroll Period';
								echo $this->Form->input('period', array('class' => 'select-style', 'label' => '', 'empty' => true));
								
								
								echo '<br/>Select Branch';
								echo $this->Form->input('branch_id', array('class' => 'select-style', 'label' => '', 'empty' => 'All'));
								echo '<br/>Select Bank for Bank Report / Encrypted File<i>(if needed)</i>';
								echo $this->Form->input('bank_id', array('class' => 'select-style', 'label' => '', 'empty' => 'All'));
								echo '<br/>';
								echo $this->Form->input('option', array(
									'separator' => '<br/>',
									'options' => array(0 => 'All', 1 => 'Bank Report', 2 => 'Cash Report', 3 => 'Receiving Copy', 6 => 'Encrypted File'),
									// 'options' => array('All', 'Bank Report', 'Cash Report', 'Receiving Copy', 'Text File (CASA)', 'SSS LCL', 'Encrypted File'),
									'type' => 'radio',
									'legend' => 'Please select One',
									'required' => 'true',
								));
								
								echo '<br/>';
								echo $this->Form->input('depthead', array(
									'separator' => '<br/>',
									'options' => array(0 => 'No', 1 => 'Yes'),
									'type' => 'radio',
									'legend' => 'Department Heads Only',
									'required' => 'true',
									'default' => 0
								));
								
								echo '<br/>';
							echo $this->Form->end('Proceed');
							
							if(!empty($option)){
								echo $option;
							}
						?>
						</td>
					 </tr>
					
				</table>
			</div>
		</td>
	</tr>
</table>