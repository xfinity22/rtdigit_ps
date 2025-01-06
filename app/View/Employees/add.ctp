<?php echo $this->element('page_back', ['controller' => 'employees', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'Register New Employee']); ?>
<hr />

<div id="tabs" style="font-size: 12px;">
  <ul>
    <li><a href="#tabs-1">EMPLOYEE</a></li>
    <li><a href="#tabs-2">BACKGROUNDS</a></li> 
  </ul>
  <div id="tabs-1">
		<?php echo $this->Form->create('Employee', array('class' => 'form', 'name' => 'Rate')); ?>
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
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td class="label">Employee Number</td>';
				echo '<td class="label">';
					echo $this->Form->input('employeeno', array('label' => '', 'class'=> 'name', 'required' => true));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Date Hired</td>';
				echo '<td class="label">';
					echo $this->Form->input('datehired', array('label' => '', 'class' => 'name', 'empty' => true, 'minYear' => date('Y') - 70, 'maxYear' => date('Y')));
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
						echo $this->Form->input('dateregularized', array('label' => '', 'class' => 'name', 'empty' => true, 'minYear' => date('Y') - 70, 'maxYear' => date('Y')));
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
					echo $this->Form->input('daterigned', array('label' => '', 'class' => 'name', 'empty' => true, 'minYear' => date('Y') - 70, 'maxYear' => date('Y')));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Division</td>';
				echo '<td>';
					echo $this->Form->input('division_id', array('label' => '', 'class' => 'select-style', 'empty' => true));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Branch</td>';
				echo '<td class="label">';
					echo $this->Form->input('branch_id', array('label' => '', 'class' => 'select-style', 'empty' => true));	
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
							echo $this->Form->input('dateterminated', array('label' => '', 'class' => 'name', 'empty' => true, 'minYear' => date('Y') - 70, 'maxYear' => date('Y')));
							echo $this->Form->input('dateterminated', array('label' => '', 'class' => 'name', 'empty' => true, 'minYear' => date('Y') - 70, 'maxYear' => date('Y')));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%" rowspan="3">Fullname</td>';
				echo '<td>';
					echo $this->Form->input('lastname', array('label' => '', 'class' => 'name', 'placeholder' => 'Last Name', 'required' => true));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Employment Status</td>';
				echo '<td class="label">';
							
				echo '</td>';
			echo '</tr>';
				echo '<td>';
					echo $this->Form->input('firstname', array('label' => '', 'class' => 'name', 'placeholder' => 'First Name', 'required' => true));
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
					foreach($withholdingtaxes as $tax):
						echo '<input name="data[Employee][withholdingtax_id]" type="radio" value="' . $tax['Taxdescription']['id'] . '">'.$tax['Taxdescription']['taxtype'] . ' - ' . $tax['Taxdescription']['description'] .'<br/>';
					endforeach;
					
					echo '<table>';
						echo '<tr>';
							echo '<td style="width: 10px; margin: 0">'.$this->Form->input('notax', array('type' => 'checkbox', 'options' => array('Value 1' => 'Label 1'),'label' => '')).'</td>';
							echo '<td><label>Deduct Tax?</label></td>';
						echo '</tr>';
					echo '</table>';
					
					//echo $this->Form->input('withholdingtax_id', array('label' => '', 'class' => 'select-style'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Monthly Rate</td>';
				echo '<td class="label">';
							?>
							<INPUT type="text"  id="number1"  onkeyup="javascript:addition();" name="data[Employee][monthlyrate]"> <br>							
							<?php
							//echo $this->Form->input('monthlyrate', array('label' => '', 'class' => 'name'));
				echo '</td>';
			echo '</tr>';
			
			echo '<tr>';
				echo '<td width="20%">Rate Type</td>';
				echo '<td>';
					echo $this->Form->input('ratetype_id', array('label' => '', 'class' => 'select-style', 'default' => 2));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Daily Rate</td>';
				echo '<td class="label">';
							?>
							<INPUT type="text" id="daily" onkeyup="javascript:dailyrate();" name="data[Employee][dailyrate]"> <br>
							<?php
							//echo $this->Form->input('dailyrate', array('label' => '', 'class' => 'name'));
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
					?>
					<INPUT type="text" id="hourly" name="data[Employee][hourlyrate]"> <br>
					<?php
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
		?>

  </div>
  
  <div id="tabs-2">
	<?php
		echo '<table class="form">';
			echo '<tr>';
				echo '<td width="20%">Medical Provider</td>';
				echo '<td>';
					echo $this->Form->input('medprovider_id', array('label' => '', 'empty' => true, 'class' => 'select-style'));
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Plantype</td>';
				echo '<td class="label">';
						echo $this->Form->input('plantype_id', array('label' => '', 'empty' => true, 'class' => 'select-style'));
				echo '</td>';
			echo '</tr>';
			
   			echo '<tr>';
				echo '<td width="20%">Sex</td>';
				echo '<td>';
					echo $this->Form->input('sex', array('options' => array('Female', 'Male'), 'label' => '', 'class' => 'select-style')); 
				echo '</td>';
				echo '<td width="10%"></td>';
				echo '<td class="label">Birthdate</td>';
				echo '<td class="label">';
						echo $this->Form->input('birthdate', array('label' => '', 'class' => 'name', 'type' => 'date', 'empty' => true, 'minYear' => date('Y') - 70, 'maxYear' => date('Y') - 18));
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
	?>
  </div>
 
	<?php
	echo '<table width="90%" class="employees">';
		echo '<tr>';
			echo '<td >';
				echo $this->Form->end(__('Submit'));
			echo '</td>';
		echo '</tr>';
	echo '</table>';
	?>
</div>
 
 
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