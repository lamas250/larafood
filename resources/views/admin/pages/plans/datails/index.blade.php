@extends('adminlte::page')

@section('title', "Detalhes do Plano {$plan->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item "><a href="{{route('plans.index')}}" >Planos</a></li>
    <li class="breadcrumb-item "><a href="{{route('plans.show',$plan->id)}}" >{{$plan->name}}</a></li>
    <li class="breadcrumb-item active"><a href="{{route('details.plans.index',$plan->url)}}" >Detalhes</a></li>
</ol>

    <h1>Detalhes do Plano <a href="{{route('plans.create')}}" class="btn btn-dark"><i class="fas fa-plus"></i> ADD</a></h1>
@stop

@section('content')
    <div class="card">
    
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $value)
                        <tr>
                            <td>{{$value->name}}</td>
                            <td style="width: 150px;">
                                <a href="{{route('plans.show',$value->url)}}" class="btn btn-warning">VER</a>
                                <a href="{{route('plans.edit',$value->url)}}" class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!!$datails->appends($filters)->links()!!}
            @else
                {!!$datails->links()!!}
            @endif
        </div>
    </div>
@stop

