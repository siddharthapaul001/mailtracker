<?php
function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
	$fp = fopen("test.txt", "ab+");
// 	foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED') as $key)
//         {
//             if (array_key_exists($key, $_SERVER) === true)
//             {
//                 foreach (array_map('trim', explode(',', $_SERVER[$key])) as $ip)
//                 {
                    
//                         fwrite($fp, $ip." ");
                    
//                 }
//             }
//         }
	fwrite($fp, "\n".$client." ".$forward." ".$remote);
	fclose($fp);
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
	header("Expires: 0");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	readfile("image/q98ehqd.png");
}
?>
