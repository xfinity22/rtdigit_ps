<br/>
<table width="70%">
	<tr>
		<td>
			<div id="tabs" style="font-size: 12px;">
				<ul>
					<li><a href="#tabs-1">Company Profile</a></li>
				</ul>
				<div id="tabs-1">
					<table class="form">
						<?php echo $this->Form->create('Companyprofile'); ?>
						<tr>
							<td>Company Profile</td>
							<td>
								<?php echo $this->Form->input('name', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Address</td>
							<td>
								<?php echo $this->Form->input('address', array('label' => '', 'type' => 'textarea')); ?>
							</td>
						</tr>
						<tr>
							<td>Land Line</td>
							<td>
								<?php echo $this->Form->input('landline', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Number of Employees</td>
							<td>
								<?php echo $this->Form->input('employees', array('label' => '', 'value' => 0)); ?>
							</td>
						</tr>						
						<tr>
							<td>Type of Business</td>
							<td>
								<?php echo $this->Form->input('natureofbusiness', array('label' => '')); ?>
							</td>
						</tr>						
						<tr>
							<td>Date Established</td>
							<td>
								<input type="date" name="data[Companyprofile][dateestablished]">
								<?php //echo $this->Form->input('dateestablished', array('label' => '', 'type' => 'date')); ?>
							</td>
						</tr>						
						<tr>
							<td>Owner</td>
							<td>
								<?php echo $this->Form->input('owner', array('label' => '')); ?>
							</td>
						</tr>						
						<tr>
							<td>Email</td>
							<td>
								<?php echo $this->Form->input('email', array('label' => '')); ?>
							</td>
						</tr>						
						<tr>
							<td>SSS Number</td>
							<td>
								<?php echo $this->Form->input('SSSNumber', array('label' => '')); ?>
							</td>
						</tr>						
						<tr>
							<td>Pag-ibig Number</td>
							<td>
								<?php echo $this->Form->input('PagibigNumber', array('label' => '')); ?>
							</td>
						</tr>						
						<tr>
							<td>Philhealth Number</td>
							<td>
								<?php echo $this->Form->input('PhilhealthNumber', array('label' => '')); ?>
							</td>
						</tr>					
						<tr>
							<td>Company TIN</td>
							<td>
								<?php echo $this->Form->input('TIN', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
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