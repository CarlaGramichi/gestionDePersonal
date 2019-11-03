@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.7/dist/sweetalert2.min.css">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">P.O.F.</li>
        <li class="breadcrumb-item">Carreras</li>
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
            <a href="{{ route('pof.careers.create') }}" class="btn btn-success btn-lg">
                Nueva&emsp;<span class="fa fa-plus"></span>
            </a>
        </div>
    </div>

    <div class="col-sm-12">

        <table class="table table-bordered table-striped" id="table">
            <thead>
            <tr>
                <th>Año</th>
                <th>Carrera</th>
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
                    url: '{!! route('pof.careers.index') !!}',
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
                    {data: 'year', name: 'year'},
                    {data: 'name', name: 'name'},
                    {
                        data: '', class: 'text-center',
                        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                            $(nTd).append(renderButton('Cursos&emsp;<span class="fa fa-calendar-check"></span>', 'years mr-2', 'warning'));
                            $(nTd).append(renderButton('Editar&emsp;<span class="fa fa-edit"></span>', 'edit mr-2', 'info'));
                            $(nTd).append(renderButton('Borrar&emsp;<span class="fa fa-trash"></span>', 'remove', 'danger'));
                        }
                    }
                ]
            })
                .on('click', '.years', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    httpRedirect(`careers/${row.id}/courses`);
                })
                .on('click', '.edit', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    httpRedirect(`careers/${row.id}/edit`);
                })
                .on('click', '.remove', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    tableRemove(
                        `careers/${row.id}`,
                        {},
                        '{{csrf_token()}}',
                        `Eliminar carrera ${row.name}`,
                        `Está por eliminar la carrera ${row.name}<br><strong class="text-danger">Ésta operación no se puede deshacer</strong>.<br>¿Desea continuar?`,
                        dataTable,
                    );
                });

        })
    </script>
@endsection
