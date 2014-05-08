<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
			
			});
			function sendPushNotification(id){
				var data = $('form#'+id).serialize();
            	    $('form#'+id).unbind('submit');                
               		$.ajax({
					url: "send_message.php",
                    type: 'GET',
					data: data,
					beforeSend: function() {
                    },
					success: function(data, textStatus, xhr) {
                          $('.txt_message').val("");
                    },
					error: function(xhr, textStatus, errorThrown) {
    					alert(xhr.responseText+':'+errorThrown);
                    }
                });
                return false;
            }
        </script>
        <style type="text/css">
            .container{
                width: 950px;
                margin: 0 auto;
                padding: 0;
            }
            h1{
                font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
                font-size: 24px;
                color: #777;
            }
            div.clear{
                clear: both;
            }
            ul.devices{
                margin: 0;
                padding: 0;
            }
            ul.devices li{
                float: left;
                list-style: none;
                border: 1px solid #dedede;
                padding: 10px;
                margin: 0 15px 25px 0;
                border-radius: 3px;
                -webkit-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.35);
                -moz-box-shadow: 0 1px 5px rgba(0, 0, 0, 0.35);
                box-shadow: 0 1px 5px rgba(0, 0, 0, 0.35);
                font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
                color: #555;
            }
            ul.devices li label, ul.devices li span{
                font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
                font-size: 12px;
                font-style: normal;
                font-variant: normal;
                font-weight: bold;
                color: #393939;
                display: block;
                float: left;
            }
            ul.devices li label{
                height: 25px;
                width: 50px;                
            }
            ul.devices li textarea{
                float: left;
                resize: none;
            }
            ul.devices li .send_btn{
                background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#0096FF), to(#005DFF));
                background: -webkit-linear-gradient(0% 0%, 0% 100%, from(#0096FF), to(#005DFF));
                background: -moz-linear-gradient(center top, #0096FF, #005DFF);
                background: linear-gradient(#0096FF, #005DFF);
                text-shadow: 0 1px 0 rgba(0, 0, 0, 0.3);
                border-radius: 3px;
                color: #fff;
            }
        </style>
    </head>
    <body>
        <?php
		$pushID = $_GET['pushID'];
		if (!isset($pushID)){
			$pushID = '0';
		}
		include_once('db_functions.php');
		include_once "GCM.php";
		$myDB = new DB_Functions();
		$pushMsg=$myDB->getPushCustomers($pushID);
		if ($pushMsg != false)
			$no_of_pushMsg = mysql_num_rows($pushMsg);
		else
			$no_of_pushMsg=0;
?>
        <div class="container">
            <h1>No of Devices Registered: <?php echo $no_of_pushMsg; ?></h1>
            <hr/>
            <ul class="devices">
 <?php
				if ($no_of_pushMsg > 0) {
					while ($row = mysql_fetch_array($pushMsg)) {
							$gcm = new GCM();
							 $jsonmsg = array();
							$msgdata =array("MSG"=>"Deep Impact",	"URL"=>$row["pushMsg"], "startDate"=>$row["startDate"],"endDate"=>$row["endDate"]);
							$jsonmsg[] = $msgdata;
							$registatoin_ids = array($row["devIDs"]);
							$result = $gcm->send_notification($registatoin_ids,$msgdata );
							$up = $myDB->upPushStatus($row["hisID"]);
							echo $row["hisID"]." <". $up ."> :". $result ."<br><br>";
					}
		}else{
?> 
                    <li>
                        No Users Registered Yet!
                    </li>
 <?php 
	}
?>
            </ul>
        </div>
    </body>
</html>