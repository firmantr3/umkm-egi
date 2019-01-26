<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;
use App\Repositories\produkRepository;
use App\Criteria\ProdukKategoriCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Services\KeranjangService;

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
            ->paginate(9);

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

    public function showKeranjangBelanja(KeranjangService $keranjang) {
        return view('customer.keranjang');
    }

    public function addToKeranjang(Request $request) {
        app('keranjang')->add($request->id, $request->input('qty', 1));

        return redirect()->route('keranjang');
    }

    public function delFromKeranjang(Request $request)
    {
        app('keranjang')->del($request->id, $request->input('qty', 1));

        return redirect()->route('keranjang');
    }

    public function decFromKeranjang(Request $request)
    {
        app('keranjang')->decrement($request->id, $request->input('qty', 1));

        return redirect()->route('keranjang');
    }
}
