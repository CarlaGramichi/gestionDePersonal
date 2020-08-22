@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Ajustes</li>
        <li class="breadcrumb-item">Instituciones</li>
    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    <div class="col-sm-12 text-right mb-3 overflow-hidden">

        <div class="form-group col-sm-4 float-right text-right">
            <label>&nbsp;</label>
            <div class="clearfix"></div>
            <a href="{{ route('institutions.create') }}" class="btn btn-success btn-lg">
                Nueva&emsp;<span class="fa fa-plus"></span>
            </a>
        </div>
    </div>

    <div class="col-sm-12">

        <table class="table table-bordered table-striped" id="table">
            <thead>
            <tr>
                <th>C.U.E.</th>
                <th>Nombre</th>
                <th>Departamento</th>
                <th>Ciudad</th>
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
                    url: '{!! route('institutions.index') !!}',
                    data: function (d) {
                        // d.year = year_selector.val();
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
                    {data: 'cue', name: 'cue'},
                    {data: 'name', name: 'name'},
                    {data: 'department', name: 'department'},
                    {data: 'city', name: 'city'},
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

                    httpRedirect(`institutions/${row.id}/edit`);
                })
                .on('click', '.remove', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    tableRemove(
                        `institutions/${row.id}`,
                        {},
                        '{{ csrf_token() }}',
                        `Eliminar institución ${row.name}`,
                        `Está por eliminar la institución ${row.name}<br><strong class="text-danger">Ésta operación no se puede deshacer</strong>.<br>¿Desea continuar?`,
                        dataTable,
                    );
                });

        })
    </script>
@endsection
