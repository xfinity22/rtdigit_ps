<br/>
<div class="employeename" style="font-size: 14px; font-weight: bold; padding: 10px;">
	<table width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td width="80%">
			<?php
				echo 'Employee Details: <br/><br/>Name: ';
				echo strtoupper($employ['Employee']['firstname'] . ' ' . $employ['Employee']['lastname']);
				echo '<br/>Division / Department: ' . strtoupper($employ['Division']['name'] . ' / ' . $employ['Department']['name']);
			?>
			</td>
			<td></td>
		</tr>
	</table>
</div>
<br/>

<div id="tabs" style="font-size: 12px;">
  <ul>
    <li><a href="#tabs-1">EMPLOYEE</a></li>
    <li><a href="#tabs-2">BACKGROUNDS</a></li>
    <li><a href="#tabs-3">OTHER EARNINGS</a></li>
    <li><a href="#tabs-4">PROMOTIONS</a></li>
    <li><a href="#tabs-5">MEDICAL RECORDS</a></li>
 
  </ul>
  <div id="tabs-1">
		<?php
		echo $this->Form->create('Employee', array('class' => 'form', 'name' => 'Rate'));
			echo $this->Form->input('id');
		?>
		<?php
		echo '<table>';
			echo '<tr>';
				echo '<td class="label">Employee Number</td>';
				echo '<td class="label">';
					echo $this->Form->input('employeeno', array('label' => '', 'class'=> 'name'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Date Hired</td>';
				echo '<td class="label">';
						echo $this->Form->input('datehired', array('label' => '', 'class' => 'name', 'empty' => true));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Work Schedule</td>';
				echo '<td>';
					echo $this->Form->input('workschedule_id', array('label' => '', 'class' => 'select-style'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Date Regularized</td>';
				echo '<td class="label">';
						echo $this->Form->input('dateregularized', array('label' => '', 'class' => 'name', 'empty' => true));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Division</td>';
				echo '<td>';
					echo $this->Form->input('division_id', array('label' => '', 'class' => 'select-style'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Date Resigned</td>';
				echo '<td class="label">';
							echo $this->Form->input('daterigned', array('label' => '', 'class' => 'name', 'empty' => true));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Department</td>';
				echo '<td>';
					echo $this->Form->input('department_id', array('label' => '', 'class' => 'select-style'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Date Terminated</td>';
				echo '<td class="label">';
							echo $this->Form->input('dateterminated', array('label' => '', 'class' => 'name', 'empty' => true));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%" rowspan="3">Fullname</td>';
				echo '<td>';
					echo $this->Form->input('lastname', array('label' => '', 'class' => 'name', 'placeholder' => 'Last Name'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Employment Status</td>';
				echo '<td class="label">';
							echo $this->Form->input('employmentstatus_id', array('label' => '', 'class' => 'select-style'));
				echo '</td>';
			echo '</tr>';
				echo '<td>';
					echo $this->Form->input('firstname', array('label' => '', 'class' => 'name', 'placeholder' => 'First Name'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Face ID</td>';
				echo '<td class="label">';
					echo $this->Form->input('faceID', array('label' => '', 'class' => 'name'));
					
				echo '</td>';	
			echo '</tr>';
			
			echo '</tr>';
				echo '<td>';
					echo $this->Form->input('middlename', array('label' => '', 'class' => 'name', 'placeholder' => 'Middle Name'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td width="20%">Cost Center</td>';
				echo '<td>';
					echo $this->Form->input('costcenter_id', array('label' => '', 'class' => 'select-style'));
				echo '</td>';
			echo '</tr>';
						
			echo '<tr>';
				echo '<td width="20%">Employee Type</td>';
				echo '<td>';
					echo $this->Form->input('employeetype_id', array('label' => '', 'class' => 'select-style'));
					
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Job Title</td>';
				echo '<td class="label">';
					echo $this->Form->input('jobtitle_id', array('label' => '', 'class' => 'select-style'));		
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">SSS Number</td>';
				echo '<td>';
					echo $this->Form->input('sssnumber', array('label' => '', 'class' => 'name'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Pag-ibig Number</td>';
				echo '<td class="label">';
							echo $this->Form->input('pagibignumber', array('label' => '', 'class' => 'name'));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Philhealth Number</td>';
				echo '<td>';
					echo $this->Form->input('philhealthnumber', array('label' => '', 'class' => 'name'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Tax Identification Number</td>';
				echo '<td class="label">';
							echo $this->Form->input('TIN', array('label' => '', 'class' => 'name'));
				echo '</td>';
			echo '</tr>';
			echo '<tr><td colspan="5">&nbsp;</td></tr>';
			echo '<tr><td colspan="5">&nbsp;</td></tr>';
			echo '<tr>';
				echo '<td width="20%">Bank</td>';
				echo '<td>';
					echo $this->Form->input('bank_id', array('label' => '', 'class' => 'select-style'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Payroll Account Number</td>';
				echo '<td class="label">';
							echo $this->Form->input('payrollaccountnumber', array('label' => '', 'class' => 'name'));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Withholding Tax</td>';
				echo '<td>';
					echo '<select name="data[Employee][withholdingtax_id]" class="select-style">';
						foreach($withholdingtaxes as $tax):
							if($tax['Taxdescription']['id'] == $employ['Employee']['withholdingtax_id']){
								echo '<option value="' . $tax['Taxdescription'][id] . '" selected>' . $tax['Taxdescription'][taxtype] . ' - ' . $tax['Taxdescription'][description] . '</option>';
							}else{
								echo '<option value="' . $tax['Taxdescription'][id] . '">' . $tax['Taxdescription'][taxtype] . ' - ' . $tax['Taxdescription'][description] . '</option>';
							}
							
						endforeach;
					echo '</select>';
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Monthly Rate</td>';
				echo '<td class="label">';
					
					echo '<INPUT type="text" id="number1" onchange="javascript:addition();" name="data[Employee][monthlyrate]" value="' . $employ['Employee']['monthlyrate'] . '">';							
							
						//echo $this->Form->input('monthlyrate', array('label' => '', 'class' => 'name'));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Rate Type</td>';
				echo '<td>';
					echo $this->Form->input('ratetype_id', array('label' => '', 'class' => 'select-style'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Daily Rate</td>';
				echo '<td class="label">';
					//echo '<INPUT type="text" id="daily" onchange="javascript:addition();" name="data[Employee][dailyrate]" default="' . $employ['Employee']['dailyrate'] . '">';	
						
					echo $this->Form->input('dailyrate', array('label' => '', 'class' => 'name', 'id' => 'daily', 'onchange' => 'javascript:dailyrate();', 'default' => $employ['Employee']['dailyrate']));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td class="label">Pay Frequency</td>';
				echo '<td class="label">';
							echo $this->Form->input('payfrequency_id', array('label' => '', 'class' => 'select-style'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td width="20%">Hourly Rate</td>';
				echo '<td>';
					echo '<INPUT type="text" id="hourly" name="data[Employee][hourlyrate]" value="' . $employ['Employee']['hourlyrate'] . '">';	
					
					//echo $this->Form->input('hourlyrate', array('label' => '', 'class' => 'name'));
				echo '</td>';
			echo '</tr>';
		echo '</table>';
		?>

  </div>
  
  <div id="tabs-2">
	<?php
		echo '<table class="form">';
   			echo '<tr>';
				echo '<td width="20%">Sex</td>';
				echo '<td>';
					echo $this->Form->input('sex', array('options' => array('Female', 'Male'), 'label' => '', 'class' => 'select-style')); 
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Birthdate</td>';
				echo '<td class="label">';
						echo $this->Form->input('birthdate', array('label' => '', 'class' => 'name', 'type' => 'date', 'empty' => true));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Civil Status</td>';
				echo '<td>';
					echo $this->Form->input('civilstatus', array('options' => array('Single', 'Married', 'Separated', 'Widow'), 'label' => '', 'class' => 'select-style'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Religion</td>';
				echo '<td class="label">';
							echo $this->Form->input('religion', array('label' => '', 'class' => 'name'));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Height (cm)</td>';
				echo '<td>';
					echo $this->Form->input('height', array('label' => '', 'class' => 'name'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Weight</td>';
				echo '<td class="label">';
							echo $this->Form->input('weight', array('label' => '', 'class' => 'name'));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr><td colspan="5">&nbsp;</td></tr>';
			echo '<tr><td colspan="5"><B><center>PARENTS\'S INFORMATION</b><center></td></tr>';
			
			echo '<tr>';
				echo '<td width="20%">Mother\'s Name (cm)</td>';
				echo '<td>';
					echo $this->Form->input('mothername', array('label' => '', 'class' => 'name'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Father\'s Name</td>';
				echo '<td class="label">';
							echo $this->Form->input('fathername', array('label' => '', 'class' => 'name'));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Mother\'s Address</td>';
				echo '<td>';
					echo $this->Form->input('motheraddress', array('label' => '', 'class' => ''));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Father\'s Address</td>';
				echo '<td class="label">';
							echo $this->Form->input('fatheraddress', array('label' => '', 'class' => 'name'));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Mother\'s Contact Number</td>';
				echo '<td>';
					echo $this->Form->input('mothercontactnumber', array('label' => '', 'class' => 'name'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Father\'s Contact Number</td>';
				echo '<td class="label">';
							echo $this->Form->input('fathercontactnumber', array('label' => '', 'class' => 'name'));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Mother\'s Occupation</td>';
				echo '<td>';
					echo $this->Form->input('motheroccupation', array('label' => '', 'class' => 'name'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Father\'s Occupation</td>';
				echo '<td class="label">';
							echo $this->Form->input('fatheroccupation', array('label' => '', 'class' => 'name'));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr><td colspan="5">&nbsp;</td></tr>';
		echo '</table>';
		
		
		echo '<br/><hr><br/>';
		echo '<table class="form">';
			echo '<tr><td colspan="5"><B><center>CONTACT INFORMATION</b><center></td></tr>';
			echo '<tr>';
				echo '<td width="20%">Mobile Number</td>';
				echo '<td>';
					echo $this->Form->input('mobilenumber', array('label' => '', 'class' => 'name'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Telephone Number</td>';
				echo '<td class="label">';
							echo $this->Form->input('telephonenumber', array('label' => '', 'class' => 'name'));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Email Address</td>';
				echo '<td>';
					echo $this->Form->input('email', array('label' => '', 'class' => 'name'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label"></td>';
				echo '<td class="label"></td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Permanent Address</td>';
				echo '<td>';
					echo $this->Form->input('presetaddress', array('label' => '', 'class' => '', 'type' => 'textarea'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Permanent Address</td>';
				echo '<td class="label">';
							echo $this->Form->input('permanentaddress', array('label' => '', 'class' => 'name'));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr><td colspan="5">&nbsp;</td></tr>';
			echo '<tr><td colspan="5"><center><b>IN CASE OF EMERGENCY<b></center></td></tr>';
	
			echo '<tr>';
				echo '<td width="20%">Contact Name</td>';
				echo '<td>';
					echo $this->Form->input('econtactname', array('label' => '', 'class' => 'name'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Contact Number</td>';
				echo '<td class="label">';
							echo $this->Form->input('econtactnumber', array('label' => '', 'class' => 'name'));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Permanent Address</td>';
				echo '<td>';
					echo $this->Form->input('ehomeaddress', array('label' => '', 'class' => '', 'type' => 'textarea'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Relationship</td>';
				echo '<td class="label">';
							echo $this->Form->input('erelationship', array('label' => '', 'class' => 'name', 'type' => 'textarea'));
				echo '</td>';
			echo '</tr>';
		echo '</table>';
		
		echo '<br/><br/><hr><br/>';
		echo '<table class="form">';
			echo '<tr><td colspan="5"><B><center>EDUCATIONAL BACKGROUND</b><center></td></tr>';
    		echo '<tr>';
				echo '<td></td>';
				echo '<td><center>School / University</center></td>';
				echo '<td><center>Year Grad</center></td>';
				echo '<td class="label"><center>Course Major</center></td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Primary School</td>';
				echo '<td>';
					echo $this->Form->input('primaryschool', array('label' => '', 'class' => ''));
				echo '</td>';
				echo '<td>';
					echo $this->Form->input('primarygrad', array('label' => '', 'class' => ''));
				echo '</td>';
				echo '<td>';
					echo $this->Form->input('primarycourse', array('label' => '', 'class' => ''));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Secondary School</td>';
				echo '<td>';
					echo $this->Form->input('secondaryschool', array('label' => '', 'class' => ''));
				echo '</td>';
				echo '<td>';
					echo $this->Form->input('secondarygrad', array('label' => '', 'class' => ''));
				echo '</td>';
				echo '<td>';
					echo $this->Form->input('secondarycourse', array('label' => '', 'class' => ''));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Tertiary School</td>';
				echo '<td>';
					echo $this->Form->input('tertiaryschool', array('label' => '', 'class' => ''));
				echo '</td>';
				echo '<td>';
					echo $this->Form->input('tertiarygrad', array('label' => '', 'class' => ''));
				echo '</td>';
				echo '<td>';
					echo $this->Form->input('tertiarycourse', array('label' => '', 'class' => ''));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Graduate School</td>';
				echo '<td>';
					echo $this->Form->input('graduateschool', array('label' => '', 'class' => ''));
				echo '</td>';
				echo '<td>';
					echo $this->Form->input('graduategrad', array('label' => '', 'class' => ''));
				echo '</td>';
				echo '<td>';
					echo $this->Form->input('graduatecourse', array('label' => '', 'class' => ''));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>Post Graduate School</td>';
				echo '<td>';
					echo $this->Form->input('postgradschool', array('label' => '', 'class' => ''));
				echo '</td>';
				echo '<td>';
					echo $this->Form->input('postgradgrad', array('label' => '', 'class' => ''));
				echo '</td>';
				echo '<td>';
					echo $this->Form->input('postgradcourse', array('label' => '', 'class' => ''));
				echo '</td>';
			echo '</tr>';
		echo '</table>';
		
		echo '<table width="90%" class="employees">';
		echo '<tr>';
			echo '<td >';
			//	echo $this->Form->end(__('Submit'));
			echo '</td>';
		echo '</tr>';
	echo '</table>';
	?>
  </div>
  
  <div id="tabs-3">
	<?php
		echo '<table class="bordered" width="90%">';
			echo '<tr><th colspan="7"><B>OTHER EARNINGS</b></th></tr>';
				echo '<tr>';
				echo '<th>Description</th>';
				echo '<th>Pay Frequency</th>';
				echo '<th>Amount</th>';
				echo '<th class="actions">Action</td>';
			echo '</tr>';
	if(empty($earnings)){
				
					
	}else{
		foreach ($earnings as $e):
			echo '<tr>';
				echo '<td>' .  $e['Otherearning']['name'] .'</td>';
				echo '<td>' .  $e['Otherearningsentry']['amount'] .'</td>';
				echo '<td>';
					if($e['Otherearningsentry']['payprequency'] == 0){
						echo 'Daily';
					}else if($e['Otherearningsentry']['payprequency'] == 1){
						echo 'First Half';
					}else if($e['Otherearningsentry']['payprequency'] == 2){
						echo 'Second Half';
					}else if($e['Otherearningsentry']['payprequency'] == 3){
						echo 'Every Pay Day';
					}
				echo '</td>';
				echo '<td class="actions">';
				//	echo $this->Html->link(__('Update'), array('controller' => 'otherearningsentries', 'action' => 'edit', $e['Otherearningsentry']['id'], $id));
					echo '&nbsp;';
				//	echo $this->Form->postLink(__('Delete'), array('controller' => 'otherearningsentries', 'action' => 'delete',$e['Otherearningsentry']['id'], $id), array(), __('Are you sure you want to delete this?', $this->Form->value('Promotion.id')));
				echo '</td>';
			echo '</tr>';
		endforeach;
	}
		//echo '<tr class="actions"><td colspan="7">' . $this->Html->link(__('Update'), array('controller' => 'otherearningsentries', 'action' => 'add', $id)) . '</td></tr>';
		echo '</table>';
		?>
  </div>
 
	
	
	<div id="tabs-4">
		<?php
		echo '<table class="bordered" width="90%">';
			echo '<tr><th colspan="7"><B>PROMOTIONS</b></th></tr>';
				echo '<tr>';
				echo '<th>Position</th>';
				echo '<th>From</th>';
				echo '<th>To</th>';
				echo '<th>Salary</th>';
				echo '<th>Adjustment</th>';
				echo '<th>Increase</th>';
				echo '<th class="actions">Action</td>';
			echo '</tr>';
	if(empty($promotions)){
				
					
	}else{
		foreach ($promotions as $p):
			echo '<tr>';
				echo '<td>' .  $p['Promotion']['position'] .'</td>';
				echo '<td>' .  $p['Promotion']['datefrom'] .'</td>';
				echo '<td>' .  $p['Promotion']['dateend'] .'</td>';
				echo '<td>' .  $p['Promotion']['salary'] .'</td>';
				echo '<td>' .  $p['Promotion']['adjustment'] .'</td>';
				echo '<td>' .  $p['Promotion']['increase'] .'</td>';
				echo '<td class="actions">';
				//	echo $this->Html->link(__('Update'), array('controller' => 'promotions', 'action' => 'edit', $p['Promotion']['id'], $id));
				//	echo $this->Form->postLink(__('Delete'), array('controller' => 'promotions', 'action' => 'delete',$p['Promotion']['id'], $id), array(), __('Are you sure you want to delete this?', $this->Form->value('Promotion.id')));
				echo '</td>';
			
			
			echo '</tr>';
		endforeach;
	}
		//echo '<tr class="actions"><td colspan="7">' . $this->Html->link(__('Update'), array('controller' => 'promotions', 'action' => 'add', $id)) . '</td></tr>';
		echo '</table>';
		?>
  </div>
  
  <div id="tabs-5">
		<?php
		$provider = $this->requestAction('medproviders/related/' . $employ['Employee']['medprovider_id']);
		$types = $this->requestAction('plantypes/related/' . $employ['Employee']['plantype_id']);
		$benefits = $this->requestAction('medbenefits/related/' . $employ['Employee']['medprovider_id']);
		$hospitals = $this->requestAction('medhospitals/related/' . $employ['Employee']['medprovider_id']);
		echo '<div class="employeename" style="width: 50%; font-size: 15px; font-weight: bold;">';
			echo 'HMO PROVIDER: ';
			if(!empty($provider)){
				echo $provider['Medprovider']['name'];
			}else{
				echo '&nbsp';
			}
			echo '<br/>AMOUNT: ';
			if(!empty($provider)){
				echo $provider['Medprovider']['amount'];
			}else{
				echo '&nbsp';
			}
			echo '<br/><br/>';
			//echo $this->Html->link('Update', array('controller' => 'employees'));
		echo '</div>';
		
		echo '<br/>';
		echo '<div class="employeename" style="width: 50%; font-size: 15px; font-weight: bold;">';
			echo 'PLANTYPES: ';
			if(!empty($provider)){
				echo $types['Plantype']['name'];
			}else{
				echo '&nbsp';
			}
			echo '<br/>AMOUNT: ';
			if(!empty($provider)){
				echo $provider['Medprovider']['amount'];
			}else{
				echo '&nbsp';
			}
			echo '<br/><br/>';
			//echo $this->Html->link('Update', array('controller' => 'employees'));
		echo '</div>';
		
		echo '<br/>';
		echo '<div class="employeename" style="width: 40%; font-size: 15px; font-weight: bold;">';
			echo 'BENEFITS: ';
			if(!empty($benefits)){
				echo '<ul>';
				foreach ($benefits as $b):
					echo '<li>' . $b['Medbenefit']['name'] . ' worth ' . $b['Medbenefit']['amount'] . '</li>';
				endforeach;
				echo '</ul>';
			
			}
			echo '<br/><br/>';
		echo '</div>';
		
		echo '<br/>';
		echo '<div class="employeename" style="width: 40%; font-size: 15px; font-weight: bold;">';
			echo 'ACCREDITED HOSPITALS: ';
			if(!empty($hospitals)){
				echo '<ul>';
				foreach ($hospitals as $b):
					echo '<li>' . $b['Medhospital']['name'].'</li>';
				endforeach;
				echo '</ul>';
			
			}
			echo '<br/><br/>';
		echo '</div>';
		
		echo '<table class="bordered" style="width: 100%"><tr><td>&nbsp;</td></tr></table>';
		?>
  </div>
</div>
 
 
<script>
  $(function() {
    $( "#tabs" ).tabs();
  });
</script>
  

<SCRIPT language="javascript" type="text/javascript">
	function addition(){
		a=Number(document.Rate.number1.value);
		c=a*12/261;
		d=c/8;
		document.Rate.daily.value=c;
		document.Rate.hourly.value=d;
	}
</SCRIPT>

<SCRIPT language="javascript" type="text/javascript">
	function dailyrate(){
		a=Number(document.Rate.daily.value);
		c=a*261/12
		d=a/8;
		document.Rate.number1.value=c;
		document.Rate.hourly.value=d;
	}
</SCRIPT>