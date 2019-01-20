@extends('layouts.customer.app')

@section('title', $produk->nama)

@section('content')
    
	<div class="row">

        @include('sidebar')

		<div class="span9">

            @include('layouts.customer.breadcrumb')

            <div class="row">	  
                    <div id="gallery" class="span3">
                    <a href="{{ url("storage/produk/{$produk->gambar}") }}" title="{{ $produk->nama }}">
                        <img src="{{ url("storage/produk/{$produk->gambar}") }}" style="width:100%" alt="{{ $produk->nama }}"/>
                    </a>
                    
                    <div class="btn-toolbar">
                    <div class="btn-group">
                        <span class="btn"><i class="icon-envelope"></i></span>
                        <span class="btn" ><i class="icon-print"></i></span>
                        <span class="btn" ><i class="icon-zoom-in"></i></span>
                        <span class="btn" ><i class="icon-star"></i></span>
                        <span class="btn" ><i class=" icon-thumbs-up"></i></span>
                        <span class="btn" ><i class="icon-thumbs-down"></i></span>
                    </div>
                    </div>
                    </div>
                    <div class="span6">
                        <h3>{{ $produk->nama }}  </h3>
                        <hr class="soft"/>
                        <form class="form-horizontal qtyFrm">
                        <div class="control-group">
                            <label class="control-label"><span>Rp {{ number_format($produk->harga, 0, ',', '.') }}</span></label>
                            <div class="controls">
                            <input type="number" class="span1" value="1" placeholder="Qty."/>
                            <button type="submit" class="btn btn-large btn-primary pull-right"> Tambah ke keranjang <i class=" icon-shopping-cart"></i></button>
                            </div>
                        </div>
                        </form>
                        
                        <hr class="soft"/>
                        <h4>{{ $produk->stok }} stok tersedia</h4>
                        <hr class="soft clr"/>
                        <p>
                            {!! $produk->deskripsi !!}
                        </p>
                        <br class="clr"/>
                    <a href="#" name="detail"></a>
                    <hr class="soft"/>
                    </div>
                    

            </div>
        </div>
@endsection
