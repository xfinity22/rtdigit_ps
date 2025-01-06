<?php echo $this->element('page_back', ['controller' => 'divisions', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'Update Department']); ?>
<hr />
<table width="70%">
	<tr>
	
		<td>
			<div id="tabs" style="font-size: 12px;">
				
				<div id="tabs-1">
					<table class="form">
						<?php echo $this->Form->create('Department'); ?>
						<tr>
							<td>Name</td>
							<td>
								<?php echo $this->Form->input('id'); ?>
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
		


