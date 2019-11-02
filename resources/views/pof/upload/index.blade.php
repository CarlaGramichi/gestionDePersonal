@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">P.O.F.</li>
        <li class="breadcrumb-item">Cargar documento de P.O.F.</li>
    </ol>
@endsection

@section('content')

    <div class="alert alert-secondary col-sm-12">
        <a href="{{ route('pof_document.create') }}" class="btn btn-primary float-right">Nuevo&emsp;<span class="fa fa-plus"></span></a>
    </div>

    <div class="col-sm-12 col-lg-12">

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
                            defaultContent: renderActions(['delete']),
                            orderable: false,
                        },
                    ],
                    columns: [
                        {data: 'year', name: 'name'},
                        {data: 'level', name: 'email'},
                        {data: 'shift', name: 'email'},
                        {data: '', class: 'text-center'}
                    ]
                })
                    .on('click', '.delete', function () {
                        let row = dataTable.row($(this).parents('tr')).data();

                        // httpRedirect(`users/${row.id}/edit`);
                    });
            });

        })
    </script>
@endsection