@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('tables.index')}}">Mesas</a></li>
    </ol>
    
    <h1>Mesas <a href="{{route('tables.create')}}" class="btn btn-dark"><i class="fas fa-plus"></i> ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('tables.search')}}" class="form form-inline" method="POST">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i> Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Identificação</th>
                        <th>Descricão</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tables as $value)
                        <tr>
                            <td>{{$value->identify}}</td>
                            <td>{{$value->description}}</td>
                            <td style="width: 250px;">
                                <a href="{{route('tables.show',$value->id)}}" class="btn btn-warning">VER</a>
                                <a href="{{route('tables.edit',$value->id)}}" class="btn btn-info">Edit</a>
                                {{-- <a href="{{route('tables.products',$value->id)}}" class="btn btn-success"><i class="fas fa-store"></i></a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!!$tables->appends($filters)->links()!!}
            @else
                {!!$tables->links()!!}
            @endif
        </div>
    </div>
@stop

