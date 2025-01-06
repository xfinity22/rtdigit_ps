<h2><?php echo 'TIMELOGS FOR ' . strtoupper(date('F', strtotime($month))); ?></h2>
<div class="searchdiv" style="width: 70%; ">
	<table width = "100%" class="bordered">
		<thead>
			<th colspan="3">SEARCH TIMELOGS</th>
		</thead>
	
		<tr>
			<td width="20%px"><?php
				echo $this->Form->create('Timelog', array('controller' => 'timelogs', 'action' => 'search', 'class' => 'form'));
					echo 'SELECT EMPLOYEE';
			echo '</td>';
		
			echo '<td class="form">';
				echo '<select name="data[Timelog][employee]" class="select-style" required>';
						echo '<option></option>';
						foreach($employees as $e):
							echo '<option value="' . $e['Employee']['id'] . '">' . $e['Employee']['firstname'] . ' ' . $e['Employee']['lastname'] . '</option>';
						endforeach;
					echo '</select>';
			echo '</td>';
		echo '</tr>';
		echo '<td width="100px">';
					echo 'SELECT MONTH AND YEAR';
			echo '</td>';
		
			echo '<td>';
					echo '<select name="data[Timelog][searchmonth]" required>';
						echo '<option value="01">January</option>';	
						echo '<option value="02">February</option>';	
						echo '<option value="03">March</option>';	
						echo '<option value="04">April</option>';	
						echo '<option value="05">May</option>';	
						echo '<option value="06">June</option>';	
						echo '<option value="07">July</option>';	
						echo '<option value="08">August</option>';	
						echo '<option value="09">September</option>';	
						echo '<option value="10">October</option>';	
						echo '<option value="11">November</option>';	
						echo '<option value="12">December</option>';	
					echo '</select>';

					echo '&nbsp;<select name="data[Timelog][searchyear]" required>';
						echo '<option></option>';
						for($i = 2016; $i<2030; $i++){
							echo '<option value="' . $i . '">'. $i . '</option>';
						}
						echo '</select>';
			echo '</td>';
		echo '</tr>';
		echo '<tr>';
			echo '<td colspan="3">' . $this->Form->end('Search') . '</td>';
		echo '</tr>';	
			?>
		</tr>
	</table>
	
</div>
<br/>	
	<table cellpadding="0" cellspacing="0" width="90%">
		<tr>
			<td class="actions">
				<?php
				echo $this->Html->link('<< Previous Month', array('action' => 'index', date('Y-m-d', strtotime('-1 month', strtotime($month)))));
				echo '&nbsp;&nbsp;&nbsp;';
				echo $this->Html->link('Next Month >>', array('action' => 'index', date('Y-m-d', strtotime('+1 month',  strtotime($month)))));
				?>
			</td>
		</tr>
	<?php
	if(!empty($timelogs)){
		$emp = 0;
		foreach ($timelogs as $timelog):
		if($emp != $timelog['Timelog']['employee_id']){
			echo '</table><br/><table cellpadding="0" cellspacing="0" class="bordered" width="90%"><tr>';
				echo '<th colspan="11">' . $timelog['Employee']['firstname'] . ' ' . $timelog['Employee']['lastname'] . '</th>';
			echo '</tr>'; ?>
			<thead>
			<tr>
				<th>Work Schedule</th>
				<th>Date</th>
				<th>Time In</th>
				<th>Morning Out</th>
				<th>Afternoon In</th>
				<th>Out</th>
				<th>Late</th>
				<th>Remarks</th>
				<th>Undertime In</th>
				<th>Undertime Out</th>
				
				<th class="actions"><?php echo __('Actions'); ?></th>
			</tr>
			</thead>
			<?php
		}
	?>
	<tbody>
	<tr>
		<td><?php echo $timelog['Workschedule']['description']; ?></td>
		<td><?php echo date('M j, Y', strtotime($timelog['Timelog']['date'])); ?>&nbsp;</td>
		<td><?php echo h($timelog['Timelog']['timein']); ?>&nbsp;</td>
		<td><?php echo h($timelog['Timelog']['otin']); ?>&nbsp;</td>
		<td><?php echo h($timelog['Timelog']['otout']); ?>&nbsp;</td>	
		<td><?php echo h($timelog['Timelog']['timeout']); ?>&nbsp;</td>
		<td><?php echo $timelog['Timelog']['late'] . ' HR' . $timelog['Timelog']['lateminutes'] . ' MIN'; ?>&nbsp;</td>
		<td><?php echo $timelog['Timelog']['remarks']; ?>&nbsp;</td>
		<td><?php echo $timelog['Timelog']['undertimein']; ?>&nbsp;</td>
		<td><?php echo $timelog['Timelog']['undertimeout']; ?>&nbsp;</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $timelog['Timelog']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $timelog['Timelog']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $timelog['Timelog']['id']), array(), __('Are you sure you want to delete # %s?', $timelog['Timelog']['id'])); ?>
		</td>
	</tr>
<?php
	$emp = $timelog['Timelog']['employee_id'];
	endforeach; ?>
	</tbody>
	</table>
<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		
	echo '</div>';
	
	}else{
		echo '</table><br/><br/>';
		echo '<font color="red"><b>Empty</b></font>';
	}
?>

