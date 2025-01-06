<br/>
<table width="70%">
	<tr>		
		<td>
			<div id="tabs" style="font-size: 12px;">
				<ul>
					<li><a href="#tabs-1">Promotion</a></li>
				</ul>
				<div id="tabs-1">
					<table class="form">
						<?php
							echo $this->Form->create('Promotion');
							echo $this->Form->input('employee_id', array('value' => $employeeid, 'type' => 'text', 'type' => 'hidden'));
						?>
						<tr>
							<td width="3%">Position</td>
							<td>
								<?php echo $this->Form->input('position', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>From</td>
							<td>
								<?php
									echo '<input type="date" name="data[Promotion][datefrom]" />';	?>
							</td>
						</tr>
						<tr>
							<td>To</td>
							<td>
								<?php
									echo '<input type="date" name="data[Promotion][dateend]" />';	?>
							</td>
						</tr>
						<tr>
						<tr>
							<td>Salary</td>
							<td>
								<?php echo $this->Form->input('salary', array('required' => true, 'label' => ''	)); ?>
							</td>
						</tr>
						
						<tr>
							<td>Increase</td>
							<td>
								<?php echo $this->Form->input('increase', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<?php echo $this->Form->end(__('Submit', array('label' => ''))); ?>
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