<?php

namespace App\Repositories;

use App\Models\Bank;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BankRepository
 * @package App\Repositories
 * @version January 12, 2019, 3:30 am UTC
 *
 * @method Bank findWithoutFail($id, $columns = ['*'])
 * @method Bank find($id, $columns = ['*'])
 * @method Bank first($columns = ['*'])
*/
class BankRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'no_rekening',
        'atas_nama'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Bank::class;
    }
}
