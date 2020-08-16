@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('categories.index')}}">Categorias</a></li>
    </ol>
    
    <h1>Categorias <a href="{{route('categories.create')}}" class="btn btn-dark"><i class="fas fa-plus"></i> ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('categories.search')}}" class="form form-inline" method="POST">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i> Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descricão</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $value)
                        <tr>
                            <td>{{$value->name}}</td>
                            <td>{{$value->description}}</td>
                            <td style="width: 250px;">
                                <a href="{{route('categories.show',$value->id)}}" class="btn btn-warning">VER</a>
                                <a href="{{route('categories.edit',$value->id)}}" class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!!$categories->appends($filters)->links()!!}
            @else
                {!!$categories->links()!!}
            @endif
        </div>
    </div>
@stop

