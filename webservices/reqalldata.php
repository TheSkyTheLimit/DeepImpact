<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>jquery use json data</title>
</head>
<body>
<p id="showData"></p>
<script src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(function(){
	 $.getJSON("getdata.php?uid=admin",function(data){
		 $.each(data,function(i,k){
			 $("#showData").append(':'+data[i]+"<br>");
		 });
	 });
});
</script>
</body>
</html>