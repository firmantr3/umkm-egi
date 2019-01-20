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
        'nama',
        'parent_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'parent_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required|string',
        'parent_id' => 'nullable|integer'
    ];

    public function scopeInduk($query) {
        return $query->whereNull('parent_id');
    }

    public function indukan() {
        return $this->belongsTo('App\Models\kategori', 'parent_id');
    }

    public function anakans() {
        return $this->hasMany('App\Models\kategori', 'parent_id', 'id');
    }

    public function getIsIndukAttribute() {
        return $this->parent_id === null;
    }
    
}
