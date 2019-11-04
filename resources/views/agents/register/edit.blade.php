@extends('layouts.app')


@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Agentes</li>
        <li class="breadcrumb-item">Editar un agente</li>
    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    {!! Form::model($agent,['route' => ['agents.update', $agent->id],'class'=>'col-sm-12', 'method'=>'PUT'])  !!}

    @include('agents.register.partials.form')



    {!! Form::close() !!}
@endsection