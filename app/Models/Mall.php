<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mall extends Model
{
    protected $fillable = [
        'name_ar',
        'name_en',
        'email',
        'mobile',
        'facebook',
        'country_id',
        'twitter',
        'address',
        'website',
        'contact_name',
        'lat',
        'lng',
        'icon',
    ];

    public function country_id() {
        return $this->hasOne('App\Models\Country', 'id', 'country_id');
    }

}
