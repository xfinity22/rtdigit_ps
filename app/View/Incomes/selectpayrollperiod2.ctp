<?php echo $this->element('page_title', ['title' => 'Payroll Period']); ?>
<?php echo $this->element('submenu/report'); ?>

<?php echo $this->Form->create('Income'); ?>

			<div class="contentindex col-md-6">
				<table class="table table-condensed default_table">
					 <thead>
					 <tr>
						<th colspan="3">GENERATE REPORT - Select Payroll Period</th>
					 </tr>
					 </thead>
					 <tr>
						<td style="padding: 5px; font-size: 15px; width: 130px; text-align: center;">
							SELECT BRANCH
						</td>
						
						<td style="padding: 5px; font-size: 15px; width: 120px; padding-top: 5px;">
							<?php echo $this->Form->input('branch_id', array('label' => false, 'class' => 'select-style', 'empty' => 'All')); ?> 
						</td>
					</tr>
					<tr>
						<td style="padding: 5px; font-size: 15px; width: 130px; text-align: center;">
							SELECT MONTH
						</td>
						<td style="padding: 5px; font-size: 15px; width: 120px; padding-top: 5px;">
						<?php 					
							
								echo '<select name="data[Income][month]" class="select-style" >';
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
								echo '&nbsp;';
							echo '</td>';
						echo '</tr>';
							echo '<td style="padding: 5px; font-size: 15px;  text-align: center">';
								echo 'YEAR';
							echo '</td>';
							echo '<td style="padding: 5px; font-size: 15px;">';
								echo '<input name="data[Income][year]" style="width: 100px;" class="name" value="'.date("Y").'">';
								//echo $this->Form->input('year', array('class' => 'name', 'label' => '', 'type' => 'text'));
								echo '<br/>';
							echo '</td>';
						echo '</tr>';
						echo '<td colspan="3" style="padding: 5px; font-size: 15px;  text-align: right">';
							echo $this->Form->end('Proceed');
							echo '</td>';
						?>
						
						</td>
					 </tr>
					
				</table>
			</div>
