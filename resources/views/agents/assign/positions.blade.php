@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Agentes</li>
        <li class="breadcrumb-item">Asignar propuesta a un agente</li>
        <li class="breadcrumb-item">Seleccionar propuesta</li>
    </ol>
@endsection

@section('content')

    <div class="vh-100 container-fluid">

        <div class="card" style="width: 20rem;">
          <div class="card-body">
            <h4 class="card-title">Datos del agente</h4>
          </div>

        </div>
        {!! Form::open(['route' => ['agents_assign.{agent}.positions','agent'=>$agent->id],'class'=>'col-sm-12']) !!}
        <div class="form-group col-sm-4">
            {!! Form::label('position_id', 'Cargo') !!}

            {!! Form::select('position_id',$positions, null, ['class' => 'form-control']) !!}
        </div>

        {!! Form::close() !!}
    </div>

@endsection