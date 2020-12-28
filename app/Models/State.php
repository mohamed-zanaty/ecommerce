<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table    = 'states';
    protected $fillable = [
        'state_name_ar',
        'state_name_en',
        'city_id',
        'country_id',
    ];
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
}
