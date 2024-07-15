<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $table        = 'settings';
    protected $primaryKey   = 'id';

    public static function get($key){
        $Settings = Settings::where('option_key', $key)->first();
        if($Settings){
            return $Settings->option_value;
        }
        return '';
    }

    public static function set($key, $val){
        $Settings = Settings::where('option_key', $key)->first();
        if($Settings){
            $Settings->option_value = $val;
        }else{
            $Settings                 = new Settings();
            $Settings->option_key     = $key;
            $Settings->option_value   = $val;
        }
        $Settings->save();
        return $Settings;
    }
}