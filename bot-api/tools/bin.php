<?php
if(strpos($message, "/bin") === 0){
    function getStr($string, $start, $end){
        $str = explode($start, $string);
        $str = explode($end, $str[1]);
        return $str[0];
    }
    
    $lista = substr($message, 5);
    $bin = substr($lista, 0,6);
    if(empty($bin)){
        sendMessage($chatId,"None Input",$message_id);
        exit();
        }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$bin.'');
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    $add = curl_exec($ch);
    $card = getStr($add, '"scheme":"', '",');
    $type = getStr($add, '"type":"', '",');
    $brand = getStr($add, 'brand":"', '"');
    $prepaid = getStr($add, '"prepaid":', ',');
    $country = getStr($add, '","name":"', '","');
    $currency = getStr($add, '"currency":"', '",');
    $bank = getStr($add, '"bank":{"name":"', '",');
    $emoji = getStr($add, '"emoji":"', '",');
    $response = urlencode("<b>✅Bin Lockup

🤑Bin: $bin

👌Tipo $type
    
🔆Bank: $bank
    
❇️Country: $country $emoji
    
🌏Bot By $owner</b>");
    sendMessage($chatId,$response,$message_id);
    }
?>