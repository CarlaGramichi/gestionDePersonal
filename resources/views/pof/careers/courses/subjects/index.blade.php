@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.7/dist/sweetalert2.min.css">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">P.O.F.</li>
        <li class="breadcrumb-item"><a href="{{ route('pof.careers.index') }}">Carreras</a></li>
        <li class="breadcrumb-item">{{ $career->name }}</li>
        <li class="breadcrumb-item">Cursos</li>
        <li class="breadcrumb-item">{{ $course->name }}</li>
        <li class="breadcrumb-item">Asignaturas</li>
    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    <div class="col-sm-12 text-right mb-3 overflow-hidden">

        <div class="form-group col-sm-4 float-left text-left">
            <a href="{{ url("pof/careers/{$career->id}/courses/") }}" class="btn btn-lg btn-dark">
                <span class="fa fa-arrow-left"></span>&emsp;Volver
            </a>
        </div>

        <div class="form-group col-sm-4 float-right text-right">
            <a href="{{ url("pof/careers/{$career->id}/courses/{$course->id}/subjects/create") }}"
               class="btn btn-success btn-lg">
                Nueva&emsp;<span class="fa fa-plus"></span>
            </a>
        </div>

    </div>

    <div class="col-sm-12 text-left mb-3 overflow-hidden">
        <div class="form-group col-sm-4 float-left text-left">
            <label for="division">Filtrar por división</label>

            <select class="form-control" id="division">
                <option value="">TODAS</option>
                @foreach($course->divisions as $division)
                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-sm-12">

        <table class="table table-bordered table-striped" id="table">
            <thead>
            <tr>
                <th>Año</th>
                <th>Carrera</th>
                <th>Curso</th>
                <th>División</th>
                <th>Asignatura</th>
                <th>Régimen</th>
                <th>Horas cátedra</th>
                <th class="text-center" width="200">Acciones</th>
            </tr>
            </thead>
        </table>

    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.7/dist/sweetalert2.min.js"></script>
    <script>
        let table = $('#table');
        let division_selector = $('select#division');
        let dataTable;
        $(document).ready(function () {

            division_selector.change(function () {
                dataTable.ajax.reload();
            });

            dataTable = table.DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{!! url("pof/careers/{$career->id}/courses/{$course->id}/subjects") !!}',
                    data: function (d) {
                        d.career_course_division_id = division_selector.val();
                        d.table = true;
                    }
                },
                columnDefs: [
                    {
                        targets: -1,
                        data: null,
                        defaultContent: '',
                        orderable: false,
                    },
                ],
                columns: [
                    {data: 'course.career.year', name: 'course.career.year'},
                    {data: 'course.career.name', name: 'course.career.name'},
                    {data: 'course.name', name: 'course_id'},
                    {data: 'division.name', name: 'career_course_division'},
                    {data: 'name', name: 'name'},
                    {data: 'regimen.name', name: 'regimen_id'},
                    {data: 'hours', name: 'hours'},
                    {
                        data: '', class: 'text-center',
                        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                            $(nTd).append(renderButton('Editar&emsp;<span class="fa fa-edit"></span>', 'edit mr-2', 'info'));
                            $(nTd).append(renderButton('Borrar&emsp;<span class="fa fa-trash"></span>', 'remove', 'danger'));
                        }
                    }
                ]
            })
                .on('click', '.edit', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    httpRedirect(`subjects/${row.id}/edit`);
                })
                .on('click', '.remove', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    tableRemove(
                        `subjects/${row.id}`,
                        {},
                        '{{csrf_token()}}',
                        `Eliminar asignatura ${row.name}`,
                        `Está por eliminar la asignatura ${row.name}<br><strong class="text-danger">Ésta operación no se puede deshacer</strong>.<br>¿Desea continuar?`,
                        dataTable,
                    );
                });

        })
    </script>
@endsection
