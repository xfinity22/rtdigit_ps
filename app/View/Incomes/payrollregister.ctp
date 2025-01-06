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

	$a = $income['Income']['grossincome'] + $income['Income']['adjustments'];
	$e = 0;
	$totalearnings = 0;
	$total2 = 0;
		
	if(!empty($earnings)){
		foreach ($earnings as $earn):
			$earnname = $this->requestAction('otherearnings/getentry/' . $earn['Earningrecord']['otherearningsentry_id']);
			
			if($earnname['Otherearning']['taxableincome'] == 1){
				$totalearnings = $totalearnings + $earn['Earningrecord']['totalamount'];
			}else{
				$total2 = $total2 + $earn['Earningrecord']['totalamount'];
			}
			$e = $e + $earn['Earningrecord']['totalamount'];
			
		endforeach;
	}

	$deductiontotal = 0;
	
	if(!empty($deductions)){
		foreach ($deductions as $deduction):
			$deductiontotal = $deductiontotal + $deduction['Otherductionentry']['amount'];
		endforeach;
	}

		
	//LOANS
	$totalloans = 0;
	$tax = 0;
	$total = 0;
	$tax1 = 0;
	$tax2 = 0;
	$excess = 0;
	$gov = 0;
	$tard = 0;
	$totaltax = 0;
	$deductiontotal = 0;
	$totalnetincome = 0;
	
		//TAX COMPUTATION
	$total = $income['Income']['grossincome'] + $totalearnings;		
	$gov = $income['Income']['sss'] + $income['Income']['philhealth']  + $income['Income']['hdmf'];		
	$tard = $income['Income']['amount']+ $income['Income']['absentamount'];		
	$deductions = $gov + $tard;		
	$taxableincome = $total - $deductions;
	
	if(!empty($employee['Employee']['withholdingtax_id'])){
		$tax = $this->requestAction(array('controller' => 'withholdingtaxes', 'action' => 'taxbase'), array($employee['Employee']['withholdingtax_id'], $taxableincome));
	
		if(empty($tax)){
			$tax1 = 0;
		}else{
			$tax1 = $tax['Withholdingtax']['basetax'];
		}
			
		$excess = $taxableincome -  $tax['Withholdingtax']['baseamount'];
		$tax2 = $excess *  ($tax['Withholdingtax']['percentamount']/100);
		$totaltax = $tax1 + $tax2;
	}	
		
	$deductiontotal =  $deductiontotal + $income['Income']['sss'] +  $income['Income']['philhealth'] +  $income['Income']['hdmf'] +  $income['Income']['advances'] +  $income['Income']['medical'] +  $income['Income']['uniform'] +  $income['Income']['penalty'] +  $income['Income']['tax'] +  $income['Income']['amount'] +  +  $income['Income']['absentamount'] +  $totalloans;
		
		
		
	$totalnetincome = ($a +  $e) - $deductiontotal;
							 

	$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A5', 'NAME OF EMPLOYEE')
		->setCellValue('A6', 'EMP NO.')
		->setCellValue('A7', 'GRADE-STEP')
		->setCellValue('A8', 'TAX EXEMP CODE')
		->setCellValue('A9', 'DEPARTMENT')
		->setCellValue('A10', 'DEPT. CODE')
		->setCellValue('A11', 'PERIOD COVERED')
		->setCellValue('A12', 'SAVINGS ACCOUNT NO.')
		->setCellValue('A13', '---------------------------')
		->setCellValue('C7', 'GSIS L & R')
		->setCellValue('C8', 'MCARE PREM')
		->setCellValue('C9', 'W/TAX')
		->setCellValue('C10', 'PF-REG SHR')
		->setCellValue('C11', 'PF-IHP SHR')
		->setCellValue('C12', 'A/R TRN USAGE')
		->setCellValue('C13', '---------------------------')
		->setCellValue('E7', 'A/R OPYMT')
		->setCellValue('E8', 'A/R')
		->setCellValue('E9', 'A/R TAX DEF')
		->setCellValue('E10', 'A/R PEEA/VISA')
		->setCellValue('E11', 'A/R CSADV')
		->setCellValue('E12', 'A/R TEL')
		->setCellValue('E13', '---------------------------')
		->setCellValue('G5', 'ANNUAL BASIC SALARY')
		->setCellValue('G6', 'RATA')
		->setCellValue('G7', 'A/R HSPTZN')
		->setCellValue('G8', 'PF-IHP LOAN')
		->setCellValue('G9', 'PF-MP LOAN')
		->setCellValue('G10', 'PF-CAR PLAN')
		->setCellValue('G11', 'PF-CAR LOAN')
		->setCellValue('G12', 'PF INS/REG')
		->setCellValue('G13', '---------------------------')
		->setCellValue('I4', 'DWOP/LWOP')
		->setCellValue('I5', 'DAYS SERVED')
		->setCellValue('I6', 'MEAL SUBS')
		->setCellValue('I8', 'IHP')
		->setCellValue('I9', 'NHMFC')
		->setCellValue('I10', 'PIBIG SHR')
		->setCellValue('I11', 'PIBIG RELN')
		->setCellValue('I12', 'PIBIG MPLN')
		->setCellValue('I13', '---------------------------')
		->setCellValue('K5', 'SALARY DUE')
		->setCellValue('K6', 'PERA')
		->setCellValue('K7', 'GSIS OPINS')
		->setCellValue('K8', 'GSIS RELON')
		->setCellValue('K9', 'GSIS SALON')
		->setCellValue('K10', 'GSIS SP LN')
		->setCellValue('K11', 'GSIS ESL')
		->setCellValue('K12', 'GSIS EPLUS')
		->setCellValue('K13', '---------------------------')
		->setCellValue('M5', 'INTERIM FA')
		->setCellValue('M6', 'ADCOM')
		->setCellValue('M7', 'GSIS EDPLN')
		->setCellValue('M8', 'GSIS HSPLN')
		->setCellValue('M9', 'GSIS MEMPLN')
		->setCellValue('M10', 'DEATH CONT')
		->setCellValue('M11', 'EMP UNION')
		->setCellValue('M12', 'ADCO FEE')
		->setCellValue('M13', '---------------------------')
		->setCellValue('O6', 'CHILD ALLOW')
		->setCellValue('O7', 'CRUN DUES')
		->setCellValue('O8', 'CRUN LOAN')
		->setCellValue('O9', 'PHYFIT')
		->setCellValue('O10', 'HPMEM FEE')
		->setCellValue('O11', 'GOLF FEE')
		->setCellValue('O12', 'PHILAM ')
		->setCellValue('O13', '---------------------------')
		->setCellValue('Q6', 'LONG PAY')
		->setCellValue('Q7', 'INSULAR')
		->setCellValue('Q8', 'S-O-MATIC')
		->setCellValue('Q9', 'CAL LN')
		->setCellValue('Q10', 'COOP LN')
		->setCellValue('Q13', '---------------------------')
		->setCellValue('S6', '(BANK SHARES)')
		->setCellValue('S7', 'GSIS L & R')
		->setCellValue('S8', 'MEDICARE PREM')
		->setCellValue('S9', 'STATE INSU')
		->setCellValue('S10', 'PF-IHP CONTRI')
		->setCellValue('S11', 'PF-REG CONTRI')
		->setCellValue('S12', 'PAG-IBIG SHARE')
		->setCellValue('S13', '---------------------------')
		->setCellValue('U5', 'TOT TAXABLE')
		->setCellValue('U6', 'TOT NON-TAX')
		->setCellValue('U7', 'GROSS INC')
		->setCellValue('U8', 'TOTAL DEDN')
		->setCellValue('U9', 'NET PAY')
		->setCellValue('U10', 'COMSA')
		->setCellValue('U11', 'PREV SAL')
		->setCellValue('U12', 'SALARY DUE')
		->setCellValue('U13', '---------------------------');
		
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A17', $employee['Employee']['fullname'])
		->setCellValue('A18', '\'' .$employee['Employee']['employeeno'])
		->setCellValue('A19', '')
		->setCellValue('A20', 'XXXXXXXXX')
		->setCellValue('A21', $employee['Department']['name'])
		->setCellValue('A22', 'XXXXXXXX')
		->setCellValue('A23', 'XXXXXXXX')
		->setCellValue('A24', 'XXXXXXXX')
		->setCellValue('A25', '---------------------------')
		->setCellValue('C19', $income['Income']['sss'])
		->setCellValue('C20', '0.00')
		->setCellValue('C21', $income['Income']['tax'])
		->setCellValue('C22', '0.00')
		->setCellValue('C23', '0.00')
		->setCellValue('C24', '0.00')
		->setCellValue('C25', '---------------------------')
		->setCellValue('E19', '0.00')
		->setCellValue('E20', '0.00')
		->setCellValue('E21', '0.00')
		->setCellValue('E22', '0.00')
		->setCellValue('E23', '0.00')
		->setCellValue('E24', '0.00')
		->setCellValue('E25', '---------------------------')
		->setCellValue('G17', $employee['Employee']['monthlyrate'] * 12) 
		->setCellValue('G18', '0.00')
		->setCellValue('G19', '0.00')
		->setCellValue('G20', '0.00')
		->setCellValue('G21', '0.00')
		->setCellValue('G22', '0.00')
		->setCellValue('G23', '0.00')
		->setCellValue('G24', '0.00')
		->setCellValue('G25', '---------------------------')
		->setCellValue('I17', $income['Income']['dayswork'])
		->setCellValue('I18', '0.00')
		->setCellValue('I20', '0.00')
		->setCellValue('I21', '0.00')
		->setCellValue('I22', $income['Income']['hdmf'])
		->setCellValue('I23', '0.00')
		->setCellValue('I24', '0.00')
		->setCellValue('I25', '---------------------------')
		->setCellValue('K17', $employee['Employee']['monthlyrate'] / 2)
		->setCellValue('K18', '0.00')
		->setCellValue('K19', '0.00')
		->setCellValue('K20', '0.00')
		->setCellValue('K21', '0.00')
		->setCellValue('K22', '0.00')
		->setCellValue('K23', '0.00')
		->setCellValue('K24', '0.00')
		->setCellValue('K25', '---------------------------')
		->setCellValue('M17', '0.00')
		->setCellValue('M18', '0.00')
		->setCellValue('M19', '0.00')
		->setCellValue('M20', '0.00')
		->setCellValue('M21', '0.00')
		->setCellValue('M22', '0.00')
		->setCellValue('M23', '0.00')
		->setCellValue('M24', '0.00')
		->setCellValue('M25', '---------------------------')
		->setCellValue('O18', '0.00')
		->setCellValue('O19', '0.00')
		->setCellValue('O20', '0.00')
		->setCellValue('O21', '0.00')
		->setCellValue('O12', '0.00')
		->setCellValue('O23', '0.00')
		->setCellValue('O24', '0.00')
		->setCellValue('O25', '---------------------------')
		->setCellValue('Q18', '0.00')
		->setCellValue('Q19', '0.00')
		->setCellValue('Q20', '0.00')
		->setCellValue('Q21', '0.00')
		->setCellValue('Q22', '0.00')
		->setCellValue('Q25', '---------------------------')
		->setCellValue('S18', '0.00')
		->setCellValue('S19', $income['Income']['sss'])
		->setCellValue('S20', '0.00')
		->setCellValue('S21', '0.00')
		->setCellValue('S22', '0.00')
		->setCellValue('S23', '0.00')
		->setCellValue('S24', $income['Income']['hdmf'])
		->setCellValue('S25', '---------------------------')
		->setCellValue('U17', $totalearnings)
		->setCellValue('U18', $total)
		->setCellValue('U19', $income['Income']['grossincome'])
		->setCellValue('U20', $deductiontotal)
		->setCellValue('U21', $totalnetincome)
		->setCellValue('U22', '0.00')
		->setCellValue('U23', '0.00')
		->setCellValue('U24', '0.00')
		->setCellValue('U25', '---------------------------');
		
	$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('C29', $income['Income']['sss'])
		->setCellValue('C30', '0.00')
		->setCellValue('C31', $income['Income']['tax'])
		->setCellValue('C32', '0.00')
		->setCellValue('C33', '0.00')
		->setCellValue('C34', '0.00')
		->setCellValue('C35', '---------------------------')
		->setCellValue('E29', '0.00')
		->setCellValue('E30', '0.00')
		->setCellValue('E31', '0.00')
		->setCellValue('E32', '0.00')
		->setCellValue('E33', '0.00')
		->setCellValue('E34', '0.00')
		->setCellValue('E35', '---------------------------')
		->setCellValue('G27', $employee['Employee']['monthlyrate'] * 12)
		->setCellValue('G28', '0.00')
		->setCellValue('G29', '0.00')
		->setCellValue('G30', '0.00')
		->setCellValue('G31', '0.00')
		->setCellValue('G32', '0.00')
		->setCellValue('G33', '0.00')
		->setCellValue('G34', '0.00')
		->setCellValue('G35', '---------------------------')
		->setCellValue('I27', $income['Income']['dayswork'])
		->setCellValue('I28', '0.00')
		->setCellValue('I29', '0.00')
		->setCellValue('I31', '0.00')
		->setCellValue('I32', $income['Income']['hdmf'])
		->setCellValue('I33', '0.00')
		->setCellValue('I34', '0.00')
		->setCellValue('I35', '---------------------------')
		->setCellValue('K27', $employee['Employee']['monthlyrate'] / 2)
		->setCellValue('K28', '0.00')
		->setCellValue('K29', '0.00')
		->setCellValue('K30', '0.00')
		->setCellValue('K31', '0.00')
		->setCellValue('K32', '0.00')
		->setCellValue('K33', '0.00')
		->setCellValue('K34', '0.00')
		->setCellValue('K35', '---------------------------')
		->setCellValue('M27', '0.00')
		->setCellValue('M28', '0.00')
		->setCellValue('M29', '0.00')
		->setCellValue('M30', '0.00')
		->setCellValue('M31', '0.00')
		->setCellValue('M32', '0.00')
		->setCellValue('M33', '0.00')
		->setCellValue('M34', '0.00')
		->setCellValue('M35', '---------------------------')
		->setCellValue('O28', '0.00')
		->setCellValue('O29', '0.00')
		->setCellValue('O30', '0.00')
		->setCellValue('O31', '0.00')
		->setCellValue('O12', '0.00')
		->setCellValue('O33', '0.00')
		->setCellValue('O34', '0.00')
		->setCellValue('O35', '---------------------------')
		->setCellValue('Q28', '0.00')
		->setCellValue('Q29', '0.00')
		->setCellValue('Q30', '0.00')
		->setCellValue('Q31', '0.00')
		->setCellValue('Q32', '0.00')
		->setCellValue('Q35', '---------------------------')
		->setCellValue('S28', '0.00')
		->setCellValue('S29', $income['Income']['sss'])
		->setCellValue('S30', '0.00')
		->setCellValue('S31', '0.00')
		->setCellValue('S32', '0.00')
		->setCellValue('S33', '0.00')
		->setCellValue('S34', $income['Income']['hdmf'])
		->setCellValue('S35', '---------------------------')
		->setCellValue('U27', $totalearnings)
		->setCellValue('U28', $total)
		->setCellValue('U29', $income['Income']['grossincome'])
		->setCellValue('U30', $deductiontotal)
		->setCellValue('U41', $totalnetincome)
		->setCellValue('U32', '0.00')
		->setCellValue('U33', '0.00')
		->setCellValue('U34', '0.00')
		->setCellValue('U35', '---------------------------');
		
	$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A73', 'SUMMARY OF BANK EXPENSES:')
		->setCellValue('A74', 'GROSS AMOUNT DUE (NET OF DWOP) . . . .')
		->setCellValue('A75', 'ADD: BANK SHARES:')
		->setCellValue('A76', '   GSIS LIFE & RET. ')
		->setCellValue('A77', '   MEDICARE PREMIUMS')
		->setCellValue('A78', '   STATE INSURANCE')
		->setCellValue('A79', '   PF-IHP CONTRIBUTION')
		->setCellValue('A80', '   PF-REG CONTRIBUTION')
		->setCellValue('A81', '   P-IBIG CONTRIBUTION')
		->setCellValue('A83', 'TOTAL BANK EXPENSES . . . . . . . . .')
		->setCellValue('C76', '0.00')
		->setCellValue('C77', '0.00')
		->setCellValue('C78', '0.00')
		->setCellValue('C79', '0.00')
		->setCellValue('C80', '0.00')
		->setCellValue('C81', $income['Income']['hdmf'])
		->setCellValue('C82', '0.00')
		->setCellValue('E74', $income['Income']['grossincome'])
		->setCellValue('E81', '0.00')
		->setCellValue('C82', '---------------------------')
		->setCellValue('E82', '---------------------------')
		->setCellValue('E83', $income['Income']['grossincome'] + $income['Income']['hdmf'])
		->setCellValue('A86', 'PREPARED BY:')
		->setCellValue('G86', 'PAYMENT RECOMMENDED:')
		->setCellValue('O86', 'PAYMENT APPROVED:')
		->setCellValue('A90', 'JONATHAN T. ROBINOS')
		->setCellValue('G90', 'MA. DIVINA P. LAYSON')
		->setCellValue('O90', 'AVP VERONICA C. ERNACIO')
		->setCellValue('A91', 'HRMO III')
		->setCellValue('A92', 'Human Resource Management Group')
		->setCellValue('G92', 'Human Resource Management Group')
		->setCellValue('O92', 'Human Resource Management Group');
		
		
		
	$a = 37;
	while ($a != 72){
		$objPHPExcel->getActiveSheet()->getRowDimension($a)->setVisible(false);
		$a++;
	}
	$dept = 0;
	$col = 6;
	$count = 1;	
	$gtotal = 0;

	
	$end = 100;
	$objPHPExcel->getActiveSheet()->setCellValue('C' . $col, 'TOTAL')->setCellValue('D' . $col, $gtotal);
	for ($col = 'A'; $col != 'U'; $col++) {
		$objPHPExcel->getActiveSheet()->getColumnDimension($col)->setWidth(15);
    }
	
	$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(1);
	$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(1);
	$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(1);
	$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(1);
	$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(1);
	$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(1);
	$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(1);
	$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(1);
	$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(1);
	$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(1);
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(40);
	$objPHPExcel->getActiveSheet()->getStyle('A1' . ':U' . $end)->getFont()->setSize(8)->setName('Daramond');
	
// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('Report');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="PayrollRegister.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>