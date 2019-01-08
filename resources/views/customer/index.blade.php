@extends('layouts.customer.app')

@section('content')
    
	<div class="row">

        @include('sidebar')

		<div class="span9">		
			<div class="well well-small">
			<h4>Produk Terlaris <small class="pull-right">200+ produk tersedia</small></h4>
			<div class="row-fluid">
			<div id="featured" class="carousel slide">
			<div class="carousel-inner">
				@for ($i = 0; $i < ceil($produkAndalanMax / $produkAndalanPerPage); $i++)
					<div class="item {{ $i ? '' : 'active' }}">
						<ul class="thumbnails">
							@php
								$skip = $i * $produkAndalanPerPage;
								$take = $produkAndalanPerPage;

								$produkAndalans = $produkAndalanQuery->skip($skip)->take($take)->get();
							@endphp

							@foreach ($produkAndalans as $produk)
								<li class="span3">
									<div class="thumbnail">
										@if (now()->diffInDays($produk->created_at, false) > -7)
											<i class="tag"></i>
										@endif
										<a href="product_details.html"><img src="{{ url("storage/produk/{$produk->gambar}") }}" alt=""></a>
										<div class="caption">
											<h5>{{ $produk->nama }}</h5>
											<h4><a class="btn" href="product_details.html">DETAIL</a> <span class="pull-right">{{ number_format($produk->harga, 0, ',', '.') }}</span></h4>
										</div>
									</div>
								</li>
							@endforeach
						</ul>
					</div>
				@endfor
			  </div>
			  <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
			  <a class="right carousel-control" href="#featured" data-slide="next">›</a>
			  </div>
			  </div>
		</div>

		<h4>Produk Terbaru </h4>
			  <ul class="thumbnails">
					@foreach ($produkTerbarus as $produk)
						<li class="span3">
							<div class="thumbnail">
							<a  href="product_details.html"><img style="height: 160px;" src="{{ url("storage/produk/{$produk->gambar}") }}" alt=""/></a>
							<div class="caption">
								<h5>{{ $produk->nama }}</h5>
								<p> 
									{{ str_limit($produk->deskripsi, 20) }}
								</p>
							
								<h4 style="text-align:center"><a class="btn" href="product_details.html"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Beli <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">{{ number_format($produk->harga, 0, ',', '.') }}</a></h4>
							</div>
							</div>
						</li>
					@endforeach
			  </ul>	

		</div>
		</div>
@endsection
