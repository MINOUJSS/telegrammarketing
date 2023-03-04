<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SaouraProducts;

class SaouraProductsConrtoller extends Controller
{
    //
    public function index()
    {
        $products=SaouraProducts::orderBy('id','desc')->get();
        return view('admin.pages.products.index',compact('products'));
    }
    //
    public function aproved($id)
    {
        //get product
        $product=SaouraProducts::findOrFail($id);
        //check aproved
        if($product->aproved==0)
        {
            $product->aproved=1;
            $product->update(); 
        }else
        {
            $product->aproved=0;
            $product->update(); 
        }            

    }
    
    // public function store()
    // {
        
    // }
    //
    public function edit()
    {
        return view('admin.pages.products.edit.index'); 
    }
    //
    public function update()
    {
        
    }
    //
    public function destroy(Request $request)
    {
        $product=SaouraProducts::findOrFail($request->product_id);
        //delete
        $product->delete();
        //redirect with success message
        return redirect()->back()->with('message','تم  حذف المنتج بنجاح');
    }
    //marketing_update
    public function marketing_update()
    {
        $products=SaouraProducts::all();
        foreach($products as $product)
        {
            $selected_product=SaouraProducts::findOrFail($product->id);
            $selected_product->posted=0;
            $selected_product->update();
        }
        return redirect()->back();
    }
}
