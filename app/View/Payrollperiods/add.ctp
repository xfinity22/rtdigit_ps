<?php echo $this->element('page_back', ['controller' => 'payrollperiods', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'Register New Payroll Period']); ?>
<hr />

<br/>
<table width="70%">
	<tr>
		
		
		<td>
			<div id="tabs" style="font-size: 12px;">
				
				<div id="tabs-1">
					<table class="form">
						<?php 
							echo $this->Form->create('Payrollperiod');
						?>
						<tr>
							<td>Code</td>
							<td>
								<?php echo $this->Form->input('code', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Cut Off Start</td>
							<td>
								<?php 
								echo '<input type="date" name="data[Payrollperiod][fromDate]" class="name">';
								//echo $this->Form->input('from', array('label' => '', 'type' => 'date', 'class' => 'name')); ?>
							</td>
						</tr>
						<tr>
							<td>Cut Off End</td>
							<td>
								<?php
								echo '<input type="date" name="data[Payrollperiod][untilDAte]" class="name">';
								//echo $this->Form->input('until', array('label' => '', 'class' => 'name', 'type' => 'date')); ?>
							</td>
						</tr>
						
						<tr>
							<td>Working Days</td>
							<td>
								<?php echo $this->Form->input('dayswork', array('label' => '', 'class' => 'name', 'value' => 0)); ?>
							</td>
						</tr>
						
						<tr>
							<td>Deduct Withholding Tax?</td>
							<td>
								<?php echo $this->Form->input('withholdingtax', array('options' => array('Yes', 'No'), 'label' => '', 'class' => 'select-style')); ?>
							</td>
						</tr>
						<tr>
							<td>Deduct SSS contribution?</td>
							<td>
								<?php echo $this->Form->input('sss', array('options' => array('Yes', 'No'), 'label' => '', 'class' => 'select-style')); ?>
							</td>
						</tr>
						<tr>
							<td>Deduct Philhealth contribution?</td>
							<td>
								<?php echo $this->Form->input('philhealth', array('options' => array('Yes', 'No'), 'label' => '', 'class' => 'select-style')); ?>
							</td>
						</tr>
						<tr>
							<td>Deduct Pag-ibig contribution?</td>
							<td>
								<?php echo $this->Form->input('pagibig', array('options' => array('Yes', 'No'), 'label' => '', 'class' => 'select-style')); ?>
							</td>
						</tr>
						<tr>
							<td>Financial</td>
							<td>
								<?php echo $this->Form->input('financialyear', array('label' => '', 'value' => 0)); ?>
							</td>
						</tr>
						<tr>
							<td>Period</td>
							<td>
								<?php echo $this->Form->input('period', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Payroll Type</td>
							<td>
								<?php echo $this->Form->input('payrolltype_id', array('label' => '', 'class' => 'select-style')); ?>
							</td>
						</tr>
						<tr>
							<td>Classification</td>
							<td>
								<?php echo $this->Form->input('classification_id', array('label' => '', 'class' => 'select-style')); ?>
							</td>
						</tr>
						<tr>
							<td>Pay Frequency</td>
							<td>
								<?php echo $this->Form->input('payfrequency_id', array('label' => '', 'class' => 'select-style')); ?>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="text-align: right">
								<?php echo $this->Form->end(__('Submit')); ?><br/><br/>
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







<script>
  $(function() {
    $( "#tabs" ).tabs();
  });
</script>

