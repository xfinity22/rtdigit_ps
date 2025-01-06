<?php echo $this->element('page_back', ['controller' => 'otherearnings', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'Register New Earning']); ?>
<hr />

<?php
	$options = array('No', 'Yes');
?>

<table width="70%">
	<tr>
		
		
		<td>
			<div id="tabs" style="font-size: 12px;">
				
				<div id="tabs-1">
					<table class="form">
						<?php echo $this->Form->create('Otherearning'); ?>
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
							<td>Taxable Income</td>
							<td>
								<?php echo $this->Form->input('taxableincome', array('label' => '', 'options' => $options, 'class' => 'select-style')); ?>
							</td>
						</tr>
						<tr>
							<td>Include in SSS</td>
							<td>
								<?php echo $this->Form->input('includeinSSS', array('label' => '', 'options' => $options, 'class' => 'select-style')); ?>
							</td>
						</tr>
						<tr>
							<td>Bonus Incentive</td>
							<td>
								<?php echo $this->Form->input('bonusincentive', array('label' => '', 'options' => $options, 'class' => 'select-style')); ?>
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