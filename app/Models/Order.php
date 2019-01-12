<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 * @package App\Models
 * @version January 12, 2019, 3:36 am UTC
 *
 * @property string status
 * @property integer customer_id
 * @property string kode
 */
class Order extends Model
{
    use SoftDeletes;

    public $table = 'orders';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'status',
        'customer_id',
        'kode'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'string',
        'customer_id' => 'integer',
        'kode' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'status' => 'required',
        'customer_id' => 'required',
        'kode' => 'nullable'
    ];

    
}
