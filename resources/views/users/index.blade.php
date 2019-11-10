@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.7/dist/sweetalert2.min.css">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            <a href="#">{{__('Users')}}</a>
        </li>
    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    <div class="col-sm-12 text-right mb-3 overflow-hidden">
        <a href="{{ route('users.create') }}" class="btn btn-primary float-right">Nuevo&emsp;<span
                    class="fa fa-plus"></span></a>
    </div>

    <div class="col-sm-12 col-lg-12">

        <table class="table table-bordered table-striped" id="users-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Acceso</th>
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
                ajax: '{!! route('users.index') !!}',
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
                    {data: 'email', name: 'email'},
                    {
                        data: 'roles', name: 'roles',
                        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                            $(nTd).html('-');
                            if (oData.roles[0]) {
                                $(nTd).html(oData.roles[0].name);
                            }
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

                    httpRedirect(`users/${row.id}/edit`);
                })
                .on('click', '.remove', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    tableRemove(
                        `users/${row.id}`,
                        {},
                        '{{csrf_token()}}',
                        `Eliminar usuario ${row.name}`,
                        `Está por eliminar un usuario ${row.name}<br><strong class="text-danger">Ésta operación no se puede deshacer</strong>.<br>¿Desea continuar?`,
                        dataTable,
                    );
                });
        });
    </script>
@endsection