@extends('layouts.app')

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
                                <button type="button" class="btn btn-danger btn-sm btn-block" data-toggle="modal"
                                        data-target="#document-upload-modal"
                                        data-document_id="{{ $document->document->id }}">
                                    Actualizar documento&emsp;<span class="fa fa-upload"></span>
                                </button>
                            @else
                                <button type="button" class="btn btn-danger btn-sm btn-block" data-toggle="modal"
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

        <a href="{{ route('agents.proposals.pending')  }}" class="btn btn-dark float-left"><span
                    class="fa fa-arrow-left"></span>&emsp;Volver</a>

        <button type="submit" class="btn btn-primary float-right">
            Finalizar carga&emsp;<span class="fa fa-save"></span>
        </button>

    </div>

    @include('agents.proposals.document_modal')

@endsection

@section('scripts')
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
        });
    </script>
@endsection

