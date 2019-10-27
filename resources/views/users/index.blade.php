@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            <a href="#">{{__('Users')}}</a>
        </li>
    </ol>
@endsection

@section('content')

    <div class="alert alert-secondary col-sm-12">
        <a href="{{ route('users.create') }}" class="btn btn-primary float-right">Nuevo&emsp;<span class="fa fa-plus"></span></a>
    </div>

    <div class="col-sm-12 col-lg-12">

        <table class="table table-bordered table-striped" id="users-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Acceso</th>
                <th></th>
            </tr>
            </thead>
        </table>

    </div>
@endsection

@section('scripts')
    <script>
        let table = $('#users-table');
        let dataTable;
        $(document).ready(function () {


            $(function () {
                dataTable = table.DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{!! route('users.index') !!}',
                    columnDefs: [
                        {
                            targets: -1,
                            data: null,
                            defaultContent: renderActions(['edit', 'delete']),
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
                        {data: '', class: 'text-center'}
                    ]
                })
                    .on('click', '.edit', function () {
                        let row = dataTable.row($(this).parents('tr')).data();

                        httpRedirect(`users/${row.id}/edit`);
                    });
            });

        })
    </script>
@endsection