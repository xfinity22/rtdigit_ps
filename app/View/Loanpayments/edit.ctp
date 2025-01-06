<br/>
<table width="70%">
	<tr>
		<td width="50px" valign="top">
			<div class="actions">
				<ul>
					<li><?php echo $this->Html->link(__('<<BACK'), array('action' => 'view', $employeeid, $payrollperiod)); ?></li>
					
				</ul>
			</div>
		</td>
		
		<td>
			<div id="tabs" style="font-size: 12px;">
				<ul>
					<li><a href="#tabs-1">UPDATE LOAN PAYMENT ENTRY</a></li>
				</ul>
				<div id="tabs-1">
					<table class="form">
						<?php
							echo $this->Form->create('Loanpayment');
							echo $this->Form->input('id');
							echo $this->Form->input('payrollperiod_id', array('type' => 'hidden'));
						?>
						<tr>
							<td>Loan Type</td>
							<td>
								<?php
									echo $this->Form->input('loantype_id', array('label' => '', 'disabled' => true));
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
