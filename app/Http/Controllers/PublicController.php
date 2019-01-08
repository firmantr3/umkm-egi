<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\produk;

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
}
