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

    {!! Form::open(['route' => ['agents.assign.positions.{position}.types.agents','position'=>$position->id],'class'=>'col-sm-12','method'=>'GET']) !!}

    <div class="card">

        <div class="card-header">
            <strong>Seleccionar un subcargo</strong>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="form-group col-sm-4">
                    {!! Form::label(null, 'Cargo') !!}

                    <p><strong>{{ $position->name }}</strong></p>
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label('position_type_id', 'Subcargo') !!}

                    {!! Form::select('position_type_id',$positionTypes, null, ['class' => 'form-control','placeholder'=>'Seleccionar', 'required']) !!}
                </div>

            </div>

            <a href="{{ route('agents.assign.positions')  }}" class="btn btn-danger float-left"><span class="fa fa-arrow-left"></span>&emsp;Volver</a>

            <button type="submit" class="btn btn-primary float-right">Continuar&emsp;<span
                        class="fa fa-arrow-right"></span></button>

        </div>

        {!! Form::close() !!}
    </div>

@endsection