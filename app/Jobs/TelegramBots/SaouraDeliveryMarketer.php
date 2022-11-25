<?php

namespace App\Jobs\TelegramBots;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Goutte\Client;
use App\Saouraproducts;
use App\TelegramBots;
use App\TelegramChannels;
use App\TelegramGroups;

class SaouraDeliveryMarketer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {                    
        //get saoura delivery products
        $products=SaouraProducts::where('site_id',1)->get();     
        if($products->count()>=1){               
        foreach ($products as $product) {
          //select chanel or Group to post this product by site and category  
          $channels=TelegramChannels::orderBy('id')->where('category_id',$product->category_id)->get();         
          foreach ($channels as $channel) {       
            //select the bot manager to post this  product
            $bots=TelegramBots::all();
            //post products in this chanels or  groups
//  //----test
//  $client = new Client();
//  $crawler = $client->request('POST','https://api.telegram.org/bot'.$bots[rand(0,$bots->count()-1)]->token.'/sendMessage?chat_id=-1001708078516&text='.$product->link);
//  //---------
                $chat_id=$channel->chat_id;
                $photo=$product->image;
                //$caption =$product->title.' '.$product->price.' لطلب المنتج إضغط على الرابط  التالي التوصيل مجاني في ولاية بشار '.$product->link;
                //$caption ="<b>".$product->title."</b>";
                //$caption="<p>لطلب المنتج إضغط على الرابط  التالي التوصيل مجاني في ولاية بشار </p>";
                //$text=' لطلب المنتج إضغط على الرابط  التالي التوصيل مجاني في ولاية بشار '.$product->link;
                //$html=$photo;
                $caption="<strong><a href='".$product->link."'>".$product->title."</a></strong><b> (".$product->price.")</b>";
                //$caption.='<pre>التوصيل مجاني في  ولاية بشار</pre>';
                //$html.=$product->link;
                //$html.='لطلب المنتج إضغط على الرابط التالي التوصيل مجاني في ولاية بشار '.$product->link;
                //$disable_notification ='notification';               
                $bot_acss_token=$bots[rand(0,$bots->count()-1)]->token;
                $client = new Client();
                //$crawler = $client->request('POST','https://api.telegram.org/bot'.$bot_acss_token.'/sendMessage?chat_id='.$chat_id.'&text='.$html.'&parse_mode=html');
                $crawler = $client->request('POST','https://api.telegram.org/bot'.$bot_acss_token.'/sendPhoto?chat_id='.$chat_id.'&photo='.$photo.'&caption='.$caption.'&parse_mode=html');

          }
                    

        }
             }
        //                

        
        
    }
}
