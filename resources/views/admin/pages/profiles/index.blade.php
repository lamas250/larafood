@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}">Perfis</a></li>
    </ol>
    
    <h1>Perfis <a href="{{route('profiles.create')}}" class="btn btn-dark"><i class="fas fa-plus"></i> ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('profiles.search')}}" class="form form-inline" method="POST">
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
                    @foreach ($profiles as $value)
                        <tr>
                            <td>{{$value->name}}</td>
                            <td style="width: 250px;">
                                <a href="{{route('profiles.show',$value->id)}}" class="btn btn-warning">VER</a>
                                {{-- <a href="{{route('details.profiles.index',$value->id)}}" class="btn btn-success">Detalhes</a> --}}
                                <a href="{{route('profiles.edit',$value->id)}}" class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!!$profiles->appends($filters)->links()!!}
            @else
                {!!$profiles->links()!!}
            @endif
        </div>
    </div>
@stop

