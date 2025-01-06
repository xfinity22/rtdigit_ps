
<?php echo $this->element('page_back', ['controller' => 'loantypes', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'New Loan Type']); ?>
<hr />

<table>
	<tr>
		
		<td>
			<div id="tabs" style="font-size: 12px;">
				
				<div id="tabs-1">
					<table class="form">
					<?php echo $this->Form->create('Loantype'); ?>
						<tr>
							<td>Name</td>
							<td>
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
		


