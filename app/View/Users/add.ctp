<?php echo $this->element('page_back', ['controller' => 'users', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'Register Account']); ?>
<hr />

<table width="70%">
	<tr>
		
		<td>
			<div id="tabs" style="font-size: 12px;">
				
				<div id="tabs-1">
					<table class="form">
						<?php echo $this->Form->create('User'); ?>
						<tr>
							<td width="10%">Username</td>
							<td>
								<?php echo $this->Form->input('username', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Password</td>
							<td>
								<?php echo $this->Form->input('password', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Status</td>
							<td>
								<?php echo $this->Form->input('userstatus_id', array('label' => '', 'class' => 'select-style')); ?>
							</td>
						</tr>
						<tr>
							<td>User Type</td>
							<td>
								<?php echo $this->Form->input('usertype_id', array('label' => '', 'class' => 'select-style')); ?>
							</td>
						</tr>
						<tr>
							<td>First Name</td>
							<td>
								<?php echo $this->Form->input('firstname', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Last Name</td>
							<td>
								<?php echo $this->Form->input('lastname', array('label' => '')); ?>
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