@extends('layouts.customer.app')

@section('title', 'Katalog Produk')

@section('content')
    
	<div class="row">

        @include('sidebar')

	<div class="span9">
        
        @include('layouts.customer.breadcrumb')

	<h3> @yield('title') <small class="pull-right"> {{ $produks->total() }} produk tersedia </small></h3>	
	<hr class="soft"/>
	<form class="form-horizontal span6">
		<div class="control-group">
		  <label class="control-label alignL">Urutkan Berdasarkan </label>
			<select>
              <option>Nama Produk A - Z</option>
              <option>Nama Produk Z - A</option>
              <option>Stok</option>
              <option>Harga</option>
            </select>
		</div>
	  </form>
	  
<div id="myTab" class="pull-right">
 <a href="#listView" data-toggle="tab"><span class="btn btn-large"><i class="icon-list"></i></span></a>
 <a href="#blockView" data-toggle="tab"><span class="btn btn-large btn-primary"><i class="icon-th-large"></i></span></a>
</div>
<br class="clr"/>

<div class="tab-content">
	<div class="tab-pane" id="listView">
        @foreach ($produks->items() as $produk)
		<div class="row">	  
			<div class="span2">
				<img src="{{ url("storage/produk/{$produk->gambar}") }}" alt=""/>
			</div>
			<div class="span4">
				<h5>{{ $produk->nama }}</h5>
				<p>
                    {{ str_limit($produk->deskripsi, 100) }}
				</p>
				<a class="btn btn-small pull-right" href="{{ route('produk-detail', ['id' => $produk->id]) }}">Lihat Detail</a>
				<br class="clr"/>
			</div>
			<div class="span3 alignR">
			<form class="form-horizontal qtyFrm">
			<h3> Rp {{ number_format($produk->harga, 0, ',', '.') }}</h3>
			
			  <a href="{{ route('produk-detail', ['id' => $produk->id]) }}" class="btn btn-large btn-primary"> Tambahkan ke <i class=" icon-shopping-cart"></i></a>
			  <a href="{{ route('produk-detail', ['id' => $produk->id]) }}" class="btn btn-large"><i class="icon-zoom-in"></i></a>
			
				</form>
			</div>
		</div>
		<hr class="soft"/>
        @endforeach
	</div>

	<div class="tab-pane  active" id="blockView">
		<ul class="thumbnails">
            @foreach ($produks->items() as $key => $produk)
                <li class="span3">
                <div class="thumbnail">
                    <a href="{{ route('produk-detail', ['id' => $produk->id]) }}"><img src="{{ url("storage/produk/{$produk->gambar}") }}" alt=""/></a>
                    <div class="caption">
                    <h5>{{ $produk->nama }}</h5>
                    <p> 
                        {{ str_limit($produk->deskripsi, 100) }}
                    </p>
                    <h4 style="text-align:center"><a class="btn" href="{{ route('produk-detail', ['id' => $produk->id]) }}"> <i class="icon-zoom-in"></i></a> <a class="btn" href="{{ route('keranjang.add', ['id' => $produk->id]) }}">Tambah <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">Rp {{ number_format($produk->harga, 0, ',', '.') }}</a></h4>
                    </div>
                </div>
                </li>
                @if ($key > 0 && ($key + 1) % 3 === 0)
                    <div class="clearfix"></div>
                @endif
            @endforeach
		  </ul>
	<hr class="soft"/>
	</div>
</div>

    <div class="pagination">
        {{ $produks->links() }}
    </div>
			<br class="clr"/>
</div>
@endsection



