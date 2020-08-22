@extends('layouts.app')

@section('content')

    @include('partials.alerts')

    {!! Form::open(['route' => ['students.{student}.assign.store','student'=>$student->id]]) !!}

    <div class="card">

        <div class="card-header">
            <strong>Asignar a {{ isset($student) ? $student->name : '' }}</strong>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="form-group col-sm-12">
                    <p>DNI: <strong>{{ $student->identification }}</strong></p>
                    <p>Nombre: <strong>{{ $student->name }}</strong></p>
                    <p>Fecha de nacimiento: <strong>{{ !$student->born_date ?: $student->born_date->format('d/m/Y') }}</strong></p>
                    <p>E-mail: <strong>{{ $student->email }}</strong></p>
                    <p>Teléfono: <strong>{{ $student->phone }}</strong></p>
                    <p>Domicilio: <strong>{{ $student->address }} - {{ $student->city }}
                            - {{ $student->state }}</strong></p>
                </div>


            </div>

        </div>

    </div>

    <div class="card">

        <div class="card-header">
            <strong>Seleccionar asignatura</strong>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="form-group col-sm-4">
                    {!! Form::label('year', 'Año') !!}

                    {!! Form::select('year',$years, now()->format('Y'), ['class' => 'form-control year-selector','placeholder'=>'Seleccionar', 'required']) !!}
                </div>

                <div class="form-group col-sm-6">
                    {!! Form::label('career_id', 'Carrera') !!}

                    {!! Form::select('career_id', [], null, ['class' => 'form-control career_id-selector','placeholder'=>'Seleccionar', 'required']) !!}
                </div>

                </div>

        </div>

    </div>

    @include('partials.form_buttons',['route'=>'students.index'])

    {!! Form::close() !!}

@endsection

@section('scripts')
    <script src="{{ asset('js/career_selectors.js') }}"></script>
    <script>
        $('form').submit(function () {
            $('.loader-container').show();
        })
    </script>
@endsection
