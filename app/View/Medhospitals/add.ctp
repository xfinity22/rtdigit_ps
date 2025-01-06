<?php echo $this->element('page_back', ['controller' => 'medhospitals', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'Register New Hospital']); ?>
<hr />
					<table class="form">
						<?php echo $this->Form->create('Medhospital'); ?>
						<tr>
							<td>Name</td>
							<td>
								<?php echo $this->Form->input('name', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Medical Provider</td>
							<td>
								<?php echo $this->Form->input('medprovider_id', array('label' => '', 'class' => 'select-style')); ?>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<?php echo $this->Form->end(__('Submit')); ?>
							</td>
						</tr>
					</table>
				




<script>
  $(function() {
    $( "#tabs" ).tabs();
  });
</script>