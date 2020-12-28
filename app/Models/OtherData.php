<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherData extends Model
{
    protected $table    = 'other_data';
    protected $fillable = [
        'product_id',
        'data_key',
        'data_value',
    ];
}
