<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Req Register</title>
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
        function sendRegister() {
		$.ajax({ 
				url: "register.php" ,
				type: "POST",
				datatype: "json",
				data: 'data={"screenName":"Boy1","password":"p@ssw0rd","firstName":"Kitti","lastName":"Charoen","isActive":"1","email":"kitti@test.com","officePhone":"091234556","mobilePhone":"0812000000","facebook":"facebook.com","instragram":"instragram.com","tweeter":"tweeter.com","skype":"skype.com","line":"line.com","preferredLang":"TH","imei":"imei-123456788","deviceID":"deviceID 12345"}'
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