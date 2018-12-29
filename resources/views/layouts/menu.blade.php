<li class="{{ Request::is('kategori*') ? 'active' : '' }}">
    <a href="{!! route('kategori.index') !!}"><i class="fa fa-edit"></i><span>Kategori</span></a>
</li>

<li class="{{ Request::is('produk*') ? 'active' : '' }}">
    <a href="{!! route('produk.index') !!}"><i class="fa fa-edit"></i><span>Produk</span></a>
</li>

