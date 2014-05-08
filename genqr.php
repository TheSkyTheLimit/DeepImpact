<?php  
	header("Content-type: image/png");
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    $PNG_WEB_DIR = 'temp/';
    include "qrcode/qrlib.php";    
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    
    
		$filename = $PNG_TEMP_DIR.'test.png';
		$data = isset($_GET['id']) ?  'http://mobile.bgnsolutions.com'.$_GET['id'] : 'http://mobile.bgnsolutions.com';
		$matrixPointSize = 4;
		$errorCorrectionLevel = 'L';
        QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
    ?>