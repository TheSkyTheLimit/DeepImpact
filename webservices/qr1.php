 <?php
 function qr($url, $width = 100, $height = 100, $border = 1, $error = "L", $https = false, $loadBalance = false) {
	 // create valid filename
	 $filename = str_replace(array("http://", "https://"), "", $url); $filename = str_replace("%", "_", urlencode($filename)); 
	$filename = "./temp/qr-$error$border-$filename.png"; 
		if (!file_exists($filename)) { 
			// build Google Charts URL: // secure connection ?
			$protocol = $https ? "https" : "http"; 
			// load balancing 
			$host = "chart.googleapis.com";
			if ($loadBalance) $host = abs(crc32($parameters) % 10).".chart.apis.google.com"; 
			// safe URL
			$url = urlencode($url); 
			// put everything together 
			$qrUrl = "$protocol://$host/chart?chs={$width}x{$height}&cht=qr&chld=$error|$border&chl=$url";
			// get QR code from Google's servers 
			$qr = file_get_contents($qrUrl);
			// optimize PNG and save locally 
			$imgIn = imagecreatefromstring($qr); 
			$imgOut = imagecreate($width, $height);
			imagecopy($imgOut, $imgIn, 0,0, 0,0, $width,$height);
			imagepng($imgOut, $filename, 9, PNG_ALL_FILTERS);
			imagedestroy($imgIn); 
			imagedestroy($imgOut); 
		}
	// serve image from local server 
		echo "<img src=\"$filename\" width=\"$width\" height=\"$height\" alt=\"bgn solutions !\" />"; 
	} 
 qr("http://mobile.bgnsolutions.com", 100, 100, 4, "Q");
 ?>
