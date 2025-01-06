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
								echo $this->Form->input('payrollperiod_id', array('class' => 'select-style', 'label' => '', 'empty' => true));
								echo '<br/>';
							echo $this->Form->end('Proceed');
						?>
						</td>
					 </tr>
					
				</table>
			</div>
		</td>
	</tr>
</table>