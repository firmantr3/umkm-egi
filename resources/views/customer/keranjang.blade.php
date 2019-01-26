@extends('layouts.customer.app')

@section('title', 'Keranjang Belanja')

@section('content')
    
	<div class="row">

        @include('sidebar')

        <div class="span9">

            @include('layouts.customer.breadcrumb')

            <h3>  
                KERANJANG BELANJA [ <small>3 Item(s) </small>]
                <a href="{{ route('katalog') }}" class="btn btn-large pull-right">
                    <i class="icon-arrow-left"></i> Lanjut Belanja 
                </a>
            </h3>	
            <hr class="soft"/>
            @if (!auth()->check())
            <table class="table table-bordered">
                <tr><th> LOGIN UNTUK MELANJUTKAN  </th></tr>
                <tr> 
                <td>
                    <form class="form-horizontal" action="/login" method="POST">
						{{ csrf_field() }}
                        <div class="control-group">
                        <label class="control-label" for="inputUsername">Email</label>
                        <div class="controls">
                            <input type="text" id="inputUsername" placeholder="Email" name="email">
                        </div>
                        </div>
                        <div class="control-group">
                        <label class="control-label" for="inputPassword1">Password</label>
                        <div class="controls">
                            <input name="password" type="password" id="inputPassword1" placeholder="Password">
                        </div>
                        </div>
                        <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn">Login</button> ATAU 
                            <a href="{{ route('register') }}" class="btn">Daftar Sekarang!</a>
                        </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                            <a href="forgetpass.html" style="text-decoration:underline">Lupa Password ?</a>
                            </div>
                        </div>
                    </form>
                </td>
                </tr>
            </table>		
                
            @endif
                    
            @if (app('keranjang')->all()->count())
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Nama</th>
                            <th>Quantity/Update</th>
                            <th>Harga</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (app('keranjang')->all() as $item)
                            <tr>
                                <td style="text-align: center;"> <img width="60" src="{{ url("storage/produk/{$item['product']->gambar}") }}" alt=""/></td>
                                <td>{{ $item['product']->nama }}</td>
                                <td>
                                    <div class="input-append">
                                        <input class="span1" style="max-width:34px" value="{{ $item['qty'] }}" readonly id="appendedInputButtons" size="16" type="text">
                                        <a class="btn" href="{{ route('keranjang.dec', ['id' => $item['id']]) }}"><i class="icon-minus"></i></a>
                                        <a class="btn" href="{{ route('keranjang.add', ['id' => $item['id']]) }}"><i class="icon-plus"></i></a>
                                        <a class="btn btn-danger" href="{{ route('keranjang.del', ['id' => $item['id']]) }}"><i class="icon-remove icon-white"></i></a>				
                                    </div>
                                </td>
                                <td>Rp {{ number_format($item['product']->harga, 0, '.', ',') }}</td>
                                <td>Rp {{ number_format($item['product']->harga * $item['qty'], 0, '.', ',') }}</td>
                            </tr>
                        @endforeach
                        
                        <tr>
                            <td colspan="4" style="text-align:right">Total Produk:	</td>
                            <td>Rp {{ number_format(app('keranjang')->totalCount(), 0, '.', ',') }}</td>
                        </tr>
                        
                        @if (auth()->check())
                            <tr>
                                <td colspan="4" style="text-align:right">Ongkir {{ auth()->user()->kota->nama }}:	</td>
                                <td>Rp {{ number_format(auth()->user()->kota->ongkir, 0, '.', ',') }}</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align:right">
                                    <strong>
                                        TOTAL (
                                            {{ number_format(app('keranjang')->totalCount(), 0, '.', ',') }}
                                            +
                                            {{ number_format(auth()->user()->kota->ongkir, 0, '.', ',') }}
                                        )
                                        =
                                    </strong>
                                </td>
                                <td class="label label-important" style="display:block">
                                    <strong>Rp {{ number_format(app('keranjang')->totalCount() + auth()->user()->kota->ongkir, 0, '.', ',') }}</strong>
                                </td>
                            </tr>
                        @endif

                    </tbody>
                </table>
                @if (!auth()->check())
                    <p style="text-align:center;" class="text-italic small">
                        <i>Belum termasuk ongkir.</i>
                    </p>
                @endif
            @else
                <hr>
                <h4 style="text-align: center;">
                    Keranjang anda masih kosong ...
                </h4>
                <hr>
            @endif
                
            <a href="{{ route('katalog') }}" class="btn btn-large"><i class="icon-arrow-left"></i> Lanjut Belanja </a>
            @if (app('keranjang')->all()->count() && auth()->check())
            <a href="login.html" class="btn btn-large pull-right">Next <i class="icon-arrow-right"></i></a>
            @endif
        
        </div>
    </div>

@endsection
