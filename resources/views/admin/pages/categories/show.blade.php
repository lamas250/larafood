@extends('adminlte::page')

@section('title', 'Detalhes da categoria')

@section('content_header')
    <h1>Detalhes da categoria <b>{{$category->name}}</b> </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong> {{$category->name}}
                </li>
                <li>
                    <strong>URL:</strong> {{$category->url}}
                </li>
                <li>
                    <strong>Descrição:</strong>:</strong> {{$category->description}}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
            </form>
        </div>
    </div>

    @endsection