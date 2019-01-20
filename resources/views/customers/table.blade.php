<form action="/admin/customers" method="GET">
    <div class="form-group">
        <input class="form-control" type="text" name="search" placeholder="Pencarian">
    </div>
</form>

<table class="table table-responsive" id="customers-table">
    <thead>
        <tr>
            <th>Nama</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>Telepon</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($customers as $customer)
        <tr>
            <td>{!! $customer->nama !!}</td>
            <td>{!! $customer->email !!}</td>
            <td>{!! $customer->alamat !!}</td>
            <td>{!! $customer->telepon !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('customers.show', [$customer->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
