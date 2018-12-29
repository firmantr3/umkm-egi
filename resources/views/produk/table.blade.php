<table class="table table-responsive" id="produks-table">
    <thead>
        <tr>
            <th>Kategori</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Dibeli</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($produks as $produk)
        <tr>
            <td>{!! $produk->kategori->nama !!}</td>
            <td>{!! $produk->nama !!}</td>
            <td>{!! $produk->harga !!}</td>
            <td>{!! $produk->stok !!}</td>
            <td>
                <img src="{{ url("storage/produk/{$produk->gambar}") }}" alt="" class="img-responsive">
            </td>
            <td>{!! $produk->dibeli !!}</td>
            <td>
                {!! Form::open(['route' => ['produk.destroy', $produk->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('produk.show', [$produk->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('produk.edit', [$produk->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
