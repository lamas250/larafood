@extends('adminlte::page')

@section('title', "Detalhes do Plano {$plan->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item "><a href="{{route('plans.index')}}" >Planos</a></li>
    <li class="breadcrumb-item "><a href="{{route('plans.show',$plan->url)}}" >{{$plan->name}}</a></li>
    <li class="breadcrumb-item active"><a href="{{route('details.plan.index',$plan->url)}}" >Detalhes</a></li>
</ol>

    <h1>Detalhes do Plano <a class="btn btn-dark" href="{{Route('details.plan.create',$plan->url)}}"><i class="fas fa-plus"></i> ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            @include('admin.includes.alerts')
            
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
                                <a href="{{route('details.plan.show',['url'=>$plan->url,'idDetail'=>$value->id])}}" class="btn btn-warning">VER</a>
                                <a href="{{route('details.plan.edit',['url'=>$plan->url,'idDetail'=>$value->id])}}" class="btn btn-info">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!!$details->appends($filters)->links()!!}
            @else
                {!!$details->links()!!}
            @endif
        </div>
    </div>
@stop

