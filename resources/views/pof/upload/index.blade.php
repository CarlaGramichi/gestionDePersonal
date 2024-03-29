@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.7/dist/sweetalert2.min.css">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">P.O.F.</li>
        <li class="breadcrumb-item">Cargar documento de P.O.F.</li>
    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    <div class="col-sm-12 text-right mb-5">
        <a href="{{ route('pof.documents.create') }}" class="btn btn-success btn-lg">
            Nuevo&emsp;<span class="fa fa-plus"></span>
        </a>
    </div>

    <div class="col-sm-12">

        <table class="table table-bordered table-striped" id="table">
            <thead>
            <tr>
                <th>Año</th>
                <th>Tipo</th>
                <th>Nivel</th>
                <th>Turno</th>
                <th>Archivo</th>
                <th></th>
            </tr>
            </thead>
        </table>

    </div>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.7/dist/sweetalert2.min.js"></script>
    <script>
        let table = $('#table');
        let dataTable;
        $(document).ready(function () {
            $(function () {
                dataTable = table.DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('pof.documents.index') !!}',
                    columnDefs: [
                        {
                            targets: -1,
                            data: null,
                            defaultContent: renderButton('Borrar&emsp;<span class="fa fa-trash"></span>', 'remove', 'danger'),
                            orderable: false,
                        },
                    ],
                    columns: [
                        {data: 'year', name: 'year'},
                        {data: 'type', name: 'type', class: 'text-capitalize'},
                        {data: 'level.name', name: 'level_id'},
                        {data: 'shift.name', name: 'shift_id'},
                        {
                            data: 'file', name: 'file', class: 'text-center',
                            fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                                $(nTd).html(`<a href="{{ asset('uploads/${oData.file}') }}" class="btn btn-danger" target="_blank" download>Descargar <span class="fa fa-download"></span></a>`);
                            }
                        },
                        {data: '', class: 'text-center'}
                    ]
                })
                    .on('click', '.remove', function () {
                        let row = dataTable.row($(this).parents('tr')).data();

                        tableRemove(
                            `documents/${row.id}`,
                            {},
                            '{{csrf_token()}}',
                            'Eliminar documento de P.O.F.',
                            'Está por eliminar un documento de P.O.F.<br><strong class="text-danger">Ésta operación no se puede deshacer</strong>.<br>¿Desea continuar?',
                            dataTable,
                        );
                    });
            });

        })
    </script>
@endsection