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
					echo $this->Html->link(__('Print Details'), array('controller' => 'employees', 'action' => 'employeedetails', 'ext' => 'pdf', $employ['Employee']['id']), array('target' => '_blank'));
					echo '&nbsp;';
					if($employ['Employee']['employmentstatus_id'] > 4){
						echo $this->Html->link(__('Print COE'), array('controller' => 'employees', 'action' => 'coe', 'ext' => 'pdf', $employ['Employee']['id'], 1), array('target' => '_blank'));		
					}else{
						echo $this->Html->link(__('Print COE'), array('controller' => 'employees', 'action' => 'coe', 'ext' => 'pdf', $employ['Employee']['id'], 2), array('target' => '_blank'));	
					}
					
					echo '&nbsp;';
					echo $this->Html->link('LOANS', array('controller' => 'loanentries', 'action' => 'loanreport', $employ['Employee']['id'], 2), array('target' => '_blank'));	
					echo '&nbsp;';
					echo $this->Html->link('LEAVES', array('controller' => 'leaves', 'action' => 'view', $employ['Employee']['id'], 2), array('target' => '_blank'));
					echo '&nbsp;';
					echo $this->Html->link('TOP SHEET', array('controller' => 'topsheets', 'action' => 'view', $employ['Employee']['id']), array('target' => '_blank'));	
				echo '</div>';
			?>
			</td>
			
		</tr>
	</table>
</div>
<br/>
<?php
if($action == 1 || empty($action)){ ?>

<div id="tabs" style="font-size: 12px;">
  <ul>
    <li><a href="#tabs-1">PROFILE</a></li>
    <li><a href="#tabs-2">BACKGROUNDS</a></li>
    <li><a href="#tabs-3">OTHER EARNINGS / FIXED DEDUCTIONS</a></li>
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
				echo '<td class="label">BIO NUMBER</td>';
				echo '<td class="label">';
					echo $this->Form->input('faceID', array('label' => '', 'class'=> 'name'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Department Head</td>';
				echo '<td class="label">';
					echo $this->Form->input('depthead', array('label' => '', 'class'=> 'select-style', 'type' => 'select', 'options' => array('No', 'Yes')));
				echo '</td>';;
			echo '</tr>';
			
			echo '<tr>';
				echo '<td class="label">Employee Number</td>';
				echo '<td class="label">';
					echo $this->Form->input('employeeno', array('label' => '', 'class'=> 'name'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Date Hired</td>';
				echo '<td class="label">';
						echo $this->Form->input('datehired', array('label' => '', 'class' => 'name', 'empty' => true, 'minYear' => date('Y') - 70, 'maxYear' => date('Y'), 'value' => $this->data['Employee']['datehired']));
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
						echo $this->Form->input('dateregularized', array('label' => '', 'class' => 'name', 'empty' => true, 'maxYear' => date('Y'), 'value' => $this->data['Employee']['dateregularized']));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Employment Status</td>';
				echo '<td>';
					echo $this->Form->input('employmentstatus_id', array('label' => '', 'class' => 'select-style'));
					//echo $this->Form->input('division_id', array('label' => '', 'class' => 'select-style'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Date Resigned</td>';
				echo '<td class="label">';
					echo $this->Form->input('daterigned', array('label' => '', 'class' => 'name', 'empty' => true, 'maxYear' => date('Y'), 'value' => $this->data['Employee']['daterigned']));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Division</td>';
				echo '<td>';
					echo $this->Form->input('division_id', array('label' => '', 'class' => 'select-style', 'empty' => true));
				echo '</td>';
				echo '<td class="label"></td>';
				echo '<td class="label">Branch</td>';
				echo '<td class="label">';
					echo $this->Form->input('branch_id', array('label' => '', 'class' => 'select-style', 'empty' => true));	
				echo '</td>';
							
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Department</td>';
				echo '<td>';
					echo $this->Form->input('department_id', array('label' => '', 'class' => 'select-style', 'empty' => true));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Date Terminated</td>';
				echo '<td class="label">';
							echo $this->Form->input('dateterminated', array('label' => '', 'class' => 'name', 'maxYear' => date('Y'), 'empty' => true, 'value' => $this->data['Employee']['dateterminated']));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%" rowspan="3">Fullname</td>';
				echo '<td>';
					echo $this->Form->input('lastname', array('label' => '', 'class' => 'name', 'placeholder' => 'Last Name'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label"></td>';
				echo '<td class="label">';
							
				echo '</td>';
			echo '</tr>';
				echo '<td>';
					echo $this->Form->input('firstname', array('label' => '', 'class' => 'name', 'placeholder' => 'First Name'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label"></td>';
				echo '<td class="label">';
					//echo $this->Form->input('faceID', array('label' => '', 'class' => 'name'));
				echo '</td>';	
			echo '</tr>';
			
			echo '</tr>';
				echo '<td>';
					echo $this->Form->input('middlename', array('label' => '', 'class' => 'name', 'placeholder' => 'Middle Name', 'required' => true));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td width="20%"></td>';
				echo '<td>';
					//echo $this->Form->input('costcenter_id', array('label' => '', 'class' => 'select-style'));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Married Name</td>';
				echo '<td>';
					echo $this->Form->input('marriedname', array('label' => '', 'placeholder' => 'Married Name'));
					
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Working Assignment</td>';
				echo '<td class="label">';
					echo $this->Form->input('workassignment', array('label' => ''));		
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
				echo '<td class="label">Philhealth</td>';
				echo '<td class="label">';
							echo $this->Form->input('philhealthnumber', array('label' => '', 'class' => 'name'));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Pag-ibig</td>';
				echo '<td>';
					echo $this->Form->input('pagibignumber', array('label' => '', 'class' => 'name'));
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
					echo $this->Form->input('bank_id', array('label' => '', 'class' => 'select-style', 'empty' => true));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Payroll Account Number</td>';
				echo '<td class="label">';
							echo $this->Form->input('payrollaccountnumber', array('label' => '', 'class' => 'name'));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Payment Method</td>';
				echo '<td>';
					$options = array("Cash", "Cash Card", "Savings Account");
					echo $this->Form->input('dem', array('label' => '', 'class' => 'select-style', 'options' => $options, 'empty' => true));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label"></td>';
				echo '<td class="label">';
					echo '&nbsp;';
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%" valign="top">Withholding Tax Type</td>';
				echo '<td valign="top">';
					echo '<input name="data[Employee][withholdingtax_id]" type="radio" value="" checked>No Tax<br/>';
					foreach($withholdingtaxes as $tax):
						if($tax['Taxdescription']['id'] == $employ['Employee']['withholdingtax_id']){
							echo '<input name="data[Employee][withholdingtax_id]" type="radio" value="' . $tax['Taxdescription']['id'] . '" checked>'.$tax['Taxdescription']['taxtype'] . ' - ' . $tax['Taxdescription']['description'] .'<br/>';
						}else{
							echo '<input name="data[Employee][withholdingtax_id]" type="radio" value="' . $tax['Taxdescription']['id'] . '">'.$tax['Taxdescription']['taxtype'] . ' - ' . $tax['Taxdescription']['description'] .'<br/>';
						}
						
					endforeach;
					echo '<br/>';
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label"></td>';
				echo '<td class="label">';
					echo '&nbsp;';
				echo '</td>';
				
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Deduct Tax?</td>';
				echo '<td>';
					echo $this->Form->input('notax', array('type' => 'checkbox', 'options' => array('Value 1' => 'Label 1'),'label' => ''));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Monthly Rate</td>';
				echo '<td class="label">';
					
					echo '<INPUT type="text" id="number1" onkeyup="javascript:addition();" name="data[Employee][monthlyrate]" value="' . $employ['Employee']['monthlyrate'] . '">';							
							
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
					//echo '<INPUT type="text" id="daily" onkeyup="javascript:addition();" name="data[Employee][dailyrate]" default="' . $employ['Employee']['dailyrate'] . '">';	
						
					echo $this->Form->input('dailyrate', array('type' => 'disabled', 'label' => '', 'class' => 'name', 'id' => 'daily', 'onkeyup' => 'javascript:dailyrate();', 'default' => $employ['Employee']['dailyrate']));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td class="label">Pay Frequency</td>';
				echo '<td class="label">';
							echo $this->Form->input('payfrequency_id', array('label' => '', 'class' => 'select-style', 'empty' => true));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td width="20%">Hourly Rate</td>';
				echo '<td>';
					echo '<INPUT type="text" id="hourly" name="data[Employee][hourlyrate]" value="' . $employ['Employee']['hourlyrate'] . '">';	
					
					//echo $this->Form->input('hourlyrate', array('label' => '', 'class' => 'name'));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr><td colspan="5">&nbsp;</td></tr>';
			echo '<tr><td colspan="5">&nbsp;</td></tr>';		
			
			echo '<tr>';
				echo '<td class="label">PRC Number</td>';
				echo '<td class="label">';
					echo $this->Form->input('prcnumber', array('label' => '', 'class' => 'name'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td width="20%">ANSAP</td>';
				echo '<td>';
					echo $this->Form->input('ansap', array('label' => '', 'class' => 'name'));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td class="label">Validity</td>';
				echo '<td class="label">';
					echo $this->Form->input('validity', array('label' => '', 'class' => 'name', 'empty' => true));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td width="20%">Board Rating</td>';
				echo '<td>';
					echo $this->Form->input('boardrating', array('label' => '', 'class' => 'name'));
				echo '</td>';
			echo '</tr>';
			
		echo '</table>';
		
		echo '<table width="100%" class="employees">';
			echo '<tr>';
				echo '<td style="text-align: right;">';
					echo $this->Form->button('SAVE', array('name' => 'savedata'));
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
						echo $this->Form->input('birthdate', array('label' => '', 'class' => 'name', 'type' => 'date', 'empty' => true, 'minYear' => date('Y') - 70, 'maxYear' => date('Y') - 18, 'value' => $this->data['Employee']['birthdate']));
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
				echo '<td width="20%">Mother\'s Name</td>';
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
					echo $this->Form->input('email', array('label' => '', 'class' => 'name', 'type' => 'text'));
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
				echo '<td style="text-align: right;">';
					echo $this->Form->button('SAVE', array('name' => 'savedata'));
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
				echo '<th>Amount</th>';
				echo '<th>Pay Frequency</th>';
				echo '<th>Status</th>';
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
				echo '<td>';
					$stat = array('Inactive', 'Active');
					echo $stat[$e['Otherearningsentry']['status']];
				echo '</td>';
				echo '<td class="actions">';
					echo $this->Html->link(__('Update'), array('controller' => 'otherearningsentries', 'action' => 'edit', $e['Otherearningsentry']['id'], $id));
					echo '&nbsp;';
					echo $this->Html->link(__('Delete'), array('controller' => 'otherearningsentries', 'action' => 'delete',$e['Otherearningsentry']['id'], $id), array(), __('Are you sure you want to delete this?'));
					echo '&nbsp;';
					if($e['Otherearningsentry']['status'] == 1){
						echo $this->Html->link(__('Deactivate'), array('controller' => 'otherearningsentries', 'action' => 'updatestatus', $e['Otherearningsentry']['id'], $id, 0));
					}else{
						echo $this->Html->link(__('Activate'), array('controller' => 'otherearningsentries', 'action' => 'updatestatus', $e['Otherearningsentry']['id'], $id, 1));
					}
				echo '</td>';
			echo '</tr>';
		endforeach;
	}
		echo '<tr class="actions"><td colspan="7">' . $this->Html->link(__('Update'), array('controller' => 'otherearningsentries', 'action' => 'add', $id)) . '</td></tr>';
		echo '</table>';
		
		echo '<table class="bordered" width="90%">';
			echo '<tr><th colspan="4"><B>FIXED DEDUCTIONS</b></th></tr>';
				echo '<tr>';
				echo '<th>Health Card</th>';
				echo '<th>Coop Contri</th>';
			echo '</tr>';
			$deduction = $this->requestAction('deductions/searchdeductions/' . $employ['Employee']['id']);
			if(!empty($deduction)){		
				echo '<tr>';
					echo '<td>' .  $deduction['Deduction']['caritas'] .'</td>';
					echo '<td>' .  $deduction['Deduction']['cooploan'] .'</td>';					
					
				echo '</tr>';					
			}
	
			echo '<tr class="actions"><td colspan="4">';
				if(!empty($deduction)){
					echo $this->Html->link(__('Update'), array('controller' => 'deductions', 'action' => 'edit', $deduction['Deduction']['id'], $id));
					echo '&nbsp;';
					echo $this->Html->link(__('Delete'), array('controller' => 'deductions', 'action' => 'delete', $deduction['Deduction']['id'], $id), array(), __('Are you sure you want to delete this?'));
				}else{
					echo $this->Html->link(__('Update'), array('controller' => 'deductions', 'action' => 'add', $employ['Employee']['id']));
				}
				

			echo '</td></tr>';
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
					echo $this->Html->link(__('Update'), array('controller' => 'promotions', 'action' => 'edit', $p['Promotion']['id'], $id));
					echo $this->Html->link(__('Delete'), array('controller' => 'promotions', 'action' => 'delete',$p['Promotion']['id'], $id), array(), __('Are you sure you want to delete this?', $this->Form->value('Promotion.id')));
				echo '</td>';
			
			
			echo '</tr>';
		endforeach;
	}
		echo '<tr class="actions"><td colspan="7">' . $this->Html->link(__('Update'), array('controller' => 'promotions', 'action' => 'add', $id)) . '</td></tr>';
		echo '</table>';
		?>
  </div>
  
  <div id="tabs-5">
		<?php 
		$provider = $this->requestAction('medproviders/related/' . $employ['Employee']['medprovider_id']);
		$types = $this->requestAction('plantypes/related/' . $employ['Employee']['plantype_id']);
		$benefits = $this->requestAction('medbenefits/related/' . $employ['Employee']['id']);
		$hospitals = $this->requestAction('medhospitals/related/' . $employ['Employee']['medprovider_id']);
		$checkups = $this->requestAction('medcheckups/related/' . $employ['Employee']['id']);
		
		echo '<table class="form" style="font-size: 15px; font-weight: bold; width: 100%" >';
			echo '<tr>';
				echo '<td width="20%">Medical Provider</td>';
				echo '<td width="30%">';
					echo $this->Form->input('medprovider_id', array('label' => '', 'empty' => true, 'class' => 'select-style'));
				echo '</td>';
				echo '<td class="label" width="15%">Plantype</td>';
				echo '<td class="label">';
						echo $this->Form->input('plantype_id', array('label' => '', 'empty' => true, 'class' => 'select-style'));
				echo '</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td class="label" width="25%">Amount:</td>';
				echo '<td class="label" width="30%">';
					if(!empty($provider)){
						echo number_format($provider['Medprovider']['amount'], 2, '.', ',');
					}
				echo '</td>';
				echo '<td class="label" colspan="2" style="text-align: right; padding-right: 145px;">';
						echo $this->Form->button('Update', array('name' => 'savedata', 'class' => "none"));
				echo '</td>';
			echo '</tr>';
		echo '</table>';
		
		echo '<hr>';
		
		echo '<table class="form" style="font-size: 15px; font-weight: bold;">';
			echo '<tr>';
				echo '<td width="15%" valign="top">Benefits >></td>';
				echo '<td style="text-align: left;" valign="top">';
					if(!empty($benefits)){
						echo '<ul>';
						foreach ($benefits as $b):
							echo '<li>' . strtoupper($b['Medbenefit']['name'] . ' worth ' . number_format($b['Medbenefit']['amount'], 2, '.', ',')) . '</li>';
						endforeach;
						echo '</ul>';
					}
					
				echo '</td>';
				echo '<td class="label" width="15%" valign="top">Accredited Hospitals >></td>';
				echo '<td class="label" valign="top">';
						if(!empty($hospitals)){
							echo '<ul>';
							foreach ($hospitals as $b):
								echo '<li>' . strtoupper($b['Medhospital']['name']).'</li>';
							endforeach;
							echo '</ul>';
						}
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>&nbsp;</td>'; 
				echo '<td style="margin-top: 20px;" valign="top"><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; 
					echo $this->Html->link('Update Benefits', array('controller' => 'medbenefits', 'action' => 'add', $employ['Employee']['id']));
				echo '</td>';
				echo '<td colspan="2" style="text-align: right;">&nbsp;</td>'; 
			echo '</tr>';
		
			echo '<tr>';
				echo '<td colspan="4"><br/><br/></td>'; 
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="15%" valign="top">Accumulated Visits / Check Ups>></td>';
				echo '<td style="text-align: left;" valign="top">';
					if(!empty($checkups)){
						echo '<ul>';
						foreach ($checkups as $b):
							echo '<li>' . strtoupper($b['Medhospital']['name']) . ' <br> - ' . 
								date('F j, Y', strtotime($b['Medcheckup']['date'])) . ' <br> - ' . 
								number_format($b['Medcheckup']['fees'], 2, '.', ',') . '</li>';
						endforeach;
						echo '</ul>';
					}
					
				echo '</td>';
				echo '<td class="label" width="15%" valign="top"> </td>';
				echo '<td class="label" valign="top">';
						
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td>&nbsp;</td>'; 
				echo '<td style="margin-top: 20px;"><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'; 
					echo $this->Html->link('Update Check Up', array('controller' => 'medcheckups', 'action' => 'add', $employ['Employee']['id']));
				echo '</td>';
				echo '<td colspan="3" style="text-align: right;">&nbsp;</td>'; 
			echo '</tr>';
		echo '</table>';
		
		
		
		?>
		<br/><br/><br/>
  </div>
</div>
<?php }else{ ?>
		<table width="70%">
		<tr>
			<td>
				<div id="tabs" style="font-size: 12px;">
					<ul>
						<li><a href="#tabs-1">Upload Picture</a></li>
					</ul>
					<div id="tabs-1">
						<table class="form">
							<?php echo $this->Form->create('Employee', array('enctype' => 'multipart/form-data', 'onsubmit'=>'return confirm("The file will be uploaded from the selected examination type, Please re-check the filename then confirm by clicking OK");'));
									 ?>
							<tr>
								<td>
									<?php echo $this->Form->input('id', array('label' => ''	, 'type' => 'hidden')); ?>
									<?php echo $this->Form->file('picture', array('label' => '', 'class' => 'normalinputfile', 'id' => 'picture')); ?>
								</td>
							</tr>
							<tr>
								<td>
									<?php echo $this->Form->button('SAVE', array('name' => 'savedata')); ?>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</td>
		</tr>
	</table> <?php
} ?>
 
<script>
  $(function() {
    $( "#tabs" ).tabs();
  });
</script>
  
  
<SCRIPT language="javascript" type="text/javascript">
	function addition(){
		a=Number(document.Rate.number1.value);
		c=a/26;
		d=c/8;
		
		c = (c).toFixed(2);
		d = (d).toFixed(2);
		document.Rate.daily.value=c;
		document.Rate.hourly.value=d;
	}
</SCRIPT>

<SCRIPT language="javascript" type="text/javascript">
	function dailyrate(){
		a=Number(document.Rate.daily.value);
		c=a*26
		d=a/8;
		
		c = (c).toFixed(2);
		d = (d).toFixed(2);
		document.Rate.number1.value=c;
		document.Rate.hourly.value=d;
	}
</SCRIPT>