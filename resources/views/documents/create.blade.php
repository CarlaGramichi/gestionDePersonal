@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('documents.index') }}">Documentos</a></li>
        <li class="breadcrumb-item">Dar de alta un documento</li>
    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    {!! Form::open(['route' => 'documents.store']) !!}

                @include('documents.partials.form')

    {!! Form::close() !!}

@endsection