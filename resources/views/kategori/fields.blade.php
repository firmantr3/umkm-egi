<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('parent_id', 'Kategori Induk:') !!}
    {!! Form::select('parent_id', $indukKategoriOptions, null, ['class' => 'form-control', 'placeholder' => 'Kategori Induk']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('kategori.index') !!}" class="btn btn-default">Cancel</a>
</div>
