@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Nomenclador de cargos</li>
        <li class="breadcrumb-item">editar horario</li>
    </ol>
@endsection


@section('content')

    @include('partials.alerts')

    {!! Form::model($positionTypeHour, ['route' => ['position_type_hours.update', $positionTypeHour->id], 'files' => true, 'method' => 'PUT']) !!}

    @include('position_type_hours.partials.form')

    <a href="{{ route('position_type_hours.index') }}" class="btn btn-danger float-left">
        Cancelar&emsp;
        <span class="fa fa-times"></span>
    </a>

    <button type="submit" class="btn btn-primary float-right ">
        Actualizar&emsp;<span class="fa fa-save"></span>
    </button>

    {!! Form::close() !!}
@endsection

@section('scripts')
    <script type="text/javascript"
            src="https://cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script>
    <script type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/inputmask/inputmask.min.js') }}"></script>


@endsection
