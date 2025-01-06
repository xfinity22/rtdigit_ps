<br/>
<table width="70%">
	<tr>
		
		
		<td>
			<div id="tabs" style="font-size: 12px;">
				<ul>
					<li><a href="#tabs-1">Update Time Log</a></li>
				</ul>
				<div id="tabs-1">
					<table class="form">
						<?php echo $this->Form->create('Timelog'); ?>
						<tr>
							<td>Employee</td>
							<td>
								<?php echo $this->Form->input('employee_id', array('label' => '', 'required' => true)); ?>
							</td>
						</tr>
						<tr>
							<td>Date</td>
							<td>
								<?php echo $this->Form->input('date', array('label' => '', 'empty' => true)); ?>
							</td>
						</tr>
						<tr>
							<td>Time In</td>
							<td>
								<?php echo $this->Form->input('timein', array('label' => '', 'empty' => true)); ?>
							</td>
						</tr>
						<tr>
							<td>Morning Out</td>
							<td>
								<?php echo $this->Form->input('otin', array('label' => '', 'empty' => true)); ?>
							</td>
						</tr>
						<tr>
							<td>Afternoon In</td>
							<td>
								<?php echo $this->Form->input('otout', array('label' => '', 'empty' => true)); ?>
							</td>
						</tr>
						<tr>
							<td>Afternoon Out</td>
							<td>
								<?php echo $this->Form->input('timeout', array('label' => '', 'empty' => true)); ?>
							</td>
						</tr>
						<tr>
							<td>Remarks</td>
							<td>
								<?php echo $this->Form->input('remarks', array('label' => '', 'empty' => true)); ?>
							</td>
						</tr>
						<tr>
							<td>Undertime In</td>
							<td>
								<?php echo $this->Form->input('undertimein', array('label' => '', 'empty' => true)); ?>
							</td>
						</tr>
						<tr>
							<td>Undertime Out</td>
							<td>
								<?php echo $this->Form->input('undertimeout', array('label' => '', 'empty' => true)); ?>
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
		


