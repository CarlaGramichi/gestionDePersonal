@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">P.O.F.</li>
        <li class="breadcrumb-item"><a href="{{ route('pof.careers.index') }}">Carreras</a></li>
        <li class="breadcrumb-item">{{ $career->name }}</li>
        <li class="breadcrumb-item">Cursos</li>
        <li class="breadcrumb-item">Nuevo curso</li>
    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    {!! Form::open(['url' => "pof/careers/{$career->id}/courses"]) !!}

    <div class="card">

        <div class="card-header">
            <strong>Ingresar los datos del curso de la carrera {{ $career->name }}</strong>
        </div>

        <div class="card-body">

            <div class="row">

                @include('pof.careers.courses.partials.form')

            </div>

            <button type="submit" class="btn btn-primary float-right">Guardar&emsp;<span class="fa fa-save"></span></button>

        </div>

    </div>

    {!! Form::close() !!}

@endsection