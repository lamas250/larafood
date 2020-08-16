@extends('adminlte::page')

@section('title', "Permissões disponíveis para perfil {$profile->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('profiles.index')}}">Perfis</a></li>
    </ol>
    
    <h1>Permissões disponiveis para perfil <b>{{$profile->name}}</b>
        
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('profiles.permissions.available',$profile->id)}}" class="form form-inline" method="POST">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i> Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="50px">#</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                  <form action="{{route('profiles.permissions.attach',$profile->id)}}" method="POST">
                      @csrf
                    @foreach ($permissions as $value)
                        <tr>
                            <td>
                                <input type="checkbox" name="permissions[]" value="{{$value->id}}">
                            </td>
                            <td>{{$value->name}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="500">
                            @include('admin.includes.alerts')
                            <button type="submit" class="btn btn-info">Vincular</button>
                        </td>
                    </tr>
                  </form>
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
