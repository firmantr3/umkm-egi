<?php

namespace App\Repositories;

use App\Models\Supplier;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SupplierRepository
 * @package App\Repositories
 * @version January 12, 2019, 3:52 am UTC
 *
 * @method Supplier findWithoutFail($id, $columns = ['*'])
 * @method Supplier find($id, $columns = ['*'])
 * @method Supplier first($columns = ['*'])
*/
class SupplierRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Supplier::class;
    }
}
