@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Agentes</li>
        <li class="breadcrumb-item">Asignar propuesta a un agente</li>
        <li class="breadcrumb-item">{{ $position->name }}</li>
        <li class="breadcrumb-item">{{ $agent->name }}</li>
        <li class="breadcrumb-item">Cargar datos de la propuesta</li>
    </ol>
@endsection

@section('content')

    {!! Form::open(['route' => ['agents.assign.positions.{position}.types.agents','position'=>$position->id],'class'=>'col-sm-12','method'=>'GET']) !!}

    <div class="card">

        <div class="card-header">
            <strong>Seleccionar una asignatura</strong>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="form-group col-sm-4">
                    {!! Form::label(null, 'Cargo') !!}

                    <p><strong>{{ $position->name }}</strong></p>
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label(null, 'Subcargo') !!}

                    <p><strong>{{ $positionType->name }}</strong></p>
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label(null, 'Agente') !!}

                    <p><strong>{{ $agent->name }}</strong></p>
                </div>

                <div class="form-group col-sm-12">
                    <hr>
                </div>

                <div class="form-group col-sm-3">
                    {!! Form::label('year', 'Año') !!}

                    {!! Form::select('year',$years, now()->format('Y'), ['class' => 'form-control','placeholder'=>'Seleccionar', 'required']) !!}
                </div>

                <div class="form-group col-sm-9"></div>

                <div class="form-group col-sm-3">
                    {!! Form::label('career_id', 'Carrera') !!}

                    {!! Form::select('career_id', [], null, ['class' => 'form-control','placeholder'=>'Seleccionar', 'required']) !!}
                </div>

                <div class="form-group col-sm-3">
                    {!! Form::label('course_id', 'Curso') !!}

                    {!! Form::select('course_id', [], null, ['class' => 'form-control','placeholder'=>'Seleccionar', 'required']) !!}
                </div>

                <div class="form-group col-sm-3">
                    {!! Form::label('division_id', 'División') !!}

                    {!! Form::select('division_id', [], null, ['class' => 'form-control','placeholder'=>'Seleccionar', 'required']) !!}
                </div>

                <div class="form-group col-sm-3">
                    {!! Form::label('subject_id', 'Asignatura') !!}

                    {!! Form::select('subject_id', [], null, ['class' => 'form-control','placeholder'=>'Seleccionar', 'required']) !!}
                </div>

            </div>

            <a href="{{ url()->previous()  }}" class="btn btn-danger float-left"><span class="fa fa-arrow-left"></span>&emsp;Volver</a>

            <button type="submit" class="btn btn-primary float-right">Continuar&emsp;<span
                        class="fa fa-arrow-right"></span></button>

        </div>

        {!! Form::close() !!}
    </div>

@endsection

@section('scripts')
    <script>
        let form = $('form');
        let year = form.find('#year option:selected').val();

        $('document').ready(function () {
            if (year) {
                getCareers(year);
            }

            form.find('#year').change(function () {
                if ($(this).val()) {
                    getCareers($(this).val());
                }
            });

            form.find('#career_id').change(function () {
                if ($(this).val()) {
                    getCourses($(this).val());
                }
            });

            form.find('#course_id').change(function () {
                if ($(this).val()) {
                    getDivisions(form.find('#career_id option:selected').val(), $(this).val());
                }
            });

            form.find('#division_id').change(function () {
                if ($(this).val()) {
                    getSubjects(
                        form.find('#career_id option:selected').val(),
                        form.find('#course_id option:selected').val(),
                        $(this).val()
                    );
                }
            });
        });

        function getCareers(year) {
            $.ajax({
                async: true,
                url: `${baseUri}/pof/careers`,
                data: {
                    year: year,
                    table: false,
                },
                type: 'GET',
                dataType: 'json',
                beforeSend: function () {
                    form.find('#career_id').html('<option value="">Seleccionar</option>');
                },
                success: function (response) {
                    if (response) {
                        $.each(response, function (id, name) {
                            form.find('#career_id').append(`<option value="${id}">${name}</option>`)
                        });
                    }
                }
            });
        }

        function getCourses(career_id) {
            $.ajax({
                async: true,
                url: `${baseUri}/pof/careers/${career_id}/courses`,
                type: 'get',
                data: {
                    table: false,
                },
                dataType: 'json',
                beforeSend: function () {
                    form.find('#course_id').html('<option value="">Seleccionar</option>');
                },
                success: function (response) {
                    if (response) {
                        $.each(response, function (id, name) {
                            form.find('#course_id').append(`<option value="${id}">${name}</option>`)
                        });
                    }
                }
            });
        }

        function getDivisions(career_id, course_id) {
            $.ajax({
                async: true,
                url: `${baseUri}/pof/careers/${career_id}/courses/${course_id}/divisions`,
                type: 'GET',
                data: {
                    table: false,
                },
                dataType: 'json',
                beforeSend: function () {
                    form.find('#division_id').html('<option value="">Seleccionar</option>');
                },
                success: function (response) {
                    if (response) {
                        $.each(response, function (id, name) {
                            form.find('#division_id').append(`<option value="${id}">${name}</option>`)
                        });
                    }
                }
            });
        }

        function getSubjects(career_id, course_id, division_id) {
            $.ajax({
                async: true,
                url: `${baseUri}/pof/careers/${career_id}/courses/${course_id}/subjects`,
                type: 'GET',
                data: {
                    career_course_division_id: division_id,
                    table: false,
                },
                dataType: 'json',
                beforeSend: function () {
                    form.find('#subject_id').html('<option value="">Seleccionar</option>');
                },
                success: function (response) {
                    if (response) {
                        $.each(response, function (id, name) {
                            form.find('#subject_id').append(`<option value="${id}">${name}</option>`)
                        });
                    }
                }
            });
        }
    </script>
@endsection