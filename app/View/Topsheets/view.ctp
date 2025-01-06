<?php ?>
<h2>TOP SHEET</h2>
<div class="employeename"style="width: 97%">
	<table width="100%" cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td width="10%">
			<?php
				$file_location = APP.'webroot/img/employees/'.DS . $employ['Employee']['picture'];
				if(file_exists($file_location) && $employ['Employee']['picture'] != NULL){
					echo $this->Html->image("employees/" . $employ['Employee']['picture'], array('width' => '100%', 'height' =>'150px'));
				}else{
					echo $this->Html->image('default.png', array('width' => '100%'));
				}
			?>
			
			</td>
			<td width="80%" style="font-size: 17px; font-weight: bold;" valign="top" >
			<?php
				echo strtoupper($employ['Employee']['firstname'] . ' ' . $employ['Employee']['lastname']);
				echo '<br/>Division: ' . strtoupper($employ['Division']['name']);
				echo '<br/>Department: ' . strtoupper($employ['Department']['name']);
				
				
				$branch = $this->requestAction('branches/getbranch/'. $employ['Employee']['branch_id']);
				if(!empty($branch)){
					$b = strtoupper($branch['Branch']['name']);
				}else{
					$b = '';
				}
				echo '<br/>Branch: ' . $b;
				
				echo '<br/><br/>';
				echo '<div class="actions">';
					echo $this->Html->link(__('<< Employee Details'), array('controller' => 'employees', 'action' => 'edit', $employ['Employee']['id']));
					echo '&nbsp;';
					echo $this->Html->link(__('PRINT'), array( 'action' => 'view', 'ext' => 'pdf', $employ['Employee']['id']), array('target' => '_blank'));
				echo '</div>';
			?>
			</td>
			
		</tr>
	</table>
</div>
<br/>

<?php
echo '<br/><h3> COMPENSATION </H3>';

$topsheets = $this->requestAction(array('action' => 'search'), array($employ['Employee']['id'], 1));
echo '<table width="97%" cellpadding="0" cellspacing="0" class="bordered">';
	echo '<tr>';
		echo '<th>DATE</th>';
		echo '<th>BASIC</th>';
		echo '<th>PAF</th>';
		echo '<th>REASON FOR ADJUSTMENT</th>';
		echo '<th>TOTAL SALARY</th>';
		echo '<th>ACTION</th>';
	echo '</tr>';
	
foreach ($topsheets as $topsheet):
	echo '<tr>';
		echo '<td>' . $topsheet['Topsheet']['compdate'] . '</td>';
		echo '<td>' . $topsheet['Topsheet']['basic'] . '</td>';
		echo '<td>' . $topsheet['Topsheet']['paf'] . '</td>';
		echo '<td>' . $topsheet['Topsheet']['reasonadjustment'] . '</td>';
		echo '<td>' . $topsheet['Topsheet']['totalsalary'] . '</td>';
		echo '<td class="actions">';
			echo $this->Html->link(__('Update'), array('action' => 'edit', $topsheet['Topsheet']['id'], 1, $employ['Employee']['id']));
			echo '&nbsp;';
			echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $topsheet['Topsheet']['id'], $employ['Employee']['id']), array(), __('Are you sure you want to delete # %s?', $topsheet['Topsheet']['id']));
		echo '</td>';
	echo '</tr>';
endforeach;
	echo '<tr>';
		echo '<td colspan="6" class="actions">';
			echo $this->Html->link(__('Add Entry'), array('action' => 'add', $employ['Employee']['id'], 1));
		echo '</td>';
	echo '</tr>';
echo '</table>';


//awards
echo '<br/><br/>';
echo '<h3> AWARD AND RECOGNITION / PROMOTION </H3>';
$topsheets = $this->requestAction(array('action' => 'search'), array($employ['Employee']['id'], 2));
echo '<table width="97%" cellpadding="0" cellspacing="0" class="bordered">';
	echo '<tr>';
		echo '<th style="width: 30%">DATE</th>';
		echo '<th style="width: 50%">AWARD / PROMOTION</th>';
		echo '<th>ACTIONS</th>';
	echo '</tr>';
	
foreach ($topsheets as $topsheet):
	echo '<tr>';
		echo '<td>' . $topsheet['Topsheet']['promotiondate'] . '</td>';
		echo '<td>' . $topsheet['Topsheet']['award'] . '</td>';
		echo '<td class="actions">';
			echo $this->Html->link(__('Update'), array('action' => 'edit', $topsheet['Topsheet']['id'], 2, $employ['Employee']['id']));
			echo '&nbsp;';
			echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $topsheet['Topsheet']['id'], $employ['Employee']['id']), array(), __('Are you sure you want to delete # %s?', $topsheet['Topsheet']['id']));
		echo '</td>';
	echo '</tr>';
endforeach;
	echo '<tr>';
		echo '<td colspan="3" class="actions">';
			echo $this->Html->link(__('Add Entry'), array('action' => 'add', $employ['Employee']['id'], 2));
		echo '</td>';
	echo '</tr>';
echo '</table>';


//MEMOS
echo '<br/><br/>';
echo '<h3> MEMOS </H3>';
$topsheets = $this->requestAction(array('action' => 'search'), array($employ['Employee']['id'], 3));
echo '<table width="97%" cellpadding="0" cellspacing="0" class="bordered">';
	echo '<tr>';
		echo '<th style="width: 30%">DATE</th>';
		echo '<th style="width: 50%">MEMO</th>';
		echo '<th>ACTIONS</th>';
	echo '</tr>';
	
foreach ($topsheets as $topsheet):
	echo '<tr>';
		echo '<td>' . $topsheet['Topsheet']['memodate'] . '</td>';
		echo '<td>' . $topsheet['Topsheet']['memo'] . '</td>';
		echo '<td class="actions">';
			echo $this->Html->link(__('Update'), array('action' => 'edit', $topsheet['Topsheet']['id'], 3, $employ['Employee']['id']));
			echo '&nbsp;';
			echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $topsheet['Topsheet']['id'], $employ['Employee']['id']), array(), __('Are you sure you want to delete # %s?', $topsheet['Topsheet']['id']));
		echo '</td>';
	echo '</tr>';
endforeach;
	echo '<tr>';
		echo '<td colspan="3" class="actions">';
			echo $this->Html->link(__('Add Entry'), array('action' => 'add', $employ['Employee']['id'], 3));
		echo '</td>';
	echo '</tr>';
echo '</table>';


//OTHERS
echo '<br/><br/>';
echo '<h3> OTHERS </H3>';
$topsheets = $this->requestAction(array('action' => 'search'), array($employ['Employee']['id'], 4));
echo '<table width="97%" cellpadding="0" cellspacing="0" class="bordered">';	echo '<tr>';
		echo '<th style="width: 30%">LABEL</th>';
		echo '<th style="width: 50%">DESCRIPTION</th>';
		echo '<th>ACTIONS</th>';
	echo '</tr>';
	
foreach ($topsheets as $topsheet):
	echo '<tr>';
		echo '<td>' . $topsheet['Topsheet']['others1'] . '</td>';
		echo '<td>' . $topsheet['Topsheet']['others2'] . '</td>';
		echo '<td class="actions">';
			echo $this->Html->link(__('Update'), array('action' => 'edit', $topsheet['Topsheet']['id'], 4, $employ['Employee']['id']));
			echo '&nbsp;';
			echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $topsheet['Topsheet']['id'], $employ['Employee']['id']), array(), __('Are you sure you want to delete # %s?', $topsheet['Topsheet']['id']));
		echo '</td>';
	echo '</tr>';
endforeach;
	echo '<tr>';
		echo '<td colspan="3" class="actions">';
			echo $this->Html->link(__('Add Entry'), array('action' => 'add', $employ['Employee']['id'], 4));
		echo '</td>';
	echo '</tr>';
echo '</table>';



?>