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

    public function selectOptions()
    {
        return app($this->model())->get()->keyBy('id')->map(function ($kategori) {
            return $kategori->nama;
        });
    }

    public function indukSelectOptions($current_id = null)
    {
        return app($this->model())->induk()
            ->when($current_id, function($query) use ($current_id) {
                $query->where('id', '!=', $current_id);
            })
            ->get()
            ->keyBy('id')
            ->map(function ($kategori) {
                return $kategori->nama;
            });
    }
}
