<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class kategori
 * @package App\Models
 * @version December 25, 2018, 5:08 pm UTC
 *
 * @property string nama
 */
class kategori extends Model
{
    use SoftDeletes;

    public $table = 'kategoris';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required|string'
    ];

    
}
