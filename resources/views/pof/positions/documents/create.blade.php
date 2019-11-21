@extends('layouts.app')

@section('stylesheets')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">P.O.F.</li>
        <li class="breadcrumb-item">
            <a href="{{ route('pof.positions.index', ['position'=>$position->id]) }}">Cargos</a>
        </li>
        <li class="breadcrumb-item">{{ $position->name }}</li>
        <li class="breadcrumb-item">
            <a href="{{ route("pof.positions.{position}.documents.index",['position'=>$position->id]) }}">Documentos</a>
        </li>
        <li class="breadcrumb-item">Nuevo documento de cargo</li>
    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    {!! Form::open(['route' => ["pof.positions.{position}.documents.store",'position'=>$position->id]]) !!}

    <div class="card">

        <div class="card-header">
            <strong>Seleccionar documento a relacionar</strong>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="form-group col-sm-4">
                    {!! Form::label('career', 'Cargo') !!}

                    <p><strong>{{ $position->name }}</strong></p>
                </div>

                <div class="form-group col-sm-6">
                    {!! Form::label('document_id', 'Documento') !!}

                    {!! Form::select('document_id', $documents, null, ['class' => 'form-control select2', 'placeholder' => 'Seleccionar un documento']) !!}
                </div>


            </div>

            <a href="{{ route("pof.positions.{position}.types.index",['position'=>$position->id]) }}"
               class="btn btn-danger float-left">Cancelar&emsp;<span class="fa fa-times"></span></a>

            <button type="submit" class="btn btn-primary float-right">Guardar&emsp;<span class="fa fa-save"></span>
            </button>

        </div>

    </div>

    {!! Form::close() !!}

@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
    </script>
@endsection