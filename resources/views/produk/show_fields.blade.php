<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $produk->id !!}</p>
</div>

<!-- Kategori Id Field -->
<div class="form-group">
    {!! Form::label('kategori_id', 'Kategori Id:') !!}
    <p>{!! $produk->kategori_id !!}</p>
</div>

<!-- Nama Field -->
<div class="form-group">
    {!! Form::label('nama', 'Nama:') !!}
    <p>{!! $produk->nama !!}</p>
</div>

<!-- Deskripsi Field -->
<div class="form-group">
    {!! Form::label('deskripsi', 'Deskripsi:') !!}
    <p>{!! $produk->deskripsi !!}</p>
</div>

<!-- Harga Field -->
<div class="form-group">
    {!! Form::label('harga', 'Harga:') !!}
    <p>{!! $produk->harga !!}</p>
</div>

<!-- Stok Field -->
<div class="form-group">
    {!! Form::label('stok', 'Stok:') !!}
    <p>{!! $produk->stok !!}</p>
</div>

<!-- Gambar Field -->
<div class="form-group">
    {!! Form::label('gambar', 'Gambar:') !!}
    <p>{!! $produk->gambar !!}</p>
    @if (isset($produk) && $produk->gambar)
        <br>
        <img src="{{ url("storage/produk/$produk->gambar") }}" class="img-responsive" />
    @endif
</div>

<!-- Dibeli Field -->
<div class="form-group">
    {!! Form::label('dibeli', 'Dibeli:') !!}
    <p>{!! $produk->dibeli !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $produk->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $produk->updated_at !!}</p>
</div>

