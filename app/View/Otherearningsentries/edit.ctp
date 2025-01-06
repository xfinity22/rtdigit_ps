<?php echo $this->element('page_back', ['controller' => 'otherearningsentries', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'Update Data']); ?>
<hr />

<table>
	<tr>
		
		
		<td>
			<div id="tabs" style="font-size: 12px;">
				
				<div id="tabs-1">
					<table class="form">
						<?php echo $this->Form->create('Otherearningsentry'); ?>
						<tr>
							<td width="3%">Type</td>
							<td>
								<?php
								echo $this->Form->input('id');
								echo $this->Form->input('employee_id', array('value' => $employeeid, 'type' => 'hidden', 'label' => ''));
								echo $this->Form->input('otherearning_id', array('label' => '', 'class' => 'select-style'));
								?>
							</td>
						</tr>
						<tr>
							<td>Amount</td>
							<td>
								<?php echo $this->Form->input('amount', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Pay Frequency</td>
							<td>
								<?php
								echo $this->Form->input('payprequency', array('label' => '', 'class' => 'select-style', 'options' => array('Daily', 'First Half', 'Second Half', 'Every Pay Day')));
								?>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<?php echo $this->Form->end(__('Save Changes')); ?>
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