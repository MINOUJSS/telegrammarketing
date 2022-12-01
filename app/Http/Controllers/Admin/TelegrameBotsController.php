<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categorys;
use App\TelegramBots;
use Goutte\Client;
use App\SaouraProducts;
use App\TelegramChannels;

class TelegrameBotsController extends Controller
{
    //---------index    
    public function index()
    {
        // $products=SaouraProducts::where('site_id',1)->get();
        // $caption =$products[1]->title.' '.$products[1]->price.' لطلب المنتج إضغط على الرابط  التالي التوصيل مجاني في ولاية بشار '.$products[1]->link;
        // $bots=TelegramBots::all();
        // $bot_acss_token=$bots[rand(0,$bots->count()-1)]->token;
        // $channel=TelegramChannels::orderBy('id')->where('category_id',2)->first();
        // $chat_id=$channel->chat_id;
        // $photo=$products[1]->image;
        // $caption="<strong><a href='".$products[1]->link."'>".$products[1]->title."</a></strong> <b> (".$products[1]->price.") </b>";
        // $caption.='لطلب المنتج إضغط على الرابط التالي التوصيل مجاني في ولاية بشار '.$products[1]->link ;        
        // $client = new Client();
        // //$crawler = $client->request('POST','https://api.telegram.org/bot'.$bot_acss_token.'/sendMessage?chat_id='.$chat_id.'&text='.$html.'&parse_mode=html');
        // //$crawler = $client->request('POST','https://api.telegram.org/bot'.$bot_acss_token.'/sendPhoto?chat_id='.$chat_id.'&photo='.$photo.'&caption='.$caption.'&parse_mode=html');
        // SendPhotoWithHtmlMessage($client,$bot_acss_token,$chat_id,$photo,$caption);
        //---------
        $bots=TelegramBots::orderBy('id')->get();
        return view('admin.pages.telegram_bots.index',compact('bots'));        
    }
    //-------create
    public function create()
    {
        $categories=Categorys::orderBy('id','desc')->get();
        return view('admin.pages.telegram_bots.create.index',compact('categories'));
    }
    //-------store
    public function store(Request $request)
    {
        //vlidate form 
        // if($request->category_id==0)
        // {
        //     return redirect()->back()->with('error','عليك إختيار الصنف أولاً لمواصة العملية');
        // }
        $this->validate($request,[        
            'name'  => 'required|min:3',
            'token'=>'required|unique:telegram_bots'
        ]);
        //insert  in to table
        $bot=new TelegramBots;
        $bot->name=$request->name;
        //$bot->category_id=$request->category_id;
        $bot->token=$request->token;
        $bot->save();
        //return back with message success
        return redirect()->back()->with('message','تم إضافة البوت بنجاح'); 
        
    }
    // -------- edit
    public function edit($id)
    {
        $bot=TelegramBots::findOrFail($id);
        $categories=Categorys::all();
        return view('admin.pages.telegram_bots.edit.index',compact('categories','bot'));
    }
    // ------- update
    public function update(Request $request)
    {
        //vlidate form 
        // if($request->category_id==0)
        // {
        //     return redirect()->back()->with('error','عليك إختيار الصنف أولاً لمواصة العملية');
        // }
        $this->validate($request,[        
            'name'  => 'required|min:3',
            'token'=>'required|unique:telegram_bots'
        ]);
        //insert  in to table
        $bot=TelegramBots::findOrFail($request->bot_id);;
        $bot->name=$request->name;
        //$bot->category_id=$request->category_id;
        $bot->token=$request->token;
        $bot->update();
        //return back with message success
        return redirect()->back()->with('message','تم تعديل البوت بنجاح'); 
    }
    //------destroy
    public function destroy(Request $request)
    {     
        //find the bot
       $bot= TelegramBots::findOrFail($request->bot_id);
       //delete the bot
       $bot->delete();
    }
    // public function get_me()
    // {
    //     $bot_acss_token='5145525390:AAG0vWMHLaCJj55t2KM32MrOgMvmg0PPfr8';
    //     $client = new Client();
    //     $crawler = $client->request('GET','https://api.telegram.org/bot'.$bot_acss_token.'/getMe');
    //     // $crawler = $client->response('GET','https://api.telegram.org/5751552586:AAGLJu-Hi6t7-kh_KZJQvAXc0YgJeuZJFoY/getMe');
    //     $response=$client->getResponse();
    //     dd($response->getContent());
    //     //dd($client->getResponse());
    // }

    // public function send_message()
    // {
    //     $chat_id='-1001884680696';
    //     $text='test message';       
    //     $bot_acss_token='5145525390:AAG0vWMHLaCJj55t2KM32MrOgMvmg0PPfr8';
    //     $client = new Client();
    //     $crawler = $client->request('POST','https://api.telegram.org/bot'.$bot_acss_token.'/sendMessage?chat_id='.$chat_id.'&text='.$text);
    //    $response=$client->getResponse();
    //    dd($response->getContent());
    // }

    // public function send_photo()
    // {
    //     $chat_id='-1001884680696';
    //     $text="new message";
    //     $photo='https://telegram.org/img/t_logo.png';
    //     $caption ='https://saouradelivery.com/products/sub-sub-category/%D8%B3%D8%A7%D8%B9%D8%A7%D8%AA-%D9%86%D8%B3%D8%A7%D8%A6%D9%8A%D8%A9';
    //     $disable_notification ='notification';
    //     $reply_to_message_id = NULL;
    //     $reply_markup = NULL;
    //     $parse_mode = NULL;       
    //     $bot_acss_token='5145525390:AAG0vWMHLaCJj55t2KM32MrOgMvmg0PPfr8';
    //     $client = new Client();
    //     $crawler = $client->request('POST','https://api.telegram.org/bot'.$bot_acss_token.'/sendPhoto?chat_id='.$chat_id.'&photo='.$photo.'&caption='.$caption.'&disable_notification='.$disable_notification);//.'&reply_to_message_id='.$reply_to_message_id.'&reply_markup='.$reply_markup.'parse_mode='.$parse_mode);
    //    $response=$client->getResponse();
    //    dd($response->getContent());   
    // }
}
