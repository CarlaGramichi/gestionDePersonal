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
            <th>Fecha</th>
            <th>Agente</th>
            <th>Año</th>
            <th>Cargo</th>
            <th>Subcargo</th>
            <th>Estado</th>
            <th class="text-center">Acciones</th>
        </tr>
        </thead>
    </table>

    @include('agents.proposals.partials.proposal_file_modal')
    @include('agents.proposals.partials.proposal_procedure_number_modal')

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.7/dist/sweetalert2.min.js"></script>
    <script>
        let table = $('#table');
        // let year_selector = $('select#year');
        let dataTable;
        let row;
        let fileUploadModal = $('#file-upload-modal');
        let procedureNumberModal = $('#procedure-number-modal');

        $(document).ready(function () {

            // year_selector.change(function () {
            //     dataTable.ajax.reload();
            // });

            dataTable = table.DataTable({
                processing: true,
                serverSide: true,
                order: [0, 'DESC'],
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
                    {data: 'created_at', name: 'created_at'},
                    {data: 'agent_position_type.agent.name', name: 'agent_position_type.agent.name'},
                    {
                        data: 'agent_position_type.position_type.position.year',
                        name: 'agent_position_type.position_type.position.year'
                    },
                    {
                        data: 'agent_position_type.position_type.position.name',
                        name: 'agent_position_type.position_type.position.name'
                    },
                    {data: 'agent_position_type.position_type.name', name: 'agent_position_type.position_type.name'},
                    {data: 'statuses.0.status.description', name: 'statuses.0.status.description'},
                    {
                        data: '', class: 'text-center',
                        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                            switch (oData.statuses[0].status.name) {
                                case 'started':
                                    $(nTd).append(renderButton('Documentos&emsp;<span class="fa fa-file-pdf"></span>', 'documents', 'danger'));
                                    break;

                                case 'pending':
                                    $(nTd).append(renderButton('Cargar expediente&emsp;<span class="fa fa-upload"></span>', 'file', 'warning'));
                                    $(nTd).append(renderButton('Descargar todos los documentos&emsp;<span class="fa fa-download"></span>', 'downloadAllDocuments', 'info mt-1'));
                                    break;

                                case 'sended':
                                    $(nTd).append(renderButton('Cargar Nº de expediente&emsp;<span class="fa fa-clipboard-list"></span>', 'procedure_number', 'info'));
                                    break;

                                case 'approved':
                                    break;

                                case 'finished':
                                    break;
                            }
                        }
                    }
                ]
            })
                .on('click', '.documents', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    httpRedirect(`${baseUri}/agents/proposals/${row.id}/documents`);
                })
                .on('click', '.file', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    fileUploadModal.find('form').attr('action', `${baseUri}/agents/proposals/${row.id}/file`);

                    fileUploadModal.modal('show');
                })
                .on('click', '.procedure_number', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    procedureNumberModal.find('form').attr('action', `${baseUri}/agents/proposals/${row.id}/procedureNumber`);

                    procedureNumberModal.modal('show');
                })
                .on('click', '.downloadAllDocuments', function () {
                    let row = dataTable.row($(this).parents('tr')).data();

                    httpRedirect(`${baseUri}/agents/proposals/${row.id}/documents/downloadAll`);
                })
        })
    </script>
@endsection