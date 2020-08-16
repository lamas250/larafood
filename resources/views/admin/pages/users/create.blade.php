@extends('adminlte::page')

@section('title', 'Cadastrar Novo Usuario')

@section('content_header')
    <h1>Cadastrar Novo Usuario </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('users.store')}}" method="POST" class="form">

                @include('admin.pages.users.partials.form')
            </form>
        </div>
    </div>

@endsection