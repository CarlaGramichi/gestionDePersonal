@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Códigos de Licencias</li>
        <li class="breadcrumb-item">Editar un código</li>
    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    {!! Form::model($licenseCode,['route' => ['license_codes.update', $licenseCode->id], 'method' => 'PUT']) !!}
    <div class="card">

        <div class="card-header">
            <strong>Actualizar los datos del código</strong>
        </div>

        <div class="card-body">
            <div class="row">

                @include('license_codes.partials.form')

            </div>

            <a href="{{ route('license_codes.index') }}" class="btn btn-danger float-left">Cancelar&emsp;<span
                        class="fa fa-times"></span></a>

            <button type="submit" class="btn btn-primary float-right">Actualizar&emsp;<span class="fa fa-save"></span>
            </button>
        </div>

    </div>


    {!! Form::close() !!}

@endsection



@section('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/inputmask/inputmask.min.js') }}"></script>
@endsection