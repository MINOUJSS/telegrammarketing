<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaouraCategoryController extends Controller
{
    public function index()
    {
        return view('admin.pages.categories.index');
    }
    //
    public function create()
    {
        return view('admin.pages.categories.create.index');
    }
    //
    public function store()
    {
        
    }
    //
    public function edit()
    {
        return view('admin.pages.categories.edit.index'); 
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
