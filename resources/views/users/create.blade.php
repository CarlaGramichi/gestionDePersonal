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

    <div class="card">

        <div class="card-header">
            <strong>Ingresar los datos del usuario</strong>
        </div>

        <div class="card-body">

            <div class="row">

                @include('users.partials.form')

            </div>

            <button type="submit" class="btn btn-primary float-right">Guardar&emsp;<span class="fa fa-save"></span></button>

        </div>

    </div>

    {!! Form::close() !!}

@endsection