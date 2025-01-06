
<?php echo $this->element('page_title', ['title' => 'Payroll Periods']); ?>
<?php echo $this->element('submenu/payroll'); ?>



			<div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('Prev'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
			</div>
		
				<table class="table table-condensed default_table">
					 <thead>
					 <tr>
		
		
		<td valign="top">
			<div class="contentindex">
				<table class="table table-condensed default_table">
					 <thead>
					 <tr>
						
						
						<th width="80px" style="padding: 20px;"></th>
						<th><?php echo $this->Paginator->sort('code'); ?></th>
						<th><?php echo $this->Paginator->sort('period'); ?></th>
						
						<th>Working Days</th>
						<th><?php echo $this->Paginator->sort('withholdingtax'); ?></th>
						<th><?php echo $this->Paginator->sort('sss'); ?></th>
						<th><?php echo $this->Paginator->sort('philhealth'); ?></th>
						<th><?php echo $this->Paginator->sort('pagibig'); ?></th>
						<th><?php echo $this->Paginator->sort('classification_id'); ?></th>
						<th>Actions</th>
					 </tr>
					 </thead>
					 
		<?php 
			$loguser = $this->requestAction('users/loggeduser');
			$count = 1;
			foreach ($payrollperiods as $payrollperiod): 
					echo '<tr>';
						//echo '<td>' . $count . '</td>';
						echo '<td class="actions">';
							if($loguser['User']['payrollperiod'] == $payrollperiod['Payrollperiod']['id']){
								echo '<ul><li class="selected">';
									echo $this->Html->link(__('Default'), array('controller' => 'users', 'action' => 'changestatus', $payrollperiod['Payrollperiod']['id']));
								echo '</li></ul>';
							}else{
									echo $this->Html->link(__('Set As Default'), array('controller' => 'users', 'action' => 'changestatus', $payrollperiod['Payrollperiod']['id']));
								
							}						
						echo '</td>';
						/*
						echo '<td class="actions">';
							if($loguser['User']['payrollperiod'] == $payrollperiod['Payrollperiod']['id']){
								echo '<ul><li class="selected">';
									echo $this->Html->link(__('Process Payroll'), array('controller' => 'divisions', 'action' => 'index2', $payrollperiod['Payrollperiod']['id']));
								echo '</li></ul>';
							}else{
								
							}						
						echo '</td>';
						*/
						echo '<td>' . $payrollperiod['Payrollperiod']['code'] . '</td>';
						echo '<td>' . $payrollperiod['Payrollperiod']['period'] . '</td>';
						/*echo '<td>';
							if(!empty($payrollperiod['Payrollperiod']['preriodfrom'])){
								$from = date('F j, Y', strtotime($payrollperiod['Payrollperiod']['preriodfrom']));
							}else{
								$from = '';
							}
							
							if(!empty($payrollperiod['Payrollperiod']['periodto'])){
								$to = date('F j, Y', strtotime($payrollperiod['Payrollperiod']['periodto']));
							}else{
								$to = '';
							}
							
							echo $from . ' - ' . $to;
						echo '</td>'; */
						echo '<td>' . $payrollperiod['Payrollperiod']['dayswork'] . '</td>';
						echo '<td>';
							if($payrollperiod['Payrollperiod']['withholdingtax'] == 0){
								echo 'YES';
							}else{
								echo 'NO';
							}
						echo '</td>';
						echo '<td>';
							if($payrollperiod['Payrollperiod']['sss'] == 0){
								echo 'YES';
							}else{
								echo 'NO';
							}
						echo '</td>';
						echo '<td>';
							if($payrollperiod['Payrollperiod']['philhealth'] == 0){
								echo 'YES';
							}else{
								echo 'NO';
							}
						echo '</td>';
						echo '<td>';
							if($payrollperiod['Payrollperiod']['pagibig'] == 0){
								echo 'YES';
							}else{
								echo 'NO';
							}
						echo '<td>' . $payrollperiod['Classification']['name'] . '</td>';
						echo '<td class="actions" width="10%">';
							//echo $this->Html->link(__('View'), array('action' => 'view', $payrollperiod['Payrollperiod']['id']));
							//echo '&nbsp;';
							
							echo '&nbsp;';
							if($payrollperiod['Payrollperiod']['locked'] == 0){
								echo $this->Html->link(__('Add_Names'), array('controller' => 'periodincludes', 'action' => 'add', $payrollperiod['Payrollperiod']['id']));
								echo '&nbsp;';
								echo $this->Html->link(__('Update'), array('action' => 'edit', $payrollperiod['Payrollperiod']['id']));
								echo '&nbsp;';
								echo $this->Html->link(__('Lock'), array('action' => 'changestatus', $payrollperiod['Payrollperiod']['id'], 1));	
							}else{
								if ($loguser['User']['usertype_id'] == 1){
									echo $this->Html->link(__('Unlock'), array('action' => 'changestatus', $payrollperiod['Payrollperiod']['id'], 0));	
								}
							
							}
							
							
							echo '&nbsp;';
							echo $this->Html->link(__('PrintPayslip'), array('controller' => 'divisions', 'action' => 'index2', $payrollperiod['Payrollperiod']['id']));
							//echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $payrollperiod['Payrollperiod']['id']), array(), __('Are you sure you want to delete # %s?', $payrollperiod['Payrollperiod']['id']));
						echo '</td>';
					echo '</tr>';
				$count++;
			  endforeach		
		?>
				</table>
			</div>
		</td>
	</tr>
				</table>
				<div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('Prev'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
			</div>


