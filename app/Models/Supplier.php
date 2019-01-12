<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Supplier
 * @package App\Models
 * @version January 12, 2019, 3:52 am UTC
 *
 * @property string nama
 * @property string profil
 * @property string email
 */
class Supplier extends Model
{
    use SoftDeletes;

    public $table = 'suppliers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'profil',
        'email'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'profil' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'profil' => 'required',
        'email' => 'required|email'
    ];

    
}
