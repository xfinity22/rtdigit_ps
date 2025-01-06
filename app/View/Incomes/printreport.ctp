<?php
// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set properties
$objPHPExcel->getProperties()->setCreator("Administrator")
							 ->setLastModifiedBy("Administrator")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");
							 
	$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1', STRTOUPPER($profile['Companyprofile']['name']) . ' PAYROLLPERIOD REPORT')
		->setCellValue('A2', STRTOUPPER($period['Payrollperiod']['period'] . ' / ' . $branch));
	
	
	$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:V1');
	$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A2:V2');
	
	$objPHPExcel->getActiveSheet()->freezePane('C5');
	$dept = 'AAA';
	$col = 4;
	$count = 1;
	
	$sub = 0;
	$gtotal = 0;
	
	$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A' . $col, '')
					->setCellValue('B' . $col, 'Name')
					->setCellValue('C' . $col, 'No. of Days')
					->setCellValue('D' . $col, 'Daily Rate')
					->setCellValue('E' . $col, 'Basic Pay');

	
	$a = 'F';
	
	
	$z = 0;
	$err = array();
	$err1 = array();
	
	foreach ($otherearnings as $otherearning):
		$err[$z] = $otherearning['Earningrecord']['otherearningsentry_id'];
		$err1[$z] = $otherearning['Otherearning']['name'];
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $otherearning['Otherearning']['name']);
		$a++;
		$z++;
	endforeach;
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, 'Overtime Pay');
	$a++;
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, 'Gross Income');
	$a++;
	
	
	$headers = array("SSS", "Philhealth", "HDMF", "Tax", "Advances", "Medical", "Coop", "Penalty",  "Late Amount");
	$gross = 0;
	foreach ($headers as $header):
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $header);
		$a++;
	endforeach;
	
	//OD
	$z = 0;
	$od = array();
	$od1 = array();
	foreach ($otherdeductions as $otherdeduction):
		$od[$z] =  $otherdeduction['Otherductionentry']['otherdeduction_id'];
		$od1[$z] =  $otherdeduction['Otherdeduction1']['name'];
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $otherdeduction['Otherdeduction1']['name']);
		$a++;
		$z++;
	endforeach;
	//$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, 'TOTAL');
	//$a++;
	
	
	//LP
	$z = 0;
	$lp = array();
	$lp1 = array();
	foreach ($loantypes as $loantype):
		$lp[$z] = $loantype['Loanpayment']['loantype_id'];
		$lp1[$z] = $loantype['Loantype1']['name'];
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $loantype['Loantype1']['name']);
		$a++;
		$z++;
	endforeach;
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, 'TOTAL DEDUCTIONS');
	$a++;
	
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, 'NET PAY');
	$a++;
	$aa = $a;
	
	$col++;

	$i = 0;
	if(!empty($incomes)){
		foreach ($incomes as $income):
			if($dept != $income['Employee']['department_id']){
				$objPHPExcel->getActiveSheet()->setCellValue('S' . $col, 'SUB TOTAL')->setCellValue('T' . $col, $sub);
				$sub = 0;
				$count = 1;
				$col = $col++;
				
				$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . $col . ':T' . $col);
				$objPHPExcel->getActiveSheet()->getStyle('A' .$col. ':T'.$col)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
				$objPHPExcel->getActiveSheet()->getStyle('A' .$col. ':T'.$col)->getFill()->getStartColor()->setARGB('b3d9ff');		
					
				$start = $col;
				$department = $this->requestAction('departments/getdepartment/' . $income['Employee']['department_id']);
				// $employee = $this->requestAction('employees/getemployee/' . $income['Income']['employee_id']);
				if(!empty($department)){
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $col, STRTOUPPER($department['Department']['name'] . ' '));
				}else{
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $col, ' DEPARTMENT NOT DEFINED');
				}
				$col++;
				
			}
			
			
			$th = 0;
			$tm = 0;
			$totalot = 0;
			$ots = $this->requestAction(array('controller' => 'overtimes', 'action' => 'overtimes'), array($income['Employee']['id'], $income['Income']['payrollperiod_id']));
			if(!empty($ots)){
				$th = 0;
				$tm =0;
				foreach ($ots as $ot):
					$totalot = $totalot + $ot['Overtime']['otamount'];
					$th = $th + $ot['Overtime']['ottotalhours'];
					$tm = $tm + $ot['Overtime']['ottotalminutes'];
				endforeach;
			}
			
			if($income['Employee']['ratetype_id'] == 1){
				$basicpay = $income['Income']['grossincome'];
			}else{
				$basicpay = $income['Income']['dayswork'] * $income['Income']['rate'];
			}			
			
			$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A' . $col, $count)
				->setCellValue('B' . $col, ucwords($income['Employee']['lastname'] . ', ' . $income['Employee']['firstname'] . ' ' . $income['Employee']['middlename']))
				->setCellValue('C' . $col, $income['Income']['dayswork'])
				->setCellValue('D' . $col, $income['Income']['rate'])
				->setCellValue('E' . $col, $basicpay);
		
			
			$deductionstotal = $income['Income']['sss'] + $income['Income']['philhealth']+ $income['Income']['hdmf']+ $income['Income']['advances']+ $income['Income']['medical']+ $income['Income']['uniform'] + $income['Income']['penalty']+ $income['Income']['tax']+ $income['Income']['absentamount']+ $income['Income']['amount'];
				//$objPHPExcel->getActiveSheet()->setCellValue('T' . $col, $gross);
				
			$e = 0;
			$a = 'F';
			$z = 0;
			foreach ($err as $otherearning):
				$eamount = 0;
				$search = $this->requestAction('');
				$earnings = $this->requestAction(array('controller' => 'earningrecords', 'action' => 's_earnings'), array($income['Employee']['id'], $income['Income']['payrollperiod_id'], $err[$z]));
				if(!empty($earnings)){
					foreach ($earnings as $er):
						$eamount = $eamount + $er['Earningrecord']['totalamount'];
					endforeach;
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $eamount);
				}else{
					$eamount = 0;
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $eamount);
				}
					
				$a++;
				$e = $e + $eamount;
				$z++;
			endforeach;
			
			
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $totalot);			
			$a++;
			
			$gross = $income['Income']['grossincome'] + $totalot + $e;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $gross);
			$a++;
				
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $income['Income']['sss']); $a++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $income['Income']['philhealth']); $a++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $income['Income']['hdmf']); $a++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $income['Income']['tax']); $a++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $income['Income']['advances']); $a++;			
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $income['Income']['medical']); $a++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $income['Income']['uniform']); $a++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $income['Income']['penalty']); $a++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $income['Income']['amount']); $a++;	
				
			//OD
			$ded = 0;
			$z = 0;
			foreach ($od as $otherdeduction):
				$eamount = 0;
				$deductions = $this->requestAction(array('controller' => 'otherductionentries', 'action' => 's_deduction'), array($income['Employee']['id'], $income['Income']['payrollperiod_id'], $od[$z]));
				if(!empty($deductions)){
					foreach ($deductions as $d):
						$eamount = $eamount + $d['Otherductionentry']['amount'];
					endforeach;						
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $eamount);
				}else{
					$eamount = 0;
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $eamount);
				}
					
				$a++;
				$ded = $ded + $eamount;
				$z++;
			endforeach;
			
				
			$totalloans = 0;
			$z = 0;
			foreach ($lp as $loantype):
				$eamount = 0;
				$loans = $this->requestAction(array('controller' => 'loanpayments', 'action' => 's_loan'), array($income['Employee']['id'], $income['Income']['payrollperiod_id'], $lp[$z]));
				if(!empty($loans)){
					foreach ($loans as $loan):
						$eamount = $eamount + $loan['Loanpayment']['amount'];						
					endforeach;
						
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $eamount);
				}else{
					$eamount = 0;
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $eamount);
				}
					
				$a++;
				$totalloans = $totalloans + $eamount;
				$z++;
			endforeach;
							
			$deductionstotal = $deductionstotal + $ded + $totalloans;
			
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $deductionstotal);
			$a++;
			$net = $gross - $deductionstotal;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue($a . $col, $net);
			
			$col++;
			$i++;
			$count++;
			$sub = $sub + $net;
			$gtotal = $gtotal + $net;
			$dept = $income['Employee']['department_id'];
		endforeach;
		
	}
	
	
	if(count($incomes) == 0){
		$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . $col . ':V' . $col);
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $col, 'NO DATA FOUND');
	}
	
	

	// $objPHPExcel->getActiveSheet()->setCellValue('B' . $col, 'SUB TOTAL')->setCellValue($a . $col, $sub);
	// $col++;
	// $objPHPExcel->getActiveSheet()->setCellValue('B' . $col, 'TOTAL')->setCellValue($a . $col, $gtotal);
	$col = $col + 2;
	$a++;
	
	$end = $col;
	$objPHPExcel->getActiveSheet()->getStyle('A4:'. $aa . $col)->getAlignment()->setVERTICAL(PHPExcel_Style_Alignment::VERTICAL_CENTER);

	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(3);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
	
	for ($col = 'B'; $col != $a; $col++) {
		$objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
    }
	
	$end2 = $end - 2;
	$end = $end - 3;
	
	if(count($incomes) > 0){
		for ($col = 'C'; $col != $a; $col++) {
			$objPHPExcel->getActiveSheet()->setCellValue($col . $end2, '=SUM('.$col. '6' . ':' . $col . $end . ')');
			if($option < 2){
				$value = $objPHPExcel->getActiveSheet()->getCell($col . $end2)->getCalculatedValue();		
				if($value == 0){
					$objPHPExcel->getActiveSheet()->getColumnDimension($col)->setVisible(false);
				}
			}
		}
	}
	
	$end = $end + 5;
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $end, 'Prepared By');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D' . $end, 'Checked By');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H' . $end, 'Approved By');
	
	
	$end = $end + 4;
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $end, 'Payroll Department');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D' . $end, 'HR manager');
	$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H' . $end, 'President / Owner');
	
	
	$objPHPExcel->getActiveSheet()->getStyle('A1' . ':'. $aa . $end2)->getFont()->setSize(8)->setName('Arial');	
	$objPHPExcel->getActiveSheet()->getStyle('C6' . ':'. $aa . $end2)->getNumberFormat()->setFormatCode('#,##0.00');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

if($option == 0){
	header('Content-Disposition: attachment;filename="Overall_Report.xlsx"');
}else if($option == 1){
	header('Content-Disposition: attachment;filename="Bank_Report.xlsx"');
}else if($option == 2){
	header('Content-Disposition: attachment;filename="Cash_Report.xlsx"');
}

header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>