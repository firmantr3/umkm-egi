@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Produk
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($produk, ['route' => ['produk.update', $produk->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('produk.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@section('css')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection

@section('scripts')
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <!-- Initialize Quill editor -->
    <script>
    var quill = new Quill('#editor', {
        theme: 'snow'
    });
    </script>
@endsection
