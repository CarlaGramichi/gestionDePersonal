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
    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    <div class="col-sm-12 text-right mb-3 overflow-hidden">

        <div class="form-group col-sm-4 float-right text-right">
            <a href="{{ url("pof/careers/{$career->id}/courses/create") }}" class="btn btn-success btn-lg">
                Nuevo&emsp;<span class="fa fa-plus"></span>
            </a>
        </div>
    </div>

    <div class="col-sm-12">

        <table class="table table-bordered table-striped" id="table">
            <thead>
            <tr>
                <th>Año</th>
                <th>Carrera</th>
                <th>Curso</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
        </table>

    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.7/dist/sweetalert2.min.js"></script>
    <script>
        let table = $('#table');
        let year_selector = $('select#year');
        let dataTable;
        $(document).ready(function () {

            year_selector.change(function () {
                dataTable.ajax.reload();
            });

            dataTable = table.DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{!! url("pof/careers/{$career->id}/courses") !!}',
                    data: function (d) {
                        d.career_id = '{{ $career->id }}';
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
                    {data: 'career.year', name: 'career.year'},
                    {data: 'career.name', name: 'career_id'},
                    {data: 'name', name: 'name'},
                    {
                        data: '', class: 'text-center',
                        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                            $(nTd).append(renderButton('Divisiones&emsp;<span class="fa fa-calendar-check"></span>', 'divisions mr-2', 'warning'));
                            $(nTd).append(renderButton('Editar&emsp;<span class="fa fa-edit"></span>', 'edit mr-2', 'info'));
                            $(nTd).append(renderButton('Borrar&emsp;<span class="fa fa-trash"></span>', 'remove', 'danger'));
                        }
                    }
                ]
            })
                .on('click', '.divisions', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    httpRedirect(`careers/${row.id}/years`);
                })
                .on('click', '.edit', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    httpRedirect(`courses/${row.id}/edit`);
                })
                .on('click', '.remove', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    tableRemove(
                        `courses/${row.id}`,
                        {},
                        '{{csrf_token()}}',
                        `Eliminar curso ${row.name}`,
                        `Está por eliminar el curso ${row.name}<br><strong class="text-danger">Ésta operación no se puede deshacer</strong>.<br>¿Desea continuar?`,
                        dataTable,
                    );
                });

        })
    </script>
@endsection
