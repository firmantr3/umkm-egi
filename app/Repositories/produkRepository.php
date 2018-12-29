<?php

namespace App\Repositories;

use App\Models\produk;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class produkRepository
 * @package App\Repositories
 * @version December 25, 2018, 5:22 pm UTC
 *
 * @method produk findWithoutFail($id, $columns = ['*'])
 * @method produk find($id, $columns = ['*'])
 * @method produk first($columns = ['*'])
*/
class produkRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'harga'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return produk::class;
    }
}
