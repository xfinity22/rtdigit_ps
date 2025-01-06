<br/>
<table width="70%">
	<tr>
		<td width="50px" valign="top">
			<div class="actions">
				<ul>
					<li><?php echo $this->Html->link(__('New Loan Type'), array('action' => 'add')); ?></li>
					<li><?php echo $this->Html->link(__('List Loan Types'), array('action' => 'index')); ?></li>
				</ul>
			</div>
		</td>
		
		<td>
			<div id="tabs" style="font-size: 12px;">
				<ul>
					<li><a href="#tabs-1">Update Loan Type</a></li>
				</ul>
				<div id="tabs-1">
					<table class="form">
					<?php echo $this->Form->create('Loantype'); ?>
						<tr>
							<td>Name</td>
							<td>
								<?php echo $this->Form->input('id'); ?>
								<?php echo $this->Form->input('name', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Type</td>
							<td>
								<?php echo $this->Form->input('nextloannumber', array('label' => '', 'options' => array('Deduction', 'Loan'))); ?>
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
		


