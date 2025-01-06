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
		->setCellValue('A1', 'ACTIVE EMPLOYEES AS OF: ' . strtoupper(date('F j, Y')))
		->setCellValue('A2', strtoupper($profile['Companyprofile']['name']))
		->setCellValue('A3', strtoupper($profile['Companyprofile']['address']));
	
	$objPHPExcel->getActiveSheet()->freezePane('E5');
	$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:G1');
	$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A2:G2');
	$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A3:G3');
	
	$row=5;
	$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A' . $row, ' ')
		->setCellValue('B' . $row, 'Eemp No.')
		->setCellValue('C' . $row, 'LASTNAME')
		->setCellValue('D' . $row, 'FIRSTNAME')
		->setCellValue('E' . $row, 'MIDNAME')
		->setCellValue('F' . $row, 'DATEHIRED')
		->setCellValue('G' . $row, 'REGDATE')
		->setCellValue('H' . $row, 'DIV')
		->setCellValue('I' . $row, 'DEPT')
		->setCellValue('J' . $row, 'BRANCH')
		->setCellValue('K' . $row, 'POS')
		->setCellValue('L' . $row, 'STATUS')
		->setCellValue('M' . $row, 'Type')
		->setCellValue('N' . $row, 'ACCT. No.')
		->setCellValue('O' . $row, 'SSS #')
		->setCellValue('P' . $row, 'PAG-IBIG #')
		->setCellValue('Q' . $row, 'PHILHEALTH #')
		->setCellValue('R' . $row, 'TIN')
		->setCellValue('S' . $row, 'RATE TYPE')
		->setCellValue('T' . $row, 'RATE')
		->setCellValue('U' . $row, 'CIVIL STATUS')
		->setCellValue('V' . $row, 'SEX')
		->setCellValue('W' . $row, 'BDAY')
		->setCellValue('X' . $row, 'CP #')
		->setCellValue('Y' . $row, 'EMAIL')
		->setCellValue('Z' . $row, 'ADDRESS');
		$row ++;
	
	$c = array('Single', 'Married', 'Separated', 'Widow');
	$f = array('Female', 'Male');
	$count = 1;
	foreach($employees as $emp):
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A' . $row, $count)
		->setCellValue('B' . $row, $emp['Employee']['employeeno'])
		->setCellValue('C' . $row, strtoupper($emp['Employee']['lastname']))
		->setCellValue('D' . $row, strtoupper($emp['Employee']['firstname']))
		->setCellValue('E' . $row, strtoupper($emp['Employee']['middlename']))
		->setCellValue('F' . $row, $emp['Employee']['datehired'])
		->setCellValue('G' . $row, $emp['Employee']['dateregularized'])
		->setCellValue('H' . $row, strtoupper($emp['Division']['name']))
		->setCellValue('I' . $row, strtoupper($emp['Department']['name']))
		->setCellValue('J' . $row, strtoupper($emp['Branch']['name']))
		->setCellValue('K' . $row, strtoupper($emp['Jobtitle']['name']))
		->setCellValue('L' . $row, strtoupper($emp['Employmentstatus']['name']))
		->setCellValue('M' . $row, strtoupper($emp['Employeetype']['name']))
		->setCellValue('N' . $row, '\'' . $emp['Employee']['payrollaccountnumber'])
		->setCellValue('O' . $row, $emp['Employee']['sssnumber'])
		->setCellValue('P' . $row, '\'' . $emp['Employee']['pagibignumber'])
		->setCellValue('Q' . $row, $emp['Employee']['philhealthnumber'])
		->setCellValue('R' . $row, $emp['Employee']['TIN'])
		->setCellValue('S' . $row, strtoupper($emp['Ratetype']['name']))
		->setCellValue('T' . $row, strtoupper($emp['Employee']['monthlyrate']))
		->setCellValue('U' . $row, strtoupper($c[$emp['Employee']['civilstatus']]))
		->setCellValue('V' . $row, strtoupper($f[$emp['Employee']['sex']]))
		->setCellValue('W' . $row, strtoupper($emp['Employee']['birthdate']))
		->setCellValue('X' . $row, strtoupper($emp['Employee']['mobilenumber']))
		->setCellValue('Y' . $row, strtoupper($emp['Employee']['email']))
		->setCellValue('Z' . $row, strtoupper($emp['Employee']['presetaddress']));
		$row++;
	endforeach;
		
		
	
	$row = $row-1;
	
	for ($col = 'B'; $col != 'Z'; $col++) {
		//$objPHPExcel->getActiveSheet()->getColumnDimension($col)->setWidth(35);
		$objPHPExcel->getActiveSheet()->getColumnDimension($col)->setWidth(15);	
    }
	
	$objPHPExcel->getActiveSheet()->getStyle('A1:Z' . $row)->getFont()->setSize(8)->setName('Arial');
	$objPHPExcel->getActiveSheet()->getStyle('A5:Z' . $row)->getAlignment()->setHORIZONTAL(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
	$objPHPExcel->getActiveSheet()->getStyle('A5:Z' . $row)->getAlignment()->setVERTICAL(PHPExcel_Style_Alignment::VERTICAL_CENTER);	
	$objPHPExcel->getActiveSheet()->getStyle('A5:Z' . $row)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
	
// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('Report');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="EmployeeMasterfile.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>