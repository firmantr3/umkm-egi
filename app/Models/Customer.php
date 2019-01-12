<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Customer
 * @package App\Models
 * @version January 12, 2019, 3:09 am UTC
 *
 * @property string nama
 * @property string email
 * @property string password
 * @property string alamat
 * @property string telepon
 */
class Customer extends Model
{
    use SoftDeletes;

    public $table = 'customers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'email',
        'password',
        'alamat',
        'telepon',
        'kota_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'email' => 'string',
        'password' => 'string',
        'alamat' => 'string',
        'telepon' => 'string',
        'kota_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'email' => 'required|email',
        'email_verified_at' => 'nullable',
        'password' => 'required',
        'alamat' => 'required',
        'telepon' => 'required',
        'kota_id' => 'required',
    ];

    
}
