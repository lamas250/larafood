@extends('adminlte::page')

@section('title', "Permissões do perfil {$profile->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}">Perfis</a></li>
    </ol>
    
    <h1>Permissões do perfil <b>{{$profile->name}}</b>
        <a href="{{route('profiles.permissions.available',$profile->id)}}" class="btn btn-dark"><i class="fas fa-plus"></i> ADD</a>
    </h1>
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
                    @foreach ($permissions as $value)
                        <tr>
                            <td>{{$value->name}}</td>
                            <td style="width: 250px;">
                                <a href="{{route('profiles.permissions.detach',['id'=>$profile->id,'idPermission'=>$value->id])}}" class="btn btn-danger">Remover</a>
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

