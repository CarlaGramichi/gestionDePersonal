@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Nomenclador de cargos</li>
        <li class="breadcrumb-item">Nuevo horario</li>
    </ol>
@endsection


@section('content')

    @include('partials.alerts')

    {!! Form::open(['route' => 'institutional_hours.store', 'files' => true]) !!}

    @include('institutional_hours.partials.form')

    <a href="{{ route('institutional_hours.index') }}" class="btn btn-danger float-left">Cancelar&emsp;<span
            class="fa fa-times"></span></a>

    <button type="submit" class="btn btn-primary float-right ">
        Guardar&emsp;<span class="fa fa-save"></span>
    </button>

    {!! Form::close() !!}
@endsection

@section('scripts')

@endsection
