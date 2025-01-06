<div class="inside">
<div class="login-content">
	<div class="login-inner-content">		
		<div style="text-align: left; color: #fff; margin: -15px 0 10px 0;"><?php echo __('Today &raquo; ').' '.date('l F d, Y'); ?></div>
		<?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login'))); ?>		
		<div class="div-separator-2"><?php echo __('Username'); ?></div>
		<div class="div-separator-2">
			<?php echo $this->Form->input('username', array('class' => 'normalinputfield', 'label' => '')); ?>
		</div>
		<div class="div-separator-2"><?php echo __('Password'); ?></div>
		<div class="div-separator-2">
			<?php echo $this->Form->input('password', array('class' => 'normalinputfield', 'label' => '')); ?>
		</div>
		<div class="div-separator">
			<?php echo $this->Form->submit('LOGIN', array('class' => 'subtn', 'title' => 'Login Account')); ?>
			<?php echo $this->Form->button('CANCEL', array('type' => 'reset', 'class' => 'subtn', 'title' => 'Cancel Login')); ?>
		</div>		
	</div>
</div>
</div>