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
                    <select name="agent_id" id="agent_id" class="form-control" required>
                        <option value="">Seleccionar</option>

                        @foreach($agents as $agent)
                            <option value="{{ $agent->id }}">{{ $agent->dni }} - {{ $agent->surname }}, {{ $agent->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="user-data-container col-sm-12 d-none">

                    <div class="card">

                        <div class="card-header">
                            <strong>Datos del agente seleccionado</strong>
                        </div>

                        <div class="card-body user-data row">

                        </div>

                    </div>

                </div>

            </div>

            <a href="{{ route('agents.assign.positions.types',['position_id'=>$position->id])  }}"
               class="btn btn-danger float-left"><span class="fa fa-arrow-left"></span>&emsp;Volver</a>

            <button type="submit" class="btn btn-primary float-right">Continuar&emsp;<span
                        class="fa fa-arrow-right"></span></button>

        </div>

        {!! Form::close() !!}
    </div>

@endsection

@section('scripts')
    <script>
        let agent_id = $('select#agent_id');
        let user_data_container = $('div.user-data-container');

        $(document).ready(function () {
            agent_id.change(function () {
                user_data_container.addClass('d-none');
                if ($(this).val()) {
                    findAgent($(this).val());
                }
            })
        });

        function findAgent(agent_id) {
            $.ajax({
                async: true,
                url: `${baseUri}/agents/${agent_id}`,
                type: 'GET',
                data: {},
                dataType: 'json',
                beforeSend: function () {

                },
                success: function (response) {
                    user_data_container.find('.user-data').empty();

                    if (response.agent) {
                        user_data_container.removeClass('d-none');

                        $.each(response.agent, function (field, value) {
                            user_data_container.find('.user-data').append(`
                                <div class="col-sm-6"><p><span>${field}: </span><strong>${value}</strong></p></div>
                            `);
                        })
                    }
                }
            });
        }
    </script>
@endsection