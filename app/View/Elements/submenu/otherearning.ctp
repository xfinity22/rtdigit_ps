
<div class="btngroup">

<?php echo $this->Html->link(__('Manage'), 
	['controller' => 'otherearnings', 'action' => 'index'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('New Other Earnings Type'), 
	['controller' => 'otherearnings', 'action' => 'add'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>

<?php echo $this->Html->link(__('List of Employees with Other Earnings Entries'), 
	['controller' => 'otherearningsentries', 'action' => 'index'], 
	['escape' => false, 'class' => 'text-black nounderline']);
?>






</div>
<hr />
