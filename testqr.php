<?php
$url = 'https://chart.googleapis.com/chart?';
$chs = 'chs=150x150';
$cht = 'cht=qr';
$chl = 'chl='.urlencode('Hello World!');

$qstring = $url ."&". $chs ."&". $cht ."&". $chl;       

$data = file_get_contents($qstring);

$f = fopen('qrfile.png', 'w');
fwrite($f, $data);
fclose($f);
?>