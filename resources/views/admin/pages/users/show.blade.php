@extends('adminlte::page')

@section('title', 'Detalhes do usuario')

@section('content_header')
    <h1>Detalhes do usuario <b>{{$user->name}}</b> </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong> {{$user->name}}
                </li>
                <li>
                    <strong>E-mail:</strong> {{$user->email}}
                </li>
                <li>
                    <strong>Empresa:</strong>:</strong> {{$user->tenant->name}}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{route('users.destroy',$user->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
            </form>
        </div>
    </div>

    @endsection