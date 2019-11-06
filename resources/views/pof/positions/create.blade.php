@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">P.O.F.</li>
        <li class="breadcrumb-item"><a href="{{ route('pof.positions.index') }}">Cargos</a></li>
        <li class="breadcrumb-item">Dar de alta un cargo</li>
    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    {!! Form::open(['route' => 'pof.positions.store']) !!}

    <div class="card">

        <div class="card-header">
            <strong>Ingresar los datos del cargo</strong>
        </div>

        <div class="card-body">

            <div class="row">

                @include('pof.positions.partials.form')

            </div>

            <button type="submit" class="btn btn-primary float-right">Guardar&emsp;<span class="fa fa-save"></span></button>

        </div>

    </div>

    {!! Form::close() !!}

@endsection