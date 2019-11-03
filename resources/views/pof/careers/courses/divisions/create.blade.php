@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">P.O.F.</li>
        <li class="breadcrumb-item"><a href="{{ route('pof.careers.index') }}">Carreras</a></li>
        <li class="breadcrumb-item">{{ $career->name }}</li>
        <li class="breadcrumb-item">Cursos</li>
        <li class="breadcrumb-item">{{ $course->name }}</li>
        <li class="breadcrumb-item">Divisiones</li>
        <li class="breadcrumb-item">Nueva división</li>
    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    {!! Form::open(['url' => "pof/careers/{$career->id}/courses/{$course->id}/divisions"]) !!}

    <div class="card">

        <div class="card-header">
            <strong>Ingresar los datos de la división</strong>
        </div>

        <div class="card-body">

            <div class="row">

                @include('pof.careers.courses.divisions.partials.form')

            </div>

            <a href="{{ url("pof/careers/{$career->id}/courses/{$course->id}/divisions") }}" class="btn btn-danger float-left">Cancelar&emsp;<span class="fa fa-times"></span></a>

            <button type="submit" class="btn btn-primary float-right">Guardar&emsp;<span class="fa fa-save"></span></button>

        </div>

    </div>

    {!! Form::close() !!}

@endsection