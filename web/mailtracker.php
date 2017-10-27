<?php
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
if(isset($_GET["mailid"])){
	$mailid = $_GET["mailid"];
	$realip = getUserIP();
	$details = json_decode(file_get_contents("http://ip-api.com/json/".$realip));
	$ua = $_SERVER['HTTP_USER_AGENT'];
	header("Content-Type: image/png");
	readfile("image/q98ehqd.png");
}
?>
