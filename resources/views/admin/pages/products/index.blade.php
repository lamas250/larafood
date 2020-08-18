@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('products.index')}}">Produtos</a></li>
    </ol>
    
    <h1>Produtos <a href="{{route('products.create')}}" class="btn btn-dark"><i class="fas fa-plus"></i> ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{route('products.search')}}" class="form form-inline" method="POST">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i> Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Nome</th>
                        {{-- <th>Preço</th> --}}
                        {{-- <th>Descricão</th> --}}
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $value)
                        <tr>
                            <td><img src="{{url("storage/{$value->image}")}}" style="max-width: 90px;"></td>
                            <td>{{$value->name}}</td>
                            <td style="width: 250px;">
                                <a href="{{route('products.show',$value->id)}}" class="btn btn-warning">VER</a>
                                <a href="{{route('products.edit',$value->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('products.categories',$value->id)}}" class="btn btn-success"><i class="fas fa-layer-group"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!!$products->appends($filters)->links()!!}
            @else
                {!!$products->links()!!}
            @endif
        </div>
    </div>
@stop

