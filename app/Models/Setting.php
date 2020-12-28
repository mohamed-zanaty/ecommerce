<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table    = 'settings';
    protected $fillable = [
        'sitename_ar',
        'sitename_en',
        'logo',
        'email',
        'description',
        'keywords',
        'status',
        'message_maintenance',
        'main_lang',
    ];
}
