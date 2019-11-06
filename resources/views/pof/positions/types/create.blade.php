@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">P.O.F.</li>
        <li class="breadcrumb-item"><a
                    href="{{ route('pof.positions.{position}.types.index', ['position'=>$position->id]) }}">Cargos</a>
        </li>
        <li class="breadcrumb-item">{{ $position->name }}</li>
        <li class="breadcrumb-item">Subcargos</li>
        <li class="breadcrumb-item">Nuevo subcargo</li>
    </ol>
@endsection

@section('content')

    @include('partials.alerts')

    {!! Form::open(['route' => ["pof.positions.{position}.types.store",'position'=>$position->id]]) !!}

    <div class="card">

        <div class="card-header">
            <strong>Ingresar los datos del subcargo</strong>
        </div>

        <div class="card-body">

            <div class="row">

                @include('pof.positions.types.partials.form')

            </div>

            <a href="{{ url("pof/careers/{$position->id}/courses") }}"
               class="btn btn-danger float-left">Cancelar&emsp;<span class="fa fa-times"></span></a>

            <button type="submit" class="btn btn-primary float-right">Guardar&emsp;<span class="fa fa-save"></span>
            </button>

        </div>

    </div>

    {!! Form::close() !!}

@endsection