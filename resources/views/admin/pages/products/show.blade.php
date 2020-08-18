@extends('adminlte::page')

@section('title', 'Detalhes do Produto')

@section('content_header')
    <h1>Detalhes do Produto <b>{{$product->name}}</b> </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <img src="{{url("storage/{$product->image}")}}" style="max-width: 90px;">
                </li>
                <li>
                    <strong>Nome:</strong> {{$product->name}}
                </li>
                <li>
                    <strong>Preço:</strong>:</strong> {{$product->price}}
                </li>
                <li>
                    <strong>Descrição:</strong>:</strong> {{$product->description}}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{route('products.destroy',$product->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
            </form>
        </div>
    </div>

    @endsection