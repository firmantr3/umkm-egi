@extends('layouts.customer.app')

@section('title', "Registrasi Customer")

@section('content')
    
	<div class="row">

        @include('sidebar')
    
        
	<div class="span9">
        
        @include('layouts.customer.breadcrumb')
        
	<h3>@yield('title')</h3>	
	<div class="well">
	<!--
	<div class="alert alert-info fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	<div class="alert fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div>
	 <div class="alert alert-block alert-error fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
	 </div> -->
	<form action="{{ url('/register') }}" method="POST" class="form-horizontal" >
		{{ csrf_field() }}
		<h4>Data Pribadi</h4>
		<div class="control-group">
			<label class="control-label" for="inputFname1">Nama <sup>*</sup></label>
			<div class="controls">
			  <input name="nama" type="text" id="inputFname1" placeholder="Nama Lengkap">
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="input_email">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="text" name="email" id="input_email" placeholder="Email">
		</div>
	  </div>	  
		<div class="control-group">
		<label class="control-label" for="input_email">Telepon <sup>*</sup></label>
		<div class="controls">
		  <input type="text" name="telepon"  placeholder="No Telepon">
		</div>
	  </div>	  
	<div class="control-group">
		<label class="control-label" for="inputPassword1">Password <sup>*</sup></label>
		<div class="controls">
		  <input type="password" name="password" id="inputPassword1" placeholder="Password">
		</div>
	  </div>	  
	<div class="control-group">
		<label class="control-label" for="inputPassword2">Konfirmasi Password <sup>*</sup></label>
		<div class="controls">
		  <input type="password" name="password_confirmation" id="inputPassword2" placeholder="Konfirmasi Password">
		</div>
	  </div>	 
		
		<div class="control-group">
			<label class="control-label" for="address">Alamat<sup>*</sup></label>
			<div class="controls">
				<textarea name="alamat" id="" cols="30" rows="10"></textarea>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="state">Kota<sup>*</sup></label>
			<div class="controls">
			  <select id="state" name="kota_id" >
					@foreach ($kotas as $kota)
						<option value="{{ $kota->id }}">{{ $kota->nama }}</option>
					@endforeach
				</select>
			</div>
		</div>		
		
	<p><sup>*)</sup>Wajib diisi	</p>
	
	<div class="control-group">
			<div class="controls">
				<input class="btn btn-large btn-success" type="submit" value="Register" />
			</div>
		</div>		
	</form>
</div>

</div>
</div>
@endsection
