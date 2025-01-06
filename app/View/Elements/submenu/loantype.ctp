
<div class="btngroup">

<?php echo $this->Html->link(__('Manage Loan Types'), 
	['controller' => 'loantypes', 'action' => 'index'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('New Loan Type'), 
	['controller' => 'loantypes', 'action' => 'add'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('Active Loans'), 
	['controller' => 'loanentries', 'action' => 'index'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('New Loan'), 
	['controller' => 'loanentries', 'action' => 'add'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('Inactive / Paid Loans'), 
	['controller' => 'loanentries', 'action' => 'inactiveloans'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>


</div>
<hr />
