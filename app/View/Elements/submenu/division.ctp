
<div class="btngroup">

<?php echo $this->Html->link(__('New Division'), 
	['controller' => 'divisions', 'action' => 'add'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('New Department'), 
	['controller' => 'departments', 'action' => 'add'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>



</div>
<hr />
