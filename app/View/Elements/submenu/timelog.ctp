
<div class="btngroup">

<?php echo $this->Html->link(__('Time Logs'), 
	['controller' => 'timelogs', 'action' => 'index'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('Upload'), 
	['controller' => 'uploadedfiles', 'action' => 'add'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('Back Up'), 
	['controller' => 'employees', 'action' => 'db_mysql_dump'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<a href="http://localhost/phpmyadmin/db_import.php?db=payroll&token=1a060e45de54b9206326d4ef0e9a40a7" class="text-black nounderline" target="_blank">Restore</a>


<?php echo $this->Html->link(__('Upload Existing Employees'), 
	['controller' => 'uploadedfiles', 'action' => 'add2'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('Contributions'), 
	['controller' => 'employees', 'action' => 'index'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('Upload SSS'), 
	['controller' => 'uploadedfiles', 'action' => 'add2', 'sss'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('Upload Philhealth'), 
	['controller' => 'uploadedfiles', 'action' => 'uploadtable', 'philhealth'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('Set Default COE Footer'), 
	['controller' => 'companyprofiles', 'action' => 'add', 1], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>




</div>
<hr />
