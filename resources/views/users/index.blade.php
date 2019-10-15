@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            <a href="#">{{__('Users')}}</a>
        </li>
        <!-- Breadcrumb Menu-->

    </ol>
@endsection

@section('content')

    <div class="col-sm-12 col-lg-12">

        <table class="table table-bordered table-striped" id="users-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Acceso</th>
            </tr>
            </thead>
        </table>

    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('users.index') !!}',
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

                ]
            });
        });
    </script>
@endsection