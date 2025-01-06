
<?php echo $this->element('page_back', ['controller' => 'loantypes', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'Employees Loan']); ?>
<hr />

<?php
echo '<table class="table table-condensed default_table">';
	echo '<thead>';
		echo '<tr>';
			
			echo $this->Form->create('Loanentry');
			if(empty($id)){
				echo '<td>'.$this->Form->input('employee_id', array('label' => '')).'</td>';	
			}else{
				echo '<td>'.$this->Form->input('employee_id', array('label' => '', 'value' => $id)).'</td>';
			}
			
			echo '<td >'.$this->Form->end('Sort').'</td>';
		echo '<tr>';
	echo '</thead>';
echo '</table>';
foreach ($liste as $employee):
	
		
	$loanentries = $this->requestAction(array('controller' => 'loanentries', 'action' => 'searchloan'), array($employee['Employee']['id'], 1));
	if(!empty($loanentries)){
		echo '<table class="table table-condensed default_table">';
			echo '<thead>';
			echo '<tr>';
				echo '<th colspan="11">' . strtoupper($employee['Employee']['lastname'] . ', ' . $employee['Employee']['firstname'] . ' ' . $employee['Employee']['middlename']) . '</th>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<th></th>';
				echo '<th style="width: 10%">STATUS</th>';
				echo '<th style="width: 20%">Loan Type</th>';
				echo '<th>Type</th>';
				echo '<th>Loan Date</th>';
				echo '<th>Amount</th>';
				echo '<th>Deduction</th>';
				echo '<th>Deduction Type</th>';
				echo '<th>Remaining Balance</th>';
				echo '<th>Start of Deduction</th>';
				echo '<th class="actions">Actions</th>';
			echo '</tr>';
			
			$options = array("Paid", "Not Yet paid", "Inactive");
			$count = 0;
			foreach ($loanentries as $loanentry):
				$types=array(NULL => '', 	0 => 'Calamity', 1 => 'Salary');
				
				$count++;
				echo '<tr>';
					echo '<td>' . $count . '</td>';
					echo '<td>' . $options[$loanentry['Loanentry']['status']] . '</td>';
					echo '<td>';
						echo $this->Html->link($loanentry['Loantype']['name'], array('controller' => 'loantypes', 'action' => 'edit', $loanentry['Loantype']['id']));
					echo '</td>';
					echo '<td>';
						echo $types[$loanentry['Loanentry']['nextinstallment']];
					echo '</td>';
					
					// echo '<td>';
						// echo $this->Html->link($loanentry['Employee']['firstname'] . ' ' . $loanentry['Employee']['lastname'], array('controller' => 'employees', 'action' => 'view', $loanentry['Employee']['id']));
					// echo '</td>';
					echo '<td>' . $loanentry['Loanentry']['loandate'] . '</td>';
					echo '<td>' . number_format($loanentry['Loanentry']['amount'],2) . '</td>';
					echo '<td>' . $loanentry['Loanentry']['deductionperpayday']. '</td>';
					echo '<td>';
						if ($loanentry['Loanentry']['deductiontype'] == 0){
							echo 'First Half';
						}else if ($loanentry['Loanentry']['deductiontype'] == 1){
							echo 'Second Half';
						}else if ($loanentry['Loanentry']['deductiontype'] == 2){
							echo 'Every Payday';
						}
					
					echo '</td>';
					echo '<td>' . number_format($loanentry['Loanentry']['balance'],2). '</td>';
					echo '<td>' . $loanentry['Loanentry']['startdeduction']. '</td>';
					
					
					echo '<td class="actions">';
						echo $this->Html->link(__('Payment'), array('action' => 'view', $loanentry['Loanentry']['id']));
						echo '&nbsp;';
						echo $this->Html->link(__('Update'), array('action' => 'edit', $loanentry['Loanentry']['id'], $loanentry['Loanentry']['employee_id']));
						echo '&nbsp;';

						if($loanentry['Loanentry']['employee_id'] != 0){
							echo $this->Form->postLink(__('Delete'), array('action' => 'delete2', $loanentry['Loanentry']['id'], $loanentry['Loanentry']['employee_id']), array(), __('Are you sure you want to delete # %s?', $loanentry['Loanentry']['id']));
						}
						
					echo '</td>';
				echo '</tr>';
			endforeach;
			echo '<tr>';
				echo '<th colspan="11" class="actions">';
					echo $this->Html->link(__('VIEW ALL'), array('action' => 'loanreport', $employee['Employee']['id'], 1));
					echo '&nbsp;';
					echo $this->Html->link('PRINT ALL', array('action' => 'printloan', 'ext' => 'pdf', $loanentry['Loanentry']['employee_id']), array('target' => '_blank'));
					echo '&nbsp;';
					echo $this->Html->link('ADD LOAN', array('action' => 'add', $loanentry['Loanentry']['employee_id']));
				echo '</th>';
			echo '</tr>';
		echo '</table>';
		echo '<br/>';
		
		
	}
	
endforeach;

?>
