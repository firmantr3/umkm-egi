<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Bank
 * @package App\Models
 * @version January 12, 2019, 3:30 am UTC
 *
 * @property string nama
 * @property string no_rekening
 * @property string atas_nama
 * @property string gambar
 */
class Bank extends Model
{
    use SoftDeletes;

    public $table = 'banks';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'no_rekening',
        'atas_nama',
        'gambar'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'no_rekening' => 'string',
        'atas_nama' => 'string',
        'gambar' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'no_rekening' => 'required',
        'atas_nama' => 'required',
        'gambar' => 'nullable'
    ];

    
}
