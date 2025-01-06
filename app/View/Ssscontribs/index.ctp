<?php echo $this->element('page_back', ['controller' => 'overtimerates', 'action' => 'index']); ?>
<?php echo $this->element('page_title', ['title' => 'SSS Contribution Table']); ?>
<hr />

	<table class="table table-condensed default_table">
	<thead>
	
		<tr>
			<th rowspan="4"></th>
			<th rowspan="3"><center>RANGE OF COMPENSATION</th>
			<th colspan="3"><center>MONTHLY SALARY CREDIT</th>
			<th colspan="10"><center>EMPLOYER - EMPLOYEE</th>
			<th rowspan="3" class="actions"><?php echo __('ACTIONS'); ?></th>
		</tr>
		
		<tr>
			<th rowspan="2"><center>REGULAR<br/>SOCIAL<br/>SECURITY</th>
			<th rowspan="2">MANDATORY<br/>PROVIDENT<br/>FUND</th>
			<th rowspan="2">TOTAL</th>
			
			<th colspan="3"><center>SOCIAL SECURITY</th>
			<th rowspan="2"><center>EC</th>
			<th colspan="3"><center>MANDATORY PROVIDENT FUND</th>
			<th colspan="3"><center>TOTAL</th>
		</tr>
		
		<tr>
			<th>ER</th>
			<th>EE</th>
			<th>TOTAL</th>
			<th>ER</th>
			<th>ER</th>
			<th>EE</th>
			<th>ER</th>
			<th>EE</th>
			<th>TOTAL</th>
			
		</tr>
	</thead>
	<tbody>
	<?php foreach ($ssscontribs as $ssscontrib): ?>
	<tr>
		<td><?php echo $ssscontrib['Ssscontrib']['id']; ?></td>
		<td><?php echo number_format($ssscontrib['Ssscontrib']['rangestart'], '2', '.', ',') . ' - ' . number_format($ssscontrib['Ssscontrib']['rangeend'], '2', '.', ','); ?>&nbsp;</td>
		<td><?php echo number_format($ssscontrib['Ssscontrib']['msc'], '2', '.', ','); ?>&nbsp;</td>
		<td><?php echo number_format($ssscontrib['Ssscontrib']['mandatory'], '2', '.', ','); ?>&nbsp;</td>
		<td><?php 
			$total1 = $ssscontrib['Ssscontrib']['msc'] + $ssscontrib['Ssscontrib']['mandatory']; 
			echo number_format($total1, '2', '.', ','); ?>&nbsp;
		</td>
		<td><?php echo number_format($ssscontrib['Ssscontrib']['erss'], '2', '.', ','); ?>&nbsp;</td>
		<td><?php echo number_format($ssscontrib['Ssscontrib']['eess'], '2', '.', ','); ?>&nbsp;</td>
		<td><?php echo number_format($ssscontrib['Ssscontrib']['toatlss'], '2', '.', ','); ?>&nbsp;</td>
		<td><?php echo number_format($ssscontrib['Ssscontrib']['erec'], '2', '.', ','); ?>&nbsp;</td>
		<td><?php echo number_format($ssscontrib['Ssscontrib']['mandatoryer'], '2', '.', ',');; ?>&nbsp;</td>
		<td><?php echo number_format($ssscontrib['Ssscontrib']['mandatoryee'], '2', '.', ','); ?>&nbsp;</td>
		<td><?php echo number_format($ssscontrib['Ssscontrib']['mandatorytotal'], '2', '.', ','); ?>&nbsp;</td>
		<td><?php 
			$total1 = $ssscontrib['Ssscontrib']['ertotal'] + $ssscontrib['Ssscontrib']['mandatoryer']; 
			echo number_format($total1, '2', '.', ','); ?>&nbsp;
		</td> 
		
		<td><?php 
			$total1 = $ssscontrib['Ssscontrib']['eetotal'] + $ssscontrib['Ssscontrib']['mandatoryee']; 
			echo number_format($total1, '2', '.', ','); ?>&nbsp;
		</td>
		
		
		<td><?php 
			echo number_format($ssscontrib['Ssscontrib']['total'], '2', '.', ','); ?>&nbsp;
		</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $ssscontrib['Ssscontrib']['id'])); ?>
			<?php echo $this->Html->link(__('Update'), array('action' => 'edit', $ssscontrib['Ssscontrib']['id'])); ?>
			<?php // echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ssscontrib['Ssscontrib']['id']), array(), __('Are you sure you want to delete # %s?', $ssscontrib['Ssscontrib']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	<tr>
		<td colspan="12">
			<div class="paging">
			<?php
				echo $this->Paginator->prev('< ' . __('Prev'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled'));
			?>
			</div>
		</td>
	</tr>
	</table>