{{-- verifyအတွက် ပြင်ပေးရမယ့်နေရာများ *********** 
1. user တွေဟာ auth အပြင် must verified email လုပ်ရမယ်
ဒါကြောင့် user model မှာ implements မှာ လုပ် ရမယ်။
eg:=> class User extends Authenticatable implements MustVerifyEmail{}


2.HomeController မှာ  middleware ဟာ auth အပြင် verified ပါလုပ်ရမယ်
eg:=> public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
***array ထဲမှာ ရေးတာကိုသတိပြုပါ**


3.auth route မှာ verify တန်ဖိုးက true ဖစ်နေရမယ် (web.php မှာ)
eg:=> Auth::routes(['verify' => true]);
*array ထဲမှာ ရေးတာကိုသတိပြုပါ


******** email center mailtrip.io ကိုအသုံးပြုခြင်း *********
verify အတွက် email center address အတွက်လိုတယ် ဒါကြောင့် account ဖွင့်မယ်။
mailtrap.ioမှာ အကောင့်ဖွင့်ထားမယ် developer အတွက်သုံးတာမို့လို့ ကျနော်တော့ githubနဲ့ဘဲဖွင့်တယ်။
mail ကဘယ်mail ကနေပို့မှာလဲ  mailtrap ဖွင့်ထားတဲ့ email ထည့်မယ်။
ဖွင့်ထားတဲ့mailကမသိဘူးဆိုရင် myprofileကိုနိပ်ပီးကျလို့ရ။
.evn fileက mail group မှာရေး eg:=> MAIL_FROM_ADDRESS=zueryan212002@gmail.com
mailtrap website ထဲက integrations မှာ ဘယ် language platform ကလဲဆိုတာ choiceမယ်
laravelအတွက်စမ်းတာမို့လို့ php groupထဲက laravelကိုရွေး။
ကျလာတဲ့ email host တွေportတွေကို copy ကူးပီး .env မှာ တူရာ paste 
eg:=> MAIL_MAILER=smtp
	MAIL_HOST=smtp.mailtrap.io
	MAIL_PORT=2525
	MAIL_USERNAME=1524ca88cc0046
	MAIL_PASSWORD=45960640ca6cbe
	MAIL_ENCRYPTION=tls --}}