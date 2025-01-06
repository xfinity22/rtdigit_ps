<?php echo $this->element('page_back', ['controller' => 'branches', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'Update Branch']); ?>
<hr />
					<table class="form">
						<?php echo $this->Form->create('Branch'); ?>
						<tr>
							<td>Name</td>
							<td>
								<?php echo $this->Form->input('id', array('label' => '')); ?>
								<?php echo $this->Form->input('name', array('label' => '')); ?>
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