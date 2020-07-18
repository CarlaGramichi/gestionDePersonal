@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
@endsection

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

@section('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/inputmask/inputmask.min.js') }}"></script>
@endsection