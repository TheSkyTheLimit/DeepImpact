<?php
include_once "GCM.php";
$gcm = new GCM();
//AIzaSyAABXAXSBFRuuLg0VMnahSlyQgjlQvEOx8
$msgdata =array("MSG"=>"Google",	"URL"=>"http://www.google.com" );
//$registatoin_ids = array("APA91bF83hIN8MW9ETOTV4AjUZ_4iv22AyU-qHr_HPNLTjNJKjsfErFWvHf6GJVfDDaGGFd0VpqUbV3kg9LE6z9HlQofwMxdVuhfiXk9L1shPRZKhKiKU4fuRLKns8M6Apg_3C15V3V74OJVOZ8ppIuJTOS9ei27rOSEnX7WCpZXmupjLFkFH2I");
$registatoin_ids = array("APA91bGUENEMis9qQR1_AixMBL3g5hTLZLbtN-yt6m68PqlAF9xc1buWhq9UWzwoYyhWEOoyOwU5NhuWMD3j-ch7An8L4wWZoDIBm2_G6ka4lzDUM8T4qPbZlYi5vk86IdkBz0xG8gNWW2VEVCQ84h1Iw0LzLG832w");
$result = $gcm->send_notification($registatoin_ids,$msgdata );
echo $result;
?>