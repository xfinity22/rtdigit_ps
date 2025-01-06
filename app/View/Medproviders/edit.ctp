<?php echo $this->element('page_back', ['controller' => 'medhospitals', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'Update Medical Provider']); ?>
<hr />

					<table class="form">
						<?php echo $this->Form->create('Medprovider'); ?>
						<tr>
							<td>Name</td>
							<td>
								<?php echo $this->Form->input('id', array('label' => '')); ?>
								<?php echo $this->Form->input('name', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Amount</td>
							<td>
								<?php echo $this->Form->input('amount', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<?php echo $this->Form->end(__('Save Changes')); ?>
							</td>
						</tr>
					</table>
				



<script>
  $(function() {
    $( "#tabs" ).tabs();
  });
</script>