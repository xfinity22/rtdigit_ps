
<div class="btngroup">

<?php echo $this->Html->link(__('Register'), 
	['controller' => 'employees', 'action' => 'add'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('Print'), 
	['controller' => 'employees', 'action' => 'listdept'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('SSS EPF'), 
	['controller' => 'employees', 'action' => 'sssepf'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>


</div>
<hr />
