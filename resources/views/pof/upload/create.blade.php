@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">P.O.F.</li>
        <li class="breadcrumb-item">Cargar datos del pof</li>
    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    {!! Form::open(['route' => 'pof.documents.store', 'files' => true]) !!}

    <div class="card">

        <div class="card-header">
            <strong>Cargar datos del P.O.F.</strong>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="form-group col-sm-12 text-center">
                    {!! Form::label('tmp_file', 'Documento PDF') !!}
                    <div class="clearfix"></div>
                    {!! Form::file('tmp_file',['required', 'accept' => 'application/pdf']) !!}
                </div>

                <div class="col-sm-12">
                    <hr>
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label('institution_id', 'Establecimiento') !!}

                    {!! Form::select('institution_id', $institutions, null, ['class' => 'form-control','required','placeholder'=>'Seleccionar']) !!}
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label('cue', 'C.U.E.') !!}

                    {!! Form::text('cue', null, ['class' => 'form-control','required','readonly']) !!}
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label('department', 'Departamento') !!}

                    {!! Form::text('department', null, ['class' => 'form-control','readonly']) !!}
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label('year', 'Ciclo lectivo') !!}

                    {!! Form::selectRange('year', 2018, 2040, now()->year,['class' => 'form-control','required']); !!}
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label('type', 'Tipo') !!}

                    {!! Form::select('type', ['original' => 'Original', 'rectificado' => 'Rectificado'], 'original', ['class' => 'form-control','required']) !!}
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label('date', 'Fecha') !!}

                    {!! Form::text(null, now()->format('d/m/Y'), ['id'=>'date', 'class' => 'form-control date-range-picker date-mask','autocomplete'=>'off','data-field'=>'upload_date','required']) !!}

                    {!! Form::hidden('upload_date',now()->format('Y-d-m')) !!}
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label('level_id', 'Nivel') !!}

                    {!! Form::select('level_id', $levels, null ,['class' => 'form-control','required']) !!}
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label('shift_id', 'Turno') !!}

                    {!! Form::select('shift_id', $shifts, null, ['class' => 'form-control','required']) !!}
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label('total_approved_teaching_positions', 'Total de cargos docentes aprobados') !!}

                    {!! Form::text('total_approved_teaching_positions', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label('total_approved_non_teaching_positions', 'Total de cargos NO docentes aprobados') !!}

                    {!! Form::text('total_approved_non_teaching_positions', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label('total_teaching_approved_hours', 'Total de horas cátedras aprobadas') !!}

                    {!! Form::text('total_teaching_approved_hours', null, ['class' => 'form-control']) !!}
                </div>

            </div>

        </div>

    </div>


    <button type="submit" class="btn btn-primary float-right">Guardar&emsp;<span class="fa fa-save"></span></button>

    {!! Form::close() !!}

@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/inputmask/inputmask.min.js') }}"></script>
    <script>
        let institution_id = $('select#institution_id');
        let form = $('form');

        $(document).ready(function () {
            institution_id.change(function () {
                showInstitution($(this).val());
            });
        });

        function showInstitution(id) {
            $.ajax({
                async: true,
                url: `${baseUri}/institutions/${id}`,
                type: 'GET',
                data: {},
                dataType: 'json',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                beforeSend: function () {
                    form.find('input#cue').val('');
                    form.find('input#department').val('');
                },
                success: function (response) {
                    if (response) {
                        form.find('input#cue').val(response.cue);
                        form.find('input#department').val(response.department);
                    }
                }
            });
        }
    </script>
@endsection