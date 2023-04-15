<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Goutte\Client;
use App\UrlsForScraping;
use App\SaouraProducts;

class ScrapingSaouraDelivery implements ShouldQueue
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
         //get once url to scrap from url table
         $url=UrlsForScraping::OrderBy('num_of_scrap')->where('site_id',1)->first();                        
         //$url=$urls[rand(0,$urls->count()-1)];         
        if($url!=null){
            //post this url to scraped tabe
            $url->num_of_scrap=$url->num_of_scrap + 1 ;            
            $url->update();
            //get pages of this url            
            $pages=$url->num_pages;            
            for ($i=1; $i <= $pages-1 ; $i++) {           
            //scrap all prodacts in selected url page by page
            $data=[];            
            $client = new Client();  
            $scrap_url=$url->url.'?page='.$i;          
            $crawler = $client->request('GET',$scrap_url);
            $div=$crawler->filter('.sc-product')->each(function($eliment) use (&$data,$url){
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
            $innerdata['category_id']=$url->category_id;
            $innerdata['site_id']=$url->site_id;
            // $innerdata['link']=$link->attr('href');
            $innerdata['link']='https://saouradelivery.com/quick-order/product/'.$title->attr('data-slug').'?#quick-order';
            $data[]=$innerdata;
            });
            //insert this object to products table            
            foreach ($data as $obj) {
                //verify if this objec exist in tetable 
                $title=$obj['title'];
                $old_p=SaouraProducts::where('title',$title)->first();           
                    if($old_p==null || $old_p->title != $title)
                    {
                        $product=new SaouraProducts;
                        $product->title=$obj['title'];
                        $product->image=$obj['image'];
                        $product->price=$obj['price'];
                        $product->site_id=$obj['site_id'];
                        $product->category_id=$obj['category_id'];
                        $product->link=$obj['link'];
                        $product->save();
                    }else
                    {
                        //update it
                        $old_p->title=$obj['title'];
                        $old_p->image=$obj['image'];
                        $old_p->price=$obj['price'];
                        $old_p->site_id=$obj['site_id'];
                        $old_p->category_id=$obj['category_id'];
                        $old_p->link=$obj['link'];
                        $old_p->update();
                    }
             
                
            }
            //update url scraping numner            
            //send notification to admin about this scrap opertion
            //dd('dane');
          }
        }
    }
}
