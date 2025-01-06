<?php echo $this->Form->create('Withholdingtax', array('class' => 'form')); ?>
	<fieldset>
		<legend><?php echo __('Add Withholdingtax'); ?></legend>
	<?php
	echo '<select name="data[Withholdingtax][taxdescription_id]" class="select-style">';
		foreach($taxdescriptions as $tax):
			echo '<option value="' . $tax['Taxdescription'][id] . '">' . $tax['Taxdescription'][taxtype] . ' - ' . $tax['Taxdescription'][description] . '</option>';
		endforeach;
	echo '</select>';
		//echo $this->Form->input('taxdescription_id');
		echo $this->Form->input('baseamount');
		echo $this->Form->input('endamount');
		echo $this->Form->input('excessof');
		echo $this->Form->input('basetax');
		echo $this->Form->input('percentamount');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
