<?php echo $this->element('page_back', ['controller' => 'overtimerates', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'Register Overtime Rate']); ?>
<hr />

<?php
	$options = array('No', 'Yes');

?>
<table>
	<tr>
		
		
		<td>
			<div id="tabs" style="font-size: 12px;">
				
				<div id="tabs-1">
					<table class="form">
						<?php echo $this->Form->create('Overtimerate'); ?>
						<tr>
							<td>Name</td>
							<td>
								<?php echo $this->Form->input('name', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Description</td>
							<td>
								<?php echo $this->Form->input('description', array('label' => '', 'type' => 'textarea')); ?>
							</td>
						</tr>
						<tr>
							<td>Add On Rate</td>
							<td>
								<?php echo $this->Form->input('percent', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Overtime Type</td>
							<td>
								<?php echo $this->Form->input('overtimetype_id', array('label' => '', 'class' => 'select-style')); ?>
							</td>
						</tr>
						<tr>
							<td>Rates</td>
							<td>
								<?php echo $this->Form->input('rates', array('label' => '', 'class' => 'select-style', 'options' => $options)); ?>
							</td>
						</tr>
						<tr>
							<td>Tax Class</td>
							<td>
								<?php echo $this->Form->input('taxclass', array('label' => '', 'class' => 'select-style', 'options' => $options)); ?>
							</td>
						</tr>
						<tr>
							<td>SSS</td>
							<td>
								<?php echo $this->Form->input('sss', array('label' => '', 'class' => 'select-style', 'options' => $options)); ?>
							</td>
						</tr><tr>
							<td>Pag-ibig</td>
							<td>
								<?php echo $this->Form->input('pagibig', array('label' => '', 'class' => 'select-style', 'options' => $options)); ?>
							</td>
						</tr>
						<tr>
							<td>Philhealth</td>
							<td>
								<?php echo $this->Form->input('ph', array('label' => '', 'class' => 'select-style', 'options' => $options)); ?>
							</td>
						</tr>
						<tr>
							<td>13th Month</td>
							<td>
								<?php echo $this->Form->input('13thmonth', array('label' => '', 'class' => 'select-style', 'options' => $options)); ?>
							</td>
						</tr>
						<tr>
							<td>BIR 2316 No.</td>
							<td>
								<?php echo $this->Form->input('bir2316', array('label' => '', 'class' => 'name', 'default' => 29)); ?>
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
