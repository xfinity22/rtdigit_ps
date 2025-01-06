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
		->setCellValue('A2', STRTOUPPER($period['Payrollperiod']['period']));
	
	$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A4', '')
		->setCellValue('B4', 'ACCOUNT NUMBER')
		->setCellValue('C4', 'NAME')
		->setCellValue('D4', 'AMOUNT');
	$dept = 0;
	$col = 6;
	$count = 1;	
	$gtotal = 0;
if(!empty($incomes)){
	foreach ($incomes as $income):
		$employee = $this->requestAction('employees/getemployee/' . $income['Income']['employee_id']);
		//if(!empty($employee['Employee']['payrollaccountnumber'])){
			$ots = $this->requestAction(array('controller' => 'overtimes', 'action' => 'overtimes'), array($income['Employee']['id'], $income['Income']['payrollperiod_id']));
			$earnings = $this->requestAction(array('controller' => 'earningrecords', 'action' => 'earnings'), array($income['Employee']['id'], $income['Income']['payrollperiod_id']));
			$loans = $this->requestAction(array('controller' => 'loanpayments', 'action' => 'selectloan'), array($income['Income']['payrollperiod_id'], $income['Employee']['id']));
			$deductions = $this->requestAction(array('controller' => 'otherductionentries', 'action' => 'otherdeducts'), array($income['Employee']['id'], $income['Income']['payrollperiod_id']));
			
			$th = 0;
			$tm = 0;
			$totalot = 0;
			
			if(!empty($ots)){
				$th = 0;
				$tm =0;
				foreach ($ots as $ot):
					$totalot = $totalot + $ot['Overtime']['otamount'];
					$th = $th + $ot['Overtime']['ottotalhours'];
					$tm = $tm + $ot['Overtime']['ottotalminutes'];
				endforeach;
			}
			
			$gross = $income['Income']['grossincome'] + $income['Income']['adjustments'] + $totalot - ($income['Income']['sss'] +  $income['Income']['philhealth'] + $income['Income']['hdmf'] + $income['Income']['advances'] + $income['Income']['medical'] + $income['Income']['uniform'] + $income['Income']['penalty'] + $income['Income']['tax'] + $income['Income']['absentamount'] + $income['Income']['amount']);
		
			$e = 0;
			if(!empty($earnings)){
				foreach ($earnings as $earn):
				$earnname = $this->requestAction('otherearnings/getentry/' . $earn['Earningrecord']['otherearningsentry_id']);
					$e = $e + $earn['Earningrecord']['totalamount'];
				endforeach;
			}
		
			$deductiontotal = 0;
			if(!empty($deductions)){
				foreach ($deductions as $deduction):
					$deductiontotal = $deductiontotal + $deduction['Otherductionentry']['amount'];
				endforeach;
			}
		
			$totalloans = 0;		
			if(!empty($loans)){
				foreach ($loans as $loan):				
					$totalloans = $totalloans + $loan['Loanpayment']['amount'];
				endforeach;
			}
			
			$ded = $deductiontotal + $totalloans;
			$net = $gross + $e - $ded;			
			
			$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A' . $col, $count)
				->setCellValue('B' . $col, '\'' . $employee['Employee']['sssnumber'])
				->setCellValue('C' . $col, strtoupper($employee['Employee']['lastname'] . ', ' . $employee['Employee']['firstname'] . ' ' .$employee['Employee']['lastname']))
				->setCellValue('D' . $col, number_format($net, 2));
			
			$count++;
			$col++;
			$gtotal = $gtotal + $net;
		//}
		endforeach;
	}
	
	$col++;
	$end = $col;
	$objPHPExcel->getActiveSheet()->setCellValue('C' . $col, 'TOTAL')->setCellValue('D' . $col, number_format($gtotal, 2));
	for ($col = 'B'; $col != 'E'; $col++) {
       $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
    }
	
	$objPHPExcel->getActiveSheet()->getStyle('A1' . ':D' . $end)->getFont()->setSize(12)->setName('Arial');
	
// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('Report');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Payfile.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>