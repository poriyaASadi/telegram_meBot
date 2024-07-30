<?php
include "telegram.php";
$telegram = new Telegram('7251256605:AAFY0rkJG128XTYBeFqaMWuu0w5K4drB9X0');

// گرفتن کل اطلاعات جیسون رو بخوایم برگردونیم این کارو میکنیم 
// $result = json_encode($telegram->getData());
$result = $telegram->getData();

$chat_id = $telegram->ChatID();
$text = $telegram->Text(); // روش اول 
// $text2 = $result['message']['text'];  روش دوم 
$mycommnets = false;

if ($text == '/start' or 'شروع ربات') 
// true my commant (boolan){
    $mycommnets = true;
    // creat welcome massseage
     
   // $content = array('chat_id' => $chat_id, 'text' => 'سلام خوبی جی جی');
  //  $telegram->sendMessage($content);
     /// creat buttom kyboard btn 
    $option = array( 
        //First row
        array($telegram->buildKeyboardButton("شروع ربات")),
        //Second row 
        array($telegram->buildKeyboardButton("اطلاعات ربات"), $telegram->buildKeyboardButton("Button 4")), 
    );
    $keyb = $telegram->buildKeyBoard($option, $onetime=true);
    $content = array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => 'سلام خوبی جی جی');
    $telegram->sendMessage($content);

if ($text == '/infos' or 'اطلاعات ربات') {
    $mycommnets = true;
  //  $info =  json_encode($telegram->getMe());
     $infos = 'nameBot : ' . $telegram->getMe()["result"]["username"] . "\n" . 'firstnameBot : ' . $telegram->getMe()["result"]["first_name"]; 
    $content = array('chat_id' => $chat_id, 'text' => $infos);
    $telegram->sendMessage($content);
}


 
if (!$mycommnets) {
    $content = array('chat_id' => $chat_id, 'text' => 'لطفا با کامنت مناسب شروع کنید ');
    $telegram->sendMessage($content);   
}
?>