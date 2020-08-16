@extends('adminlte::page')

@section('title', 'Cadastrar Nova Categorias')

@section('content_header')
    <h1>Cadastrar Nova Categoria </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('categories.store')}}" method="POST" class="form">

                @include('admin.pages.categories.partials.form')
            </form>
        </div>
    </div>

@endsection