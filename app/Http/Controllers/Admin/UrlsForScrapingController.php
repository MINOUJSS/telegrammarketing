<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UrlsForScraping;
use App\SitesName;
use App\Categorys;
use App\Saouraproducts;
use Goutte\Client;

use App\Jobs\ScrapingSaouraDelivery;

class UrlsForScrapingController extends Controller
{
    // ------- index
    public function index()
    {
        $urls=UrlsForScraping::orderBy('id','desc')->get();
        return view('admin.pages.urls_to_scrape.index',compact('urls'));
    }
    // ------- create 
    public function create()    
    {        
        $sites=SitesName::all();
        $categories=Categorys::orderBy('id','desc')->get();
        return view('admin.pages.urls_to_scrape.create.index',compact('sites','categories'));
    }
    // ---------- store
    public function store(Request $request)
    {
        //vlidate form 
        if($request->site_id==0)
        {
            return redirect()->back()->with('error','عليك إختيار إسم الموقع أولاً لمواصة العملية');
        }
        if($request->category_id==0)
        {
            return redirect()->back()->with('error','عليك إختيار الصنف أولاً لمواصة العملية');
        }
        $this->validate($request,[        
            'url'  => 'required|min:6|unique:urls_for_scrapings',
            'num_pages'=>'required'
        ]);
        //checke if this url is exist if not insert to table
        $urls=UrlsForScraping::all();
        if($urls->count()>=1){
        foreach ($urls as $url) {
            if($request->url != $url->url)
            {
                //insert to  table
                $url=new UrlsForScraping;
                $url->site_id=$request->site_id;
                $url->category_id=$request->category_id;
                $url->url=$request->url;
                $url->num_pages=$request->num_pages;
                $url->save();
                //return back with message success
                return redirect()->back()->with('message','تم إضافة العنوان بنجاح');  
            }else
            {
                return redirect()->back()->with('error','هذا العنوان موجود في الجدول');
            }
        
        }
    }else
    {
        //insert to  table
        $url=new UrlsForScraping;
        $url->site_id=$request->site_id;
        $url->category_id=$request->category_id;
        $url->url=$request->url;
        $url->num_pages=$request->num_pages;
        $url->save();
        //return back with message success
        return redirect()->back()->with('message','success'); 
    }
   
    }
    // ------------ edit
    public function edit($id)
    {
       $url=UrlsForScraping::findOrFail($id);
       $sites=SitesName::all();
       $categories=Categorys::orderBy('id','desc')->get();
       return view('admin.pages.urls_to_scrape.edit.index',compact('url','sites','categories'));
    }
    // ---------    update
    public function update(Request $request)
    {
        
       //vlidate form 
       if($request->site_id==0)
       {
           return redirect()->back()->with('error','عليك إختيار إسم الموقع أولاً لمواصة العملية');
       }
       if($request->category_id==0)
       {
           return redirect()->back()->with('error','عليك إختيار الصنف أولاً لمواصة العملية');
       }
       //
       $this->validate($request,[                
        'num_pages'=>'required'
    ]);
       $url=UrlsForScraping::findOrFail($request->url_id);
       $url->url="";
       $url->update();
       $this->validate($request,[        
           'url'  => 'required|min:6|unique:urls_for_scrapings'
       ]);
       //checke if this url is exist if not insert to table       
               //insert to  table
               $url1=UrlsForScraping::findOrFail($request->url_id);
               $url1->site_id=$request->site_id;
               $url1->category_id=$request->category_id;
               $url1->url=$request->url;
               $url1->num_pages=$request->num_pages;
               $url1->update();
               //return back with message success
               return redirect()->back()->with('message','تم تعديل العنوان بنجاح');  
        
   
    }
    // ---------destroy
    public function destroy(Request $request)
    {
        dd($request);
        //find the url
        $url=UrlsForScraping::findOrFail($request->url);
        //delete the url
        $url->delete();

    }
    
}
