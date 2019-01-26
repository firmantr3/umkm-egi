
<!-- Sidebar ================================================== -->
	<div id="sidebar" class="span3">
		<div class="well well-small">
            <a id="myCart" href="{{ route('keranjang') }}">
                <img src="/customer/themes/images/ico-cart.png" alt="cart">
                {{ app('keranjang')->itemCount() }} Item di keranjang
                <span class="badge badge-warning pull-right">Rp {{ number_format(app('keranjang')->totalCount(), 0, '.', ',') }}</span>
            </a>
        </div>

		<ul id="sideManu" class="nav nav-tabs nav-stacked">
            @php
                $kategoriInduks = App\Models\kategori::induk()
                    ->with('anakans')
                    ->orderBy('nama')
                    ->get();
            @endphp
            @foreach ($kategoriInduks as $kategoriInduk)
                @if ($kategoriInduk->anakans->count())
                    <li class="subMenu open"><a> {{ strtoupper($kategoriInduk->nama) }}</a>
                        <ul>
                            @foreach ($kategoriInduk->anakans->sortBy('nama') as $kategori)
                                <li><a href="{{ route('katalog', ['kategori' => $kategori->nama]) }}"><i class="icon-chevron-right"></i>{{ strtoupper($kategori->nama) }} </a></li>
                                {{-- <li><a class="active" href="{{ route('katalog', ['kategori' => $kategori->nama]) }}"><i class="icon-chevron-right"></i>Cameras (100) </a></li> --}}
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li><a href="{{ route('katalog', ['kategori' => $kategoriInduk->nama]) }}">{{ strtoupper($kategoriInduk->nama) }}</a></li>
                @endif
            @endforeach
		</ul>
		<br/>
			<div class="thumbnail">
				<img src="/customer/themes/images/payment_methods.png" title="Bootshop Payment Methods" alt="Payments Methods">
				<div class="caption">
				  <h5>Pilihan Pembayaran</h5>
				</div>
			  </div>
	</div>
<!-- Sidebar end=============================================== -->
