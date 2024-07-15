<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyGift extends Model
{
    use HasFactory;

    protected $table        = 'daily_gifts';
    protected $primaryKey   = 'id';

}