
<div class="btngroup">

<?php echo $this->Html->link(__('Manage'), 
	['controller' => 'branches', 'action' => 'index'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('Register New Branch'), 
	['controller' => 'branches', 'action' => 'add'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>



</div>
<hr />
