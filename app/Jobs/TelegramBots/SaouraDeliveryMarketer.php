<?php

namespace App\Jobs\TelegramBots;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Goutte\Client;
use App\SaouraProducts;
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
        $product=SaouraProducts::orderBy('posted')->where('aproved',1)->first();     
        if($product!=null){                      
          //select chanel or Group to post this product by site and category  
          $channels=TelegramChannels::orderBy('id')->where('category_id',1)->get();         
          foreach ($channels as $channel) {       
            //select the bot manager to post this  product
            $bots=TelegramBots::all();
            //post products in this chanels or  groups
                $chat_id=$channel->chat_id;
                $photo=$product->image;  
                $caption="<strong><a href='".$product->link."'>".$product->title."</a></strong> <b> (".$product->price.") </b>";     
                // $caption.='<pre>التوصيل مجاني في  ولاية بشار</pre>';
                $caption.='لطلب المنتج إضغط على الرابط التالي : ';
                $caption.='<a href="'.$product->link.'">أطلبه الأن</a>';
                //$disable_notification ='notification';               
                $bot_acss_token=$bots[rand(0,$bots->count()-1)]->token;
                $client = new Client();         
                SendPhotoWithHtmlMessage($client,$bot_acss_token,$chat_id,$photo,$caption);
                //update product posted
                $product->posted=$product->posted+1;
                $product->update();
          }
                          
             }
        //                

        
        
    }
}
