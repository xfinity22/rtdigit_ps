<br/>
<table width="70%">
	<tr>
		<td width="50px" valign="top">
			<div class="actions">
				<ul>
					<li><?php echo $this->Html->link(__('<<BACK'), array('controller' => 'incomes', 'action' => 'view', $employeeid, $payrollperiod)); ?></li>
				</ul>
			</div>
		</td>
		
		<td>
			<div id="tabs" style="font-size: 12px;">
				<ul>
					<li><a href="#tabs-1">Add Other Earnings</a></li>
				</ul>
				<div id="tabs-1">
					<table class="form">
						<?php echo $this->Form->create('Earningrecord'); ?>
						<tr>
							<td width="3%">Description</td>
							<td>
								<?php
								echo $this->Form->input('id');
								echo $this->Form->input('payrollperiod_id', array('value' => $payrollperiod, 'type' => 'hidden', 'label' => ''));
								echo $this->Form->input('employee_id', array('value' => $employeeid, 'type' => 'hidden', 'label' => ''));
								
								$earns = $this->requestAction('otherearnings/listall/');
								echo '<select name="data[Earningrecord][otherearningsentry_id]" class="select-style">';
									echo '<option></option>';
									if(!empty($earns)){
										foreach ($earns as $er):
											if($entry['Earningrecord']['otherearningsentry_id'] == $er['Otherearning']['id']){
												echo '<option value="'. $er['Otherearning']['id'] .'" selected>'. $er['Otherearning']['name'] .'</option>';												
											}else{
												echo '<option value="'. $er['Otherearning']['id'] .'">'. $er['Otherearning']['name'] .'</option>';
											}
											
										endforeach;
									}
								echo '</select>';
								//echo $this->Form->input('otherearning_id', array('label' => '', 'class' => 'select-style'));
								?>
							</td>
						</tr>
						<tr>
							<td>Amount</td>
							<td>
								<?php echo $this->Form->input('totalamount', array('label' => '')); ?>
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