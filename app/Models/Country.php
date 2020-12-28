<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';
    protected $fillable = [
        'country_name_ar',
        'country_name_en',
        'mob',
        'code',
        'currency',
        'logo',
    ];
    protected $appends = ['image_path',];

    public function getImagePathAttribute()
    {
        return asset('uploads/country/' . $this->logo);
    }//img


    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }

    public function malls()
    {
        return $this->hasMany('App\Models\Mall', 'country_id', 'id');
    }
    public function product()
    {
        return $this->hasMany(Product::class, 'currency_id', 'id');
    }
}
