@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Agentes</li>
        <li class="breadcrumb-item">Asignar propuesta a un agente</li>
        <li class="breadcrumb-item">Seleccionar Cargo</li>
    </ol>
@endsection

@section('content')

    {!! Form::open(['route' => ['agents.assign.positions.types'],'class'=>'col-sm-12','method'=>'GET']) !!}

    <div class="card">

        <div class="card-header">
            <strong>Seleccionar un cargo</strong>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="form-group col-sm-4">
                    {!! Form::label('position_id', 'Cargo') !!}

                    {!! Form::select('position_id',$positions, null, ['class' => 'form-control','placeholder'=>'Seleccionar', 'required']) !!}
                </div>

            </div>

            <a href="{{ url('dashboard') }}" class="btn btn-danger float-left">Cancelar&emsp;<span class="fa fa-times"></span></a>

            <button type="submit" class="btn btn-primary float-right">Continuar&emsp;<span class="fa fa-arrow-right"></span></button>

        </div>

        {!! Form::close() !!}
    </div>

@endsection