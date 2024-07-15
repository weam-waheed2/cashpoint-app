<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function List(Request $request){
        if($request->isMethod('post')){
            $this->Store($request);
            return back()->withInput();
        }
        $settings = Settings::all();
        return view('dashboard.settings.list',compact('settings'));
    }
    public function Store(Request $request){
        if ($request->isMethod('post')) {
            if (isset($request->option) && is_array($request->option)) {
                foreach ($request->option as $option_key => $option_value) {
                    Settings::set($option_key, is_array($option_value) ? json_encode($option_value) : $option_value);
                }
            }
        }
    }
}
