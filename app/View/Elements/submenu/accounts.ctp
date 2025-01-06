
<div class="btngroup">

<?php echo $this->Html->link(__('Register'), 
	['controller' => 'users', 'action' => 'add'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('Manage'), 
	['controller' => 'users', 'action' => 'index'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>



</div>
<hr />
