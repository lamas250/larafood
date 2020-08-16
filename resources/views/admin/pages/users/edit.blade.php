@extends('adminlte::page')

@section('title', "Editar o Usuario {$user->name}")

@section('content_header')
    <h1>Editar o Usuario {{$user->name}}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('users.update',$user->id)}}" method="POST" class="form">
                @method('PUT')
                @include('admin.pages.users.partials.form')
            </form>
        </div>
    </div>

@endsection