@php
    $request = app('request');
@endphp

<ul class="breadcrumb">
    <li><a href="{{ url('/') }}">Beranda</a> <span class="divider">/</span></li>
    @if ($request->is('produk'))
		<li class="active">Katalog Produk</li>
    @elseif ($request->is('produk*'))
        <li><a href="{{ route('katalog') }}">Katalog</a> <span class="divider">/</span></li>
        @if ($request->is('*detail'))
            <li class="active">Detail Produk</li>
        @else
            
        @endif
    @elseif  ($request->is('register'))
		<li class="active">Register</li>
    @endif
</ul>	
