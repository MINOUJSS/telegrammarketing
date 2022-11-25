<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Goutte\Client;

class SaouraDeliveryScraperController extends Controller
{
    public function category_product_scraper()
    {
        //get once url to scrap from url table

        //post this url to scraped tabe

        //get pages of this url
        $url='https://saouradelivery.com/products/sub-sub-category/%D8%B3%D8%A7%D8%B9%D8%A7%D8%AA-%D9%86%D8%B3%D8%A7%D8%A6%D9%8A%D8%A9';

        //scrap all prodacts in selected url page by page
        $data=[];
        $client = new Client();
        $crawler = $client->request('GET',$url);
        // $div=$crawler->filter('.product')->first();
        // dd($div->attr('class'));
        $div=$crawler->filter('.sc-product')->each(function($eliment) use (&$data){
            $innerdata=[];
            $title=$eliment->filter('.product-name')->first();
            //dd($eliment->attr('class'));
            $price=$eliment->filter('.product-price')->first();
            $pric=$price->text();
            $link=$eliment->filter('.product-name a')->first();
            $img=$eliment->filter('.product-thumb img')->first();
           $innerdata['title']=$title->text();
           $innerdata['image']=$img->attr('src');
           $innerdata['price']=$pric;
           $innerdata['link']=$link->attr('href');
           $data[]=$innerdata;
        });
        //dd($data);
        foreach($data as $product)
        {
           //dd($product['image']); 
        $chat_id='-1001884680696';
        $photo=$product['image'];
        $caption =$product['title'].' '.$product['price'].' لطلب المنتج إضغط على الرابط  التالي التوصيل مجاني في ولاية بشار'.$product['link'];
        $disable_notification ='notification';
        $reply_to_message_id = NULL;
        $reply_markup = NULL;
        $parse_mode = NULL;       
        $bot_acss_token='5145525390:AAG0vWMHLaCJj55t2KM32MrOgMvmg0PPfr8';
        $client = new Client();
        $crawler = $client->request('POST','https://api.telegram.org/bot'.$bot_acss_token.'/sendPhoto?chat_id='.$chat_id.'&photo='.$photo.'&caption='.$caption.'&disable_notification='.$disable_notification);//.'&reply_to_message_id='.$reply_to_message_id.'&reply_markup='.$reply_markup.'parse_mode='.$parse_mode);
        }
        // sort the result as an product object

        //first check if this oject exist in saoura_product_table

        //stor this object on saoura_product_table

    }
    public function create_saoura_url_to_scrap()
    {
        //show view to create form
        return view('admin.saouradelivery.url_to_scrap.create.index');
    }
}
