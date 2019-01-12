<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- No Rekening Field -->
<div class="form-group col-sm-6">
    {!! Form::label('no_rekening', 'No Rekening:') !!}
    {!! Form::text('no_rekening', null, ['class' => 'form-control']) !!}
</div>

<!-- Atas Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('atas_nama', 'Atas Nama:') !!}
    {!! Form::text('atas_nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Gambar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gambar', 'Gambar:') !!}
    {!! Form::text('gambar', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('banks.index') !!}" class="btn btn-default">Cancel</a>
</div>
