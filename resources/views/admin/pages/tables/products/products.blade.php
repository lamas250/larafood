@extends('adminlte::page')

@section('title', 'Adicionar Produtos a Categorias')


@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorias</a></li>
        <li class="breadcrumb-item active"><a href=""></a>Produtos da Categoria</li>
    </ol>
    
    <h1>Produtos da categoria <strong>{{ $category->name }}</strong></h1>
@stop


@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{ $category->name }}
                            </td>
                            <td style="width=10px;">
                                <a href="{{ route('categories.products.detach', [$category->id, $product->id]) }}" class="btn btn-danger">Remover</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $categories->appends($filters)->links() !!}
            @else
                {!! $categories->links() !!}
            @endif
        </div>
    </div>
@stop