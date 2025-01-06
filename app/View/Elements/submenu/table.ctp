
<div class="btngroup">

<?php echo $this->Html->link(__('Register OT Rate'), 
	['controller' => 'overtimerates', 'action' => 'add'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('OT Rates'), 
	['controller' => 'overtimerates', 'action' => 'index'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('SSS'), 
	['controller' => 'ssscontribs', 'action' => 'index'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('Philhealth'), 
	['controller' => 'philhealths', 'action' => 'index'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('HDMF'), 
	['controller' => 'hdmfcontris', 'action' => 'index'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>


<?php echo $this->Html->link(__('Withholding Tax'), 
	['controller' => 'withholdingtaxes', 'action' => 'index'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>



</div>
<hr />
