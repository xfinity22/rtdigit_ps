<?php echo $this->element('page_back', ['controller' => 'payrollperiods', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'Employee to Include in the Payroll']); ?>
<hr />
<div class="col-md-4">
<?php echo $this->Form->create('Periodinclude'); ?>

			<?php
				echo '<table class="table default_table table-condensed">';
					
					echo '<tr>';
						echo '<td colspan="3"><input type="button" id="toggle" value="Select All" onClick="do_this()" /></td>';
						
					echo '</tr>';
					$value = 0;
			foreach ($employees as $employee):
				
				$true = $this->requestAction(array('controller' => 'periodincludes', 'action' => 'checkemployee'), array($employee['Employee']['id'], $period));
				//if(empty($true)){
					$value++;
					echo '<tr>';
						echo '<td style="width: 10px; border-bottom: 1px solid #ccc">';
							echo '<input type="checkbox" name="data[Periodinclude][employee_id][]" value="' . $employee['Employee']['id'] . '" />';	
						echo '</td>';
						echo '<td style="width: 200px; border-bottom: 1px solid #ccc">' . $employee['Employee']['lastname'] . ', ' .  $employee['Employee']['firstname']  . '</td>';
						echo '<td style="border-bottom: 1px solid #ccc">' . $employee['Employee']['employeeno'] . '</td>';
					echo '</tr>';
				//}
				endforeach;	
					echo '<tr>';
						echo '<td colspan="3" style="text-align: right">';
							if($value > 0){
								echo $this->Form->end(__('Proceed >>'));
							}else{
								echo $this->Html->link('All Employees was Added. Process Payroll >>', array('action' => 'index'));
							}
						echo '</td>';
					echo '</tr>';
				echo '</table>';
			?>
		
</div>

<script type="text/javascript">
    function do_this(){
        var checkboxes = document.getElementsByName('data[Periodinclude][employee_id][]');
        var button = document.getElementById('toggle');

        if(button.value == 'Select All'){
            for (var i in checkboxes){
                checkboxes[i].checked = 'FALSE';
            }
            button.value = 'Deselect All'
        }else{
            for (var i in checkboxes){
                checkboxes[i].checked = '';
            }
            button.value = 'Select All';
        }
    }
</script>

