<?php echo $this->element('page_back', ['controller' => 'companyprofiles', 'action' => 'view']); ?>
<?php echo $this->element('page_title', ['title' => 'Update Complay Profile']); ?>
<hr />
<?php
if($action == 1){ ?>
	<table width="70%">
		<tr>
			<td>
				<div id="tabs" style="font-size: 12px;">
					
					<div id="tabs-1">
						<table class="form">
							<?php echo $this->Form->create('Companyprofile'); ?>
							<tr>
								<td>Company Profile</td>
								<td>
									<?php echo $this->Form->input('id', array('label' => ''	, 'type' => 'hidden')); ?>
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
									<?php echo '<input type="date" name="data[Companyprofile][dateestablished]" value="' . $c['Companyprofile']['dateestablished'] .'">'; ?>
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
									<?php echo $this->Form->input('SSSNumber', array('label' => '', 'type' => 'number')); ?>
								</td>
							</tr>						
							<tr>
								<td>Pag-ibig Number</td>
								<td>
									<?php echo $this->Form->input('PagibigNumber', array('label' => '', 'type' => 'number')); ?>
								</td>
							</tr>						
							<tr>
								<td>Philhealth Number</td>
								<td>
									<?php echo $this->Form->input('PhilhealthNumber', array('label' => '', 'type' => 'number')); ?>
								</td>
							</tr>					
							<tr>
								<td>Company TIN</td>
								<td>
									<?php echo $this->Form->input('TIN', array('label' => '', 'type' => 'number')); ?>
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


<?php
}else{ ?>
	<table width="70%">
		<tr>
			<td>
				<div id="tabs" style="font-size: 12px;">
					<ul>
						<li><a href="#tabs-1">Upload Company Logo</a></li>
					</ul>
					<div id="tabs-1">
						<table class="form">
							<?php echo $this->Form->create('Companyprofile', array('enctype' => 'multipart/form-data', 'onsubmit'=>'return confirm("The file will be uploaded from the selected examination type, Please re-check the filename then confirm by clicking OK");'));
									 ?>
							<tr>
								<td>
									<?php echo $this->Form->input('id', array('label' => ''	, 'type' => 'hidden')); ?>
									<?php echo $this->Form->file('logo', array('label' => '', 'class' => 'normalinputfile', 'id' => 'logo')); ?>
								</td>
							</tr>
							<tr>
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
<?php
} ?>


<script>
  $(function() {
    $( "#tabs" ).tabs();
  });
</script>