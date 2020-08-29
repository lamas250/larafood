@extends('adminlte::page')

@section('title', 'Detalhes do Produto')

@section('content_header')
    <h1>Detalhes da Empresa : <b>{{$tenant->name}}</b> </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <img src="{{url("storage/{$tenant->logo}")}}" style="max-width: 90px;">
                </li>
                <li>
                    <strong>Plano:</strong> {{$tenant->plan->name}}
                </li>
                <li>
                    <strong>Nome:</strong> {{$tenant->name}}
                </li>
                <li>
                    <strong>URL:</strong>:</strong> {{$tenant->url}}
                </li>
                <li>
                    <strong>E-mail:</strong>:</strong> {{$tenant->email}}
                </li>
                <li>
                    <strong>CNPJ:</strong>:</strong> {{$tenant->cnpj}}
                </li>
                <li>
                    <strong>Ativo:</strong>:</strong> {{$tenant->active == 'Y' ? 'SIM' : 'NÃO'}}
                </li>
            </ul>
            <hr>
            <h3>Assinatura:</h3>
            <ul>
                <li>
                    <strong>Data Assinatura:</strong>:</strong> {{$tenant->subscription}}
                </li>
                <li>
                    <strong>Data Expira:</strong>:</strong> {{$tenant->expires_at}}
                </li>
                <li>
                    <strong>Identificador:</strong>:</strong> {{$tenant->subscription_id}}
                </li>
                <li>
                    <strong>Ativo?</strong>:</strong> {{$tenant->subscription_active ? 'SIM' : 'NÃO'}}
                </li>
                <li>
                    <strong>Cancelou?</strong>:</strong> {{$tenant->subscription_suspended ? 'SIM' : 'NÃO'}}
                </li>
            </ul>

            @include('admin.includes.alerts')

            {{-- <form action="{{route('tenants.destroy',$tenant->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
            </form> --}}
        </div>
    </div>

    @endsection