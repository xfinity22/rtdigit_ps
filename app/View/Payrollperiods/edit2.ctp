<br/>
<table width="70%">
	<tr>
		<td width="50px" valign="top">
			<div class="actions">
				<ul>
					<li><?php echo $this->Html->link(__('List All Payroll Periods'), array('action' => 'index')); ?></li>
					<li><?php echo $this->Html->link(__('New Payroll Periods'), array('action' => 'add')); ?></li>
				</ul>
			</div>
		</td>
		
		<td>
			<div id="tabs" style="font-size: 12px;">
				<ul>
					<li><a href="#tabs-1">New Payrollperiod</a></li>
				</ul>
				<div id="tabs-1">
					<table class="form">
						<?php 
							echo $this->Form->create('Payrollperiod');
						?>
						<tr>
							<td>Description</td>
							<td>
								<?php echo $this->Form->input('id'); ?>
								<?php echo $this->Form->input('code', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>From</td>
							<td>
								<?php echo $this->Form->input('from', array('label' => '', 'type' => 'date', 'class' => 'name')); ?>
							</td>
						</tr>
						<tr>
							<td>Until</td>
							<td>
								<?php echo $this->Form->input('until', array('label' => '', 'class' => 'name', 'type' => 'date')); ?>
							</td>
						</tr>
						
						<tr>
							<td>Payroll Type</td>
							<td>
								<?php echo $this->Form->input('payrolltype_id', array('label' => '', 'class' => 'select-style')); ?>
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

