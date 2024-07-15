<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function List(Request $request){
        if($request->isMethod('post')){
            $this->Store($request);
            return back()->withInput();
        }
        $offers = Offer::all();
        return view('dashboard.offers.list',compact('offers'));
    }
    public function Store(Request $request){
        if(isset($request->ID)){
            $offer        = Offer::find($request->ID);
        }else{
            $offer        = new Offer();
        }
        $offer->name                       = $request->name;
        $offer->status                     = $request->status;
        $offer->save();
    }
}
