@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('plans.index')}}" >Planos</a></li>
    </ol>
    
    <h1>Planos <a href="{{route('plans.create')}}" class="btn btn-dark"><i class="fas fa-plus"></i> ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('plans.search')}}" class="form form-inline" method="POST">
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
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $value)
                        <tr>
                            <td>{{$value->name}}</td>
                            <td>{{number_format($value->price,2,',','.')}}</td>
                            <td style="width: 250px;">
                                <a href="{{route('plans.show',$value->url)}}" class="btn btn-warning">VER</a>
                                <a href="{{route('details.plan.index',$value->url)}}" class="btn btn-success">Detalhes</a>
                                <a href="{{route('plans.edit',$value->url)}}" class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!!$plans->appends($filters)->links()!!}
            @else
                {!!$plans->links()!!}
            @endif
        </div>
    </div>
@stop

