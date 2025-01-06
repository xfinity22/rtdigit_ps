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
					<li><?php echo $this->Html->link(__('New Loan Entry'), array('action' => 'add')); ?></li>
					<li><?php echo $this->Html->link(__('List Loan Entries'), array('action' => 'index')); ?></li>
				</ul>
			</div>
		</td>
		
		<td>
			<div id="tabs" style="font-size: 12px;">
				<ul>
					<li><a href="#tabs-1">New Loan Entry</a></li>
				</ul>
				<div id="tabs-1">
					<table class="form">
						<?php echo $this->Form->create('Loanentry'); ?>
						<?php echo $this->Form->input('id'); ?>
						<tr>
							<td width="20%">Loan Type</td>
							<td>
								<?php echo $this->Form->input('loantype_id', array('label' => '', 'class' => 'select-style')); ?>
							</td>
						</tr>
						<tr>
							<td>Employee</td>
							<td>
								<?php
								echo $this->Form->input('employee_id', array('class' => 'select-style', 'label' => ''));
								?>
							</td>
						</tr>
						<tr>
							<td>Loan Date</td>
							<td>
								<?php echo $this->Form->input('loandate', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Amount</td>
							<td>
								<?php echo $this->Form->input('amount', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Deduction Type</td>
							<td>
								<?php
								$options = array('First Half', 'Second Half', 'Every Pay Day');
								echo $this->Form->input('deductiontype', array('label' => '', 'options' => $options, 'class' => 'select-style')); ?>
							</td>
						</tr>
						<tr>
							<td>Deduction Per Payday</td>
							<td>
								<?php echo $this->Form->input('deductionperpayday', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Start of Deduction</td>
							<td>
								<?php echo $this->Form->input('startdeduction', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Loan Balance</td>
							<td>
								<?php echo $this->Form->input('balance', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Status</td>
							<td>
							<?php
								$options = array("Paid", "Not Yet paid", "Inactive");
								echo $this->Form->input('status', array('label' => '', 'options' => $options, 'class' => 'select-style')); 
							?>
							</td>
						</tr>
						<tr>
							<td>Loan Type (For SSS Loan Only)</td>
							<td>
							<?php
								$options = array("Calamity", "Salary");
								echo $this->Form->input('nextinstallment', array('label' => '', 'options' => $options, 'class' => 'select-style', 'empty' => true)); 
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
		
