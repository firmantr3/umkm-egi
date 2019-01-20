<!-- Navbar ================================================== -->
<div id="logoArea" class="navbar">
	<a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</a>
	@php
			$kategoriInduks = App\Models\kategori::induk()
					->orderBy('nama')
					->get();
	@endphp
  <div class="navbar-inner">
    <a class="brand" href="{{ url('/') }}"><img style="height: 50px;" src="/logo.png" alt="Bootsshop"/></a>
		<form class="form-inline navbar-search" method="get" action="{{ route('katalog') }}" >
		<input id="srchFldz" name="search" class="srchTxt" type="text" placeholder="Ketikkan barang yang dicari" />
		  <select class="srchTxt" name="kategori">
			<option value="">Semua Jenis</option>
			@foreach ($kategoriInduks as $item)
				@if (app('request')->kategori === $item->nama)
					<option selected>{{ $item->nama }}</option>
				@else
					<option>{{ $item->nama }}</option>
				@endif
			@endforeach
		</select> 
		  <button type="submit" id="submitButton" class="btn btn-primary">Cari</button>
    </form>
    <ul id="topMenu" class="nav pull-right">
	 <li class=""><a href="special_offer.html">Promo</a></li>
	 <li class=""><a href="normal.html">Pengiriman</a></li>
	 <li class=""><a href="contact.html">Kontak</a></li>
	 <li class="">
		@if (!auth()->check())
			<a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Login</span></a>
			<div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3>Login Akun Anda</h3>
					</div>
					<div class="modal-body">
					<form action="/login" method="POST" class="form-horizontal loginFrm">
						{{ csrf_field() }}
						<div class="control-group">								
						<input name="email" type="text" id="inputEmail" placeholder="Email">
						</div>
						<div class="control-group">
						<input name="password" type="password" id="inputPassword" placeholder="Password">
						</div>
						<div class="control-group">
						<label class="checkbox">
						<input name="remember" type="checkbox"> Ingat Saya
						</label>
						</div>
						<button type="submit" class="btn btn-success">Masuk</button>
						<button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
					</form>		
					</div>
			</div>
		@endif
	</li>
    </ul>
  </div>
</div>
