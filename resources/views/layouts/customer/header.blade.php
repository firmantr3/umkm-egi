
<div id="header">
<div class="container">
<div id="welcomeLine" class="row">
	<div class="span6">
		Selamat Datang!
		<strong>
			@if (auth()->check())
				{{ auth()->user()->nama }},

				<form style="display: inline-block;" action="/logout" method="POST">
					{{ csrf_field() }}
					<a class="text-error" href="#" onclick="this.parentElement.submit();">Logout</a>
				</form>
			@else
				Customer
			@endif
		</strong>
	</div>
	<div class="span6">
	<div class="pull-right">
		<span class="btn btn-mini">Rp {{ number_format(app('keranjang')->totalCount(), 0, '.', ',') }}</span>
		<a href="{{ route('keranjang') }}">
			<span class="btn btn-mini btn-primary">
				<i class="icon-shopping-cart icon-white"></i> [ {{ app('keranjang')->itemCount() }} ] Produk di keranjang anda 
			</span> 
		</a> 
	</div>
	</div>
</div>

	@include('layouts.customer.navbar')

</div>
</div>
<!-- Header End====================================================================== -->
