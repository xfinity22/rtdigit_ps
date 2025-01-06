<h2>WELCOME TO PAYROLL SYSTEM</h2>
<div style="padding: 0px; height: 70vh; border: 0px solid red; width: 98%; margin-top: -20px;">
<?php
if(!empty($companyprofile)){
	echo '<table width="98%" cellpadding="0" cellspacing="0" border="0" style="margin-top: 0px;">';
		echo '<tr>';
			echo '<td style="align: center;" valign="top">';
				echo '&nbsp;';
				echo '<table width="98%" cellpadding="0" cellspacing="0" border="0" class="profile" style="margin-top: 0px;">';
					echo '<tr>';
						echo '<td style="align: center;" valign="top">';
							echo '<div class="actions" style="background-color: none; margin-top: 10px;">';
								echo $this->Html->link(__('Update Company Profile'), array('action' => 'edit', $companyprofile['Companyprofile']['id'], 1));
								//echo '&nbsp;&nbsp;';
								//echo $this->Html->link(__('Upload Logo'), array('action' => 'edit', $companyprofile['Companyprofile']['id'], 2));
							echo '</div>';
						echo '</td>';
					echo '</tr>';
				echo '</table>';	
			echo '</td>';
		echo '</tr>';
	echo '</table>'; ?>
	<div class="logo nodisplay" style="margin-top: -30px; border: 0px solid black; height: 100%; width: 100%">
	<?php

		$profilec = $this->requestAction('companyprofiles/findprofile/');
		$file_location = APP.'webroot/img/'.DS . $profilec['Companyprofile']['logo'];
			if(file_exists($file_location) && $profilec['Companyprofile']['logo'] != NULL){
				echo '<center>';
					echo $this->Html->image($profilec['Companyprofile']['logo'], array('height' =>'100%'));
				echo '</center>';
			}else{
				echo '<center>';
					echo $this->Html->image('nologo.jpg', array('height' =>'100%'));
				echo '</center>';
			}
	}else{
		echo '<div class="actions" style="background-color: none; margin-top: 10px;">';
			echo $this->Html->link(__('Update Company Profile'), array('action' => 'add'));
		echo '</div>';
	}
	?>
	</div>

</div>