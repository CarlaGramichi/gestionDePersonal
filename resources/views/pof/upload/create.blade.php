@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">P.O.F.</li>
        <li class="breadcrumb-item">Cargar datos del pof</li>
    </ol>
@endsection

@section('content')

    {!! Form::open(['route' => 'pof_document.store']) !!}

    <button type="submit" class="btn btn-primary float-right">Guardar&emsp;<span class="fa fa-save"></span></button>

    {!! Form::close() !!}

@endsection