@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
        <li class="breadcrumb-item">Dar de alta un usuario</li>
    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    {!! Form::open(['route' => 'users.store']) !!}

                @include('users.partials.form')

    {!! Form::close() !!}

@endsection