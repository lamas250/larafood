@extends('adminlte::page')

@section('title', 'Detalhes da Mesa')

@section('content_header')
    <h1>Detalhes da Mesa <b>{{$table->name}}</b> </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Identificação:</strong> {{$table->identify}}
                </li>
                <li>
                    <strong>Descrição:</strong>:</strong> {{$table->description}}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{route('tables.destroy',$table->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
            </form>
        </div>
    </div>

    @endsection