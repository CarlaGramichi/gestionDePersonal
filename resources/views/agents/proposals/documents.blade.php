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
                        <td>-</td>
                        <td>-</td>
                        <td>
                            @if($document->document->auto_generate)
                                <button type="button" class="btn btn-warning btn-sm btn-block">
                                    Descargar copia&emsp;<span class="fa fa-download"></span>
                                </button>
                            @else
                                <button type="button" class="btn btn-danger btn-sm btn-block">
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

        <a href="{{ route('agents.proposals.pending')  }}" class="btn btn-dark float-left"><span class="fa fa-arrow-left"></span>&emsp;Volver</a>

        <button type="submit" class="btn btn-primary float-right">
            Finalizar carga&emsp;<span class="fa fa-save"></span>
        </button>

    </div>

@endsection

