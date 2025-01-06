<?php
$type_array = array('', 'Compensation', 'Awards and Recognition / Promotion', 'Memos', 'Others');
echo '<h3>NEW ' . strtoupper($type_array[$type]) . '</h3>';

?>

<br/>
<table width="70%">
	<tr>
		<td width="50px" valign="top">
			<div class="actions">
				<ul>
					<li><?php echo $this->Html->link(__('<< BACK TO TOPSHEET'), array('action' => 'view', $id)); ?></li>
				</ul>
			</div>
		</td>
		
		<td>
			<div id="tabs" style="font-size: 12px;">
				<ul>
					<li><a href="#tabs-1">New Entry (<?php echo $type_array[$type]; ?>)</a></li>
				</ul>
				<div id="tabs-1">
					<table class="form">
						<?php echo $this->Form->create('Topsheet'); ?>
						<tr>
							<td>Employee</td>
							<td>
								<?php echo $this->Form->input('employee_id', array('label' => '', 'class' => 'style-select')); ?>
							</td>
						</tr>
						<tr>
							<td>Type</td>
							<td>
								<?php echo $this->Form->input('type', array('label' => '', 'options' => $type_array, 'value' => $type)); ?>
							</td>
						</tr>
			<?php
				switch($type){ 
					case 1:
			
			?>
						<tr>
							<td>Date</td>
							<td>
								<?php echo $this->Form->input('compdate', array('label' => '')); ?>
							</td>
						</tr>
						
						<tr>
							<td>Basic</td>
							<td>
								<?php echo $this->Form->input('basic', array('label' => '')); ?>
							</td>
						</tr>
						
						<tr>
							<td>PAF</td>
							<td>
								<?php echo $this->Form->input('paf', array('label' => '')); ?>
							</td>
						</tr>
						
						<tr>
							<td>Reason For Adjustment</td>
							<td>
								<?php echo $this->Form->input('reasonadjustment', array('label' => '', 'type' => 'textarea')); ?>
							</td>
						</tr>
						
						<tr>
							<td>Total Salary</td>
							<td>
								<?php echo $this->Form->input('totalsalary', array('label' => '')); ?>
							</td>
						</tr>
				<?php 
					break;
					
					case 2: ?>
						<tr>
							<td>Date</td>
							<td>
								<?php echo $this->Form->input('promotiondate', array('label' => '')); ?>
							</td>
						</tr>
						
						<tr>
							<td>Award / Recognition / Promotion</td>
							<td>
								<?php echo $this->Form->input('award', array('label' => '')); ?>
							</td>
						</tr>
					
					
				<?php 
					break;
					
					
					case 3: ?>
						<tr>
							<td>Date</td>
							<td>
								<?php echo $this->Form->input('memodate', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Memo</td>
							<td>
								<?php echo $this->Form->input('memo', array('label' => '')); ?>
							</td>
						</tr>
					
					
				<?php 
					break;
					
					
					
					case 4: ?>
						<tr>
							<td>Label</td>
							<td>
								<?php echo $this->Form->input('others1', array('label' => '')); ?>
							</td>
						</tr>
						<tr>
							<td>Description</td>
							<td>
								<?php echo $this->Form->input('others2', array('label' => '')); ?>
							</td>
						</tr>
					
					
				<?php 
					break;
				}
			?>	
						<tr>
							<td>&nbsp;</td>
							<td>
								<?php echo $this->Form->end(__('Submit')); ?>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</td>
	</tr>
</table>





		   <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>	
		