
<?php 
		$loguser = $this->requestAction('users/loggeduser');
		

?>
<div class="btngroup">

<?php echo $this->Html->link(__('Manage'), 
	['controller' => 'payrollperiods', 'action' => 'index'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('Create Payroll Period'), 
	['controller' => 'payrollperiods', 'action' => 'add'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('Process Payroll'), 
	['controller' => 'periodincludes', 'action' => 'index'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('Finalize / View'), 
	['controller' => 'divisions', 'action' => 'index2', $loguser['User']['payrollperiod']], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('Special'), 
	['controller' => 'payrollperiods', 'action' => 'add2', $loguser['User']['payrollperiod']], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>




</div>
<hr />
