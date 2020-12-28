<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class RateProduct extends Model
{
    protected $table    = 'rate_products';
    protected $fillable = [
        'product_id',
        'rate',
        'user_id',
    ];

    public function product() {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id')->where('level', 'user');
    }
}
