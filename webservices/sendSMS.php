<?php
$sms = new thsms();
 
$sms->username   = 'boykitti';
$sms->password   = 'fdfba6';
 
$a = $sms->getCredit();
var_dump( $a);
echo "<br>";
print_r($a);
//count($cars);

for($x=0;$x<= count($a);$x++)
{
	echo $a[$x] . "<br>";
}
//$b = $sms->send( '0000', '0900086708', '���ͺ �� OTP  113366');

for($x=0;$x<count($b);$x++)
{
	echo $b[$x] . "<br>";
}

//var_dump( $b);
 
 
class thsms
{
     var $api_url   = 'http://www.thsms.com/api/rest';
     var $username  = null;
     var $password  = null;
 
    public function getCredit()
    {
        $params['method']   = 'credit';
        $params['username'] = $this->username;
        $params['password'] = $this->password;
 
        $result = $this->curl( $params);
 
        $xml = @simplexml_load_string( $result);
 
        if (!is_object($xml))
        {
            return array( FALSE, 'Respond error');
 
        } else {
 
            if ($xml->credit->status == 'success')
            {
                return array( TRUE, $xml->credit->status);
            } else {
                return array( FALSE, $xml->credit->message);
            }
        }
    }
 
    public function send( $from='0000', $to=null, $message=null)
    {
        $params['method']   = 'send';
        $params['username'] = $this->username;
        $params['password'] = $this->password;
 
        $params['from']     = $from;
        $params['to']       = $to;
        $params['message']  = $message;
 
        if (is_null( $params['to']) || is_null( $params['message']))
        {
            return FALSE;
        }
 
        $result = $this->curl( $params);
        $xml = @simplexml_load_string( $result);
        if (!is_object($xml))
        {
            return array( FALSE, 'Respond error');
        } else {
            if ($xml->send->status == 'success')
            {
                return array( TRUE, $xml->send->uuid);
            } else {
                return array( FALSE, $xml->send->message);
            }
        }
    }
     
    private function curl( $params=array())
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->api_url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( $params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
        $response  = curl_exec($ch);
        $lastError = curl_error($ch);
        $lastReq = curl_getinfo($ch);
        curl_close($ch);
 
        return $response;
    }
}
?>