<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Manufacturers extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'email',
        'mobile',
        'facebook',
        'twitter',
        'address',
        'website',
        'contact_name',
        'lat',
        'lng',
        'icon',
    ];
}
