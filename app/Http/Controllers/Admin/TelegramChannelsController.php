<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TelegramChannels;
use App\Categorys;

class TelegramChannelsController extends Controller
{
    //-------index
    public function index()
    {
        $channels=TelegramChannels::orderBy('id','desc')->get();
        return view('admin.pages.telegram_channels.index',compact('channels'));
    }
    //-------create
    public function create()
    {
        $categories=Categorys::orderBy('id','desc')->get();
        return view('admin.pages.telegram_channels.create.index',compact('categories'));
    }
    //-------store
    public function store(Request $request)
    {
        //dd($request);
        //validate form and cheke if this channel exist
        if($request->category_id==0)
        {
            return redirect()->back()->with('error','عليك إختيار الصنف أولاً لمواصة العملية');
        }
        $this->validate($request,[
            'chat_id' =>'required',
            'name' =>'required|min:3|unique:telegram_channels'
        ]);
        //insert data to channel table
        $channel=new TelegramChannels;
        $channel->name=$request->name;
        $channel->chat_id=$request->chat_id;
        $channel->category_id=$request->category_id;
        $channel->lang=$request->lang;
        $channel->save();
        //return back with success
        return redirect()->back()->with('message','تم إضافة القناة بنجاح');
    }
    //------edit
    public function edit($id)
    {
        $channel=TelegramChannels::findOrFail($id);
        $categories=Categorys::orderBy('id','desc')->get();
        return view('admin.pages.telegram_channels.edit.index',compact('categories'));
    }
    //-----update
    public function update($id)
    {
        if($request->category_id==0)
        {
            return redirect()->back()->with('error','عليك إختيار الصنف أولاً لمواصة العملية');
        }
        $this->validate($request,[
            'chat_id' =>'required',
            'name' =>'required|min:3|unique:telegram_channels'
        ]);
        //insert data to channel table
        $channel=TelegramChannels::findOrFail($id);
        $channel->name=$request->name;
        $channel->chat_id=$request->chat_id;
        $channel->category_id=$request->category_id;
        $channel->lang=$request->lang;
        $channel->update();
        //return back with success
        return redirect()->back()->with('message','تم تعديل القناة بنجاح');
    } 
    //--------destroy
    public function destroy()
    {
        
    }
}
