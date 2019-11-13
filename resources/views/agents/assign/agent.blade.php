@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Agentes</li>
        <li class="breadcrumb-item">Asignar propuesta a un agente</li>
        <li class="breadcrumb-item">{{ $position->name }}</li>
        <li class="breadcrumb-item">Seleccionar subcargo</li>
    </ol>
@endsection

@section('content')

    {!! Form::open(['route' => ['agents.assign.positions.{position}.types.{positionType}.agents.proposal', 'position'=>$position->id, 'positionType'=>$positionType->id],'class'=>'col-sm-12','method'=>'GET']) !!}

    <div class="card">

        <div class="card-header">
            <strong>Seleccionar un agente</strong>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="form-group col-sm-4">
                    {!! Form::label(null, 'Cargo') !!}

                    <p><strong>{{ $position->name }}</strong></p>
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label(null, 'Subcargo') !!}

                    <p><strong>{{ $positionType->name }}</strong></p>
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label('agent_id', 'Agente') !!}

                    {!! Form::select('agent_id',$agents, null, ['class' => 'form-control','placeholder'=>'Seleccionar', 'required']) !!}
                </div>

            </div>

            <a href="{{ url()->previous()  }}" class="btn btn-danger float-left"><span class="fa fa-arrow-left"></span>&emsp;Volver</a>

            <button type="submit" class="btn btn-primary float-right">Continuar&emsp;<span
                        class="fa fa-arrow-right"></span></button>

        </div>

        {!! Form::close() !!}
    </div>

@endsection