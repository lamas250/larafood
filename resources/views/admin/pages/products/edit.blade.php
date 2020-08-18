@extends('adminlte::page')

@section('title', "Editar o Produto {$product->name}")

@section('content_header')
    <h1>Editar o Produto {{$product->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('products.update',$product->id)}}" method="POST" class="form" enctype="multipart/form-data">
                @method('PUT')
                @include('admin.pages.products.partials.form')
            </form>
        </div>
    </div>

@endsection