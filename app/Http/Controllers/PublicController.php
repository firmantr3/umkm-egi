<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;
use App\Repositories\produkRepository;
use App\Criteria\ProdukKategoriCriteria;
use Prettus\Repository\Criteria\RequestCriteria;

class PublicController extends Controller
{
    public function index() {
        $produkAndalanQuery = produk::orderBy('dibeli', 'desc');
        $produkAndalanTotal = $produkAndalanQuery->count();
        $produkAndalanMax = $produkAndalanTotal > 12 ? 12 : $produkAndalanTotal;
        $produkAndalanPerPage = 4;
        $produkTerbarus = produk::latest()->limit(6)->get();

        return view('customer.index')
            ->with(compact([
                'produkAndalanQuery',
                'produkAndalanTotal',
                'produkAndalanMax',
                'produkAndalanPerPage',
                'produkTerbarus',
            ]));
    }

    public function katalog(Request $request, produkRepository $repo) {
        $produks = $repo->pushCriteria(ProdukKategoriCriteria::class)
            ->pushCriteria(app(RequestCriteria::class))
            ->paginate(8);

        return view('customer.katalog')
            ->with(
                compact([
                    'produks'
                ])
            );
    }

    public function produkDetail($id) {
        $produk = produk::find($id);

        return view('customer.product_details')
            ->with(compact([
                'produk',
            ]));
    }
}
