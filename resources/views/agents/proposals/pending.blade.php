@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Agentes</li>
        <li class="breadcrumb-item">Propuestas pendientes</li>
    </ol>
@endsection

@section('content')

        <table class="table table-bordered table-striped" id="table">
            <thead class="thead-dark">
            <tr>
                <th>Agente</th>
                <th>Año</th>
                <th>Cargo</th>
                <th>Subcargo</th>
                <th class="text-center">Acciones</th>
            </tr>
            </thead>
        </table>

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.7/dist/sweetalert2.min.js"></script>
    <script>
        let table = $('#table');
        // let year_selector = $('select#year');
        let dataTable;

        $(document).ready(function () {

            // year_selector.change(function () {
            //     dataTable.ajax.reload();
            // });

            dataTable = table.DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{!! route('agents.proposals.pending') !!}',
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
                    {data: 'agent_position_type.agent.name', name: 'agent_position_type.agent.name'},
                    {data: 'agent_position_type.position_type.position.year', name: 'agent_position_type.position_type.position.year'},
                    {data: 'agent_position_type.position_type.position.name', name: 'agent_position_type.position_type.position.name'},
                    {data: 'agent_position_type.position_type.name', name: 'agent_position_type.position_type.name'},
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
                .on('click', '.edit', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    httpRedirect(`careers/${row.id}/edit`);
                })
        })
    </script>
@endsection