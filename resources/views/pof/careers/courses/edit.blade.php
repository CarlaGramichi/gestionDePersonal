@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">P.O.F.</li>
        <li class="breadcrumb-item"><a href="{{ route('pof.careers.index') }}">Carreras</a></li>
        <li class="breadcrumb-item">{{ $career->name }}</li>
        <li class="breadcrumb-item">Cursos</li>
        <li class="breadcrumb-item">Editar curso {{ $course->name }}</li>
    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    {!! Form::model($course, ['url' => ["pof/careers/{$career->id}/courses", $course->id], 'method' => 'PUT']) !!}

    <div class="card">

        <div class="card-header">
            <strong>Actualizar los datos del curso {{ $course->name }}</strong>
        </div>

        <div class="card-body">

            <div class="row">

                @include('pof.careers.courses.partials.form')

            </div>

            <a href="{{ url("pof/careers/{$career->id}/courses") }}" class="btn btn-danger float-left">Cancelar&emsp;<span class="fa fa-times"></span></a>

            <button type="submit" class="btn btn-primary float-right">Actualizar&emsp;<span class="fa fa-save"></span></button>

        </div>

    </div>

    {!! Form::close() !!}

@endsection