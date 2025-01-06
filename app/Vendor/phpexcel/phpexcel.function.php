<?php
//require_once 'config.default.php';
error_reporting(1);
/** PHPExcel */
require_once 'Classes/PHPExcel.php';

/** PHPExcel_Cell_AdvancedValueBinder */
require_once 'Classes/PHPExcel/Cell/AdvancedValueBinder.php';
PHPExcel_Cell::setValueBinder( new PHPExcel_Cell_AdvancedValueBinder());

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

//$file_n = $main_dir.''.$region.'/'.$area.'/schedule.xls';
$objPHPExcel = PHPExcel_IOFactory::load($sched_dir);
$objWorksheet = $objPHPExcel->setActiveSheetIndex(0); /*SELECT THE TAB NUMBER*/
$heighestRow = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

$date_board = date('l d,Y');

$start_of_examination = $objWorksheet->getCell('B6')->getValue();
$end_of_examination = $objWorksheet->getCell('D6')->getValue();


?>