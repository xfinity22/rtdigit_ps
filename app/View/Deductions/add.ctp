<br/>
<table width="70%">
	<tr>
		<td width="50px" valign="top">
			<div class="actions">
				<ul>
					<li><?php echo $this->Html->link(__('<< Back'), array('controller' => 'employees', 'action' => 'view', $id)); ?></li>
				</ul>
			</div>
		</td>
		
		<td>
			<div id="tabs" style="font-size: 12px;">
				<ul>
					<li><a href="#tabs-1">Fixed Deduction</a></li>
				</ul>
				<div id="tabs-1">
					<table class="form">
						<?php echo $this->Form->create('Deduction'); ?>
						<tr>
							<td>Name</td>
							<td>
								<?php echo $this->Form->input('employee_id', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Health Card</td>
							<td>
								<?php echo $this->Form->input('caritas', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Cooop Contri</td>
							<td>
								<?php echo $this->Form->input('cooploan', array('label' => '')); ?>
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