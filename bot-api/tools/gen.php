<?php
if(strpos($message, "/gen") === 0){
$lista = substr($message, 5);
$bin = substr($lista, 0,6);
if(empty($bin)){
sendMessage($chatId,"None Input",$message_id);
die();
}
$server = "latambots.alwaysdata.net";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://'.$server.'/gen.php?lista='.$bin.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$headers = array();
$headers[] = 'authority: '.$server.'';
$headers[] = 'method: GET';
$headers[] = 'path: /gen.php';
$headers[] = 'scheme: https';
$headers[] = 'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange';
$headers[] = 'cache-control: max-age=0';
$headers[] = 'sec-fetch-dest: document';
$headers[] = 'sec-fetch-mode: navigate';
$headers[] = 'sec-fetch-site: none';
$headers[] = 'sec-fetch-user: ?1';
$headers[] = 'upgrade-insecure-requests: 1';
$headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'lista='.$bin.'');
$curl = curl_exec($ch);
curl_close($ch);
$response = urlencode("<b>
CC GEN

Input: $lista

<code>$curl</code></b>
");
sendMessage($chatId,$response,$message_id);
}
?>