<?php echo $this->element('page_title', ['title' => 'Time Logs for ' . strtoupper(date('F', strtotime($month)))]); ?>
<?php echo $this->element('submenu/timelog'); ?>

<div class="searchdiv" style="width: 70%; ">
	<table class="table table-condensed default_table">
	
		<tr>
			<td width="20%px"><?php
				echo $this->Form->create('Timelog', array('url' => ['controller' => 'timelogs', 'action' => 'search'], 'class' => 'form'));
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
					echo 'SELECT MONTH & YEAR';
			echo '</td>';
		
			echo '<td>';
?>
				<div class="row">
					<div class="col-md-8">
<?php
					echo '<select name="data[Timelog][searchmonth]">';
						//echo '<option value=""></option>';	
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
?>
					</div>
					<div class="col-md-4">
<?php
					echo '<select name="data[Timelog][searchyear]">';
						//echo '<option></option>';
						for($i = 2024; $i<2040; $i++){
							echo '<option value="' . $i . '"';
								if($i==date("Y")){
									echo 'selected="selected"';
								}
							echo '>'. $i . '</option>';
						}
						echo '</select>';
?>
					</div>
				</div>
<?php
			echo '</td>';
		echo '</tr>';
?>
			<tr>
				<td>SELECT SPECIFIC DATE
					<small class="fs-9 text-danger">Note: Specific date will be prioritize if not empty</small>
				</td>
				<td><input type="date" class="form-control" name="data[Timelog][selecteddate]" />
			</tr>
<?php
		echo '<tr>';
			echo '<td>' . $this->Form->end('Search') . '</td>';
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
				
				echo '<br/><br/><br/>';
				if(!empty($id)){
					echo $this->Html->link('PRINT DTR', array('action' => 'printdtr', date('Y-m-d', strtotime($month)), $id, 'ext' => 'pdf'), array('target' => '_blank'));
				}
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
<?php
	if (empty($timelog['Timelog']['remarks'])){
		echo '<tr>';
	}else{
		echo '<tr style="color: red;font-weight: bold">';
	}
?>
	
		<td><?php echo $timelog['Workschedule']['description']; ?></td>
		<td><?php echo date('M j, Y', strtotime($timelog['Timelog']['date'])); ?>&nbsp;</td>
		<td><?php echo h($timelog['Timelog']['timein']); ?>&nbsp;</td>
		<td><?php echo h($timelog['Timelog']['otin']); ?>&nbsp;</td>
		<td><?php echo h($timelog['Timelog']['otout']); ?>&nbsp;</td>	
		<td><?php echo h($timelog['Timelog']['timeout']); ?>&nbsp;</td>
		<td><?php echo $timelog['Timelog']['late'] . ' HR' . $timelog['Timelog']['lateminutes'] . ' MIN'; ?>&nbsp;</td>
		<td><?php echo strtoupper($timelog['Timelog']['remarks']); ?>&nbsp;</td>
		<td><?php echo $timelog['Timelog']['undertimein']; ?>&nbsp;</td>
		<td><?php echo $timelog['Timelog']['undertimeout']; ?>&nbsp;</td>
		
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $timelog['Timelog']['id'])); ?>
			<?php echo $this->Html->link(__('Update'), array('action' => 'edit', $timelog['Timelog']['id'])); ?>
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

