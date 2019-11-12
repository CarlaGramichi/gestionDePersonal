@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Ajustes</li>
        <li class="breadcrumb-item"><a href="{{ route('institutions.index') }}">Instituciones</a></li>
        <li class="breadcrumb-item">Dar de alta una institución</li>
    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    {!! Form::open(['route' => 'institutions.store']) !!}

    <div class="card">

        <div class="card-header">
            <strong>Ingresar los datos de la institución</strong>
        </div>

        <div class="card-body">

            <div class="row">

                @include('institutions.partials.form')

            </div>

            <a href="{{ route('institutions.index') }}" class="btn btn-danger float-left">Cancelar&emsp;<span class="fa fa-times"></span></a>

            <button type="submit" class="btn btn-primary float-right">Guardar&emsp;<span class="fa fa-save"></span></button>

        </div>

    </div>

    {!! Form::close() !!}

@endsection