@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.7/dist/sweetalert2.min.css">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">P.O.F.</li>
        <li class="breadcrumb-item"><a href="{{ route('pof.positions.index') }}">Cargos</a></li>
        <li class="breadcrumb-item">{{ $position->name }}</li>
        <li class="breadcrumb-item">Documentos</li>
    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    <div class="col-sm-12 text-right mb-3 overflow-hidden">

        <div class="form-group col-sm-4 float-left text-left  mb-3 overflow-hidden">
            <a href="{{ route("pof.positions.index") }}" class="btn btn-lg btn-dark">
                <span class="fa fa-arrow-left"></span>&emsp;Volver
            </a>
        </div>

        <div class="form-group col-sm-4 float-right text-right">
            <a href="{{ route("pof.positions.{position}.documents.create", ['position'=>$position->id]) }}"
               class="btn btn-success btn-lg">
                Nuevo&emsp;<span class="fa fa-plus"></span>
            </a>
        </div>

    </div>

    <div class="col-sm-12">

        <table class="table table-bordered table-striped" id="table">
            <thead>
            <tr>
                <th>Año</th>
                <th>Cargo</th>
                <th>Documento</th>
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
        let dataTable;
        $(document).ready(function () {

            dataTable = table.DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{!! route("pof.positions.{position}.documents.index",['position'=>$position->id]) !!}',
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
                    {data: 'position.year', name: 'position.year'},
                    {data: 'position.name', name: 'position.name'},
                    {data: 'document.name', name: 'document.name'},
                    {
                        data: '', class: 'text-center',
                        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                            $(nTd).append(renderButton('Borrar&emsp;<span class="fa fa-trash"></span>', 'remove', 'danger'));
                        }
                    }
                ]
            })
                .on('click', '.edit', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    httpRedirect(`types/${row.id}/edit`);
                })
                .on('click', '.remove', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    tableRemove(
                        `documents/${row.id}`,
                        {},
                        '{{csrf_token()}}',
                        `Eliminar documento ${row.document.name} del cargo ${row.document.name}`,
                        `Está por eliminar el documento ${row.document.name} del cargo ${row.document.name}<br><strong class="text-danger">Ésta operación no se puede deshacer</strong>.<br>¿Desea continuar?`,
                        dataTable,
                    );
                });

        })
    </script>
@endsection
