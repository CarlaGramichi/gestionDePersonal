@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.7/dist/sweetalert2.min.css">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Agentes</li>
        <li class="breadcrumb-item">Propuestas</li>
        <li class="breadcrumb-item">{{ $agentPositionTypeTransaction->agentPositionType->agent->name }}
            - {{ $agentPositionTypeTransaction->agentPositionType->positionType->name }}</li>
        <li class="breadcrumb-item">Documentos</li>
    </ol>
@endsection

@section('content')

    <div class="row">
        @include('partials.alerts')
    </div>

    <div class="card">

        <div class="card-header">
            <strong>Documentos a presentar</strong>
        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped" id="table">
                <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Fecha de presentación</th>
                    <th>Archivo</th>
                    <th class="text-center"></th>
                </tr>
                </thead>

                <tbody>
                @foreach($documents as $document)
                    <tr>
                        <td>{{ $document->document->name }}</td>
                        <td>{{ $document->uploadedDocument ?  $document->uploadedDocument->created_at->format('d/m/Y H:i') : '-'}}</td>
                        <td class="text-center">{!! $document->uploadedDocument ?  "<a href='".asset("uploads/{$document->uploadedDocument->file}")."' target='_blank' download class='btn btn-sm btn-info'>Descargar&emsp;<span class='fa fa-download'></span></a>" : '-' !!}</td>
                        <td>
                            @if($document->document->auto_generate)
                                <button type="button" class="btn btn-warning btn-sm btn-block"
                                        data-document_id="{{ $document->document->id }}">
                                    Descargar copia&emsp;<span class="fa fa-download"></span>
                                </button>
                            @elseif($document->uploadedDocument)
                                {{--                                <button type="button" class="btn btn-warning btn-sm btn-block" data-toggle="modal"--}}
                                {{--                                        data-target="#document-upload-modal"--}}
                                {{--                                        data-document_id="{{ $document->document->id }}">--}}
                                {{--                                    Actualizar documento&emsp;<span class="fa fa-upload"></span>--}}
                                {{--                                </button>--}}

                                <form action="{{ route('agents.proposals.{agent_position_type_transaction}.documents.{document}.destroy',['agent_position_type_transaction'=>$agentPositionTypeTransaction->id,'document'=>$document->uploadedDocument->id]) }}"
                                      method="POST">
                                    {{ method_field('DELETE') }}
                                    @csrf
                                    <button type="button" class="btn btn-danger btn-sm btn-block destroy-document mt-1">
                                        Eliminar documento&emsp;<span class="fa fa-trash"></span>
                                    </button>
                                </form>
                            @else
                                <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal"
                                        data-target="#document-upload-modal"
                                        data-document_id="{{ $document->document->id }}">
                                    Cargar documento&emsp;<span class="fa fa-upload"></span>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

    <div class="mb-5 mt-5 overflow-hidden">
        @if($uploaded_documents != count($documents))
            <div class="alert alert-info">
                <p><span class="fa fa-info-circle"></span>&emsp;Para poder finalizar la carga debe cargar todos los
                    documentos solicitados.</p>
            </div>
        @endif

        <a href="{{ route('agents.proposals.pending')  }}" class="btn btn-dark float-left"><span
                    class="fa fa-arrow-left"></span>&emsp;Volver</a>

        @if($uploaded_documents == count($documents))
            <form action="{{ route('agents.proposals.{agent_position_type_transaction}.documents.finish',['agent_position_type_transaction'=>$agentPositionTypeTransaction->id]) }}" method="post">
                @csrf
                {{ method_field('PUT') }}
                <button type="button" class="btn btn-primary float-right finish-upload">
                    Finalizar carga&emsp;<span class="fa fa-save"></span>
                </button>
            </form>

            <a href="{{ route('agents.proposals.{agent_position_type_transaction}.documents.downloadAll',['agent_position_type_transaction'=>$agentPositionTypeTransaction->id]) }}"
               class="btn btn-info float-right mr-2 download-all-documents">
                Descargar todos los documents&emsp;<span class="fa fa-download"></span>
            </a>
        @else
            <button type="button" class="btn btn-primary float-right" disabled>
                Finalizar carga&emsp;<span class="fa fa-save"></span>
            </button>
        @endif

    </div>

    @include('agents.proposals.partials.document_modal')

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.7/dist/sweetalert2.min.js"></script>
    <script>

        let table = $('#table');
        let documentUploadModal = $('#document-upload-modal');
        let documentId = null;

        $(document).ready(function () {
            table.find('button').click(function () {
                documentId = $(this).data('document_id');

                documentUploadModal.find('.data').empty();
            });

            documentUploadModal.find('form').submit(function () {
                $(this).find('.data').append(`<input type="hidden" name="document_id" value="${documentId}">`);

                documentUploadModal.modal('hide');
            });

            $('.download-all-documents').click(function () {
                swalAlert(
                    'Descargar todos los documentos',
                    'Sus documentos se están por descargar, por favor aguarde unos instantes.',
                    'success'
                );
            });

            $('.destroy-document').click(function () {
                Swal.fire({
                    title: 'Eliminar un documento',
                    text: "¿Está seguro que desea eliminar éste documento? Ésta operación no se puede deshacer.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, borrarlo',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        $(this).parents('form').submit();
                    }
                })
            });

            $('.finish-upload').click(function () {
                Swal.fire({
                    title: 'Finalizar carga de documentos',
                    html: "¿Está seguro que desea finalizar la carga de documentos? <strong class='text-danger text-uppercase'>Al finalizar no podrá eliminar o actualizar ningun documento</strong>.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, finalizar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        $(this).parents('form').submit();
                    }
                })
            });
        });
    </script>
@endsection

