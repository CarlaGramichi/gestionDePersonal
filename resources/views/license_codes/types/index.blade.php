@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.7/dist/sweetalert2.min.css">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Códigos de Licencias</li>
        <li class="breadcrumb-item">Tipos</li>
    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    <div class="col-sm-12 text-right mb-3 overflow-hidden">

        <div class="form-group col-sm-4 float-right text-right">
            <label>&nbsp;</label>
            <div class="clearfix"></div>
            <a href="{{ route('license_codes_types.create') }}" class="btn btn-success btn-lg">
                Nuevo&emsp;<span class="fa fa-plus"></span>
            </a>
        </div>
    </div>

    <div class="col-sm-12">

        <table class="table table-bordered table-striped" id="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th class="text-center" width="250">Acciones</th>
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
                    url: '{!! route('license_codes_types.index') !!}'

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
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
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

                    httpRedirect(`license_codes_types/${row.id}/edit`);
                })
                .on('click', '.remove', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    tableRemove(
                        `license_codes_types/${row.id}`,
                        {},
                        '{{csrf_token()}}',
                        `Eliminar código ${row.code}`,
                        `Está por eliminar el código de licencia ${row.code}<br><strong class="text-danger">Ésta operación no se puede deshacer</strong>.<br>¿Desea continuar?`,
                        dataTable,
                    );
                });

        })
    </script>
@endsection

