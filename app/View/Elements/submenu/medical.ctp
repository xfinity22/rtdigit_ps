
<div class="btngroup">

<?php echo $this->Html->link(__('Manage'), 
	['controller' => 'medhospitals', 'action' => 'index'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('Register New Hospital'), 
	['controller' => 'medhospitals', 'action' => 'add'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('HMO Providers'), 
	['controller' => 'medproviders', 'action' => 'index'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('Register HMO Provider'), 
	['controller' => 'medproviders', 'action' => 'add'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>



</div>
<hr />
