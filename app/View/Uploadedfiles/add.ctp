<?php echo $this->element('page_back', ['controller' => 'timelogs', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'Upload Time Logs']); ?>
<hr />

<table>
	<tr>		
		<td>
			<div id="tabs" style="font-size: 12px;">
				
				<div id="tabs-1">
					<table class="form">			
						<tr>
							<td>Filename</td>
							<td>
							<?php
								echo $this->Form->create('Uploadedfile', array('enctype' => 'multipart/form-data', 'onsubmit'=>'return confirm("The file will be uploaded from the selected examination type, Please re-check the filename then confirm by clicking OK");'));
									echo $this->Form->file('filename', array('label' => '', 'class' => 'normalinputfile', 'id' => 'filename'));
							?>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
								<?php echo $this->Form->input('dateuploaded', array('label' => '', 'type' => 'hidden')); ?>
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
		
