<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table    = 'products';
    protected $fillable = [
        'title',
        'photo',
        'content',
        'department_id',
        'trade_id',
        'manu_id',
        'color_id',
        'size',
        'size_id',
        'currency_id',
        'price',
        'stock',
        'start_at',
        'end_at',
        'start_offer_at',
        'end_offer_at',
        'price_offer',
        'other_data',
        'weight',
        'weight_id',
        'status',
        'reason',
    ];

    public function related() {
        return $this->hasMany(\App\Models\RelatedProduct::class , 'product_id', 'id');
    }
    public function rate() {
        return $this->hasMany(\App\Models\RateProduct::class , 'product_id', 'id');
    }

    public function mall_product() {
        return $this->hasMany(\App\Models\MallProduct::class , 'product_id', 'id');
    }

    public function other_data() {
        return $this->hasMany(\App\Models\OtherData::class , 'product_id', 'id');
    }

    public function malls() {
        return $this->hasMany(\App\Models\MallProduct::class , 'product_id', 'id');
    }

    public function files() {
        return $this->hasMany('App\File', 'relation_id', 'id')->where('file_type', 'product');
    }
}
