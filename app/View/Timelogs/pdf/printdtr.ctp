<html lang="en">
<head>
<meta charset="utf-8">
<title>DTR</title>
<style type="text/css">
    html, body {
		width: 100%;
        margin: 25px;
        margin-top: 15px;
		text-align: left;
		font: 14px Arial;
		line-height: 1;
		letter-spacing: 1px;
    }
	
	.bordered td, .bordered th{
		padding: 1px;
		font: 13px Arial;
		border: 1px solid black;
		text-align: center;
		
	}
	
	.bordered{
		width: 100%;
		
	}
	
</style>
</head>
<body>
<?php
echo '<table width="100%" cellpadding="0" cellspacing="0" border="0">';
	echo '<tr>';
		echo '<td valign="top" style="width: 25%;">';
			$file_location = APP.'webroot/img/'.DS . 'jamgood.png';
			if(file_exists($file_location)){
				echo '<img src="' . APP . 'webroot/img/jamgood.png">';
			}
		echo '<td>';
		echo '<td valign="top" style="width: 50%; padding-top: 15px; text-align: center;">';
			echo '#52 Mahogany St., Dagatan<br/>';
			echo 'Lipa City, Batangas<br/>	';
			echo 'Tel: (043) 774-8778'; 
		echo '<td>';
		echo '<td valign="top" style="width: 25%;">&nbsp;<td>';
	echo '</tr>';
echo '</table>';
?>
<hr>
<h4>TIMELOGS</h4>
<table cellpadding="0" cellspacing="0" width="100%">
	<?php
	if(!empty($timelogs)){
		$emp = 0;
		foreach ($timelogs as $timelog):
		if($emp != $timelog['Timelog']['employee_id']){
			echo '</table><br/><table cellpadding="0" cellspacing="0" class="bordered" width="90%"><tr>';
				echo '<th colspan="9">';
					echo $timelog['Employee']['firstname'] . ' ' . $timelog['Employee']['lastname'] . ' / ' . date('F Y', strtotime($month)) ;
				echo '</th>';
			echo '</tr>'; ?>
			<thead>
	
			<tr>
				<th style="width: 10%">Date</th>
				<th style="width: 10%">Time In</th>
				<th style="width: 10%">Morning Out</th>
				<th style="width: 10%">Afternoon In</th>
				<th style="width: 10%">Out</th>
				<th style="width: 12%">Late</th>
				<th style="width: 8%">UT In</th>
				<th style="width: 8%">UT Out</th>
				<th>Remarks</th>
			</tr>
			</thead>
			<?php
		}
	?>
	<tbody>
	<tr>
		<td><?php echo date('m-j-y', strtotime($timelog['Timelog']['date'])); ?>&nbsp;</td>
		<td>
		<?php
			if(!empty($timelog['Timelog']['timein'])){
				echo date('h:i A', strtotime($timelog['Timelog']['timein'])); 
			}			
		?>
		</td>
		
		<td>
		<?php
			if(!empty($timelog['Timelog']['otin'])){
				echo date('h:i A', strtotime($timelog['Timelog']['otin'])); 
			}			
		?>
		</td>
		
		<td>
		<?php
			if(!empty($timelog['Timelog']['otout'])){
				echo date('h:i A', strtotime($timelog['Timelog']['otout'])); 
			}			
		?>		
		</td>
		
		<td>
		<?php
			if(!empty($timelog['Timelog']['timeout'])){
				echo date('h:i A', strtotime($timelog['Timelog']['timeout'])); 
			}			
		?>	
		</td>
		
		<td><?php echo $timelog['Timelog']['late'] . ' hr ' . $timelog['Timelog']['lateminutes'] . ' min'; ?>&nbsp;</td>		
		<td>
		<?php
			if(!empty($timelog['Timelog']['undertimein'])){
				echo date('h:i A', strtotime($timelog['Timelog']['undertimein'])); 
			}			
		?>
		</td>
		
		<td>
		<?php
			if(!empty($timelog['Timelog']['undertimeout'])){
				echo date('h:i A', strtotime($timelog['Timelog']['undertimeout'])); 
			}			
		?>
		</td>
		<td><?php echo strtoupper($timelog['Timelog']['remarks']); ?>&nbsp;</td>
	</tr>
<?php
	$emp = $timelog['Timelog']['employee_id'];
	endforeach; ?>
	</tbody>
	</table>

	<?php
	
		
	echo '</div>';
	
	}else{
		echo '</table><br/><br/>';
		echo '<font color="red"><b>Empty</b></font>';
	}
?>

