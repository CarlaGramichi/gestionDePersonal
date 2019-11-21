@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.7/dist/sweetalert2.min.css">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Panel de control</li>
        <li class="breadcrumb-item">Documentos</li>
    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    <div class="col-sm-12 text-right mb-3 overflow-hidden">
        <a href="{{ route('documents.create') }}" class="btn btn-primary float-right">
            Nuevo&emsp;<span class="fa fa-plus"></span>
        </a>
    </div>

    <div class="col-sm-12 col-lg-12">

        <table class="table table-bordered table-striped" id="users-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Auto generado</th>
                <th>Acciones</th>
            </tr>
            </thead>
        </table>

    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.7/dist/sweetalert2.min.js"></script>
    <script>
        let table = $('#users-table');
        let dataTable;

        $(document).ready(function () {

            dataTable = table.DataTable({
                processing: true,
                serverSide: true,
                order: [1, 'ASC'],
                ajax: '{!! route('documents.index') !!}',
                columnDefs: [
                    {
                        targets: -1,
                        data: null,
                        defaultContent: '',
                        orderable: false,
                    },
                ],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {
                        data: 'auto_generate', name: 'auto_generate', class: 'text-center',
                        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                            $(nTd).html(parseInt(oData.auto_generated) ? 'Si' : 'No');
                        }
                    },
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

                    httpRedirect(`documents/${row.id}/edit`);
                })
                .on('click', '.remove', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    tableRemove(
                        `documents/${row.id}`,
                        {},
                        '{{csrf_token()}}',
                        `Eliminar documento ${row.name}`,
                        `Está por eliminar un documento ${row.name}<br><strong class="text-danger">Ésta operación no se puede deshacer</strong>.<br>¿Desea continuar?`,
                        dataTable,
                    );
                });
        });
    </script>
@endsection