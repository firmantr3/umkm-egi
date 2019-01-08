<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class produk
 * @package App\Models
 * @version December 25, 2018, 5:22 pm UTC
 *
 * @property integer kategori_id
 * @property string nama
 * @property string deskripsi
 * @property integer harga
 * @property integer stok
 * @property string gambar
 * @property integer dibeli
 */
class produk extends Model
{
    use SoftDeletes;

    public $table = 'produks';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'kategori_id',
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'gambar',
        'dibeli'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'kategori_id' => 'integer',
        'nama' => 'string',
        'deskripsi' => 'string',
        'harga' => 'integer',
        'stok' => 'integer',
        'gambar' => 'string',
        'dibeli' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'kategori_id' => 'required|integer',
        'nama' => 'required',
        'deskripsi' => 'required|min:5',
        'harga' => 'required|integer',
        'stok' => 'required',
        'gambar' => 'nullable|mimes:jpeg,jpg,png',
        'dibeli' => 'nullable'
    ];

    public function kategori() {
        return $this->belongsTo('App\Models\kategori');
    }

    
}
