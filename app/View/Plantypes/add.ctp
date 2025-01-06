<br/>
<table width="70%">
	<tr>
		<td width="50px" valign="top">
			<div class="actions">
				<ul>
					<li><?php echo $this->Html->link(__('List All'), array('action' => 'index')); ?></li>
				</ul>
			</div>
		</td>
		
		<td>
			<div id="tabs" style="font-size: 12px;">
				<ul>
					<li><a href="#tabs-1">New Medical Provider</a></li>
				</ul>
				<div id="tabs-1">
					<table class="form">
						<?php echo $this->Form->create('Plantype'); ?>
						<tr>
							<td>Description</td>
							<td>
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