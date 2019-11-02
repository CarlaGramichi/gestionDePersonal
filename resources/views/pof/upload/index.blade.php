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
        <a href="{{ route('pof_document.create') }}" class="btn btn-success btn-lg">
            Nuevo&emsp;<span class="fa fa-plus"></span>
        </a>
    </div>

    <div class="col-sm-12">

        <table class="table table-bordered table-striped" id="table">
            <thead>
            <tr>
                <th>Year</th>
                <th>Level</th>
                <th>Shift</th>
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
                    ajax: '{!! route('pof_document.index') !!}',
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
                        {data: 'level.name', name: 'level_id'},
                        {data: 'shift.name', name: 'shift_id'},
                        {data: '', class: 'text-center'}
                    ]
                })
                    .on('click', '.remove', function () {
                        let row = dataTable.row($(this).parents('tr')).data();

                        tableRemove(
                            `pof_document/${row.id}`,
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