@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Panel de control</li>
        <li class="breadcrumb-item">Documentos</li>
        <li class="breadcrumb-item">Editar documento</li>
        <!-- Breadcrumb Menu-->

    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    <div class="col-sm-12">
        {!! Form::model($document,['route' => ['documents.update',$document->id],'method' => 'PUT']) !!}

        @include('documents.partials.form')

        {!! Form::close() !!}
    </div>

@endsection