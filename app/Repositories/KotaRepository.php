<?php

namespace App\Repositories;

use App\Models\Kota;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KotaRepository
 * @package App\Repositories
 * @version January 12, 2019, 3:11 am UTC
 *
 * @method Kota findWithoutFail($id, $columns = ['*'])
 * @method Kota find($id, $columns = ['*'])
 * @method Kota first($columns = ['*'])
*/
class KotaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'ongkir'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Kota::class;
    }
}
