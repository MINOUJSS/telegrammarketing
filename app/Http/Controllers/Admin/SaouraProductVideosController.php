<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaouraProductVideosController extends Controller
{
    public function index()
    {
        return view('admin.pages.products.product_videos.index');
    }
    //
    public function create()
    {
        return view('admin.pages.products.product_videos.create.index');
    }
    //
    public function store()
    {
        
    }
    //
    public function edit()
    {
        return view('admin.pages.products.product_videos.edit.index'); 
    }
    //
    public function update()
    {
        
    }
    //
    public function destroy()
    {
        
    }
}
