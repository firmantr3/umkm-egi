<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    public $fillable = [
        'order_id',
        'produk_id',
        'jumlah'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'order_id' => 'integer',
        'produk_id' => 'integer',
        'jumlah' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'order_id' => 'required',
        'produk_id' => 'required',
        'jumlah' => 'required'
    ];
}
