<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // login
    public function login(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'phone'     => 'required',
                'password'  => 'required',
            ]);

            $user = User::where('phone', $request->phone)->first();
            if ($user && Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect('/home');
            }

        }
        return view('auth.login');
    }

    //register 
    public function register(Request $request) {
        if ($request->isMethod('post')) {
            $attrs = $request->validate([
                'name' => 'required',
                'phone' => 'required|unique:users|min:11|max:11',
                'password' => 'required|min:6',
            ]);
    
            $user = User::create([
                'name' => $attrs['name'],
                'phone' => $attrs['phone'],
                'date_register' => Carbon::now(),
                'ip'=>$request->ip('ipv4'),
                'password' => Hash::make($attrs['password']),
            ]);
    
            if ($user) {
                $token = $user->createToken($attrs['phone'])->plainTextToken;
                // Store the token in the session
                session()->put('token', $token);
                Auth::login($user);
                return redirect('/home');
            } else {
                return view('auth.register')->with('error', 'حدث خطأ ما');
            }
        }
    
        return view('auth.register');
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('/');
    }

   
    

}
