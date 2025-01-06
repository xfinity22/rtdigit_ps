<table width="70%">
		<tr>
			<td>
				<div id="tabs" style="font-size: 12px;">
					<ul>
						<li><a href="#tabs-1">Upload Picture</a></li>
					</ul>
					<div id="tabs-1">
						<table class="form">
							<?php echo $this->Form->create('Employee', array('enctype' => 'multipart/form-data', 'onsubmit'=>'return confirm("The file will be uploaded from the selected examination type, Please re-check the filename then confirm by clicking OK");'));
									 ?>
							<tr>
								<td>
									<?php echo $this->Form->input('id', array('label' => ''	, 'type' => 'hidden')); ?>
									<?php echo $this->Form->file('logo', array('label' => '', 'class' => 'normalinputfile', 'id' => 'logo')); ?>
								</td>
							</tr>
							<tr>
								<td>
									<?php echo $this->Form->button('SAVE', array('name' => 'savedata'))); ?>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</td>
		</tr>
	</table>