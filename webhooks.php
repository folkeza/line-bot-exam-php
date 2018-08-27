
<?php
require "vendor/autoload.php";
$access_token = 'QaDbtuAUYq/i9S/HXHMDyEK8g9xIn4Anl2p29oJqNywNw/PUmHAHWSW8LiJQr7w4EQq1D9UFpAv7YmOcxY13dMdl2inK2zyF85Kf+qQ6+lfnJqGCpfUwPxePAM9HhfLnfYJsT0krbbaacwh9ellXnAdB04t89/1O/w1cDnyilFU=';
$channelSecret = '01bc106e47cea5df418bb2314abcc1bb';
$idPush = 'Ua1c0b36837cc15d941dff0969aba1a92'
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($idPush, $textMessageBuilder);
echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
?>
