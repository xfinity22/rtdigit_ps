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
						<?php echo $this->Form->create('Medbenefit'); ?>
						<?php
							echo $this->Form->input('employee_id', array('label' => '', 'value' => $employeeid, 'type' => 'text', 'type' => 'hidden'));
						?>
						<tr>
							<td>Description</td>
							<td>
								<?php echo $this->Form->input('name', array('label' => '')); ?>
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
		
