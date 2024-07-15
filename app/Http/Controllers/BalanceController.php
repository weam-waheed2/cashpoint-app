<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function List(Request $request){
        if($request->isMethod('post')){
            $this->Store($request);
            return back()->withInput();
        }
        $balance = Balance::all();
        return view('dashboard.balance.list',compact('balance'));
    }
    public function Store(Request $request){
        if(isset($request->ID)){
            $balance        = Balance::find($request->ID);
        }else{
            $balance        = new Balance();
        }
        $balance->name                       = $request->name;
        $balance->status                     = $request->status;
        $balance->save();
    }
}
