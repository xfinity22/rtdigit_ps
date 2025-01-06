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
		->setCellValue('A1', 'PAYROLLPERIOD REPORT')
		->setCellValue('A2', STRTOUPPER($period['Payrollperiod']['period']))
		->setCellValue('A3', 'DAYS WORKED: '. $period['Payrollperiod']['dayswork']);
	
	$objPHPExcel->getActiveSheet()->freezePane('C5');
	$dept = 0;
	$col = 4;
	$count = 1;
	
	$sub = 0;
	$gtotal = 0;
	$headers = array("", "NAME", "RATE TYPE", "DAILY RATE", "GROSSINCOME", "ADJUSTMENTS", "TOTAL OT", "OT AMOUNT", "SSS", "PHILHEALTH", "HDMF", "ADVANCES", "MEDICAL", "COOP", "PENALTY", "TAX", "LWOP", "LATE", "LATE AMOUNT", "SUMARRY");
	$a = 'A';
	foreach ($headers as $header):
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue($a . $col, $header);
		$a++;
	endforeach;
	$col++;
if(!empty($incomes)){
	if($option != 0){
		foreach ($incomes as $income):
		if($income['Employee']['dem'] == $option ){
			if($dept != $income['Income']['department']){
				$objPHPExcel->getActiveSheet()->setCellValue('S' . $col, 'SUB TOTAL')->setCellValue('T' . $col, $sub);
				$sub = 0;
				$count = 1;
				$col = $col + 2;
				
				$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . $col . ':T' . $col);
				$objPHPExcel->getActiveSheet()->getStyle('A' .$col. ':T'.$col)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
				$objPHPExcel->getActiveSheet()->getStyle('A' .$col. ':T'.$col)->getFill()->getStartColor()->setARGB('b3d9ff');		
				
				$start = $col;
				$department = $this->requestAction('departments/getdepartment/' . $income['Income']['department']);
				$employee = $this->requestAction('employees/getemployee/' . $income['Income']['employee_id']);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $col, STRTOUPPER($department['Department']['name'] . ' DEPARTMENT'));
				$col++;
			
				$a = 'A';
				foreach ($headers as $header):
					$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue($a . $col, $header);
					$a++;
				endforeach;
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
			
			$name = $col + 3;
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . $col . ':A' . $name);	
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B' . $col . ':B' . $name);	
			$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A' . $col, $count)
				->setCellValue('B' . $col, STRTOUPPER($income['Employee']['lastname'] . ', ' . $income['Employee']['firstname'] . ' ' . $income['Employee']['middlename']))
				->setCellValue('C' . $col, 'Daily')
				->setCellValue('D' . $col, $income['Employee']['dailyrate'])
				->setCellValue('E' . $col, $income['Income']['grossincome'])
				->setCellValue('F' . $col, $income['Income']['adjustments'])
				->setCellValue('G' . $col, $th . 'hr ' . $tm . ' min')
				->setCellValue('H' . $col, $totalot)
				->setCellValue('I' . $col, $income['Income']['sss'])
				->setCellValue('J' . $col, $income['Income']['philhealth'])
				->setCellValue('K' . $col, $income['Income']['hdmf'])
				->setCellValue('L' . $col, $income['Income']['advances'])
				->setCellValue('M' . $col, $income['Income']['medical'])
				->setCellValue('N' . $col, $income['Income']['uniform'])
				->setCellValue('O' . $col, $income['Income']['penalty'])
				->setCellValue('P' . $col, $income['Income']['tax'])
				->setCellValue('Q' . $col, $income['Income']['absentamount'])
				->setCellValue('R' . $col, $income['Income']['hour'] . ' hr ' .  $income['Income']['minutes'] . ' min ')
				->setCellValue('S' . $col, $income['Income']['amount']);
				
				$gross = $income['Income']['grossincome'] + $income['Income']['adjustments'] + $totalot - ($income['Income']['sss'] +  $income['Income']['philhealth'] + $income['Income']['hdmf'] + $income['Income']['advances'] + $income['Income']['medical'] + $income['Income']['uniform'] + $income['Income']['penalty'] + $income['Income']['tax'] + $income['Income']['absentamount'] + $income['Income']['amount']);
				$objPHPExcel->getActiveSheet()->setCellValue('T' . $col, $gross);
			
			$b = 'C';
			$col++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C' . $col, 'OTHER EARNINGS');
			
			$e = 0;
			$earnings = $this->requestAction(array('controller' => 'earningrecords', 'action' => 'earnings'), array($income['Employee']['id'], $income['Income']['payrollperiod_id']));
			if(!empty($earnings)){
				foreach ($earnings as $earn):
				$earnname = $this->requestAction('otherearnings/getentry/' . $earn['Earningrecord']['otherearningsentry_id']);
					if(empty($earnname)){
							$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue($b . $col, $earn['Earningrecord']['description']);
							$b++;
							$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue($b . $col, $earn['Earningrecord']['totalamount']);
						}else{
							$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue($b . $col, $earnname['Otherearning']['name']);
							$b++;
							$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue($b . $col, $earn['Earningrecord']['totalamount']);
						}
					$e = $e + $earn['Earningrecord']['totalamount'];
					$b++;
				endforeach;
			}
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T' . $col, $e);
			$col++;
			
			$b = 'C';
			$deductiontotal = 0;
			$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('B' . $col, 'OTHER DEDUCTIONS');
			$deductions = $this->requestAction(array('controller' => 'deductions', 'action' => 'deductions'), array($income['Employee']['id'], $income['Income']['payrollperiod_id']));
			if(!empty($deductions)){
				foreach ($deductions as $deduction):
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue($b . $col, $deduction['Otherdeduction']['name']);
					$b++;
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue($b . $col, $deduction['Otherductionentry']['amount']);
					$deductiontotal = $deductiontotal + $deduction['Otherductionentry']['amount'];
					$b++;
				endforeach;
			}
			
			$col++;
			$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('B' . $col, 'OTHER DEDUCTIONS');
			$totalloans = 0;
			$loans = $this->requestAction(array('controller' => 'loanpayments', 'action' => 'selectloan'), array($income['Income']['payrollperiod_id'], $income['Employee']['id']));
			if(!empty($loans)){
				foreach ($loans as $loan):
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue($b . $col,  $loan['Loantype']['name']);
					$b++;
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue($b . $col, $loan['Loanpayment']['amount']);				
					$totalloans = $totalloans + $loan['Loanpayment']['amount'];
					$b++;
				endforeach;
			}
			$ded = $deductiontotal + $totalloans;
			
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T' . $col, $ded);
			
			$net = $gross + $e - $ded;
			$col++;
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('C' . $col . ':S' . $col);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C' . $col, 'TOTAL NET PAY')->setCellValue('T' . $col, $net);
			//$objPHPExcel->getActiveSheet()->getStyle('A' . $start . ':T' . $col)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			
			$count++;
			$sub = $sub + $net;
			$gtotal = $gtotal + $net;
			$col = $col + 2;
			$dept = $income['Income']['department'];
		}
		endforeach;
		
		
	}else{
		foreach ($incomes as $income):
			if($dept != $income['Income']['department']){
				$objPHPExcel->getActiveSheet()->setCellValue('S' . $col, 'SUB TOTAL')->setCellValue('T' . $col, $sub);
				$sub = 0;
				$count = 1;
				$col = $col + 2;
				
				$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . $col . ':T' . $col);
				$objPHPExcel->getActiveSheet()->getStyle('A' .$col. ':T'.$col)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
				$objPHPExcel->getActiveSheet()->getStyle('A' .$col. ':T'.$col)->getFill()->getStartColor()->setARGB('b3d9ff');		
				
				$start = $col;
				$department = $this->requestAction('departments/getdepartment/' . $income['Income']['department']);
				$employee = $this->requestAction('employees/getemployee/' . $income['Income']['employee_id']);
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $col, STRTOUPPER($department['Department']['name'] . ' DEPARTMENT'));
				$col++;
			
				$a = 'A';
				foreach ($headers as $header):
					$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue($a . $col, $header);
					$a++;
				endforeach;
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
			
			$name = $col + 3;
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . $col . ':A' . $name);	
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('B' . $col . ':B' . $name);	
			$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A' . $col, $count)
				->setCellValue('B' . $col, STRTOUPPER($income['Employee']['lastname'] . ', ' . $income['Employee']['firstname'] . ' ' . $income['Employee']['middlename']))
				->setCellValue('C' . $col, 'Daily')
				->setCellValue('D' . $col, $income['Employee']['dailyrate'])
				->setCellValue('E' . $col, $income['Income']['grossincome'])
				->setCellValue('F' . $col, $income['Income']['adjustments'])
				->setCellValue('G' . $col, $th . 'hr ' . $tm . ' min')
				->setCellValue('H' . $col, $totalot)
				->setCellValue('I' . $col, $income['Income']['sss'])
				->setCellValue('J' . $col, $income['Income']['philhealth'])
				->setCellValue('K' . $col, $income['Income']['hdmf'])
				->setCellValue('L' . $col, $income['Income']['advances'])
				->setCellValue('M' . $col, $income['Income']['medical'])
				->setCellValue('N' . $col, $income['Income']['uniform'])
				->setCellValue('O' . $col, $income['Income']['penalty'])
				->setCellValue('P' . $col, $income['Income']['tax'])
				->setCellValue('Q' . $col, $income['Income']['absentamount'])
				->setCellValue('R' . $col, $income['Income']['hour'] . ' hr ' .  $income['Income']['minutes'] . ' min ')
				->setCellValue('S' . $col, $income['Income']['amount']);
				
				$gross = $income['Income']['grossincome'] + $income['Income']['adjustments'] + $totalot - ($income['Income']['sss'] +  $income['Income']['philhealth'] + $income['Income']['hdmf'] + $income['Income']['advances'] + $income['Income']['medical'] + $income['Income']['uniform'] + $income['Income']['penalty'] + $income['Income']['tax'] + $income['Income']['absentamount'] + $income['Income']['amount']);
				$objPHPExcel->getActiveSheet()->setCellValue('T' . $col, $gross);
			
			$b = 'C';
			$col++;
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C' . $col, 'OTHER EARNINGS');
			
			$e = 0;
			$earnings = $this->requestAction(array('controller' => 'earningrecords', 'action' => 'earnings'), array($income['Employee']['id'], $income['Income']['payrollperiod_id']));
			if(!empty($earnings)){
				foreach ($earnings as $earn):
				$earnname = $this->requestAction('otherearnings/getentry/' . $earn['Earningrecord']['otherearningsentry_id']);
					if(empty($earnname)){
							$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue($b . $col, $earn['Earningrecord']['description']);
							$b++;
							$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue($b . $col, $earn['Earningrecord']['totalamount']);
						}else{
							$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue($b . $col, $earnname['Otherearning']['name']);
							$b++;
							$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue($b . $col, $earn['Earningrecord']['totalamount']);
						}
					$e = $e + $earn['Earningrecord']['totalamount'];
					$b++;
				endforeach;
			}
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T' . $col, $e);
			$col++;
			
			$b = 'C';
			$deductiontotal = 0;
			$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('B' . $col, 'OTHER DEDUCTIONS');
			$deductions = $this->requestAction(array('controller' => 'deductions', 'action' => 'deductions'), array($income['Employee']['id'], $income['Income']['payrollperiod_id']));
			if(!empty($deductions)){
				foreach ($deductions as $deduction):
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue($b . $col, $deduction['Otherdeduction']['name']);
					$b++;
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue($b . $col, $deduction['Otherductionentry']['amount']);
					$deductiontotal = $deductiontotal + $deduction['Otherductionentry']['amount'];
					$b++;
				endforeach;
			}
			
			$col++;
			$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('B' . $col, 'OTHER DEDUCTIONS');
			$totalloans = 0;
			$loans = $this->requestAction(array('controller' => 'loanpayments', 'action' => 'selectloan'), array($income['Income']['payrollperiod_id'], $income['Employee']['id']));
			if(!empty($loans)){
				foreach ($loans as $loan):
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue($b . $col,  $loan['Loantype']['name']);
					$b++;
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue($b . $col, $loan['Loanpayment']['amount']);				
					$totalloans = $totalloans + $loan['Loanpayment']['amount'];
					$b++;
				endforeach;
			}
			$ded = $deductiontotal + $totalloans;
			
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T' . $col, $ded);
			
			$net = $gross + $e - $ded;
			$col++;
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('C' . $col . ':S' . $col);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C' . $col, 'TOTAL NET PAY')->setCellValue('T' . $col, $net);
			//$objPHPExcel->getActiveSheet()->getStyle('A' . $start . ':T' . $col)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			
			$count++;
			$sub = $sub + $net;
			$gtotal = $gtotal + $net;
			$col = $col + 2;
			$dept = $income['Income']['department'];
		
		endforeach;
		
	}
	
}
	$objPHPExcel->getActiveSheet()->setCellValue('S' . $col, 'SUB TOTAL')->setCellValue('T' . $col, $sub);
	$col = $col + 2;
	$objPHPExcel->getActiveSheet()->setCellValue('S' . $col, 'TOTAL')->setCellValue('T' . $col, $gtotal);
	$col = $col + 2;
	
	$end = $col;
	$objPHPExcel->getActiveSheet()->getStyle('A4:T' . $col)->getAlignment()->setVERTICAL(PHPExcel_Style_Alignment::VERTICAL_CENTER);

	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(3);
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
	$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
	for ($col = 'C'; $col != 'V'; $col++) {
		$objPHPExcel->getActiveSheet()->getColumnDimension($col)->setWidth(14);
    }
	$objPHPExcel->getActiveSheet()->getStyle('A1' . ':T' . $end)->getFont()->setSize(8)->setName('Arial');	
	
	
// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('Report');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
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