<?php 

ob_start();

$API_KEY = '678322071:AAFRT_71kE96lUwny1opn_5yKVg53rafJsQ';
##------------------------------##
define('API_KEY',$API_KEY);
echo "<a href='https://api.telegram.org/bot$API_KEY/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME']."'>setwebhook</a>";
function bot($method,$datas=[]){
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
 function sendmessage($chat_id, $text, $model){
 bot('sendMessage',[
 'chat_id'=>$chat_id,
 'text'=>$text,
 'parse_mode'=>$mode
 ]);
 }
 function sendphoto($chat_id, $photo, $captionl){
 bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>$photo,
 'caption'=>$caption,
 ]);
 }
 function sendaudio($chat_id, $audio, $caption, $title ,$performer){
 bot('sendaudio',[
 'chat_id'=>$chat_id,
 'audio'=>$audio,
 'caption'=>$caption,
 'title'=>$title,
 'performer'=>$performer
 ]);
 }
 function senddocument($chat_id, $document, $caption){
 bot('senddocument',[
 'chat_id'=>$chat_id,
 'document'=>$document,
 'caption'=>$caption
 ]);
 }
 function sendsticker($chat_id, $sticker){
 bot('sendsticker',[
 'chat_id'=>$chat_id,
 'sticker'=>$sticker
 ]);
 }
 function sendvideo($chat_id, $video, $caption){
 bot('sendvideo',[
 'chat_id'=>$chat_id,
 'video'=>$video,
 'caption'=>$caption
 ]);
 }
 function sendvoice($chat_id, $voice, $caption){
 bot('sendvoice',[
 'chat_id'=>$chat_id,
 'voice'=>$voice,
 'caption'=>$caption
 ]);
 }
 function sendaction($chat_id, $action){
 bot('sendchataction',[
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
//====================Tikapp======================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
$chat_id = $message->chat->id;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->userame;
$text = $message->text;
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id = $update->callback_query->message->message_id;
$reply = $update->message->reply_to_message;
$mroan = file_get_contents("mroan.txt");
$ADMIN = 678322071 ;
//====================Tikapp======================//
if(preg_match('/^\/([Ss]tart)/',$text)){
$user = file_get_contents('Member.txt');
    $members = explode("\n",$user);
    if (!in_array($chat_id,$members)){
      $add_user = file_get_contents('Member.txt');
      $add_user .= $chat_id."\n";
     file_put_contents('Member.txt',$add_user);
    }
sendaction($chat_id, typing);
        bot('sendmessage', [
                'chat_id' => $chat_id,
                'disable_web_page_preview'=>true,
                'text' =>"🎖 اهلا [$last_name$first_name](t.me/$username) 🎓

♻️ ¦ انا بوت Conversation File 🌐

❇️ ¦ اقوم بتحويل مايلي 🔰

- الملصق لـــ صورة والعكس

- الصورة  لـــ ملف png والعكس

- الملصق لـــ ملف png والعكس

- النص    لـــ ملصق

- الفيديو  لـــ موسيقى

- الفيديو  لـــ صورة متحركة

- النص    لـــ موسيقى والعكس

- النص    لـــ صورة 
 
تم تصميم هذا البوت بواسطه مروان
@mroan8
- [Our Channel 📡](t.me/php88)",
                'parse_mode'=>"Markdown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"🔂 التحويلات 🌠",'callback_data'=>"a"]
              ],
              
[['text'=>"📢¦ تابع جديدنا 📡",'url'=>"t.me/php88"]],
[['text'=>"📢¦ ⱮℜᎧÂＮ ❀🎼🌸 📱",'url'=>"t.me/mroan1235"]],
[['text'=>"⚖¦ مطور البوت 🛠",'url'=>"t.me/mroan8"]],
              
              ]
        ])
            ]);
        }
//====================Tikapp======================//
 elseif($text == "/admin" && $from_id == $ADMIN){
sendaction($chat_id, typing);
        bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' =>"ادمین عزیز به پنل مدیریتی ربات خودش امدید",
                'parse_mode'=>'html',
      'reply_markup'=>json_encode([
            'keyboard'=>[
              [
              ['text'=>"آمار"],['text'=>"پیام همگانی"]
              ],
              ],'resize_keyboard'=>true
        ])
            ]);
        }
elseif($text == "آمار" && $from_id == $ADMIN){
 sendaction($chat_id,'typing');
    $user = file_get_contents("Member.txt");
    $member_id = explode("\n",$user);
    $member_count = count($member_id) -1;
 sendmessage($chat_id , " آمار کاربران : $member_count" , "html");
}
elseif($text == "پیام همگانی" && $from_id == $ADMIN){
    file_put_contents("mroan.txt","bc");
 sendaction($chat_id,'typing');
 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>" پیام مورد نظر رو در قالب متن بفرستید:",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode([
      'keyboard'=>[
   [['text'=>'/panel']],
      ],'resize_keyboard'=>true])
  ]);
}
elseif($mroan == "bc" && $from_id == $ADMIN){
    file_put_contents("mroan.txt","none");
 SendAction($chat_id,'typing');
 bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>" پیام همگانی فرستاده شد.",
  ]);
 $all_member = fopen( "Member.txt", "r");
  while( !feof( $all_member)) {
    $user = fgets( $all_member);
   SendMessage($user,$text,"html");
  }
}
//====================Tikapp======================//
elseif($data == "b"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"یه ربات اوردم براتون کارش حرف نداره😉

مثلا:👇
♻️ مبدل استیکر به عکس و بلعکس😉

مثلا یه عکس میفرستی برات استیکرشو میفرسته🙀 و برعکس👻

♻️ مبدل ویس به اهنگ و بلعکس😉

👈مثلا یه ویس میفرستی برات  تبدیل به اهنگ میکنه 🙀 یا کانال ویس داری میخوای اهنگ ها رو تبدیل به ویس کنی اهنگو میفرستی رباته  ویسو بهت میده👽


♻️ مبدل فیلم به گیف😉
👈رباته میتونه فیلمتو به گیف تبدیل کنه😼 مثلا کانال داری یه ویدیو طنز میبنی میخوای تبدیل به گیفش کنی و بزاری کانالت با این رباته راحت کارتو انجام میدی☠ 

♻️ مبدل فیلم به اهنگ😉
👈ای وای اینو که داری تازه میبینی چون وقتی یه فیلم میبینی و از اهنگی که روش گذاشته خوشتون میاد خوب اونو میخوای بصورت اهنگ داشته باشی خوب اونو میفرستی به رباته اونو تبدیل به اهنگ میکنه به همین راحتی💁

♻️ مبدل متن به ویس😉 فقط متن انگلیسی😌

👈خوب متن میفرستی تبدیل ویس میشه🕵

♻️ مبدل متن به عکس😉
♻️ مبدل متن به استیکر😉
👈متن میفرستی تبدیل به استیکر یا عکس میشه خیلی هم راحته💆‍♂


اینم ایدی ربات زود و تند 🏃🏃بیا باهاش کارهاتو راحت کن💇‍♂

@converterfilebot

راستی دوستاتو یادت نره همراه خودت بیاری ها😁😋",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"🔙 العودة 🏡",'callback_data'=>"a"]
              ]
              ]
        ])
 ]);
}
elseif($data == "a"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
 'disable_web_page_preview'=>true,
  'message_id'=>$message_id,
 'text'=>"🎐┇اهلا بك عزيزي في قائمة التحويلات 🔁
 
 - اختر ماتريد لبدء التحويل 🔰
 
 - [Our Channel 📡](t.me/php88)",
 'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"🌌 بدء تحويل الصورة 🌠",'callback_data'=>"c"],['text'=>"🎥 بدء تحويل الفيديو 🎞",'callback_data'=>"d"]
              ],
              [
              ['text'=>"♪ بدء تحويل الموسيقى 🎤",'callback_data'=>"e"],['text'=>"📄 بدء تحويل النص 📠",'callback_data'=>"g"]
              ]
              ]
        ])
 ]);
}
elseif($data == "back"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"🎐┇اهلا بك عزيزي في قائمة التحويلات 🔁
 
 - اختر ماتريد لبدء التحويل 🔰
 
 - [Our Channel 📡](t.me/php88)",
 'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"🌌 بدء تحويل الصورة 🌠",'callback_data'=>"c"],['text'=>"🎥 بدء تحويل الفيديو 🎞",'callback_data'=>"d"]
              ],
              [
              ['text'=>"♪ بدء تحويل الموسيقى 🎤",'callback_data'=>"e"],['text'=>"📄 بدء تحويل النص 📠",'callback_data'=>"g"]
              ]
              ]
        ])
 ]);
}
//====================Photo======================//
elseif($data == "c"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"🌋┇اهلا بك عزيزي في قسم تحويل 🔀 الصور 🎠
 
 - اختر ماتريد 🔰",
 'parse_mode'=>"MarkDown",
  'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
            ['text'=>" تحويل الصورة لملف 💾",'callback_data'=>"c1"],['text'=>"تحويل الملف لصورة 🖼",'callback_data'=>"c2"]
            ],
             [
            ['text'=>"🌇 تحويل الملصق لصورة 🌇",'callback_data'=>"c3"],['text'=>"󸐠 تحويل الصورة لملصق 🔆",'callback_data'=>"c4"]
            ],
             [
            ['text'=>"تحويل الملصق لملف 💾",'callback_data'=>"c5"],['text'=>"تحويل الملف لملصق 🎡",'callback_data'=>"c6"]
            ],
            [
              ['text'=>"🔙 العودة",'callback_data'=>"back"]
              ]
              ]
        ])
 ]);
}
elseif($data == "back2"){
bot('sendmessage',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"- اختر ماتريد 🔰",
 'parse_mode'=>"MarkDown",
       'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
            ['text'=>" تحويل الصورة لملف 💾",'callback_data'=>"c1"],['text'=>"تحويل الملف لصورة 🖼",'callback_data'=>"c2"]
            ],
             [
            ['text'=>"🌇 تحويل الملصق لصورة 🌇",'callback_data'=>"c3"],['text'=>"󸐠تحويل الصورة لملصق 🔆",'callback_data'=>"c4"]
            ],
             [
            ['text'=>"تحويل الملصق لملف 💾",'callback_data'=>"c5"],['text'=>"تحويل الملف لملصق 🎡",'callback_data'=>"c6"]
            ],
            [
              ['text'=>"🔙 العودة",'callback_data'=>"back"]
              ]
              ]
        ])
 ]);
}
elseif($data == "c1"){
file_put_contents("mroan.txt","c1");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"- حسنا عزيزي 💽 ارسل لي الصورة ليتم تحويلها لملف PNG 📦",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"العودة 🔙",'callback_data'=>"back2"]
              ]
              ]
        ])
 ]);
}
elseif($data == "c2"){
file_put_contents("mroan.txt","c2");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"- حسنا عزيزي 🔂 ارسل لي الملف ليتم تحويلها لصورة 🌌",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"العودة ◀️",'callback_data'=>"back2"]
              ]
              ]
        ])
 ]);
}
elseif($data == "c3"){
file_put_contents("mroan.txt","c3");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"- حسنا عزيزي ⚖ ارس لي الملصق ليتم تحويله لصورة 😻",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"العودة ◀️",'callback_data'=>"back2"]
              ]
              ]
        ])
 ]);
}
elseif($data == "c4"){
file_put_contents("mroan.txt","c4");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"• حسنا عزيزي 🃏 ارسل لي الصورة ليتم تحويلها لملصق 💘",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"العودة ◀️",'callback_data'=>"back2"]
              ]
              ]
        ])
 ]);
}
elseif($data == "c5"){
file_put_contents("mroan.txt","c5");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"• حسنا عزيزي ⚙ ارسل لي الملصق ليتم تحويله لملف PNG 🗂",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"العودة ◀️",'callback_data'=>"back2"]
              ]
              ]
        ])
 ]);
}
elseif($data == "c6"){
file_put_contents("mroan.txt","c6");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"• حسنا عزيزي 🛢 ارسل لي الملف ليتم تحويله لملصق 🗺",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"العودة ◀️",'callback_data'=>"back2"]
              ]
              ]
        ])
 ]);
}
elseif($mroan == "c1"){
file_put_contents("mroan.txt","No");
$photo = $message->photo;
$file = $photo[count($photo)-1]->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('Mroanmohmmed.png',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
bot('senddocument',[
 'chat_id'=>$chat_id,
 'document'=>new CURLFile('Mroanmohmmed.png'),
 ]);
}
elseif($mroan == "c2"){
file_put_contents("mroan.txt","No");
$document = $message->document;
$file = $document->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('Mroanmohmmed.png',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>new CURLFile('Mroanmohmmed.png'),
 ]);
 }
elseif($mroan == "c3"){
file_put_contents("mroan.txt","No");
$sticker = $message->sticker;
$file = $sticker->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('Mroanmohmmed.png',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>new CURLFile('Mroanmohmmed.png'),
 ]);
 }
elseif($mroan == "c4"){
file_put_contents("mroan.txt","No");
$photo = $message->photo;
$file = $photo[count($photo)-1]->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('Mroanmohmmed.png',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
bot('sendsticker',[
 'chat_id'=>$chat_id,
 'sticker'=>new CURLFile('Mroanmohmmed.png'),
 ]);
}
elseif($mroan == "c5"){
file_put_contents("mroan.txt","No");
$sticker = $message->sticker;
$file = $sticker->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('Mroanmohmmed.png',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
bot('senddocument',[
 'chat_id'=>$chat_id,
 'document'=>new CURLFile('Mroanmohmmed.png'),
 ]);
 }
 elseif($mroan == "c6"){
 file_put_contents("mroan.txt","No");
$document = $message->document;
$file = $document->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('Mroanmohmmed.png',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
bot('sendsticker',[
 'chat_id'=>$chat_id,
 'sticker'=>new CURLFile('Mroanmohmmed.png'),
 ]);
 }
//====================video======================//
elseif($data == "d"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"🔱┇اهلا بك عزيزي في قسم تحويل 🔀 الفيديو 🎥
 
 - اختر ماتريد 🔰",
 'parse_mode'=>"MarkDown",
       'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [
            ['text'=>"تحويل الفيديو لموسيقى 🎤",'callback_data'=>"d1"],['text'=>"تحويل الفيديو لصورة متحركة 🎥",'callback_data'=>"d2"]
            ],
              [
              ['text'=>"العودة ◀️",'callback_data'=>"back"]
              ]
              ]
        ])
 ]);
}
elseif($data == "back3"){
bot('sendmessage',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"- اختر ماتريد 🔰",
 'parse_mode'=>"MarkDown",
       'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [
            ['text'=>"تحويل الفيديو لموسيقى 🎤",'callback_data'=>"d1"],['text'=>"تحويل الفيديو لصورة متحركة 🎥",'callback_data'=>"d2"]
            ],
            [
            ['text'=>" تحويل الفيديو لملف 📂",'callback_data'=>"d3"]
            ],
              [
              ['text'=>"العودة ◀️",'callback_data'=>"back"]
              ]
              ]
        ])
 ]);
}
elseif($data == "d1"){
file_put_contents("mroan.txt","d1");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=> "• حسنا عزيزي ♻ ارسل لي الفيديو ليتم تحويله لموسيقى 🎤",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"العودة ◀️",'callback_data'=>"back3"]
              ]
              ]
        ])
 ]);
}
elseif($data == "d2"){
file_put_contents("mroan.txt","d2");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>" • حسنا عزيزي 🎨 ارسل لي الفيديو ليتم تحويله لصورة متحركة 🕴",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"العودة ◀️",'callback_data'=>"back3"]
              ]
              ]
        ])
 ]);
}
elseif($data == "d3"){
file_put_contents("mroan.txt","d3");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"• حسنا عزيزي 🔬 ارسل لي الفيديو ليتم تحويله لملف جاهز 📁",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>" العودة ◀️",'callback_data'=>"back3"]
              ]
              ]
        ])
 ]);
}
elseif($mroan == "d1"){
 file_put_contents("mroan.txt","No");
$video = $message->video;
$file = $video->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('Mroanmohmmed.mp3',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
bot('sendaudio',[
 'chat_id'=>$chat_id,
 'audio'=>new CURLFile('Mroanmohmmed.mp3'),
 ]);
 }
 elseif($mroan == "d2"){
 file_put_contents("mroan.txt","No");
$video = $message->video;
$file = $video->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('Mroanmohmmed.gif',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
bot('senddocument',[
 'chat_id'=>$chat_id,
 'document'=>new CURLFile('Mroanmohmmed.gif'),
 ]);
 }
  elseif($mroan == "d3"){
 file_put_contents("mroan.txt","No");
$video = $message->video;
$file = $video->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('Mroanmohmmed.Mp4',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
bot('senddocument',[
 'chat_id'=>$chat_id,
 'document'=>new CURLFile('Mroanmohmmed.Mp4'),
 ]);
 }
//====================audio======================//
elseif($data == "e"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"💡┇اهلا بك عزيزي في قسم تحويل 🎼 الموسيقى 🎤
 
 - اختر ماتريد 🔰",
 'parse_mode'=>"MarkDown",
       'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [
            ['text'=>"تحويل النص لموسيقى 🎤",'callback_data'=>"e1"],['text'=>" تحويل الموسيقى لنص 🎧",'callback_data'=>"e2"]
            ],
              [
              ['text'=>"العودة ◀️",'callback_data'=>"back"]
              ]
              ]
        ])
 ]);
}
elseif($data == "back4"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"
 - اختر ماتريد 🔰",
 'parse_mode'=>"MarkDown",
       'reply_markup'=>json_encode([
            'inline_keyboard'=>[
            [
            ['text'=>"تحويل النص لموسيقى 🎤",'callback_data'=>"e1"],['text'=>" تحويل الموسيقى لنص 🎧",'callback_data'=>"e2"]
            ],
              [
              ['text'=>"العودة ◀️",'callback_data'=>"back"]
              ]
              ]
        ])
 ]);
}
elseif($data == "e1"){
file_put_contents("mroan.txt","e1");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=> "• حسنا عزيزي 🔱 ارسل النص ليتم تحويله لموسيقى 🎤",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"العودة ◀️",'callback_data'=>"back4"]
              ]
              ]
        ])
 ]);
}
elseif($data == "e2"){
file_put_contents("mroan.txt","e2");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=> "• حسنا عزيزي 🎭 ارسل الموسيقى ليتم تحويله لنص 📠",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>" العودة ◀️",'callback_data'=>"back4"]
              ]
              ]
        ])
 ]);
}
elseif($mroan == "e1"){
 file_put_contents("mroan.txt","No");
$voice = $message->voice;
$file = $voice->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('Mroanmohmmed.mp3',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
bot('sendaudio',[
 'chat_id'=>$chat_id,
 'audio'=>new CURLFile('Mroanmohmmed.mp3'),
 ]);
 }
elseif($mroan == "e2"){
 file_put_contents("mroan.txt","No");
$audio = $message->audio;
$file = $audio->file_id;
      $get = bot('getfile',['file_id'=>$file]);
      $patch = $get->result->file_path;
      file_put_contents('Mroanmohmmed.ogg',file_get_contents('https://api.telegram.org/file/bot'.$API_KEY.'/'.$patch));
bot('sendvoice',[
 'chat_id'=>$chat_id,
 'voice'=>new CURLFile('Mroanmohmmed.ogg'),
 ]);
 }
//====================text======================//
elseif($data == "g"){
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"🔱┇اهلا بك عزيزي في قسم تحويل 📠 النص 📄
 
 - اختر ماتريد 🔰",
 'parse_mode'=>"MarkDown",
        'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                        [
            ['text'=>" تحويل النص لملصق 🌇",'callback_data'=>"g1"],['text'=>"تحويل النص لصورة 🖼",'callback_data'=>"g2"]
            ],            
            [
            ['text'=>"تحويل النص لموسيقى 🎤",'callback_data'=>"g3"]
            ],
              [
              ['text'=>"العودة ◀️",'callback_data'=>"back"]
              ]
              ]
        ])
 ]);
}
elseif($data == "back5"){
bot('sendmessage',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"- اختر ماتريد 🔰",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                        [
            ['text'=>" تحويل النص لملصق 🌇",'callback_data'=>"g1"],['text'=>"تحويل النص لصورة 🖼",'callback_data'=>"g2"]
            ],            
            [
            ['text'=>"تحويل النص لموسيقى 🎤",'callback_data'=>"g3"]
            ],
              [
              ['text'=>"العودة ◀️",'callback_data'=>"back"]
              ]
              ]
        ])
 ]);
}
elseif($data == "g1"){
file_put_contents("mroan.txt","g1");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=> "• حسنا عزيزي 🕯 ارسل النص ليتم تحويله لملصق 🔀",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>" العودة ◀️",'callback_data'=>"back5"]
              ]
              ]
        ])
 ]);
}
elseif($data == "g2"){
file_put_contents("mroan.txt","g2");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=> "• حسنا عزيزي ارسل النص ليتم تحويله ↩ لصورة 🏞",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>" العودة ◀️",'callback_data'=>"back5"]
              ]
              ]
        ])
 ]);
}
elseif($data == "g3"){
file_put_contents("mroan.txt","g3");
bot('editmessagetext',[
 'chat_id'=>$chatid,
  'message_id'=>$message_id,
 'text'=>"• حسنا عزيزي 🚲 ارسل النص ليتم تحويله لموسيقى 🎧
 
 - لاترسل الاحرف العربية 🏇
 - ارسل الانص بالانجليزي بدون مسافات 🎽
 
 - مثال : Mroanmohmmed",
 'parse_mode'=>"MarkDown",
      'reply_markup'=>json_encode([
            'inline_keyboard'=>[
              [
              ['text'=>"العودة ◀️",'callback_data'=>"back5"]
              ]
              ]
        ])
 ]);
}
elseif($mroan == "g1"){
 file_put_contents("mroan.txt","No");
	$photo = file_get_contents('http://tikapp.000webhostapp.com/ml/?color=white&text='.urlencode($text));
	file_put_contents('Mroanmohmmed.png',$photo);
bot('sendsticker',[
 'chat_id'=>$chat_id,
 'sticker'=>new CURLFile('Mroanmohmmed.png'),
 ]);
 }
elseif($mroan == "g2"){
 file_put_contents("mroan.txt","No");
	$photo = file_get_contents('http://tikapp.000webhostapp.com/ml/?color=white&text='.urlencode($text));
	file_put_contents('Mroanmohmmed.png',$photo);
bot('sendphoto',[
 'chat_id'=>$chat_id,
 'photo'=>new CURLFile('Mroanmohmmed.png'),
 ]);
 }
elseif($mroan == "g3"){
 file_put_contents("mroan.txt","No");
	$vo = file_get_contents('http://tts.baidu.com/text2audio?lan=en&ie=UTF-8&text='.urlencode($text));
 file_put_contents('Mroanmohmmed.ogg',$vo);
 bot('sendvoice',[
 'chat_id'=>$chat_id,
 'voice'=>new CURLFile('Mroanmohmmed.ogg'),
 ]);
 }
//====================Tikapp======================//

   ?>
