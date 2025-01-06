<br/>
<?php

if(!empty($empid)){ ?>
<br/>
<div class="employeename" style="font-size: 14px; font-weight: bold; padding: 10px; width: 70%;">
	<?php
		echo 'Loan Entry: <br/><br/>Name: ';
		echo strtoupper($emp['Employee']['firstname'] . ' ' . $emp['Employee']['lastname']);
		echo '<br/>Division / Department: ' . strtoupper($emp['Division']['name'] . ' / ' . $emp['Department']['name']);
	?>
</div>
<br/>

<?php
}
?>
<br/>
<table width="70%">
	<tr>
		<td width="50px" valign="top">
			<div class="actions">
				<ul>
					<li><?php echo $this->Html->link(__('<<BACK'), array('controller' => 'incomes', 'action' => 'view', $employeeid, $payrollperiod)); ?></li>
				</ul>
			</div>
		</td>
		
		<td>
			<div id="tabs" style="font-size: 12px;">
				<ul>
					<li><a href="#tabs-1">Update Deduction</a></li>
				</ul>
				<div id="tabs-1">
					<table class="form">
						<?php echo $this->Form->create('Otherductionentry'); ?>
						<tr>
							<td>Description</td>
							<td>
								<?php
								echo $this->Form->input('id');
								echo $this->Form->input('payrollperiod_id', array('value' => $payrollperiod, 'type' => 'text', 'type' => 'hidden'));
								echo $this->Form->input('employee_id', array('value' => $employeeid, 'type' => 'text', 'type' => 'hidden'));
								echo $this->Form->input('otherdeduction_id', array('label' => '', 'class' => 'select-style', 'empty' => true));							
								?>
							</td>
						</tr>
						<tr>
							<td>Amount</td>
							<td>
								<?php
								echo $this->Form->input('amount', array('label' => ''));				
								?>
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
		