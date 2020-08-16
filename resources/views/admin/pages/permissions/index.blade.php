@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('permissions.index')}}">Permissões</a></li>
    </ol>
    
    <h1>Permissões <a href="{{route('permissions.create')}}" class="btn btn-dark"><i class="fas fa-plus"></i> ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('permissions.search')}}" class="form form-inline" method="POST">
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
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $value)
                        <tr>
                            <td>{{$value->name}}</td>
                            <td style="width: 250px;">
                                <a href="{{route('permissions.show',$value->id)}}" class="btn btn-warning">VER</a>
                                <a href="{{route('permissions.edit',$value->id)}}" class="btn btn-info">Edit</a>
                                 <a href="{{route('permissions.profiles',$value->id)}}" class="btn btn-success"><i class="fas fa-address-book"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!!$permissions->appends($filters)->links()!!}
            @else
                {!!$permissions->links()!!}
            @endif
        </div>
    </div>
@stop

