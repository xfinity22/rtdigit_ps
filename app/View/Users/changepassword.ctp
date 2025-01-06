<?php 
	echo $this->Form->create('Changepassword');
	echo '<fieldset>';
		echo '<legend>'.__('Change Password').'</legend>';
		echo '<div class="inside-form">';
			echo '<div class="form-label">'.__('Current Password').'</div>';
			echo $this->Form->input('current', array('label' => '', 'class' => 'normalinput', 'type' => 'password'));
			echo '<div class="form-label">'.__('New Password').'</div>';
			echo $this->Form->input('newpassword', array('label' => '', 'class' => 'normalinput', 'type' => 'password'));
			echo '<div class="form-label">'.__('Confirm Password').'</div>';
			echo $this->Form->input('confirmnew', array('label' => '', 'class' => 'normalinput', 'type' => 'password'));
			echo $this->Form->submit('Change Password', array('class' => 'normalbtn', 'title' => 'Submit all information'));
			echo $this->Form->button('Reset', array('type' => 'reset', 'class' => 'normalbtn', 'title' => 'Cancel and reset all fields'));
			echo '<div class="clear"></div>';
		echo '</div>';
	echo '</fieldset>';
?>