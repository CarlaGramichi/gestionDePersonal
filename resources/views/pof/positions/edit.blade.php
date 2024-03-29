@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">P.O.F.</li>
        <li class="breadcrumb-item"><a href="{{ route('pof.careers.index') }}">Cargos</a></li>
        <li class="breadcrumb-item">Editar cargo {{ $position->name }}</li>
    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    {!! Form::model($position,['route' => ['pof.positions.update', $position->id], 'method' => 'PUT']) !!}

    <div class="card">

        <div class="card-header">
            <strong>Actualizar los datos del cargo</strong>
        </div>

        <div class="card-body">

            <div class="row">

                @include('pof.positions.partials.form')

            </div>

            <a href="{{ route('pof.positions.index') }}" class="btn btn-danger float-left">Cancelar&emsp;<span class="fa fa-times"></span></a>

            <button type="submit" class="btn btn-primary float-right">Actualizar&emsp;<span class="fa fa-save"></span></button>

        </div>

    </div>

    {!! Form::close() !!}

@endsection