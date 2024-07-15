<?php

namespace App\Http\Controllers;

use App\Models\DailyGift;
use Illuminate\Http\Request;

class DailyGiftsController extends Controller
{
    public function List(Request $request){
        if($request->isMethod('post')){
            $this->Store($request);
            return back()->withInput();
        }
        $daily_gifts = DailyGift::all();
        return view('dashboard.daily-gifts.list',compact('daily_gifts'));
    }
    public function Store(Request $request){
        if(isset($request->ID)){
            $gift        = DailyGift::find($request->ID);
        }else{
            $gift        = new DailyGift();
        }
        $gift->name                       = $request->name;
        $gift->status                     = $request->status;
        $gift->save();
    }
}
