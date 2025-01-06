<br/>
<table width="70%">
	<tr>
		<td>
			<div id="tabs" style="font-size: 12px;">
				<ul>
					<li><a href="#tabs-1">Payroll Parameters</a></li>
				</ul>
				<div id="tabs-1">
					<table class="form">
						<?php echo $this->Form->create('Parameter'); ?>
						<tr>
							<td>Grace Period</td>
							<td>
								<?php echo $this->Form->input('graceperiod', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Standard Work Hours per Day</td>
							<td>
								<?php echo $this->Form->input('standardworkhours', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Tax Exempted Rate <= </td>
							<td>
								<?php echo $this->Form->input('taxexemptedrate', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Max HDMF contribution for Exemption</td>
							<td>
								<?php echo $this->Form->input('maxhdmfcontri', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Maximum Non-Taxable Incentive amount</td>
							<td>
								<?php echo $this->Form->input('maxnontaxincentive', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Sick Leave to Earn per Month</td>
							<td>
								<?php echo $this->Form->input('vlpermonth', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Vacation Leave to Earn per Month</td>
							<td>
								<?php echo $this->Form->input('slpermonth', array('label' => '')); ?>
							</td>
						</tr>						
						<tr>
							<td>Next Year to Earn Leave</td>
							<td>
								<?php echo $this->Form->input('nextyeartoearnleave', array('label' => '')); ?>
							</td>
						</tr>						
						<tr>
							<td>Next Month to Earn Leave</td>
							<td>
								<?php echo $this->Form->input('nextmonthtoearnleave', array('label' => '')); ?>
							</td>
						</tr>						
						<tr>
							<td>Logo</td>
							<td>
								<?php echo $this->Form->file('logo', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Late / Undertime Basis</td>
							<td>
								<?php echo $this->Form->input('lateundertimebase_id', array('label' => '', 'class' => 'select-style')); ?>
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