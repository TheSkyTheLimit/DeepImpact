<?php

$image_data=base64_decode(file_get_contents('AI_logo.png')); 
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Update Customer</title>
<style type="text/css">
body {
	margin:0px; 
	font-family:Arial, Verdana, Tahoma ; 
	color: #555555;
	font-size:10px; 
	font-weight:normal; 
}

.green {
	color: #060;
}
.red {
	color: #F00;
}
</style>
   <script src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript">
    <!--
		$avatar ='<?=$image_data?>';
        function sendRegister() {
		$.ajax({ 
				url: "updatecustomer.php" ,
				type: "POST",
				datatype: "json",
data: 'data={"email":"sanothay@gmail.com","screenName":"BoY","firstName":"Kitti","lastName":"Charoen","officePhone":"02333333","mobilePhone":"081234234","facebook":"http://facebook.com/abc#243","instragram":"http://intragram.com/233j;dlsf","tweeter":"http://tweeter.com","skype":"http://skype.com","line":"TheSkyTheLimit","preferredLang":"en-US","avatar":"'. $avatar.'"}'
			})
			.success(function(result) { 
					var myData = result;
					  for (var i = 0; i < myData.length; i++) {
						alert( myData[i].status+' : '+  myData[i].msg);
					}
			});
		}
	     sendRegister();
      //-->
 </script>
 </head>
</body>
</html>