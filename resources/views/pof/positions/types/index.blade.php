@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.7/dist/sweetalert2.min.css">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">P.O.F.</li>
        <li class="breadcrumb-item"><a href="{{ route('pof.positions.index') }}">Cargos</a></li>
        <li class="breadcrumb-item">{{ $position->name }}</li>
        <li class="breadcrumb-item">Subcargos</li>
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
            <a href="{{ route("pof.positions.{position}.types.create", ['position'=>$position->id]) }}"
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
                <th>Subcargo</th>
                <th>Cantidad</th>
                <th>Puntos</th>
                <th>Tot. puntos</th>
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
                    url: '{!! route("pof.positions.{position}.types.index",['position'=>$position->id]) !!}',
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
                    {data: 'name', name: 'name'},
                    {data: 'quota', name: 'quota'},
                    {data: 'points', name: 'points'},
                    {
                        data: 'points', name: 'points',
                        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                            $(nTd).html(oData.quota * oData.points);
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

                    httpRedirect(`types/${row.id}/edit`);
                })
                .on('click', '.remove', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    tableRemove(
                        `types/${row.id}`,
                        {},
                        '{{csrf_token()}}',
                        `Eliminar subcargo ${row.name}`,
                        `Está por eliminar el subcargo ${row.name}<br><strong class="text-danger">Ésta operación no se puede deshacer</strong>.<br>¿Desea continuar?`,
                        dataTable,
                    );
                });

        })
    </script>
@endsection
