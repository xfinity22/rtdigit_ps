<h2>CONTRIBUTION REMINDER<h2/>
<table width="100%" style="margin-top: -40px;">
<?php
	$loguser = $this->requestAction('users/loggeduser');
	if(!empty($employees)){
?>
	<tr>
		<td colspan="10">
			<div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('Prev'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
			</div>
		</td>
	</tr>
	<tr>		
		<td valign="top">
			<div class="contentindex">
				<table class="bordered">
					 <thead>
					 <tr>
						<th></th>
						<th>Employee No</th>
						<th>Full Name</th>
						<th>Date Hired</th>
						<th>Cluster</th>
						<th>Department</th>
						<th>Job Title</th>
						
						<th>Actions</th>
					 </tr>
					 </thead>
		<?php 
			$count = 1;
		
			foreach ($employees as $employee): 
					echo '<tr>';
						echo '<td>' . $count . '</td>';
						echo '<td>' . $employee['Employee']['employeeno'] . '</td>';
						echo '<td><b>' . strtoupper($employee['Employee']['fullname']) . '</b></td>';
						echo '<td>' . date('F j, Y', strtotime($employee['Employee']['datehired'])) . '</td>';
						echo '<td>' . $employee['Division']['name'] . '</td>';
						echo '<td>' . $employee['Department']['name'] . '</td>';
						echo '<td>' . $employee['Jobtitle']['name'] . '</td>';
							echo '<td class="actions">';
							echo $this->Html->link(__('View'), array('action' => 'edit', $employee['Employee']['id']));
							echo '&nbsp;';
							
							
							echo $this->Html->link(__('OKAY'), array('controller' => 'employees', 'action' => 'changestatus', $employee['Employee']['id']));
							echo '&nbsp;';
							//echo $this->Html->link(__('Leaves'), array('controller' => 'leaves', 'action' => 'view', $employee['Employee']['id']));
							//echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $employee['Employee']['id']), array(), __('Are you sure you want to delete # %s?', $employee['Employee']['id']));
						echo '</td>';
					echo '</tr>';
				$count++;
			  endforeach;
					
			?>
				</table>
			</div>
		</td>
	</tr>
	
	
<?php
	}else{
		echo '<br/><br/>Empty';
	} ?>
</table>