
<div class="btngroup">

<?php echo $this->Html->link(__('Manage'), 
	['action' => 'index'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('New Holiday'), 
	['action' => 'add'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('Holidays Types'), 
	['controller' => 'holidaytypes', 'action' => 'index'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>


<?php echo $this->Html->link(__('New Holiday Type'), 
	['controller' => 'holidaytypes', 'action' => 'add'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

</div>
<hr />
