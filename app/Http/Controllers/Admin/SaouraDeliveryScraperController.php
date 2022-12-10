<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Goutte\Client;

class SaouraDeliveryScraperController extends Controller
{
    public function category_product_scraper()
    {   
        $client = new Client();      
        $chat_id='-1001704996477';       
        $bot_token='5145525390:AAG0vWMHLaCJj55t2KM32MrOgMvmg0PPfr8';
        $message="شارك هذه  المجموعةمع  أصدقائك ليصلكم كل جديد عن سوق بشار";
        send_message($client,$bot_token,$chat_id,$message);

    }
    public function create_saoura_url_to_scrap()
    {
        dd('terrr');
        //show view to create form
        return view('admin.saouradelivery.url_to_scrap.create.index');
    }
}
