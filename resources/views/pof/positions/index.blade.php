@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.7/dist/sweetalert2.min.css">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">P.O.F.</li>
        <li class="breadcrumb-item">Cargos</li>
    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    <div class="col-sm-12 text-right mb-3 overflow-hidden">
        <div class="form-group col-sm-4 float-left text-left">
            <label for="year">Filtrar por año</label>

            <select class="form-control" id="year">
                @foreach($years as $year)
                    <option value="{{ $year }}" {{ $year == now()->format('Y') ? 'selected' : '' }}>{{ $year }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-sm-4 float-right text-right">
            <label>&nbsp;</label>
            <div class="clearfix"></div>
            <a href="{{ route('pof.positions.create') }}" class="btn btn-success btn-lg">
                Nuevo&emsp;<span class="fa fa-plus"></span>
            </a>
        </div>
    </div>

    <div class="col-sm-12 table-responsive">

        <table class="table table-bordered table-striped" id="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Año</th>
                <th>Cargo</th>
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
                    url: '{!! route('pof.positions.index') !!}',
                    data: function (d) {
                        d.year = year_selector.val();
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
                    {data: 'id', name: 'id'},
                    {data: 'year', name: 'year'},
                    {data: 'name', name: 'name'},
                    {
                        data: '', class: 'text-center',
                        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                            $(nTd).append(renderButton('Subcargo&emsp;<span class="fa fa-calendar-check"></span>', 'position_type mr-2', 'warning'));
                            $(nTd).append(renderButton('Documentos&emsp;<span class="fa fa-file-archive"></span>', 'documents mr-2', 'dark'));
                            $(nTd).append(renderButton('Editar&emsp;<span class="fa fa-edit"></span>', 'edit mr-2', 'info'));
                            $(nTd).append(renderButton('Borrar&emsp;<span class="fa fa-trash"></span>', 'remove', 'danger'));
                        }
                    }
                ]
            })
                .on('click', '.position_type', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    httpRedirect(`positions/${row.id}/types`);
                })
                .on('click', '.documents', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    httpRedirect(`positions/${row.id}/documents`);
                })
                .on('click', '.edit', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    httpRedirect(`positions/${row.id}/edit`);
                })
                .on('click', '.remove', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    tableRemove(
                        `positions/${row.id}`,
                        {},
                        '{{csrf_token()}}',
                        `Eliminar cargo ${row.name}`,
                        `Está por eliminar el cargo ${row.name}<br><strong class="text-danger">Ésta operación no se puede deshacer</strong>.<br>¿Desea continuar?`,
                        dataTable,
                    );
                });

        })
    </script>
@endsection
