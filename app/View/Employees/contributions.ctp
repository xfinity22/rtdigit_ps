<H2>EMPLOYEE DETAILS</h2>	
<div class="employeename">
	<table width="100%" cellpadding="0" cellspacing="0" border="0">
		<tr>
			<td width="10%">
			<?php
				$file_location = APP.'webroot/img/employees/'.DS . $employ['Employee']['picture'];
				if(file_exists($file_location) && $employ['Employee']['picture'] != NULL){
					echo $this->Html->image("employees/" . $employ['Employee']['picture'], array('width' => '100%', 'height' =>'150px'));
					echo '<center>' . $this->Html->link('Change Image', array('controller' => 'employees', 'action' => 'edit', $employ['Employee']['id'], 2, $employ['Employee']['employeeno'])) . '</center>';
				}else{
					echo $this->Html->image('default.png', array('width' => '100%'));
					echo '<center>' . $this->Html->link('Upload Image', array('controller' => 'employees', 'action' => 'edit', $employ['Employee']['id'], 2, $employ['Employee']['employeeno'])) . '</center>';
				}
			?>
			
			</td>
			<td width="80%" style="font-size: 17px; font-weight: bold;" valign="top" >
			<?php
				echo strtoupper($employ['Employee']['firstname'] . ' ' . $employ['Employee']['lastname']);
				echo '<br/>Department: ' . strtoupper($employ['Department']['name']);
				echo '<br/><br/>';
				echo '<div class="actions">';
					echo $this->Html->link(__('BACK TO EMPLOYEE\'S PROFILE'), array('controller' => 'employees', 'action' => 'edit', $employ['Employee']['id']));				
				echo '</div>';
			?>
			</td>
			
		</tr>
	</table>
</div>
<br/>

<?php
echo '<div class="actions">';
	
	echo $this->Html->link('<<PREV YEAR', array('controller' => 'employees', 'action' => 'contributions', $employ['Employee']['id'], $year-1));
	echo '&nbsp;';
	echo $this->Html->link('CURRENT', array('controller' => 'employees', 'action' => 'contributions', $employ['Employee']['id'],date('Y')));
	echo '&nbsp;';
	echo $this->Html->link('NEXT YEAR >>', array('controller' => 'employees', 'action' => 'contributions', $employ['Employee']['id'], $year+1));

echo '</div><br/><br/>';

if(empty($contris)){
	echo '<br/><H4 style="font-weight: bold;">NO DATA FOUND FOR YEAR ' . $year . '</h4>';
}

if(!empty($contris)){
	echo '<br/><H4 style="font-weight: bold;">SSS CONTRIBUTIONS YEAR ' . $year . '</h4>';
	echo '<table cellpadding="0" cellspacing="0" class="bordered" width="50%">';
		echo '<thead>';
	
		echo '<tr>';
			echo '<th>&nbsp;</th>';
			echo '<th>MONTH</th>';
			echo '<th>AMOUNT</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		$i = 0;
		foreach($contris as $contri):
			$i++;
			echo '<tr>';
				echo '<td>' . $i . '</td>';
				echo '<td>' . date('F Y', strtotime($contri['Income']['month'])). '</td>';
				echo '<td>' . $contri['Income']['sss'] . '</td>';
			echo '</tr>';
		endforeach;
		echo '<tr>';
			echo '<td colspan="3" class="actions">';
				echo $this->Html->link(__('Print'), array('controller' => 'employees', 'action' => 'printcontri', 'ext' => 'pdf', 1, $employ['Employee']['id'], $year), array('target' => '_blank'));			
			echo '</th>';
		echo '</tr>';	
		echo '</tbody>';
	echo '</table>';
}


if(!empty($contris)){
	echo '<br/><H4 style="font-weight: bold;">PHILHEALTH CONTRIBUTIONS YEAR ' . $year . '</h4>';
	echo '<table cellpadding="0" cellspacing="0" class="bordered" width="50%">';
		echo '<thead>';
	
		echo '<tr>';
			echo '<th>&nbsp;</th>';
			echo '<th>MONTH</th>';
			echo '<th>AMOUNT</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		$i = 0;
		foreach($contris as $contri):
			$i++;
			echo '<tr>';
				echo '<td>' . $i . '</td>';
				echo '<td>' . date('F Y', strtotime($contri['Income']['month'])). '</td>';
				echo '<td>' . $contri['Income']['philhealth'] . '</td>';
			echo '</tr>';
		endforeach;
		echo '<tr>';
			echo '<td colspan="3" class="actions">';
				echo $this->Html->link(__('Print'), array('controller' => 'employees', 'action' => 'printcontri', 'ext' => 'pdf', 2, $employ['Employee']['id'], $year), array('target' => '_blank'));			
			echo '</th>';
		echo '</tr>';
		echo '</tbody>';
	echo '</table>';
}

if(!empty($contris)){
	echo '<br/><H4 style="font-weight: bold;">HDMF CONTRIBUTIONS YEAR  ' . $year . '</h4>';
	echo '<table cellpadding="0" cellspacing="0" class="bordered" width="50%">';
		echo '<thead>';
	
		echo '<tr>';
			echo '<th>&nbsp;</th>';
			echo '<th>MONTH</th>';
			echo '<th>AMOUNT</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		$i = 0;
		foreach($contris as $contri):
			$i++;
			echo '<tr>';
				echo '<td>' . $i . '</td>';
				echo '<td>' . date('F Y', strtotime($contri['Income']['month'])). '</td>';
				echo '<td>' . $contri['Income']['hdmf'] . '</td>';
			echo '</tr>';
		endforeach;
		echo '<tr>';
			echo '<td colspan="3" class="actions">';
				echo $this->Html->link(__('Print'), array('controller' => 'employees', 'action' => 'printcontri', 'ext' => 'pdf', 3, $employ['Employee']['id'], $year), array('target' => '_blank'));			
			echo '</th>';
		echo '</tr>';
		echo '</tbody>';
	echo '</table>';
}

if(!empty($contris)){
	echo '<br/><H4 style="font-weight: bold;">TAX YEAR ' . $year . '</h4>';
	echo '<table cellpadding="0" cellspacing="0" class="bordered" width="50%">';
		echo '<thead>';
	
		echo '<tr>';
			echo '<th>&nbsp;</th>';
			echo '<th>MONTH</th>';
			echo '<th>AMOUNT</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		$i = 0;
		foreach($contris as $contri):
			$i++;
			echo '<tr>';
				echo '<td>' . $i . '</td>';
				echo '<td>' . date('F Y', strtotime($contri['Income']['month'])). '</td>';
				echo '<td>' . $contri['Income']['tax'] . '</td>';
			echo '</tr>';
		endforeach;
		echo '<tr>';
			echo '<td colspan="3" class="actions">';
				echo $this->Html->link(__('Print'), array('controller' => 'employees', 'action' => 'printcontri', 'ext' => 'pdf', 4, $employ['Employee']['id'], $year), array('target' => '_blank'));			
			echo '</th>';
		echo '</tr>';
		echo '</tbody>';
	echo '</table>';
}



?>




