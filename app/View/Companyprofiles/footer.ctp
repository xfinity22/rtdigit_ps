<br/>

	<table width="70%">
		<tr>
			<td>
				<div id="tabs" style="font-size: 12px;">
					<ul>
						<li><a href="#tabs-1">COE Footer</a></li>
					</ul>
					<div id="tabs-1">
						<table class="form">
							<?php echo $this->Form->create('Companyprofile'); ?>
							<tr>
								<td>COE Footer</td>
								<td>
									<?php echo $this->Form->input('id', array('label' => ''	, 'type' => 'hidden')); ?>
									<?php echo $this->Form->input('coefooter', array('label' => '', 'type' => 'textarea')); ?>
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
  
  tinymce.init({
				selector	:	'textarea',
				width		: 	'1000px',
				height		: 	'150px'
			});	
</script>