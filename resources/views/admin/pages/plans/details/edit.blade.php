@extends('adminlte::page')

@section('title', "Editar detalhe {$detail->name}")

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
    <li class="breadcrumb-item "><a href="{{route('plans.index')}}" >Planos</a></li>
    <li class="breadcrumb-item "><a href="{{route('plans.show',$plan->id)}}" >{{$plan->name}}</a></li>
    <li class="breadcrumb-item active"><a href="{{route('details.plan.index',$plan->url)}}" >Detalhes</a></li>
    <li class="breadcrumb-item active"><a href="{{route('details.plan.edit',['url'=>$plan->url,'idDetail'=>$detail->id])}}" >Editar</a></li>
</ol>

    <h1>Editar detalhe {{$detail->name}} </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('details.plan.update',['url'=>$plan->url,'idDetail'=>$detail->id])}}" method="post" class="form">
                @method('PUT')
                @include('admin.pages.plans.details.partials.form')
            </form>
        </div>
    </div>
@endsection