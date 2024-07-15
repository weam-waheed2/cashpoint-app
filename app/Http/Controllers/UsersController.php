<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function List(Request $request){
        if($request->isMethod('post')){
            $this->Store($request);
            return back()->withInput();
        }
        $users = User::all();
        return view('dashboard.users.list',compact('users'));
    }
    public function Store(Request $request){
        if(isset($request->ID)){
            $user        = User::find($request->ID);
        }else{
            $user        = new User();
        }
        $user->name                       = $request->name;
        $user->phone                      = $request->phone;
        $user->user_type                  = $request->user_type;
        $user->points                     = $request->points;
        $user->balance                    = $request->balance;
        $user->type                       = $request->type;
        $user->date_subscription          = $request->date_subscription;
        $user->date_expiry                = $request->date_expiry;
        $user->date_register              = $request->date_register;
        $user->status                     = $request->status;
        $user->save();
    }
}
