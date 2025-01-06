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
	if($action == 1){
		$col = 'G';
		$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:G1');
		$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A2:G2');
		$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A3:G3');
		
		$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A1', 'WITHHOLDING TAX SUMMARY')
			->setCellValue('A2', STRTOUPPER($profile['Companyprofile']['name']))
			->setCellValue('A3', STRTOUPPER($profile['Companyprofile']['address']))
			->setCellValue('A5', 'EMPLOYERS TIN NO.: ' . $profile['Companyprofile']['PhilhealthNumber'])
			->setCellValue('A6', '\'' . date('F Y', strtotime($payrollperiod)));
		
		$total = 0;
		$total2 = 0;
		$dept = 0;		
		$row = 8;
		$count = 1;
		$first = 0;
		foreach ($reports as $report):
			if($dept != $report['Employee']['department_id']){				
				if($count > 1){
					$last = $row - 1;
					$row++;
					$objPHPExcel->getActiveSheet()
						->setCellValue('C' . $row, 'TOTAL')
						->setCellValue('G' . $row, $total2);
					$row = $row+2;
				}
				
				$dept2 = $this->requestAction('departments/getdepartment/' . $report['Employee']['department_id']);
				$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . $row . ':B' . $row);
				$objPHPExcel->setActiveSheetIndex(0)->mergeCells('C' . $row . ':G' . $row);
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A' . $row, 'Department:')
						->setCellValue('C' . $row, $dept2['Department']['name']);
				
				 $objPHPExcel->getActiveSheet()->getStyle('A' . $row . ':G' . $row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('CCCCCC');
				$row++;
				
				$first = $row;
				$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A' . $row, '')
					->setCellValue('B' . $row, 'TIN')
					->setCellValue('C' . $row, 'LAST NAME')
					->setCellValue('D' . $row, 'FIRST NAME')
					->setCellValue('E' . $row, 'MIDDLE NAME')
					->setCellValue('F' . $row, 'SALARY BASE')
					->setCellValue('G' . $row, 'TAX AMOUNT');
					
					$total_2 = 0;
			}
		
			if($report['Income']['tax'] > 0){
				$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A' . $row, $count)
					->setCellValue('B' . $row, '\'' . $report['Employee']['TIN'])
					->setCellValue('C' . $row, strtoupper($report['Employee']['lastname']))
					->setCellValue('D' . $row, strtoupper($report['Employee']['firstname']))
					->setCellValue('E' . $row, strtoupper($report['Employee']['middlename']))
					->setCellValue('F' . $row, $report['Employee']['monthlyrate'])
					->setCellValue('G' . $row, $report['Income']['tax']);
				$row++;
				$count++;
				
				$total = $total + $report['Income']['tax'];
				$total_2 = $total_2 + $report['Income']['tax'];
				
			}
			$dept = $report['Employee']['department_id'];
			
		endforeach;
		
		if($total_2 == 0){ $row++; }
		
		$objPHPExcel->getActiveSheet()
					->setCellValue('C' . $row, 'TOTAL')
					->setCellValue('G' . $row, $total2);
				
		
		$row = $row+2;
		$objPHPExcel->getActiveSheet()
					->setCellValue('C' . $row, 'GRAND TOTAL')
					->setCellValue('G' . $row, $total);
					

	}else if($action == 2){ //SSS
		$col = 'I';
		$total1 = 0;
		$total2 = 0;
		$total3 = 0;
		$total4 = 0;
		$total5 = 0;
		
		$total_2 = 0;
		$i = 1;
		while ($i < 7){
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . $i . ':J' . $i);
			$i++;
		}
		
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1', 'SSS SUMMARY CONTRIBUTION')
		->setCellValue('A2', STRTOUPPER($profile['Companyprofile']['name']))
		->setCellValue('A3', STRTOUPPER($profile['Companyprofile']['address']))
		->setCellValue('A5', 'EMPLOYERS PHIC NO.: ' . $profile['Companyprofile']['PhilhealthNumber'])
		->setCellValue('A6', '\'' . date('F Y', strtotime($payrollperiod)));
		
		
		$dept = 0;		
		$row = 8;
		$count = 1;
		$first = 0;
		foreach ($reports as $report):
			if($dept != $report['Employee']['department_id']){				
				if($count > 1){
					$last = $row - 1;
					$objPHPExcel->getActiveSheet()
						->setCellValue('C' . $row, 'TOTAL')
						->setCellValue('E' . $row, '=SUM(E' . $first . ':E' . $last . ')')
						->setCellValue('F' . $row, '=SUM(F' . $first . ':F' . $last . ')')
						->setCellValue('G' . $row, '=SUM(G' . $first . ':G' . $last . ')')
						->setCellValue('H' . $row, '=SUM(H' . $first . ':H' . $last . ')')
						->setCellValue('I' . $row, '=SUM(I' . $first . ':I' . $last . ')');
					$row = $row+2;
				}
				
				$dept2 = $this->requestAction('departments/getdepartment/' . $report['Employee']['department_id']);
				$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . $row . ':B' . $row);
				$objPHPExcel->setActiveSheetIndex(0)->mergeCells('C' . $row . ':I' . $row);
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A' . $row, 'Department:')
						->setCellValue('C' . $row, $dept2['Department']['name']);
				
				 $objPHPExcel->getActiveSheet()->getStyle('A' . $row . ':I' . $row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('CCCCCC');
				$row++;
				
				$first = $row;
				$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A' . $row, '')
					->setCellValue('B' . $row, 'EMPLOYEE NO.')					
					->setCellValue('C' . $row, 'SSS NUMBER')
					->setCellValue('D' . $row, 'NAME')
					->setCellValue('E' . $row, 'GROSS PAY')
					->setCellValue('F' . $row, 'EMPLOYEE')
					->setCellValue('G' . $row, 'EMPLOYER')
					->setCellValue('H' . $row, 'EC')
					->setCellValue('I' . $row, 'TOTAL')
					->setCellValue('J' . $row, 'BRANCH');
				$row++;
				
				$total_2 = 0;
			}
		
			if($report['Income']['sss'] > 0){
				$branch = $this->requestAction('branches/getbranch/' . $report['Employee']['branch_id']);
				$total = 0;
				$total = $report['Income']['sss'] + $report['Income']['ershare'] + $report['Income']['ec'];
				$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A' . $row, $count)			
				->setCellValue('B' . $row, strtoupper($report['Employee']['employeeno']))
				->setCellValue('C' . $row, '\'' . $report['Employee']['sssnumber'])
				->setCellValue('D' . $row, strtoupper($report['Employee']['lastname'] . ', ' . $report['Employee']['firstname'] . ' ' . $report['Employee']['middlename']))
				->setCellValue('E' . $row,  $total)
				->setCellValue('F' . $row, $report['Income']['sss'])
				->setCellValue('G' . $row,  $report['Income']['ershare'])
				->setCellValue('H' . $row, $report['Income']['ec'])
				->setCellValue('I' . $row, $total)
				->setCellValue('j' . $row, $branch['Branch']['name']);
				$row++;
				$count++;	
				
				$total1 = $total1 + $total;
				$total2 = $total2 + $report['Income']['sss'];
				$total3 = $total3 + $report['Income']['ershare'];
				$total4 = $total4 + $report['Income']['ec'];
				$total5 = $total5 + $total;
				
				$total_2 = $total_2 + $report['Income']['tax'];
			}
			
			$dept = $report['Employee']['department_id'];
		endforeach;
		
		$last = $row - 1;
		$objPHPExcel->getActiveSheet()
					->setCellValue('C' . $row, 'TOTAL')
					->setCellValue('E' . $row, '=SUM(E' . $first . ':E' . $last . ')')
					->setCellValue('F' . $row, '=SUM(F' . $first . ':F' . $last . ')')
					->setCellValue('G' . $row, '=SUM(G' . $first . ':G' . $last . ')')
					->setCellValue('H' . $row, '=SUM(H' . $first . ':H' . $last . ')')
					->setCellValue('I' . $row, '=SUM(I' . $first . ':I' . $last . ')');
		
		$row = $row + 3;
		$row2 = $row;
		$row = $row-2;
		$objPHPExcel->getActiveSheet()
			->setCellValue('C' . $row2, 'GRAND TOTAL')
			->setCellValue('E' . $row2, $total1)
			->setCellValue('F' . $row2, $total2)
			->setCellValue('G' . $row2, $total3)
			->setCellValue('H' . $row2, $total4)
			->setCellValue('I' . $row2, $total5);
		
	}else if($action == 3){ //PHILHEALTH
		
		$col = 'H';
		$total1 = 0;
		$total2 = 0;
		$total3 = 0;
		$total4 = 0;
		
		$i = 1;
		while ($i < 7){
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . $i . ':H' . $i);
			$i++;
		}
		
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1', 'PHILHEALTH SUMMARY CONTRIBUTION')
		->setCellValue('A2', STRTOUPPER($profile['Companyprofile']['name']))
		->setCellValue('A3', STRTOUPPER($profile['Companyprofile']['address']))
		->setCellValue('A5', 'EMPLOYERS PHIC NO.: ' . $profile['Companyprofile']['PhilhealthNumber'])
		->setCellValue('A6', '\'' . date('F Y', strtotime($payrollperiod)));
		
		$dept = 0;		
		$row = 8;
		$count = 1;
		$first = 0;
		foreach ($reports as $report):
			if($dept != $report['Employee']['department_id']){				
				if($count > 1){
					$last = $row - 1;
					$objPHPExcel->getActiveSheet()
						->setCellValue('C' . $row, 'TOTAL')
						->setCellValue('E' . $row, '=SUM(E' . $first . ':E' . $last . ')')
						->setCellValue('F' . $row, '=SUM(F' . $first . ':F' . $last . ')')
						->setCellValue('G' . $row, '=SUM(G' . $first . ':G' . $last . ')')
						->setCellValue('H' . $row, '=SUM(H' . $first . ':H' . $last . ')');
					$row = $row+2;
				}
				
				$dept2 = $this->requestAction('departments/getdepartment/' . $report['Employee']['department_id']);
				$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . $row . ':B' . $row);
				$objPHPExcel->setActiveSheetIndex(0)->mergeCells('C' . $row . ':H' . $row);
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A' . $row, 'Department:')
						->setCellValue('C' . $row, $dept2['Department']['name']);
				
				 $objPHPExcel->getActiveSheet()->getStyle('A' . $row . ':H' . $row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('CCCCCC');
				$row++;
				
				$first = $row;
				$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A' . $row, '')
					->setCellValue('B' . $row, 'EMPLOYEE NO.')
					->setCellValue('C' . $row, 'NAME')
					->setCellValue('D' . $row, 'PHILHEALTH NUMBER')
					->setCellValue('E' . $row, 'GROSS PAY')
					->setCellValue('F' . $row, 'EMPLOYEE')
					->setCellValue('G' . $row, 'EMPLOYER')
					->setCellValue('h' . $row, 'TOTAL');
				$row++;
			}
		
			if($report['Income']['philhealth'] > 0){
				$total = $report['Income']['philhealth'] * 2;
				$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A' . $row, $count)			
				->setCellValue('B' . $row, strtoupper($report['Employee']['employeeno']))
				->setCellValue('C' . $row, strtoupper($report['Employee']['lastname'] . ', ' . $report['Employee']['firstname'] . ' ' . $report['Employee']['middlename']))
				->setCellValue('D' . $row, '\'' . $report['Employee']['philhealthnumber'])
				->setCellValue('E' . $row,  $total)
				->setCellValue('F' . $row, $report['Income']['philhealth'])
				->setCellValue('G' . $row, $report['Income']['philhealth'])
				->setCellValue('H' . $row, $total);
				
				$row++;
				$count++;
				
				$total1 = $total1 + $total;
				$total2 = $total2 + $report['Income']['philhealth'];
				$total3 = $total3 + $report['Income']['philhealth'];
				$total4 = $total4 + $total;
			}
			
			$dept = $report['Employee']['department_id'];
		endforeach;
		
		
		$row2 = $row;
		$last = $row - 1;
		$objPHPExcel->getActiveSheet()
				->setCellValue('C' . $row, 'TOTAL')
				->setCellValue('E' . $row, '=SUM(E' . $first . ':E' . $last . ')')
				->setCellValue('F' . $row, '=SUM(F' . $first . ':F' . $last . ')')
				->setCellValue('G' . $row, '=SUM(G' . $first . ':G' . $last . ')')
				->setCellValue('H' . $row, '=SUM(H' . $first . ':H' . $last . ')');
				
		$row = $row + 2;
		$objPHPExcel->getActiveSheet()
				->setCellValue('C' . $row, 'TOTAL')
				->setCellValue('E' . $row, $total1)
				->setCellValue('F' . $row, $total2)
				->setCellValue('G' . $row, $total3)
				->setCellValue('H' . $row, $total4);		
		
	}else if($action == 4){ //PAG IBIG
		$col = 'H';
		$total1 = 0;
		$total2 = 0;
		$total3 = 0;
		$total4 = 0;
		
		$i = 1;
		while ($i < 7){
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . $i . ':I' . $i);
			$i++;
		}
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1', 'PAG-IBIG SUMMARY CONTRIBUTION')
		->setCellValue('A2', STRTOUPPER($profile['Companyprofile']['name']))
		->setCellValue('A3', STRTOUPPER($profile['Companyprofile']['address']))
		->setCellValue('A4', '\'' . date('F Y', strtotime($payrollperiod)));		
		
			
		$dept = 0;		
		$row = 8;
		$count = 1;
		$first = 0;
		foreach ($reports as $report):
			if($dept != $report['Employee']['department_id']){				
				if($count > 1){
					$last = $row - 1;
					$objPHPExcel->getActiveSheet()
						->setCellValue('C' . $row, 'TOTAL')
						->setCellValue('G' . $row, '=SUM(G' . $first . ':G' . $last . ')')
						->setCellValue('H' . $row, '=SUM(H' . $first . ':H' . $last . ')')
						->setCellValue('I' . $row, '=SUM(I' . $first . ':I' . $last . ')');
					$row = $row+2;
				}
				
				$dept2 = $this->requestAction('departments/getdepartment/' . $report['Employee']['department_id']);
				$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . $row . ':B' . $row);
				$objPHPExcel->setActiveSheetIndex(0)->mergeCells('C' . $row . ':I' . $row);
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A' . $row, 'Department:')
						->setCellValue('C' . $row, $dept2['Department']['name']);
				
				 $objPHPExcel->getActiveSheet()->getStyle('A' . $row . ':H' . $row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('CCCCCC');
				$row++;
				
				$first = $row;
				$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A' . $row, '')
					->setCellValue('B' . $row, 'EMPLOYEE NO.')
					->setCellValue('C' . $row, 'NAME')
					->setCellValue('D' . $row, 'BDAY')
					->setCellValue('E' . $row, 'PAG-IBIG NUMBER')
					->setCellValue('F' . $row, 'GROSS PAY')
					->setCellValue('G' . $row, 'EMPLOYEE')
					->setCellValue('H' . $row, 'EMPLOYER')
					->setCellValue('I' . $row, 'TOTAL');
				$row++;
			}
			if($report['Income']['hdmf'] > 0){
				$total = $report['Income']['hdmf'] * 2;
				$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A' . $row, $count)			
				->setCellValue('B' . $row, strtoupper($report['Employee']['employeeno']))
				->setCellValue('E' . $row, '\'' . $report['Employee']['pagibignumber'])
				->setCellValue('C' . $row, strtoupper($report['Employee']['lastname'] . ', ' . $report['Employee']['firstname'] . ' ' . $report['Employee']['middlename']))
				->setCellValue('D' . $row,  $report['Employee']['birthdate'])
				->setCellValue('F' . $row,  $total)
				->setCellValue('G' . $row, $report['Income']['hdmf'])
				->setCellValue('H' . $row, $report['Income']['hdmf'])
				->setCellValue('I' . $row, $total);
				$row++;
				$count++;
				
				$total2 = $total2 + $report['Income']['hdmf'];
				$total3 = $total3 + $report['Income']['hdmf'];
				$total4 = $total4 + $total;
			}
			$dept = $report['Employee']['department_id'];
		endforeach;
	
	
		$last = $row - 1;
		$objPHPExcel->getActiveSheet()
				->setCellValue('C' . $row, 'TOTAL')
				->setCellValue('G' . $row, '=SUM(G' . $first . ':G' . $last . ')')
				->setCellValue('H' . $row, '=SUM(H' . $first . ':H' . $last . ')')
				->setCellValue('I' . $row, '=SUM(I' . $first . ':I' . $last . ')');
		$row = $row+2;
		
		
		$objPHPExcel->getActiveSheet()
				->setCellValue('C' . $row, 'GRAND TOTAL')
				->setCellValue('G' . $row, $total2)
				->setCellValue('H' . $row, $total3)
				->setCellValue('I' . $row, $total4);
		$row = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();	
		$objPHPExcel->getActiveSheet()->getStyle('C7:I' . $row)->getNumberFormat()->setFormatCode('#,##0.00');
		
	}else if($action == 5){ //SSS LOAN PAYMENT REPORT
		$types=array(1 => 'Calamity', 2 => 'Salary');	
		$col = 'H';
		$total1 = 0;
		
		$i = 1;
		while ($i < 7){
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . $i . ':J' . $i);
			$i++;
		}
		
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1', 'SSS LOAN REPORT')
		->setCellValue('A2', STRTOUPPER($profile['Companyprofile']['name']))
		->setCellValue('A3', STRTOUPPER($profile['Companyprofile']['address']))
		->setCellValue('A5', 'EMPLOYERS PAG-IBIG NO.: ' . $profile['Companyprofile']['SSSNumber'])
		->setCellValue('A6', '\'' . date('F Y', strtotime($payrollperiod)));		
		
			
		$dept = 0;		
		$row = 8;
		$count = 1;
		$first = 0;
		
		$reports = $this->requestAction(array('controller' => 'loanpayments', 'action' => 'findloans'), array($payrollperiod, 2));
		foreach ($reports as $report):
			if($dept != $report['Employee']['department_id']){				
				if($count > 1){
					$last = $row - 1;
					$objPHPExcel->getActiveSheet()
						->setCellValue('C' . $row, 'TOTAL')
						->setCellValue('H' . $row, '=SUM(H' . $first . ':H' . $last . ')');
					$row = $row+2;
				}
				
				$dept2 = $this->requestAction('departments/getdepartment/' . $report['Employee']['department_id']);
				$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . $row . ':B' . $row);
				$objPHPExcel->setActiveSheetIndex(0)->mergeCells('C' . $row . ':H' . $row);
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A' . $row, 'Department:')
						->setCellValue('C' . $row, $dept2['Department']['name']);
				
				 $objPHPExcel->getActiveSheet()->getStyle('A' . $row . ':H' . $row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('CCCCCC');
				$row++;
				
				$first = $row;
				$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A'.$row, '')
					->setCellValue('B'.$row, 'SSS NO.')
					->setCellValue('C'.$row, 'LAST NAME')
					->setCellValue('D'.$row, 'FIRST NAME')
					->setCellValue('E'.$row, 'MIDDLE NAME')
					->setCellValue('F'.$row, 'PERCOV')
					->setCellValue('G'.$row, 'AMOUNT')
					->setCellValue('H'.$row, 'REMARKS');
				$row++;
			}
			
			
			$type = '';
			if(!empty($report['Loanentry']['nextinstallment'])){
				if($report['Loanentry']['nextinstallment'] == 1){
					$type = 'Salary';
				}else{
					$type = 'Calamity';
				}
			}
						
						
			$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A' . $row, $profile['Companyprofile']['PagibigNumber'])
					->setCellValue('B' . $row, '\'' . $report['Employee']['pagibignumber'])
					->setCellValue('C' . $row, strtoupper($report['Employee']['employeeno']))
					->setCellValue('D' . $row, strtoupper($report['Employee']['lastname']))
					->setCellValue('E' . $row, strtoupper($report['Employee']['firstname']))
					->setCellValue('F' . $row, strtoupper($report['Employee']['middlename']))
					->setCellValue('G' . $row, date('F', strtotime($payrollperiod)))
					->setCellValue('H' . $row, $report['Loanpayment']['amount'])
					->setCellValue('I' . $row, $type)
					->setCellValue('J' . $row, '');
			$row++;
			$count++;
			$dept = $report['Employee']['department_id'];
			$total1 = $total1 + $report['Loanpayment']['amount'];
		endforeach;
		
		$last = $row - 1;
		$objPHPExcel->getActiveSheet()
				->setCellValue('C' . $row, 'TOTAL')
				->setCellValue('H' . $row, '=SUM(H' . $first . ':H' . $last . ')');
		$row = $row+2;
		
		$objPHPExcel->getActiveSheet()
				->setCellValue('C' . $row, 'GRAND TOTAL')
				->setCellValue('H' . $row, $total1);
		
	}else if($action == 6){ //HDMF LOAN		
		$types=array(1 => 'Calamity', 2 => 'Salary');	
		$col = 'H';
		$total1 = 0;
		
		$i = 1;
		while ($i < 7){
			$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . $i . ':J' . $i);
			$i++;
		}
		
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue('A1', 'HDMF LOAN REPORT')
		->setCellValue('A2', STRTOUPPER($profile['Companyprofile']['name']))
		->setCellValue('A3', STRTOUPPER($profile['Companyprofile']['address']))
		->setCellValue('A5', 'EMPLOYERS PAG-IBIG NO.: ' . $profile['Companyprofile']['PagibigNumber'])
		->setCellValue('A6', '\'' . date('F Y', strtotime($payrollperiod)));		
		
			
		$dept = 0;		
		$row = 8;
		$count = 1;
		$first = 0;
		
		$reports = $this->requestAction(array('controller' => 'loanpayments', 'action' => 'findloans'), array($payrollperiod, 1));
		foreach ($reports as $report):
			if($dept != $report['Employee']['department_id']){				
				if($count > 1){
					$last = $row - 1;
					$objPHPExcel->getActiveSheet()
						->setCellValue('C' . $row, 'TOTAL')
						->setCellValue('H' . $row, '=SUM(H' . $first . ':H' . $last . ')');
					$row = $row+2;
				}
				
				$dept2 = $this->requestAction('departments/getdepartment/' . $report['Employee']['department_id']);
				$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A' . $row . ':B' . $row);
				$objPHPExcel->setActiveSheetIndex(0)->mergeCells('C' . $row . ':J' . $row);
				$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A' . $row, 'Department:')
						->setCellValue('C' . $row, $dept2['Department']['name']);
				
				 $objPHPExcel->getActiveSheet()->getStyle('A' . $row . ':H' . $row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('CCCCCC');
				$row++;
				
				$first = $row;
				$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A'.$row, 'eyerid')
					->setCellValue('B'.$row, 'hdmfid')
					->setCellValue('C'.$row, 'eyeeno')
					->setCellValue('D'.$row, 'lname')
					->setCellValue('E'.$row, 'fname')
					->setCellValue('F'.$row, 'mid')
					->setCellValue('G'.$row, 'percov')
					->setCellValue('H'.$row, 'amort')
					->setCellValue('I'.$row, 'orno')
					->setCellValue('J'.$row, 'ordate');
				$row++;
			}
			
			
			$type = '';
			if(!empty($report['Loanentry']['nextinstallment'])){
				if($report['Loanentry']['nextinstallment'] == 1){
					$type = 'Salary';
				}else{
					$type = 'Calamity';
				}
			}
						
						
			$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A' . $row, $profile['Companyprofile']['PagibigNumber'])
					->setCellValue('B' . $row, '\'' . $report['Employee']['pagibignumber'])
					->setCellValue('C' . $row, strtoupper($report['Employee']['employeeno']))
					->setCellValue('D' . $row, strtoupper($report['Employee']['lastname']))
					->setCellValue('E' . $row, strtoupper($report['Employee']['firstname']))
					->setCellValue('F' . $row, strtoupper($report['Employee']['middlename']))
					->setCellValue('G' . $row, date('F', strtotime($payrollperiod)))
					->setCellValue('H' . $row, $report['Loanpayment']['amount'])
					->setCellValue('I' . $row, $type)
					->setCellValue('J' . $row, '');
			$row++;
			$count++;
			$dept = $report['Employee']['department_id'];
			$total1 = $total1 + $report['Loanpayment']['amount'];
		endforeach;
		
		$last = $row - 1;
		$objPHPExcel->getActiveSheet()
				->setCellValue('C' . $row, 'TOTAL')
				->setCellValue('H' . $row, '=SUM(H' . $first . ':H' . $last . ')');
		$row = $row+2;
		
		$objPHPExcel->getActiveSheet()
				->setCellValue('C' . $row, 'GRAND TOTAL')
				->setCellValue('H' . $row, $total1);
	
	}
	
	
	$row = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();	
	$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
	for ($col2 = 'B'; $col2 != $col; $col2++) {
		$objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true); 
	}
		
	if($action != 4){
		$objPHPExcel->getActiveSheet()->getStyle('C7:'.$col. $row)->getNumberFormat()->setFormatCode('#,##0.00');
	}
	$objPHPExcel->getActiveSheet()->getStyle("A1:N" . $row)->getFont("Arial")->setSize(9);
	$objPHPExcel->getActiveSheet()->getStyle("A1:N" . $row)->getFont("Arial")->setSize(9);
	//$objPHPExcel->getActiveSheet()->getStyle("A7:H12")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
	
// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('Report');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
if($action == 1){
	header('Content-Disposition: attachment;filename="WT_Report_'.date('F_Y', strtotime($payrollperiod)).'.xlsx"');
}

if($action == 2){
	header('Content-Disposition: attachment;filename="SSS_Report_'.date('F_Y', strtotime($payrollperiod)).'.xlsx"');
}

if($action == 3){
	header('Content-Disposition: attachment;filename="Philhealth_Report_'.date('F_Y', strtotime($payrollperiod)).'.xlsx"');
}

if($action == 4){
	header('Content-Disposition: attachment;filename="HDMF_Report_'.date('F_Y', strtotime($payrollperiod)).'.xlsx"');
}

if($action == 5){
	header('Content-Disposition: attachment;filename="SSS_Loan_Report_'.date('F_Y', strtotime($payrollperiod)).'.xlsx"');
}

if($action == 6){
	header('Content-Disposition: attachment;filename="HDMF_Loan_Report_'.date('F_Y', strtotime($payrollperiod)).'.xlsx"');
}

header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
?>