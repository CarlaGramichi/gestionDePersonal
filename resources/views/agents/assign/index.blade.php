@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Agentes</li>
        <li class="breadcrumb-item">Asignar propuesta a <strong>{{ $agent->surname }}, {{ $agent->name }}</strong></li>
    </ol>
@endsection

@section('content')


@endsection