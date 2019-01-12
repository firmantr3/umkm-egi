<li class="{{ Request::is('kategori*') ? 'active' : '' }}">
    <a href="{!! route('kategori.index') !!}"><i class="fa fa-edit"></i><span>Kategori</span></a>
</li>

<li class="{{ Request::is('produk*') ? 'active' : '' }}">
    <a href="{!! route('produk.index') !!}"><i class="fa fa-edit"></i><span>Produk</span></a>
</li>

<li class="{{ Request::is('customers*') ? 'active' : '' }}">
    <a href="{!! route('customers.index') !!}"><i class="fa fa-edit"></i><span>Customer</span></a>
</li>

<li class="{{ Request::is('kotas*') ? 'active' : '' }}">
    <a href="{!! route('kotas.index') !!}"><i class="fa fa-edit"></i><span>Kota</span></a>
</li>

<li class="{{ Request::is('banks*') ? 'active' : '' }}">
    <a href="{!! route('banks.index') !!}"><i class="fa fa-edit"></i><span>Bank</span></a>
</li>

<li class="{{ Request::is('orders*') ? 'active' : '' }}">
    <a href="{!! route('orders.index') !!}"><i class="fa fa-edit"></i><span>Order</span></a>
</li>

<li class="{{ Request::is('suppliers*') ? 'active' : '' }}">
    <a href="{!! route('suppliers.index') !!}"><i class="fa fa-edit"></i><span>Supplier</span></a>
</li>

