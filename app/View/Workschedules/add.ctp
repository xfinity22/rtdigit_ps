<?php echo $this->element('page_back', ['controller' => 'workschedules', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'Register Work Schedule']); ?>
<hr />

<table width="70%">
	<tr>
		
		
		<td>
			<div id="tabs" style="font-size: 12px;">
				
				<div id="tabs-1">
					<table class="form">
						<?php echo $this->Form->create('Workschedule'); ?>
						<tr>
							<td>Description</td>
							<td>
								<?php echo $this->Form->input('description', array('label' => '', 'type' => 'textarea')); ?>
							</td>
						</tr>
						<tr>
							<td>Time In</td>
							<td>
								<?php echo $this->Form->input('timein', array('label' => '', 'type' => 'time')); ?>
							</td>
						</tr>
						<tr>
							<td>Time Out</td>
							<td>
								<?php echo $this->Form->input('timeout', array('label' => '', 'type' => 'time')); ?>
							</td>
						</tr>
						<tr>
							<td>Minimum Work Hours</td>
							<td>
								<?php echo $this->Form->input('minimumworkhours', array('label' => '')); ?>
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