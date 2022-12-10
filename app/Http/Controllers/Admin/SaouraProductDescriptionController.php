<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaouraProductDescriptionController extends Controller
{
    public function index()
    {
        return view('admin.pages.products.product_description.index');
    }
    //
    public function create()
    {
        return view('admin.pages.products.product_description.create.index');
    }
    //
    public function store()
    {
        
    }
    //
    public function edit()
    {
        return view('admin.pages.products.product_description.edit.index'); 
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
