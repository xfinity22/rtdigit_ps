<br/>
<table width="70%">
	<tr>
		<td width="50px" valign="top">
			<div class="actions">
				
			</div>
		</td>
		
		<td>
			<div id="tabs" style="font-size: 12px;">
				<ul>
					<li><a href="#tabs-1">Add Other Earnings</a></li>
				</ul>
				<div id="tabs-1">
					<table class="form">
						<?php echo $this->Form->create('Otherearningsentry'); ?>
						<tr>
							<td width="3%">Description</td>
							<td>
								<?php
								echo $this->Form->input('payrollperiod_id', array('value' => $payrollperiod, 'type' => 'hidden', 'label' => ''));
								echo $this->Form->input('employee_id', array('value' => $employeeid, 'type' => 'hidden', 'label' => ''));
								echo $this->Form->input('description', array('label' => ''));
								?>
							</td>
						</tr>
						<tr>
							<td>Amount</td>
							<td>
								<?php echo $this->Form->input('amount', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<?php echo $this->Form->end(__('Submit')); ?>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</td>
	</tr>
</table>





		   <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>	