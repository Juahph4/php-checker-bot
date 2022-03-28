<?php
#==========================BOT BY @LATAMBOTS AND @SOFIAVCHANEL=================================#
$botToken =  "<botToken XD>";
$website = "https://api.telegram.org/bot".$botToken;
$update = file_get_contents('php://input');
echo $update;
$update = json_decode($update, TRUE);
global $website;
$e = print_r($update);
$cchatid2 = $update["callback_query"]["message"]["chat"]["id"];
$cmessage_id2 = $update["callback_query"]["message"]["message_id"];
$cdata2 = $update["callback_query"]["data"];
$username = $update["message"]["from"]["username"];
$chatId = $update["message"]["chat"]["id"]; 
$chatusername = $update["message"]["chat"]["username"]; 
$chatname = $update["message"]["chat"]["title"]; 
$gId = $update["message"]["from"]["id"];
$userId = $update["message"]["from"]["id"]; 
$firstname = $update["message"]["from"]["first_name"]; 
$username = $update["message"]["from"]["username"]; 
$message = $update["message"]["text"]; 
$new_chat_member = $update["message"]["new_chat_member"];
$newusername = $update["message"]["new_chat_member"]["username"];
$newgId = $update["message"]["new_chat_member"]["id"];
$newfirstname = $update["message"]["new_chat_member"]["first_name"];
$message_id = $update["message"]["message_id"]; 
$r_id = $update["message"]["reply_to_message"];
$r_userId = $update["message"]["reply_to_message"]["from"]["id"];  
$r_firstname = $update["message"]["reply_to_message"]["from"]["first_name"];  
$r_username = $update["message"]["reply_to_message"]["from"]["username"]; 
$r_msg_id = $update["message"]["reply_to_message"]["message_id"]; 
$r_msg = $update["message"]["reply_to_message"]["text"]; 
$sender_chat = $update["message"]["sender_chat"]["type"]; 
$bot_name = "MI BOT USERNAME";
$owner = "OWNER_NAME";
$keyboard = json_encode([
    'inline_keyboard' => [
    [['text' => "Canal🤑", 'url' => "https://t.me/Latambots"],],
    [['text' => "Repositorio🥶", 'url' => "https://github.com/Juahph4"],]
    ]]);


    if ($cdata2 == "gates"){

        $keyboard = [
        'inline_keyboard' => [
             [
             ['text' => 'Herramientas🛠', 'callback_data' => 'her']
             ],
             [
             ['text' => 'Exit 🔄️', 'callback_data' => 'exit']
             ],
       ]
    ];
    $freecmands = urlencode("<b>$bot_name

Stripe [OFF❌] = /chk
    </b>");
    $free = json_encode($keyboard);
            file_get_contents("https://api.telegram.org/bot$botToken/editMessageText?chat_id=$cchatid2&text=$freecmands&message_id=$cmessage_id2&parse_mode=HTML&reply_markup=$free");
    
    }
    



if ($cdata2 == "her"){

        $keyboard = [
        'inline_keyboard' => [
             [
             ['text' => 'Gates✅', 'callback_data' => 'gates']
             ],
             [
             ['text' => 'Exit 🔄️', 'callback_data' => 'exit']
             ],
       ]
    ];
    $freecmands = urlencode("<b>$bot_name

BIN LOCKUP [ON✅]= /bin


RANDOM DATA [ON✅]= /rand
    </b>");
    $free = json_encode($keyboard);
            file_get_contents("https://api.telegram.org/bot$botToken/editMessageText?chat_id=$cchatid2&text=$freecmands&message_id=$cmessage_id2&parse_mode=HTML&reply_markup=$free");
    
}


if ($cdata2 == "exit"){

    $keyboard = [
    'inline_keyboard' => [
         [
         ['text' => 'Close On✅', 'callback_data' => 'Close']
         ],
   ]
];
$freecmands = urlencode("<b>$bot_name

Ha Finalizado El Comando
</b>");
$free = json_encode($keyboard);
        file_get_contents("https://api.telegram.org/bot$botToken/editMessageText?chat_id=$cchatid2&text=$freecmands&message_id=$cmessage_id2&parse_mode=HTML&reply_markup=$free");

}


if ($cdata2 == "Close"){

}




if(strpos($message, "/start")===0){
    reply_to($chatId,$message_id,$keyboard,"<b>😁Bienvenido A $bot_name%0A%0A🌏Usa /cmds Para Ver Mis Comandos%0A%0A🤑Bot By $owner</b>");
}


if(strpos($message, "/cmds") ===0){ 
    $keyboard2 = json_encode([
        'inline_keyboard' => [
        [['text' => "Herramientas🛠", 'callback_data' => "her"],['text' => "Gates✅", 'callback_data' => "gates"]],
        ]]);
reply_to($chatId,$message_id,$keyboard2,"<b>$bot_name%0AElije El Tipo De Comando🥶</b>");
}


function reply_to($chatId,$message_id,$keyboard,$message) {
    $url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML&reply_markup=".$keyboard."";
    return file_get_contents($url);
}

function deleteM($chatId,$message_id){

    $url = $GLOBALS[website]."/deleteMessage?chat_id=".$chatId."&message_id=".$message_id."";
    file_get_contents($url);
}


function sendMessage($chatId,$message,$message_id) {

    $url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML";
    file_get_contents($url);

}


foreach (glob("tools/*.php") as $filename)
{
    include $filename;
}
?>