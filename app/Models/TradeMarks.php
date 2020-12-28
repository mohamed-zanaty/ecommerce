<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TradeMarks extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'logo',
    ];
}
