<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TelegramGroups;
use App\Categorys;

class TelegramGroupsController extends Controller
{
    //----index
    public function index()
    {
        $groups=TelegramGroups::orderBy('id','desc')->get();
        return view('admin.pages.telegram_groups.index',compact('groups'));
    }
    //----create
    public function create()
    {
        $categories=Categorys::orderBy('id','desc')->get();
        return view('admin.pages.telegram_groups.create.index',compact('categories'));
    }
    //-----store
    public function store()
    {

    }
    //----edit
    public function edit()
    {

    }
    //------update
    public function update()
    {

    }
    //------destroy
    public function destroy()
    {
        
    }
}
