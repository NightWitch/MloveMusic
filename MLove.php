
<?php
ob_start();
define('API_KEY','445214172:AAFcta4xDQ_obAUMgRI9JrhtLqPvOkt6U00');
$update = json_decode(file_get_contents('php://input'));
//----متغیر های مسیج----//
$message = $update->message;
$text = $message->text;
$chat_id = $message->chat->id;
$from_id = $message->from->id;
$message_id = $message->message_id;
$usered = file_get_contents("data/music/$from_id.txt");
$answer = file_get_contents("$from_id.txt");
$Dev = 342929908;
$time = file_get_contents("https://provps.ir/td?td=time");
$date = file_get_contents("https://provps.ir/td?td=date");
$reply_text = $update->message->reply_to_message->text;
$reply_msgid = $update->message->reply_to_message->message_id;
$rpto = $message->reply_to_message->forward_from->id;
$send = file_get_contents("$from_id/send.txt");
$idd = file_get_contents("$from_id/id.txt");
$ds = file_get_contents("$from_id/users.txt");
    $ted = explode("\n",$ds);
    $tedad = count($ted) -1;
//----متغیر های کالبک----//
$callback = $update->callback_query;
$data = $callback->data;
$callback_msg = $update->callback_query->message;
$chatid = $callback_msg->chat->id;
$fromid = $callback->from->id;
$messageid = $callback_msg->message_id;
$type = $update->message->chat->type;
$change = file_get_contents("$from_id/$from_id.txt");
//----فانکشن ها----//
function get($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
function Forward($berekoja,$azchejaei,$kodompayam)
{
get('ForwardMessage',[
'chat_id'=>$berekoja,
'from_chat_id'=>$azchejaei,
'message_id'=>$kodompayam
]);
}
function sendaction($chat_id, $action){
 get('sendchataction',[
 'chat_id'=>$chat_id,
 'action'=>$action
 ]);
 }
function objectToArrays($object)
    {
        if (!is_object($object) && !is_array($object)) {
            return $object;
        }
        if (is_object($object)) {
            $object = get_object_vars($object);
        }
        return array_map("objectToArrays", $object);
}
//-----------شروع سورس----------//
if($text == "/start"){
rmdir("test");
if (!file_exists("data/music/$from_id.txt")) {
file_put_contents("data/music/$from_id.txt","$from_id");
    mkdir("data/music");
    $myfile2 = fopen("data/music/users.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$from_id\n");
}
$ozv = file_get_contents("https://api.telegram.org/bot445214172:AAFcta4xDQ_obAUMgRI9JrhtLqPvOkt6U00/getChatMember?chat_id=@MLoveMusic&user_id=$from_id");
if(strpos($ozv,'"status":"left"') == true){
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"سلام
به ربات MLoveMusic خوش اومدی😃✄1�7
با این ربات میتونی به راحتی آهنگ های جالب دانلود کنی...
برای استفاده از ربات باید در کانال پشتیبانی ربات عضو شوید
برای  عضویت در کانال پشتیبانی [اینجا](https://t.me/joinchat/AAAAAEQ8HNge8BmhHV8vUQ) را کلیک کنید
پس از عضویت مجددا روی دستور /start کلیک کنید
🆔 @MLoveMusicBot
🆔 @MLoveMusic
",
'parse_mode'=>'MarkDown',
]);
}else{
    if(strpos($ozv,'"status":"left"') == false){
        
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"خب🙃
برای دانلود آهنگ اسم آهنگ رو برام بفرست
اگه نیاز به آموزش دانلود آهنگ داری تو [کانالمون](https://t.me/joinchat/AAAAAEQ8HNge8BmhHV8vUQ) عضو شو.
🆔 @MLoveMusicBot
🆔 @MLoveMusic
$tedad
",
'parse_mode'=>'MarkDown',
  'reply_markup'=>json_encode([
             'keyboard'=>[
                [['text'=>'راهنمای کار با ربات']],
[['text'=>'ارتباط با پشتیبانی'],['text'=>'آمار ربات']],
[['text'=>'بخش تبدیل'],['text'=>'تغییر نام فایل']],
[['text'=>'مشخصات شما']],
             ],             'resize_keyboard'=>true
         ])
]);
}
}   
}
elseif(strpos($text, "user=") !== false) {
$davat = str_replace("/start user=","",$text);
if (!file_exists("data/music/$from_id.txt")) {
get('sendmessage',[
'chat_id'=>$davat,
'text'=>"یک کاربر با شناسه عددی $from_id با لینک دعوت شما وارد ربات شد🙃",
]);
mkdir("data/music");
file_put_contents("data/music/$from_id.txt","$from_id");
    $myfile2 = fopen("data/music/users.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$from_id\n");
$myfile2 = fopen("$davat/users.txt", "a") or die("Unable to open file!"); 
fwrite($myfile2, "$from_id\n");
$ozv = file_get_contents("https://api.telegram.org/bot445214172:AAFcta4xDQ_obAUMgRI9JrhtLqPvOkt6U00/getChatMember?chat_id=@MLoveMusic&user_id=$from_id");
if(strpos($ozv,'"status":"left"') == true){
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"
شما با موفقیت به زیر مجموعه $davat اضافه شدید 
سلام
به ربات MLoveMusic خوش اومدی😃✄1�7
با این ربات میتونی به راحتی آهنگ های جالب دانلود کنی...
برای استفاده از ربات باید در کانال پشتیبانی ربات عضو شوید
برای  عضویت در کانال پشتیبانی [اینجا](https://t.me/joinchat/AAAAAEQ8HNge8BmhHV8vUQ) را کلیک کنید
پس از عضویت مجددا روی دستور /start کلیک کنید
🆔 @MLoveMusicBot
🆔 @MLoveMusic
",
'parse_mode'=>'MarkDown',
]);
}else{
    if(strpos($ozv,'"status":"left"') == false){
        
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"
شما با موفقیت به زیر مجموعه $davat اضافه شدید

خب🙃
برای دانلود آهنگ اسم آهنگ رو برام بفرست
اگه نیاز به آموزش دانلود آهنگ داری تو [کانالمون](https://t.me/joinchat/AAAAAEQ8HNge8BmhHV8vUQ) عضو شو.
🆔 @MLoveMusicBot
🆔 @MLoveMusic
",
'parse_mode'=>'MarkDown',
  'reply_markup'=>json_encode([
             'keyboard'=>[
                [['text'=>'راهنمای کار با ربات']],
[['text'=>'ارتباط با پشتیبانی'],['text'=>'آمار ربات']],
[['text'=>'بخش تبدیل'],['text'=>'تغییر نام فایل']],
[['text'=>'مشخصات شما']],
             ],             'resize_keyboard'=>true
         ])
]);
}
}
}else{
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"شما قبلا در ربات عضو بودید",
]);
}
}
elseif($text == "تغییر نام فایل"){
    
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"خب تو این بخش شما میتونی تگ و اسم فایل موسیقی رو تغییر بدی
این کار بیشتر بدرد مدیران کانال میخوره🤔
مثلا اگه بخوای کانالتو تبلیغ کنی آیدی کانالتو روی آهنگه مینویسی😃
تو بخش تغییر نام تو میتونی اسم فایل رو تغییر بدی ولی تگ فایلو نمیتونی تغییر بدی☹️

تو بخش تغییر تگ و نام تو میتونی اسم فایل و تگ فایلو تغییر بدی😃
ولی برای این کار باید 5 نفر با لینک اختصاصیت وارد ربات بشه😁

اگه نیاز به آموزش داری تو [کانال پشتیبانی ](https://t.me/joinchat/AAAAAEQ8HNge8BmhHV8vUQ) عضو شو.
🆔 @MLoveMusic
🆔 @MLoveMusicBot
",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
             'keyboard'=>[
[['text'=>'تغییر نام'],['text'=>'تغییر نام و تگ']],
[['text'=>'برگشت']],
             ],             'resize_keyboard'=>true
         ])
]);
}

elseif($text == "تغییر نام"){
file_put_contents("$from_id/$from_id.txt","changenn");
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"خب😁
برای تغییر نام آهنگ تو مرحله اول تو باید یه فایل موزیک برام بفرستی تا من اسم فایل رو تغییر بدم و برات بفرستم . . .
اگه نیاز به آموزش داری تو [کانالمون](https://t.me/joinchat/AAAAAEQ8HNge8BmhHV8vUQ) عضو شو.
🆔 @MLoveMusic
🆔 @MLoveMusicBot
",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
'keyboard'=>[
  
[['text'=>'برگشت']],
             ],             'resize_keyboard'=>true
         ])
]);
}
elseif($text == "مشخصات شما"){
sendaction($chat_id,'typing');
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"🔰مشخصات شما:

🔺نام : $name

🔺تعداد دعوت کنندگان : $tedad

🔺لینک اختصاصی شما برای دعوت:
https://telegram.me/MLoveMusicBot/start=user=$from_id
]);
}
elseif(preg_match('([!/#]bc users)',$text)){
if($from_id == $Dev | $from_id == $admin){
$all_users = fopen( "data/music/users.txt", "r");
  while( !feof( $all_users)) {
    $user = fgets( $all_users);
get('sendMessage',[
'chat_id'=>$user,
'text'=>$reply_text,
'parse_mode'=>'html',
]);
}
sendaction($chat_id,'typing');
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"پیام با موفقیت برای کاربران فرستاده شد",
'parse_mode'=>'html',
]);
}
}
elseif(preg_match('([$!/#]fwd users)',$text)){
if($from_id == $Dev | $from_id == $admin){
$all_users = fopen( "data/music/users.txt", "r");
  while( !feof( $all_users)) {
    $user = fgets( $all_users);
Forward($user,$chat_id,$reply_msgid);
}
sendaction($chat_id,'typing');
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"پیام با موفقیت برای کاربران فوروارد شد",
'parse_mode'=>'html',
]);
}
}
elseif(strpos($text, "/send") !== false) {
$id = str_replace("/send ","",$text);
if($from_id == $Dev){
file_put_contents("$from_id/send.txt","send");
file_put_contents("$from_id/id.txt","$id");
get('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا پیامی را که میخواهید به $id ارسال کنید بفرستید",
'parse_mode'=>'html',
]);
}
}
elseif($text == "تغییر نام و تگ"){
    if($tedad >= 5){
file_put_contents("$from_id/$from_id.txt","changett");
get('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"خب😁
برای تغییر نام و تگ آهنگ تو مرحله اول تو باید یه فایل موزیک برام بفرستی تا من اسم فایل رو تغییر بدم و برات بفرستم . . .
اگه نیاز به آموزش داری تو [کانالمون](https://t.me/joinchat/AAAAAEQ8HNge8BmhHV8vUQ) عضو شو.
🆔 @MLoveMusic
🆔 @MLoveMusicBot
",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
'keyboard'=>[
  
[['text'=>'برگشت']],
             ],             'resize_keyboard'=>true
         ])
]);
}else{
get('sendphoto',[
'chat_id'=>$chat_id,
'photo'=>new CURLFile("davat.jpg"),
'caption'=>"سلام😍
با این ربات میتونی موزیک رو به وویس و وویسو به موزیک تبدیل کنی
اگه دنبال آهنگای کمیابی بزن رو لینک👇👇
https://telegram.me/MLoveMusicBot?start=user=$from_id",
]);
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id+1,
'text'=>"برای تغییر تگ و نام فایل شما باید 5 نفر رو با لینک مخصوص به خودتون به ربات دعوت کنید🤡

👈تعداد دعوت شدگان: $tedad 
 
🆔 @MLoveMusic
🆔 @MLoveMusicBot
",
]);
} 
}
elseif($text == "برگشت" && $text != ""){
    unlink("$from_id.txt");
rmdir("$from_id");
$ozv = file_get_contents("https://api.telegram.org/bot445214172:AAFcta4xDQ_obAUMgRI9JrhtLqPvOkt6U00/getChatMember?chat_id=@MLoveMusic&user_id=$from_id");
if(strpos($ozv,'"status":"left"') == true){
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"سلام
به ربات MLoveMusic خوش اومدی😃✄1�7
با این ربات میتونی به راحتی آهنگ های جالب دانلود کنی...
برای استفاده از ربات باید در کانال پشتیبانی ربات عضو شوید
برای  عضویت در کانال پشتیبانی [اینجا](https://t.me/joinchat/AAAAAEQ8HNge8BmhHV8vUQ) را کلیک کنید
پس از عضویت مجددا روی دستور /start کلیک کنید
🆔 @MLoveMusicBot
🆔 @MLoveMusic
",
'parse_mode'=>'MarkDown',
]);
}else{
    if(strpos($ozv,'"status":"left"') == false){
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"خب🙃
برای دانلود آهنگ اسم آهنگ رو برام بفرست
اگه نیاز به آموزش دانلود آهنگ داری تو [کانالمون](https://t.me/joinchat/AAAAAEQ8HNge8BmhHV8vUQ) عضو شو.
🆔 @MLoveMusicBot
🆔 @MLoveMusic
",
'parse_mode'=>'MarkDown',
  'reply_markup'=>json_encode([
             'keyboard'=>[
                [['text'=>'راهنمای کار با ربات']],
[['text'=>'ارتباط با پشتیبانی'],['text'=>'آمار ربات']],
[['text'=>'بخش تبدیل'],['text'=>'تغییر نام فایل']],
[['text'=>'مشخصات شما']],
             ],             'resize_keyboard'=>true
         ])
]);
}
}   
}

elseif($text == "آمار ربات"){
$user = file_get_contents("data/music/users.txt");
    $user_id = explode("\n",$user);
    $user_count = count($user_id) ;
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"💠آمار ربات MLoveMusicBot تا این لحظه
➖➖➖➖
🔺ساعت:  $time 
🔺تاریخ:  $date
➖➖➖➖
🔺تعداد اعضا:
$user_count

🆔 @MLoveMusic
🆔 @MLoveMusicBot",
]);
for($i=$message_id; $i>=$message_id-15; $i--){
$timee = file_get_contents("https://provps.ir/td?td=time");
get('editmessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
'text'=>"💠آمار ربات MLoveMusicBot تا این لحظه
➖➖➖➖
🔺ساعت:  $timee
🔺تاریخ:  $date
➖➖➖➖
🔺تعداد اعضا:
$user_count

🆔 @MLoveMusic
🆔 @MLoveMusicBot",
]);
}
}
elseif($text == "ارتباط با پشتیبانی"){
get('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا پیام خود را ارسال کنید تا در اسرع وقت به شما پاسخ داده شود😉",
'parse_mode'=>'html',
'reply_markup'=>json_encode([
    'keyboard'=>[
        [['text'=>'برگشت']],
        ],
        'resize_keybord'=>true
        ])
        ]);
file_put_contents("$from_id.txt","one");
}
elseif($answer == "one"){
unlink("$from_id.txt");
Forward(342929908,$chat_id,$message_id);
get('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام با موفقیت ارسال شد✔️",
'parse_mode'=>'MarkDown',
  'reply_markup'=>json_encode([
             'keyboard'=>[
                [['text'=>'راهنمای کار با ربات']],
[['text'=>'ارتباط با پشتیبانی'],['text'=>'آمار ربات']],
[['text'=>'بخش تبدیل'],['text'=>'تغییر نام فایل']],
[['text'=>'مشخصات شما']],
             ],             'resize_keyboard'=>true
         ])
]);
}
elseif($rpto != "" && $update->message->reply_to_message){
get('sendMessage',[
'chat_id'=>$rpto,
'text'=>$text,
]);
get('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام به کاربر $rpto ارسال شد",
]);
}
elseif($text == "راهنمای کار با ربات"){ 
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"این ربات یکی از برترین ربات ها در زمینه دانلود و ارسال آهنگ در تلگرام میباشد🙃

قبل از استفاده از ربات باید به چند نکته دقت داشته باشید

نکته اول : برای استفاده از این ربات حتما باید در [کانال پشتیبانی ربات](https://t.me/joinchat/AAAAAEQ8HNge8BmhHV8vUQ) عضو شوید . 

نکته دوم : برای بهتر نتیجه گرفتن هنگام جستجوی آهنگ اسم یا یه تیکه از آهنگ را بفرستید

نکته سوم : توجه داشته باشید تعداد کاراکتر های شما هنگام جستجو بیش از 20 کارکتر نباشد

 انتقادات و پیشنهادات خود را  میتوانید در زمینه اضافه شدن یک قابلیت به ربات در بخش ارتباط با پشتیبانی برامون ارسال کنید .

منتظر سوپرایز های ما باشید . . . 

🆔 @MLoveMusic
🆔 @MLoveMusicBot",
'parse_mode'=>'MarkDown',
]);
}
elseif($text == "بخش تبدیل"){
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"به بخش تبدیل ربات خوش اومدی 
در حال حاضر تو این بخش میتونی 
موزیک را به وویس و وویس را به موزیک تبدیل کنی.

🆔 @MLoveMusic
🆔 @MLoveMusicBot",
'parse_mode'=>'Html',
'parse_mode'=>'MarkDown',  
'reply_markup'=>json_encode([
             'keyboard'=>[
[['text'=>'تبدیل به وویس'],['text'=>'تبدیل به موزیک']],
[['text'=>'برگشت']],
             ],             'resize_keyboard'=>true
         ])
]);
}
elseif($text == "تبدیل به موزیک"){
mkdir("$from_id");
file_put_contents("$from_id/$from_id.txt","mp3name");
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"خب برای اینکه بتونی با استفاده از من وویس رو به موزیک تبدیل کن 
همین الان وویست رو ارسال کن😃

🆔 @MLoveMusic
🆔 @MLoveMusicBot",
'parse_mode'=>'Html',
'reply_markup'=>json_encode([
             'keyboard'=>[
[['text'=>'برگشت']],
             ],             'resize_keyboard'=>true
         ])
]);
}
elseif($text == "تبدیل به وویس"){
file_put_contents("$from_id/$from_id.txt","tovoice");
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"
خب برای اینکه بتونی با استفاده از من موزیک رو به وویس تبدیل کنی
همین الان موزیکت رو ارسال کن😃

🆔 @MLoveMusic
🆔 @MLoveMusicBot",
'parse_mode'=>'Html',
'reply_markup'=>json_encode([
             'keyboard'=>[
[['text'=>'برگشت']],
             ],             'resize_keyboard'=>true
         ])
]);
}

elseif($change == "changen"){
if($message->text){
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"کمی صبر کنید ."
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
'text'=>"کمی صبر کنید . ."
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
'text'=>"کمی صبر کنید . . ."
]);
get('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
]);
sendAction($chat_id,'upload_audio');
get('sendaudio',[
 'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
 'audio'=>new CURLFile("$from_id/mp3.mp3"),
'title'=>$text,
'performer'=>"❤️@MLoveMusic❤️",
'caption'=>"🆔 @MLoveMusic
🆔 @MLoveMusicBot",
 ]);
rmdir("$from_id");
unlink("$from_id/$from_id.txt");
unlink("$from_id/mp3.txt");
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id+2,
'text'=>"خب😁
اینم اسم آهنگت که تغییر کرد . . . 

تو الآن میتونی یه تیکه از آهنگ یا اسم یه خواننده رو بفرستم برام تا من برات آهنگ بفرستم 

اگه نیاز به آموزش دانلود آهنگ داری تو [کانالمون](https://t.me/joinchat/AAAAAEQ8HNge8BmhHV8vUQ) عضو شو.
🆔 @MLoveMusicBot
🆔 @MLoveMusic
",
'parse_mode'=>'MarkDown',
  'reply_markup'=>json_encode([
             'keyboard'=>[
                [['text'=>'راهنمای کار با ربات']],
[['text'=>'ارتباط با پشتیبانی'],['text'=>'آمار ربات']],
[['text'=>'بخش تبدیل'],['text'=>'تغییر نام فایل']],
             ],             'resize_keyboard'=>true
         ])
]);
}
}
elseif($change == "changenn"){
if($update->message->audio){
file_put_contents("$from_id/$from_id.txt","changen");
$token = "445214172:AAFcta4xDQ_obAUMgRI9JrhtLqPvOkt6U00";
$audio = $message->audio;
$file = $audio->file_id;
      $get = get('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
mkdir("$from_id");     
 file_put_contents("$from_id/mp3.mp3",file_get_contents("https://api.telegram.org/file/bot$token/$patch"));
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
'text'=>"لطفا اسمی که میخواهید روی فایل نوشته شود را وارد کنید",
]);
}
}

elseif($change == "changetttt"){
if($message->text){
$filen = file_get_contents("$from_id/filen.txt");
get('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"کمی صبر کنید ."
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
'text'=>"کمی صبر کنید . ."
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
'text'=>"کمی صبر کنید . . ."
]);
get('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
]);
sendAction($chat_id,'upload_audio');
get('sendaudio',[
 'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
 'audio'=>new CURLFile("$from_id/mp3.mp3"),
'title'=>$filen,
'performer'=>$text,
'caption'=>"🆔 @MLoveMusic
🆔 @MLoveMusicBot",
 ]);
rmdir("$from_id");
unlink("$from_id/$from_id.txt");
unlink("$from_id/filen.txt");
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id+2,
'text'=>"خب😁
اینم اسم و تگ آهنگت که تغییر کرد . . . 

تو الآن میتونی یه تیکه از آهنگ یا اسم یه خواننده رو بفرستم برام تا من برات آهنگ بفرستم 

اگه نیاز به آموزش دانلود آهنگ داری تو [کانالمون](https://t.me/joinchat/AAAAAEQ8HNge8BmhHV8vUQ) عضو شو.
🆔 @MLoveMusicBot
🆔 @MLoveMusic
",
'parse_mode'=>'MarkDown',
  'reply_markup'=>json_encode([
             'keyboard'=>[
                [['text'=>'راهنمای کار با ربات']],
[['text'=>'ارتباط با پشتیبانی'],['text'=>'آمار ربات']],
[['text'=>'بخش تبدیل'],['text'=>'تغییر نام فایل']],
             ],             'resize_keyboard'=>true
         ])
]);
}
}
elseif($change == "mp3name"){
if($update->message->voice){
$token = "445214172:AAFcta4xDQ_obAUMgRI9JrhtLqPvOkt6U00";
$voice = $message->voice;
$file = $voice->file_id;
      $get = get('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
mkdir("$from_id");     
 file_put_contents("$from_id/mp3.mp3",file_get_contents("https://api.telegram.org/file/bot$token/$patch"));
get('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا عبارتی را که میخواهید روی فایل موسیقیتان نوشته شود ارسال کنید
این عبارت میتوانید اسم فایل و ... باشد",
]);
file_put_contents("$from_id/$from_id.txt","toaudio");
}
}
elseif($change == "toaudio"){
if($message->text){
file_put_contents("$from_id/mp3name.txt","$text");
$mp3name = file_get_contents("$from_id/mp3name.txt");
get('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"کمی صبر کنید ."
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
'text'=>"کمی صبر کنید . ."
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
'text'=>"کمی صبر کنید . . ."
]);
get('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
]);
sendAction($chat_id,'upload_audio');
get('sendaudio',[
 'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
 'audio'=>new CURLFile("$from_id/mp3.mp3"),
'title'=>$mp3name,
'performer'=>"❤️@MLoveMusic❤️",
'caption'=>"🆔 @MLoveMusic
🆔 @MLoveMusicBot",
 ]);
rmdir("$from_id");
unlink("$from_id/$from_id.txt");
unlink("$from_id/mp3.txt");
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id+2,
'text'=>"خب😁
اینم از وویست که تبدیل به آهنگ شد. . .

تو الآن میتونی یه تیکه از آهنگ یا اسم یه خواننده رو بفرستم برام تا من برات آهنگ بفرستم 

اگه نیاز به آموزش دانلود آهنگ داری تو [کانالمون](https://t.me/joinchat/AAAAAEQ8HNge8BmhHV8vUQ) عضو شو.
🆔 @MLoveMusicBot
🆔 @MLoveMusic
",
'parse_mode'=>'MarkDown',
  'reply_markup'=>json_encode([
             'keyboard'=>[
                [['text'=>'راهنمای کار با ربات']],
[['text'=>'ارتباط با پشتیبانی'],['text'=>'آمار ربات']],
[['text'=>'بخش تبدیل'],['text'=>'تغییر نام فایل']],
             ],             'resize_keyboard'=>true
         ])
]);
}
}
elseif($change == "changett"){
if($update->message->audio){
$token = "445214172:AAFcta4xDQ_obAUMgRI9JrhtLqPvOkt6U00";
$audio = $message->audio;
$file = $audio->file_id;
      $get = get('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
mkdir("$from_id");     
 file_put_contents("$from_id/mp3.mp3",file_get_contents("https://api.telegram.org/file/bot$token/$patch"));
get('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لطفا اسمی که میخواهید روی فایل نوشته شود را وارد کنید",
]);
file_put_contents("$from_id/$from_id.txt","changettt");

}
}

elseif($change == "changettt"){
if($message->text){
file_put_contents("$from_id/filen.txt","$text");
file_put_contents("$from_id/$from_id.txt","changetttt");
get('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"حالا متنی رو که میخوای بجای تگ فایل نشون داده بشه وارد کن",
]);
}
}

elseif($change == "tovoice"){
if($message->audio){
$token = "445214172:AAFcta4xDQ_obAUMgRI9JrhtLqPvOkt6U00";
$audio = $message->audio;
$file = $audio->file_id;
      $get = get('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
mkdir("$from_id");      
file_put_contents("$from_id/MLoveMusicBot.ogg",file_get_contents("https://api.telegram.org/file/bot$token/$patch"));
get('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"کمی صبر کنید ."
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
'text'=>"کمی صبر کنید . ."
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
'text'=>"کمی صبر کنید . . ."
]);
get('deletemessage',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
]);
sendAction($chat_id,'upload_voice');
get('sendvoice',[
 'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id,
 'voice'=>new CURLFile("$from_id/MLoveMusicBot.ogg"),
'caption'=> "@MLoveMusic
@MLoveMusicBot",
 ]);
unlink("$from_id/$from_id.txt");
unlink("$from_id/MLoveMusicBot.ogg");
get('sendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$message_id+2,
'text'=>"خب😁
اینم از آهنگت که تبدیل به وویس شد. . .

تو الآن میتونی یه تیکه از آهنگ یا اسم یه خواننده رو بفرستم برام تا من برات آهنگ بفرستم

اگه نیاز به آموزش دانلود آهنگ داری تو [کانالمون](https://t.me/joinchat/AAAAAEQ8HNge8BmhHV8vUQ) عضو شو.
🆔 @MLoveMusicBot
🆔 @MLoveMusic
",
'parse_mode'=>'MarkDown',
  'reply_markup'=>json_encode([
             'keyboard'=>[
                [['text'=>'راهنمای کار با ربات']],
[['text'=>'ارتباط با پشتیبانی'],['text'=>'آمار ربات']],
[['text'=>'بخش تبدیل'],['text'=>'تغییر نام فایل']],
             ],             'resize_keyboard'=>true
         ])
]);
}
}


elseif($send == "send"){
if($from_id == $Dev){
get('sendMessage',[
'chat_id'=>$idd,
'text'=>"$text",
'parse_mode'=>'MarkDown',
]);
get('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"پیام با موفقیت به $idd ارسال شد",
'parse_mode'=>'MarkDown',
]);
unlink("$from_id/send.txt");
unlink("$from_id/id.txt");
}
}
elseif($text){
$fin = urlencode($text);
file_put_contents("data/musicdata/$from_id.txt","$fin");
$res = json_decode(file_get_contents("https://api.feelthecode.xyz/music/?type=search&q=$fin&limit=10"));
$count = $res->count;
$title0 = $res->result[0]->title;
$title1 = $res->result[1]->title;
$title2 = $res->result[2]->title;
$title3 = $res->result[3]->title;
$title4 = $res->result[4]->title;
$title5 = $res->result[5]->title;
$title6 = $res->result[6]->title;
$title7 = $res->result[7]->title;
$title8 = $res->result[8]->title;
$title9 = $res->result[9]->title;
sleep(1);
sendAction($chat_id,'typing');
get('sendMessage',[
    'reply_to_message_id'=>$message_id,
'chat_id'=>$chat_id,
'text'=>"در حال جستجو .",
]);
sleep(2);
get('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
'text'=>"در حال جستجو . .",
]);
sleep(3);
get('editMessagetext',[
'chat_id'=>$chat_id,
'message_id'=>$message_id+1,
'text'=>"در حال جستجو . . .",
]);
get('editMessagetext',[
    'message_id'=>$message_id+1,
'chat_id'=>$chat_id,
'text'=>"🔸نتایج جستجو برای [$text]

〰〰〰〰|〰〰〰〰
$title0

$title1

$title2

$title3

$title4

$title5

$title6

$title7

$title8

$title9
〰〰〰〰|〰〰〰〰

🔰نمایش $count ترانه از 10


🆔 @MLoveMusic
🆔 @MLoveMusicBot",
'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"$title9",'callback_data'=>'json9']],
[['text'=>"$title0",'callback_data'=>'json0'],['text'=>"$title1",'callback_data'=>'json1']],
[['text'=>"$title3",'callback_data'=>'json3']],
[['text'=>"$title4",'callback_data'=>'json4'],['text'=>"$title5",'callback_data'=>'json5']],
[['text'=>"$title6",'callback_data'=>'json6']],
[['text'=>"$title7",'callback_data'=>'json7'],['text'=>"$title8",'callback_data'=>'json8']],
[['text'=>"$title9",'callback_data'=>'json']],
],
])

]);
}
elseif($data == "json0"){
$fin0 = file_get_contents("data/musicdata/$fromid.txt");
$res = json_decode(file_get_contents("https://api.feelthecode.xyz/music/?type=search&q=$fin0&limit=10"));
$download0 = $res->result[0]->download;
$title0 = $res->result[0]->title;
$duration0 = $res->result[0]->duration;
$cover0 = $res->result[0]->cover;
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید . .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید . . .",
]);
sleep(1);
get('deleteMessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
]);
get('sendphoto',[
'chat_id'=>$chatid,
'photo'=>$cover0,
'caption'=>"title => $title0 
duration => $duration
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'📤دانلود مستقیم از تلگرام📤','callback_data'=>'download0']],
],
])
]);
}
elseif($data == "json1"){
$fin0 = file_get_contents("data/musicdata/$fromid.txt");
$res = json_decode(file_get_contents("https://api.feelthecode.xyz/music/?type=search&q=$fin0&limit=10"));
$download1 = $res->result[1]->download;
$title1 = $res->result[1]->title;
$duration1 = $res->result[1]->duration;
$cover1 = $res->result[1]->cover;
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید . .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید . . .",
]);
sleep(1);
get('deleteMessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
]);
get('sendphoto',[
'chat_id'=>$chatid,
'photo'=>$cover1,
'caption'=>"title => $title1
duration => $duration1
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'📤دانلود مستقیم از تلگرام📤','callback_data'=>'download1']],
],
])
]);
}
elseif($data == "json2"){
$fin2 = file_get_contents("data/musicdata/$fromid.txt");
$res = json_decode(file_get_contents("https://api.feelthecode.xyz/music/?type=search&q=$fin2&limit=10"));
$download0 = $res->result[2]->download;
$title2 = $res->result[2]->title;
$duration2 = $res->result[2]->duration;
$cover2 = $res->result[2]->cover;
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید . .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید . . .",
]);
sleep(1);
get('deleteMessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
]);
get('sendphoto',[
'chat_id'=>$chatid,
'photo'=>$cover2,
'caption'=>"title => $title2 
duration => $duration2
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'📤دانلود مستقیم از تلگرام📤','callback_data'=>'download2']],
],
])
]);
}
elseif($data == "json3"){
$fin3 = file_get_contents("data/musicdata/$fromid.txt");
$res = json_decode(file_get_contents("https://api.feelthecode.xyz/music/?type=search&q=$fin3&limit=10"));
$download3 = $res->result[3]->download;
$title3 = $res->result[3]->title;
$duration3 = $res->result[3]->duration;
$cover3 = $res->result[3]->cover;
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید . .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید . . .",
]);
sleep(1);
get('deleteMessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
]);
get('sendphoto',[
'chat_id'=>$chatid,
'photo'=>$cover3,
'caption'=>"title => $title3 
duration => $duration3
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'📤دانلود مستقیم از تلگرام📤','callback_data'=>'download3']],
],
])
]);
}
elseif($data == "json4"){
$fin4 = file_get_contents("data/musicdata/$fromid.txt");
$res = json_decode(file_get_contents("https://api.feelthecode.xyz/music/?type=search&q=$fin4&limit=10"));
$download4 = $res->result[4]->download;
$title4 = $res->result[4]->title;
$duration4 = $res->result[4]->duration;
$cover4 = $res->result[4]->cover;
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید . .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید . . .",
]);
sleep(1);
get('deleteMessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
]);
get('sendphoto',[
'chat_id'=>$chatid,
'photo'=>$cover4,
'caption'=>"title => $title4
duration => $duration4
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'📤دانلود مستقیم از تلگرام📤','callback_data'=>'download4']],
],
])
]);
}
elseif($data == "json5"){
$fin5 = file_get_contents("data/musicdata/$fromid.txt");
$res = json_decode(file_get_contents("https://api.feelthecode.xyz/music/?type=search&q=$fin5&limit=10"));
$download5 = $res->result[5]->download;
$title5 = $res->result[5]->title;
$duration5 = $res->result[5]->duration;
$cover5 = $res->result[5]->cover;
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید . .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید . . .",
]);
sleep(1);
get('deleteMessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
]);
get('sendphoto',[
'chat_id'=>$chatid,
'photo'=>$cover5,
'caption'=>"title => $title5
duration => $duration5
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'📤دانلود مستقیم از تلگرام📤','callback_data'=>'download5']],
],
])
]);
}
elseif($data == "json6"){
$fin6 = file_get_contents("data/musicdata/$fromid.txt");
$res = json_decode(file_get_contents("https://api.feelthecode.xyz/music/?type=search&q=$fin6&limit=10"));
$download6 = $res->result[6]->download;
$title6 = $res->result[6]->title;
$duration6 = $res->result[6]->duration;
$cover6 = $res->result[6]->cover;
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید . .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید . . .",
]);
sleep(1);
get('deleteMessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
]);
get('sendphoto',[
'chat_id'=>$chatid,
'photo'=>$cover6,
'caption'=>"title => $title6
duration => $duration6
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'📤دانلود مستقیم از تلگرام📤','callback_data'=>'download6']],
],
])
]);
}
elseif($data == "json7"){
$fin7 = file_get_contents("data/musicdata/$fromid.txt");
$res = json_decode(file_get_contents("https://api.feelthecode.xyz/music/?type=search&q=$fin7&limit=10"));
$download7 = $res->result[7]->download;
$title7 = $res->result[7]->title;
$duration7 = $res->result[7]->duration;
$cover7 = $res->result[7]->cover;
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید . .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید . . .",
]);
sleep(1);
get('deleteMessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
]);
get('sendphoto',[
'chat_id'=>$chatid,
'photo'=>$cover7,
'caption'=>"title => $title7
duration => $duration7
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'📤دانلود مستقیم از تلگرام📤','callback_data'=>'download7']],
],
])
]);
}
elseif($data == "json8"){
$fin8 = file_get_contents("data/musicdata/$fromid.txt");
$res = json_decode(file_get_contents("https://api.feelthecode.xyz/music/?type=search&q=$fin8&limit=10"));
$download8 = $res->result[8]->download;
$title8 = $res->result[8]->title;
$duration8 = $res->result[8]->duration;
$cover8 = $res->result[8]->cover;
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید . .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید . . .",
]);
sleep(1);
get('deleteMessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
]);
get('sendphoto',[
'chat_id'=>$chatid,
'photo'=>$cover8,
'caption'=>"title => $title8
duration => $duration8
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'📤دانلود مستقیم از تلگرام📤','callback_data'=>'download8']],
],
])
]);
}
elseif($data == "json9"){
$fin9 = file_get_contents("data/musicdata/$fromid.txt");
$res = json_decode(file_get_contents("https://api.feelthecode.xyz/music/?type=search&q=$fin9&limit=10"));
$download9 = $res->result[9]->download;
$title9 = $res->result[9]->title;
$duration9 = $res->result[9]->duration;
$cover9 = $res->result[9]->cover;
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید . .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"لطفا صبر کنید . . .",
]);
sleep(1);
get('deleteMessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
]);
get('sendphoto',[
'chat_id'=>$chatid,
'photo'=>$cover9,
'caption'=>"title => $title9
duration => $duration9
",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>'📤دانلود مستقیم از تلگرام📤','callback_data'=>'download9']],
],
])
]);
}
elseif($data == "download0"){
$fin0 = file_get_contents("data/musicdata/$fromid.txt");
$res = json_decode(file_get_contents("https://api.feelthecode.xyz/music/?type=search&q=$fin0&limit=10"));
$download0 = $res->result[0]->download;
$title0 = $res->result[0]->title;
file_put_contents("$title0.mp3",file_get_contents($download0));
get('deletemessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
]);
sleep(1);
get('sendMessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"درحال دانلود فایل .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
'text'=>"درحال دانلود فایل . .",
]);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
'text'=>"درحال دانلود فایل . . .",
]);
get('deletemessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
]);
sendaction($chatid,'upload_audio');
get('sendaudio',[
'chat_id'=>$chatid,
'audio'=> new CURLFile("$title0.mp3"),
'performer'=>"❤️@MLoveMusic❤️",
'caption'=>"🆔 @MLoveMusic
🆔 @MLoveMusicBot",
]);
unlink("$title0.mp3");
unlink("data/musicdata/$fromid.txt");
}
elseif($data == "download1"){
$fin1 = file_get_contents("data/musicdata/$fromid.txt");
$res = json_decode(file_get_contents("https://api.feelthecode.xyz/music/?type=search&q=$fin1&limit=10"));
$download1 = $res->result[1]->download;
$title1 = $res->result[1]->title;
file_put_contents("$title1.mp3",file_get_contents($download1));
get('deletemessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
]);
sleep(1);
get('sendMessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"درحال دانلود فایل .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
'text'=>"درحال دانلود فایل . .",
]);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
'text'=>"درحال دانلود فایل . . .",
]);
get('deletemessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
]);
sendaction($chatid,'upload_audio');
get('sendaudio',[
'chat_id'=>$chatid,
'audio'=> new CURLFile("$title1.mp3"),
'performer'=>"❤️@MLoveMusic❤️",
'caption'=>"🆔 @MLoveMusic
🆔 @MLoveMusicBot",
]);
unlink("$title1.mp3");
unlink("data/musicdata/$fromid.txt");
}
elseif($data == "download2"){
$fin2 = file_get_contents("data/musicdata/$fromid.txt");
$res = json_decode(file_get_contents("https://api.feelthecode.xyz/music/?type=search&q=$fin2&limit=10"));
$download2 = $res->result[2]->download;
$title2 = $res->result[2]->title;
file_put_contents("$title2.mp3",file_get_contents($download2));
get('deletemessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
]);
sleep(1);
get('sendMessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"درحال دانلود فایل .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
'text'=>"درحال دانلود فایل . .",
]);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
'text'=>"درحال دانلود فایل . . .",
]);
get('deletemessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
]);
sendaction($chatid,'upload_audio');
get('sendaudio',[
'chat_id'=>$chatid,
'audio'=> new CURLFile("$title2.mp3"),
'performer'=>"❤️@MLoveMusic❤️",
'caption'=>"🆔 @MLoveMusic
🆔 @MLoveMusicBot",
]);
unlink("$title2.mp3");
unlink("data/musicdata/$fromid.txt");
}
elseif($data == "download3"){
$fin3 = file_get_contents("data/musicdata/$fromid.txt");
$res = json_decode(file_get_contents("https://api.feelthecode.xyz/music/?type=search&q=$fin3&limit=10"));
$download3 = $res->result[3]->download;
$title3 = $res->result[3]->title;
file_put_contents("$title3.mp3",file_get_contents($download3));
get('deletemessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
]);
sleep(1);
get('sendMessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"درحال دانلود فایل .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
'text'=>"درحال دانلود فایل . .",
]);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
'text'=>"درحال دانلود فایل . . .",
]);
get('deletemessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
]);
sendaction($chatid,'upload_audio');
get('sendaudio',[
'chat_id'=>$chatid,
'audio'=> new CURLFile("$title3.mp3"),
'performer'=>"❤️@MLoveMusic❤️",
'caption'=>"🆔 @MLoveMusic
🆔 @MLoveMusicBot",
]);
unlink("$title3.mp3");
unlink("data/musicdata/$fromid.txt");
}
elseif($data == "download4"){
$fin4 = file_get_contents("data/musicdata/$fromid.txt");
$res = json_decode(file_get_contents("https://api.feelthecode.xyz/music/?type=search&q=$fin4&limit=10"));
$download4 = $res->result[4]->download;
$title4 = $res->result[4]->title;
file_put_contents("$title4.mp3",file_get_contents($download4));
get('deletemessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
]);
sleep(1);
get('sendMessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"درحال دانلود فایل .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
'text'=>"درحال دانلود فایل . .",
]);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
'text'=>"درحال دانلود فایل . . .",
]);
get('deletemessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
]);
sendaction($chatid,'upload_audio');
get('sendaudio',[
'chat_id'=>$chatid,
'audio'=> new CURLFile("$title4.mp3"),
'performer'=>"❤️@MLoveMusic❤️",
'caption'=>"🆔 @MLoveMusic
🆔 @MLoveMusicBot",
]);
unlink("$title4.mp3");
unlink("data/musicdata/$fromid.txt");
}

elseif($data == "download5"){
$fin5 = file_get_contents("data/musicdata/$fromid.txt");
$res = json_decode(file_get_contents("https://api.feelthecode.xyz/music/?type=search&q=$fin5&limit=10"));
$download5 = $res->result[5]->download;
$title5 = $res->result[5]->title;
file_put_contents("$title5.mp3",file_get_contents($download5));
get('deletemessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
]);
sleep(1);
get('sendMessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"درحال دانلود فایل .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
'text'=>"درحال دانلود فایل . .",
]);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
'text'=>"درحال دانلود فایل . . .",
]);
get('deletemessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
]);
sendaction($chatid,'upload_audio');
get('sendaudio',[
'chat_id'=>$chatid,
'audio'=> new CURLFile("$title5.mp3"),
'performer'=>"❤️@MLoveMusic❤️",
'caption'=>"🆔 @MLoveMusic
🆔 @MLoveMusicBot",
]);
unlink("$title5.mp3");
unlink("data/musicdata/$fromid.txt");
}
elseif($data == "download6"){
$fin6 = file_get_contents("data/musicdata/$fromid.txt");
$res = json_decode(file_get_contents("https://api.feelthecode.xyz/music/?type=search&q=$fin6&limit=10"));
$download6 = $res->result[6]->download;
$title6 = $res->result[6]->title;
file_put_contents("$title6.mp3",file_get_contents($download6));
get('deletemessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
]);
sleep(1);
get('sendMessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"درحال دانلود فایل .",
]);
sleep(1);
get('editMessagetext',[ 
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
'text'=>"درحال دانلود فایل . .",
]);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
'text'=>"درحال دانلود فایل . . .",
]);
get('deletemessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
]);
sendaction($chatid,'upload_audio');
get('sendaudio',[
'chat_id'=>$chatid,
'audio'=> new CURLFile("$title6.mp3"),
'performer'=>"❤️@MLoveMusic❤️",
'caption'=>"🆔 @MLoveMusic
🆔 @MLoveMusicBot",
]);
unlink("$title6.mp3");
unlink("data/musicdata/$fromid.txt");
}

elseif($data == "download7"){
$fin7 = file_get_contents("data/musicdata/$fromid.txt");
$res = json_decode(file_get_contents("https://api.feelthecode.xyz/music/?type=search&q=$fin7&limit=10"));
$download7 = $res->result[7]->download;
$title7 = $res->result[7]->title;
file_put_contents("$title7.mp3",file_get_contents($download7));
get('deletemessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
]);
sleep(1);
get('sendMessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"درحال دانلود فایل .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
'text'=>"درحال دانلود فایل . .",
]);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
'text'=>"درحال دانلود فایل . . .",
]);
get('deletemessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
]);
sendaction($chatid,'upload_audio');
get('sendaudio',[
'chat_id'=>$chatid,
'audio'=> new CURLFile("$title7.mp3"),
'performer'=>"❤️@MLoveMusic❤️",
'caption'=>"🆔 @MLoveMusic
🆔 @MLoveMusicBot",
]);
unlink("$title7.mp3");
unlink("data/musicdata/$fromid.txt");
}

elseif($data == "download8"){
$fin8 = file_get_contents("data/musicdata/$fromid.txt");
$res = json_decode(file_get_contents("https://api.feelthecode.xyz/music/?type=search&q=$fin8&limit=10"));
$download8 = $res->result[8]->download;
$title8 = $res->result[8]->title;
file_put_contents("$title8.mp3",file_get_contents($download8));
get('deletemessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
]);
sleep(1);
get('sendMessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"درحال دانلود فایل .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
'text'=>"درحال دانلود فایل . .",
]);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
'text'=>"درحال دانلود فایل . . .",
]);
get('deletemessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
]);
sendaction($chatid,'upload_audio');
get('sendaudio',[
'chat_id'=>$chatid,
'audio'=> new CURLFile("$title8.mp3"),
'performer'=>"❤️@MLoveMusic❤️",
'caption'=>"🆔 @MLoveMusic
🆔 @MLoveMusicBot",
]);
unlink("$title8.mp3");
unlink("data/musicdata/$fromid.txt");
}

elseif($data == "download9"){
$fin9 = file_get_contents("data/musicdata/$fromid.txt");
$res = json_decode(file_get_contents("https://api.feelthecode.xyz/music/?type=search&q=$fin9&limit=10"));
$download9 = $res->result[9]->download;
$title9 = $res->result[9]->title;
file_put_contents("$title9.mp3",file_get_contents($download9));
get('deletemessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
]);
sleep(1);
get('sendMessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid,
'text'=>"درحال دانلود فایل .",
]);
sleep(1);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
'text'=>"درحال دانلود فایل . .",
]);
get('editMessagetext',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
'text'=>"درحال دانلود فایل . . .",
]);
get('deletemessage',[
'chat_id'=>$chatid,
'message_id'=>$messageid+1,
]);
sendaction($chatid,'upload_audio');
get('sendaudio',[
'chat_id'=>$chatid,
'audio'=> new CURLFile("$title9.mp3"),
'performer'=>"❤️@MLoveMusic❤️",
'caption'=>"🆔 @MLoveMusic
🆔 @MLoveMusicBot",
]);
unlink("$title9.mp3");
unlink("data/musicdata/$fromid.txt");
}

elseif ($text == "banner") {
}
{
    $query_id = $update->inline_query->from->id;
   get('answerInlineQuery', [
      
       'inline_query_id' => $update->inline_query->id,
        'results' => json_encode([[
            'type' => 'article',
             'thumb_url'=>"https://javaaad.elithost.ga/MLove.png",
            'id' => base64_encode(rand(5, 555)),
            'title' => 'MLoveMusic',
            'input_message_content' => ['parse_mode' => 'MarkDown', 'message_text' => "
سلام🤔
تا حالا شده دنبال یه آهنگ باشی نتونی پیداش کنی؟
یه ربات شیک برات آوردم☺️ تا بتونی با اون هر آهنگی بخوای دانلود کنی. . .
فقط کافیه بری توش متنو بفرستی تا اون لیست آهنگارو برات بفرسته😁
  
دنبال کمیاب ترین آهنگا میگردی🤔
پس همین الان عضو ربات شو. . .
https://telegram.me/MLoveMusicBot?start=user=$query_id
"],
            'reply_markup' => [
                'inline_keyboard' => [
                  [['text'=>'عضویت در ربات','url'=>'https://telegram.me/MLoveMusicBot?start=user=$query_id
'],['text'=>'معرفی','switch_inline_query'=>'banner']],
        
                ]
            ]
        ]])
    ]);
}
?>