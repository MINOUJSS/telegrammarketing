<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Settings;

class SaouraSettingController extends Controller
{
    public function index()
    {
        $settings=Settings::all();
        return view('admin.pages.settings.index',compact('settings'));
    }
    //
    public function create()
    {
        return view('admin.pages.settings.create.index');
    }
    //
    public function store()
    {
        
    }
    //
    public function edit()
    {
        return view('admin.pages.settings.edit.index'); 
    }
    //
    public function update()
    {
        
    }
    //
    public function destroy()
    {
        
    }
    //
    public function auto_marketing($id)
    {
        $setting=Settings::findOrFail($id);
        //
        if($setting->value=='on')
        {
            $setting->value='off';
            $setting->update();
        }else
        {
            $setting->value='on';
            $setting->update();
        }
    }
    //
    public function scraper_statu($id)
    {
        $setting=Settings::findOrFail($id);
        //
        if($setting->value=='on')
        {
            $setting->value='off';
            $setting->update();
        }else
        {
            $setting->value='on';
            $setting->update();
        }
    }
}
