<?php $loguser = $this->requestAction('users/loggeduser');  ?>
<br/>
<table width="70%">		
		<td>
			<div id="tabs" style="font-size: 12px;">
				<ul>
					<li><a href="#tabs-1">File Leave / Leave Taken</a></li>
				</ul>
				<div id="tabs-1">
					<table class="form">
						<?php
							echo $this->Form->create('Leavetaken');
							echo $this->Form->input('id');
							echo $this->Form->input('employee_id', array('type' => 'text', 'type' => 'hidden'));
							?>
						<tr>
							<td width="15%">Leave Type</td>
							<td>
								<?php
									if(empty($leaves)){
										echo $this->Form->input('vltype_id', array('label' => '', 'class' => 'select-style', 'value' => 3));
									}else{
										echo $this->Form->input('vltype_id', array('label' => '', 'class' => 'select-style'));
									}	
								?>
							</td>
						</tr>
						<tr>
							<td>Year</td>
							<td>
								<?php echo $this->Form->input('year', array('label' => '', 'default' => date('Y'))); ?>
							</td>
						</tr>
						<tr>
							<td>From</td>
							<td>
								<?php echo $this->Form->input('date', array('label' => '', 'class' => 'date')); ?>
							</td>
						</tr>
						<tr>
							<td>To</td>
							<td>
								<?php echo $this->Form->input('dateto', array('label' => '', 'class' => 'date')); ?>
							</td>
						</tr>
						<tr>
							<td>Days</td>
							<td>
								<select name="data[Leavetaken][day]" class="select-style">
									<option value="0" style="color: #ccc">Keep it Blank if leave is not half day</option>
								<?php
									if($leaves['Leavetaken']['day'] == 0.5){
										echo '<option value="0.5" selected>Half Day</option>';
									}else{
										echo '<option value="0.5" >Half Day</option>';	
									}
								?>
									
									
								</select>
							</td>
						</tr>
						<tr>
							<td>Reason</td>
							<td>
								<?php echo $this->Form->input('reason', array('label' => '', 'class' => 'date')); ?>
							</td>
						</tr>
						<tr>
							<td>Status</td>
							<td>
								<?php
								$options = array("", "Pending");
								if($loguser['User']['usertype_id'] != 4){
									echo $this->Form->input('leavestatus_id', array('label' => '', 'class' => 'select-style'));
								}else{
									echo $this->Form->input('leavestatus_id', array('label' => '', 'class' => 'select-style', 'options' => $options)); 
								}
								?>
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
		


