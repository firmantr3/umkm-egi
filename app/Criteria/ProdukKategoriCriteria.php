<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;
use App\Models\kategori;

/**
 * Class ProdukKategoriCriteria.
 *
 * @package namespace App\Criteria;
 */
class ProdukKategoriCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $request = app('request');

        $kategori = null;
        $reqKategori = $request->input('kategori', null);
        if($reqKategori) {
            $kategori = kategori::whereNama($reqKategori)->first();
        }

        if($kategori) {
            if($kategori->is_induk) {
                $kategoriAnakans = $kategori->anakans->pluck('id');
                $kategori_ids = collect([$kategori->id])->concat($kategoriAnakans);

                $model = $model->whereIn('kategori_id', $kategori_ids);
            }
            else {
                $model = $model->whereKategoriId($kategori->id);
            }
        }

        return $model;
    }
}
