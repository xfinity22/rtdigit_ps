<?php  

require_once 'config.default.php';
error_reporting(0);
/** PHPExcel */
require_once 'Classes/PHPExcel.php';

/** PHPExcel_Cell_AdvancedValueBinder */
require_once 'Classes/PHPExcel/Cell/AdvancedValueBinder.php';

/** PHPExcel_IOFactory */
require_once 'Classes/PHPExcel/IOFactory.php';

// Set value binder
//PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder() );

$cacheMethod = PHPExcel_CachedObjectStorageFactory::cache_in_memory;
PHPExcel_Settings::setCacheStorageMethod($cacheMethod);

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objReader = new PHPExcel_Reader_Excel5();
$objReader->setReadDataOnly(true);

//date today
$datetoday = date('l jS \of F Y');

$objPHPExcel = $objReader->load("uploadedfiles/_fileuploads.xls");
$objWorksheet = $objPHPExcel->setActiveSheetIndex(3);

header('Content-Type: application/force-download');  
header('Content-disposition: attachment; filename='.$datetoday.'_Exported_bill.xls');  
// Fix for crappy IE bug in download.  
header("Pragma: ");  
header("Cache-Control: "); 

echo '<table width="100%" cellspacing="0" cellpadding="3">';
	echo '<tr class="trow">';
		echo '<td style="width: 5%;">Branch Code</td>';
		echo '<td>'.$objWorksheet->getCell('B2')->getValue().'</td>';
		echo '<td>'.$objWorksheet->getCell('N2')->getValue().'</td>';
		echo '<td>Cost Center</td>';
	echo '</tr>';
	for($i=3; $i <= 611; $i++){
	echo '<tr class="trow1">';
			echo '<td style="border-left: 1px solid #ccc;">';				
					$base_branch = $objWorksheet->getCell('B'.$i.'')->getValue();										
					$sql = mysql_query("SELECT * FROM branch WHERE branch_name='".$base_branch."'");					
					while($sqlrows = mysql_fetch_assoc($sql)){
						echo $sqlrows['branch_code'].'<br />';
					}				
			echo '</td>';
			echo '<td>';				
					echo $objWorksheet->getCell('B'.$i.'')->getValue().'<br >';				
			echo '</td>';
			echo '<td>';										
						$apval = $objWorksheet->getCell('N'.$i.'')->getValue();				
						echo ''.number_format($apval, 2).'<br />';
			echo '</td>';
			echo '<td style="width: 12%;">';
					$base_branch = $objWorksheet->getCell('B'.$i.'')->getValue();										
					$sql = mysql_query("SELECT * FROM branch WHERE branch_name='".$base_branch."'");					
					while($sqlrows = mysql_fetch_assoc($sql)){
						echo '0001-'.$sqlrows['branch_code'].'<br />';
					}				
			echo '</td>';
	echo '</tr>';
	}
echo '</table>';
//clearing workbook from the memory
$objPHPExcel->disconnectWorksheets();
unset($objPHPExcel);
?>
