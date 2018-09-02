<?php
// กรณีต้องการตรวจสอบการแจ้ง error ให้เปิด 3 บรรทัดล่างนี้ให้ทำงาน กรณีไม่ ให้ comment ปิดไป
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 
// include composer autoload
require_once 'vendor/autoload.php';
 
// การตั้งเกี่ยวกับ bot
require_once 'bot_settings.php';
 
// กรณีมีการเชื่อมต่อกับฐานข้อมูล
//require_once("dbconnect.php");
 
///////////// ส่วนของการเรียกใช้งาน class ผ่าน namespace
use LINE\LINEBot;
use LINE\LINEBot\HTTPClient;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
//use LINE\LINEBot\Event;
//use LINE\LINEBot\Event\BaseEvent;
//use LINE\LINEBot\Event\MessageEvent;
use LINE\LINEBot\MessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use LINE\LINEBot\MessageBuilder\ImageMessageBuilder;
use LINE\LINEBot\MessageBuilder\LocationMessageBuilder;
use LINE\LINEBot\MessageBuilder\AudioMessageBuilder;
use LINE\LINEBot\MessageBuilder\VideoMessageBuilder;
use LINE\LINEBot\ImagemapActionBuilder;
use LINE\LINEBot\ImagemapActionBuilder\AreaBuilder;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapMessageActionBuilder ;
use LINE\LINEBot\ImagemapActionBuilder\ImagemapUriActionBuilder;
use LINE\LINEBot\MessageBuilder\Imagemap\BaseSizeBuilder;
use LINE\LINEBot\MessageBuilder\ImagemapMessageBuilder;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use LINE\LINEBot\TemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\DatetimePickerTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\MessageTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\PostbackTemplateActionBuilder;
use LINE\LINEBot\TemplateActionBuilder\UriTemplateActionBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateMessageBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ButtonTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\CarouselColumnTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ConfirmTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselTemplateBuilder;
use LINE\LINEBot\MessageBuilder\TemplateBuilder\ImageCarouselColumnTemplateBuilder;
 
// เชื่อมต่อกับ LINE Messaging API
$httpClient = new CurlHTTPClient(LINE_MESSAGE_ACCESS_TOKEN);
$bot = new LINEBot($httpClient, array('channelSecret' => LINE_MESSAGE_CHANNEL_SECRET));
 
// คำสั่งรอรับการส่งค่ามาของ LINE Messaging API
$content = file_get_contents('php://input');
 
// แปลงข้อความรูปแบบ JSON  ให้อยู่ในโครงสร้างตัวแปร array
$events = json_decode($content, true);
if(!is_null($events)){
    // ถ้ามีค่า สร้างตัวแปรเก็บ replyToken ไว้ใช้งาน
    $replyToken = $events['events'][0]['replyToken'];
    $typeMessage = $events['events'][0]['message']['type'];
    $userMessage = $events['events'][0]['message']['text'];
    $userMessage = strtolower($userMessage);
    switch ($typeMessage){
        case 'text':
            switch ($userMessage) {
    case "i":
                        $picFullSize = 'https://drive.google.com/open?id=1tn4gOf-asuEXuHig3G9x0hhLOVlf2pQA';
                        $picThumbnail = 'https://drive.google.com/open?id=1tn4gOf-asuEXuHig3G9x0hhLOVlf2pQA';
                        $replyData = new ImageMessageBuilder($picFullSize,$picThumbnail);
                        break;          
              
    case "เลือกรายการสินค้า":
    // กำหนด action 4 ปุ่ม 4 ประเภท
    $actionBuilder = array(
        new MessageTemplateActionBuilder(
            'รายละเอียด',// ข้อความแสดงในปุ่ม
            'bw30' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
       /* new UriTemplateActionBuilder(
            'Uri Template', // ข้อความแสดงในปุ่ม
            'https://www.ninenik.com'
        ),*/
        /*new PostbackTemplateActionBuilder(
            'Postback', // ข้อความแสดงในปุ่ม
            http_build_query(array(
                'action'=>'buy',
 
                'item'=>100
            )), // ข้อมูลที่จะส่งไปใน webhook ผ่าน postback event
            'Postback Text'  // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),*/      
    );
    $actionBuilder02 = array(
        new MessageTemplateActionBuilder(
            'รายละเอียด',// ข้อความแสดงในปุ่ม
            'bw60' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
     );
     $actionBuilder03 = array(
        new MessageTemplateActionBuilder(
            'รายละเอียด',// ข้อความแสดงในปุ่ม
            'bw4070' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
     ); 
     $actionBuilder04 = array(
        new MessageTemplateActionBuilder(
            'รายละเอียด',// ข้อความแสดงในปุ่ม
            'bw5050' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
     ); 
     $actionBuilder05 = array(
        new MessageTemplateActionBuilder(
            'รายละเอียด',// ข้อความแสดงในปุ่ม
            'BWT6075' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
     ); 
     $actionBuilder06 = array(
        new MessageTemplateActionBuilder(
            'รายละเอียด',// ข้อความแสดงในปุ่ม
            'BW2060' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
     );
     $actionBuilder07 = array(
        new MessageTemplateActionBuilder(
            'รายละเอียด',// ข้อความแสดงในปุ่ม
            'BW50102' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
     );
     $actionBuilder08 = array(
        new MessageTemplateActionBuilder(
            'รายละเอียด',// ข้อความแสดงในปุ่ม
            'BW4145' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
     );
     $actionBuilder09 = array(
        new MessageTemplateActionBuilder(
            'รายละเอียด',// ข้อความแสดงในปุ่ม
            'BW4040' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
     );
     $actionBuilder10 = array(
        new MessageTemplateActionBuilder(
            'รายละเอียด',// ข้อความแสดงในปุ่ม
            'BWP6075' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
     );         
    $replyData = new TemplateMessageBuilder('Carousel',
        new CarouselTemplateBuilder(
            array(
                new CarouselColumnTemplateBuilder(
                    'ราวจับกันลื่น',
                    'I SHAPE 30 (BW30)',
                    'https://gdurl.com/2Y4n',
                    $actionBuilder
                ),
                new CarouselColumnTemplateBuilder(
                    'ราวจับกันลื่น',
                    'I SHAPE 60 (BW60)',
                    'https://gdurl.com/dDdx',
                    $actionBuilder02
                ),
                new CarouselColumnTemplateBuilder(
                    'ราวจับกันลื่น',
                    'L SHAPE (BW4070)',
                    'https://gdurl.com/qbxV',
                    $actionBuilder03
                ),
               new CarouselColumnTemplateBuilder(
                    'ราวจับกันลื่น',
                    'ติดผนังเข้ามุม (BW5050)',
                    'https://gdurl.com/XX6y',
                    $actionBuilder04
                ),
               new CarouselColumnTemplateBuilder(
                    'ราวจับกันลื่น',
                    'T SHAPE (BWT6075)',
                    'https://gdurl.com/4MgB',
                    $actionBuilder05
                ),
                new CarouselColumnTemplateBuilder(
                    'ราวจับกันลื่น',
                    'แบบพับเก็บเข้าผนัง (BW2060)',
                    'https://gdurl.com/3OMu',
                    $actionBuilder06
                ),
                new CarouselColumnTemplateBuilder(
                    'ราวจับกันลื่น',
                    'L SHAPE ฝักบัว (BW50102)',
                    'https://gdurl.com/vBcS',
                    $actionBuilder07
                ),
                new CarouselColumnTemplateBuilder(
                    'เก้าอี้นั่งอาบน้ำ',
                    'พับเก็บติดผนัง (BW4145)',
                    'https://gdurl.com/zTj1',
                    $actionBuilder08
                ),
                new CarouselColumnTemplateBuilder(
                    'ราวจับกันลื่น',
                    'V SHAPE (BW4040)',
                    'https://gdurl.com/dNzI',
                    $actionBuilder09
                ),
                new CarouselColumnTemplateBuilder(
                    'ราวจับกันลื่น',
                    'P SHAPE (BWP6075)',
                    'https://gdurl.com/z3L4',
                    $actionBuilder10
                ),
            )
        )
    );
    break;  
              
    case "เมนูหลัก":
    // กำหนด action 4 ปุ่ม 4 ประเภท
    $actionBuilder = array(
        new MessageTemplateActionBuilder(
            'รายการสินค้า',// ข้อความแสดงในปุ่ม
            'เลือกรายการสินค้า' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        new MessageTemplateActionBuilder(
            'คุณสมบัติสินค้า',// ข้อความแสดงในปุ่ม
            'ภาพคุณสมบัติ' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
       new MessageTemplateActionBuilder(
            'วิธีการสั่งซื้อ',// ข้อความแสดงในปุ่ม
            'วิธีการสั่งซื้อ' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
       new MessageTemplateActionBuilder(
            'เกี่ยวกับเรา',// ข้อความแสดงในปุ่ม
            'เกี่ยวกับเรา' // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),
        /*new UriTemplateActionBuilder(
            'Uri Template', // ข้อความแสดงในปุ่ม
            'https://www.ninenik.com'
        ),*/
        /*new DatetimePickerTemplateActionBuilder(
            'Datetime Picker', // ข้อความแสดงในปุ่ม
            http_build_query(array(
                'action'=>'reservation',
                'person'=>5
            )), // ข้อมูลที่จะส่งไปใน webhook ผ่าน postback event
            'datetime', // date | time | datetime รูปแบบข้อมูลที่จะส่ง ในที่นี้ใช้ datatime
            substr_replace(date("Y-m-d H:i"),'T',10,1), // วันที่ เวลา ค่าเริ่มต้นที่ถูกเลือก
            substr_replace(date("Y-m-d H:i",strtotime("+5 day")),'T',10,1), //วันที่ เวลา มากสุดที่เลือกได้
            substr_replace(date("Y-m-d H:i"),'T',10,1) //วันที่ เวลา น้อยสุดที่เลือกได้
        ),*/      
        /*new PostbackTemplateActionBuilder(
            'Postback', // ข้อความแสดงในปุ่ม
            http_build_query(array(
                'action'=>'buy',
                'item'=>100
            )), // ข้อมูลที่จะส่งไปใน webhook ผ่าน postback event
            'Postback Text'  // ข้อความที่จะแสดงฝั่งผู้ใช้ เมื่อคลิกเลือก
        ),*/      
    );
    $imageUrl = 'https://gdurl.com/IhhK';
    $replyData = new TemplateMessageBuilder('Button Template',
        new ButtonTemplateBuilder(
                'DECORA CARE', // กำหนดหัวเรื่อง
                'ราวผยุงตัวกันลื่นสำหรับผู้สูงอายุ', // กำหนดรายละเอียด
                $imageUrl, // กำหนด url รุปภาพ
                $actionBuilder  // กำหนด action object
        )
    );              
    break;  
              
                default:
                    $textReplyMessage = " คุณไม่ได้พิมพ์ ค่า ตามที่กำหนด";
                    $replyData = new TextMessageBuilder($textReplyMessage);         
                    break;                                      
            }
            break;
        default:
            $textReplyMessage = json_encode($events);
            $replyData = new TextMessageBuilder($textReplyMessage);         
            break;  
    }
 
 
}
// ส่วนของคำสั่งจัดเตียมรูปแบบข้อความสำหรับส่ง
//$textMessageBuilder = new TextMessageBuilder($textReplyMessage);
 
//l ส่วนของคำสั่งตอบกลับข้อความ
//$response = $bot->replyMessage($replyToken,$textMessageBuilder);
$response = $bot->replyMessage($replyToken,$replyData);
if ($response->isSucceeded()) {
    echo 'Succeeded!';
    return;
}
 
// Failed
echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
?>
