<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Kota
 * @package App\Models
 * @version January 12, 2019, 3:11 am UTC
 *
 * @property string nama
 * @property integer ongkir
 */
class Kota extends Model
{
    use SoftDeletes;

    public $table = 'kotas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'ongkir'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'ongkir' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'ongkir' => 'required'
    ];

    
}
