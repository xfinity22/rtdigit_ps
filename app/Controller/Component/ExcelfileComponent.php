<?php
	class ExcelfileComponent extends Component{
		public function writeCsv($objPHPExcel){
			$objWriter = new PHPExce_Writer_CSV($objPHPExcel);
			$objWriter->setDelimiter(';'); 
			$objWriter->setEnclosure(''); 
			$objWriter->setLineEnding("\r\n"); 
			$objWriter->setSheetIndex(0); 
			$objWriter->setSheetIndex(0);
			$objWriter->save("05featuredemo.csv");
			
			return true;
		}		
	}
	
	
?>