<br/>
<table width="70%">
	<tr>
		<td width="50px" valign="top">
			<div class="actions">
				<ul>
					<li><?php echo $this->Html->link(__('<< BACK'), array('controller' => 'employees', 'action' => 'edit', $employeeid)); ?></li>
				</ul>
			</div>
		</td>
		
		<td>
			<div id="tabs" style="font-size: 12px;">
				<ul>
					<li><a href="#tabs-1">Add Benefit</a></li>
				</ul>
				<div id="tabs-1">
					<table class="form">
						<?php echo $this->Form->create('Medcheckup'); ?>
						<?php
							echo $this->Form->input('employee_id', array('label' => '', 'value' => $employeeid, 'type' => 'text', 'type' => 'hidden'));
						?>
						<tr>
							<td>Hospital</td>
							<td>
								<?php echo $this->Form->input('medhospital_id', array('label' => '', 'class' => 'select-style')); ?>
							</td>
						</tr>
						<tr>
							<td>Fees</td>
							<td>
								<?php echo $this->Form->input('fees', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Date</td>
							<td>
								<?php echo $this->Form->input('date', array('label' => '')); ?>
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