<table class="table table-responsive" id="banks-table">
    <thead>
        <tr>
            <th>Nama</th>
        <th>No Rekening</th>
        <th>Atas Nama</th>
        <th>Gambar</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($banks as $bank)
        <tr>
            <td>{!! $bank->nama !!}</td>
            <td>{!! $bank->no_rekening !!}</td>
            <td>{!! $bank->atas_nama !!}</td>
            <td>{!! $bank->gambar !!}</td>
            <td>
                {!! Form::open(['route' => ['banks.destroy', $bank->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('banks.show', [$bank->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('banks.edit', [$bank->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>