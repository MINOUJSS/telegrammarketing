<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Goutte\Client;

class AmazoneScraperController extends Controller
{    
    public function amazon_scraper()
    {
        $data=[];
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.amazon.com/s?i=specialty-aps&bbn=16225005011&rh=n%3A%2116225005011%2Cn%3A7147444011&ref=nav_em__nav_desktop_sa_intl_apparel_accessories_0_2_10_3');
        $div=$crawler->filter('.s-main-slot .s-asin')->each(function($eliment) use (&$data){
            $innerdata=[];
            $title=$eliment->filter('h2')->first();
            $img=$eliment->filter('img')->first();
            $price_symbol=$eliment->filter('.a-price-symbol')->first();
            $price_whole=$eliment->filter('.a-price-whole')->first();
            $price_fraction=$eliment->filter('.a-price-fraction')->first();
            $pric=$price_whole->text().$price_fraction->text()." ".$price_symbol->text();
            $link=$eliment->filter('h2 a')->first();
            $img=$eliment->filter('img')->first();
           $innerdata['title']=$title->text();
           $innerdata['image']=$img->attr('src');
           $innerdata['price']=$pric;
           $innerdata['link']="https://www.amazon.com/".$link->attr('href');
           $data[]=$innerdata;
        });
        dd($data);
        //return  view('amazon.home',compact('data'));
    }
}
