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


			
?>
