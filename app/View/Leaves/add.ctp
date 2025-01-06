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
					<li><a href="#tabs-1">Leaves</a></li>
				</ul>
				<div id="tabs-1">
					<table class="form">
						<?php echo $this->Form->create('Leave'); ?>
						<tr>
							<td width="3%">Vacation Leave</td>
							<td>
								<?php echo $this->Form->input('employee_id', array('value' => $employeeid, 'type' => 'text', 'type' => 'hidden', 'label' => '')); ?>
								<?php echo $this->Form->input('vactionleave', array('label' => '', 'default' => 0)); ?>
							</td>
						</tr>
						<tr>
							<td width="3%">Sick Leave</td>
							<td>
								<?php echo $this->Form->input('sickleave', array('label' => '', 'default' => 0)); ?>
							</td>
						</tr>
						<tr>
							<td>Year</td>
							<td>
								<?php echo $this->Form->input('year2', array('label' => '', 'value' => $year, 'disabled' => true)); ?>
								<?php echo $this->Form->input('year', array('label' => '', 'value' => $year, 'type' => 'hidden')); ?>
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