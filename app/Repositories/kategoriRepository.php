<?php

namespace App\Repositories;

use App\Models\kategori;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class kategoriRepository
 * @package App\Repositories
 * @version December 25, 2018, 5:08 pm UTC
 *
 * @method kategori findWithoutFail($id, $columns = ['*'])
 * @method kategori find($id, $columns = ['*'])
 * @method kategori first($columns = ['*'])
*/
class kategoriRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return kategori::class;
    }
}
