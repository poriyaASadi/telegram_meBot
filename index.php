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

if ($text == '/start') {
     $mycommnets = true;
    $content = array('chat_id' => $chat_id, 'text' => 'سلام خوبی جی جی');
    $telegram->sendMessage($content);
}
if ($text == '/infos') {
    $mycommnets = true;
  //  $info =  json_encode($telegram->getMe());
     $infos = 'nameBot : ' . $telegram->getMe()["result"]["username"] . "\n" . 'firstnameBot : ' . $telegram->getMe()["result"]["first_name"]; 
    $content = array('chat_id' => $chat_id, 'text' => $infos);
    $telegram->sendMessage($content);
}

if ($text == '/kewords') {
    $mycommnets = true;
    $option = array( 
        //First row
        array($telegram->buildKeyboardButton("Button 1"), $telegram->buildKeyboardButton("Button 2")), 
        //Second row 
        array($telegram->buildKeyboardButton("Button 3"), $telegram->buildKeyboardButton("Button 4"), $telegram->buildKeyboardButton("Button 5")), 
        //Third row
        array($telegram->buildKeyboardButton("Button 6")) );
    $keyb = $telegram->buildKeyBoard($option, $onetime=false);
    $content = array('chat_id' => $chat_id, 'reply_markup' => $keyb, 'text' => "This is a Keyboard Test");
    $telegram->sendMessage($content);
}



if (!$mycommnets) {
    $content = array('chat_id' => $chat_id, 'text' => 'لطفا با کامنت مناسب شروع کنید ');
    $telegram->sendMessage($content);   
}
?>