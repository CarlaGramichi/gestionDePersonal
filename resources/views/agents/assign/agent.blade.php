@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet"/>
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Agentes</li>
        <li class="breadcrumb-item">Asignar propuesta a un agente</li>
        <li class="breadcrumb-item">{{ $position->name }}</li>
        <li class="breadcrumb-item">{{ $positionType->name }} - {{ $status->name }}</li>
        <li class="breadcrumb-item">Seleccionar Agente</li>
    </ol>
@endsection

@section('content')

    {!! Form::open(['route' => ['agents.assign.positions.{position}.types.{positionType}.agents.proposal', 'position'=>$position->id, 'positionType'=>$positionType->id],'method'=>'GET']) !!}

    <input type="hidden" name="status_id" value="{{ $status->id }}">

    <div class="card">

        <div class="card-header">
            <strong>Seleccionar un agente</strong>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="form-group col-sm-3">
                    <label>Cargo</label>

                    <p><strong>{{ $position->name }}</strong></p>
                </div>

                <div class="form-group col-sm-3">
                    <label>Subcargo</label>

                    <p><strong>{{ $positionType->name }}</strong></p>
                </div>

                <div class="form-group col-sm-2">
                    <label>Situación de revista</label>

                    <p><strong>{{ $status->name }}</strong></p>
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label('agent_id', 'Agente') !!}
                    <select name="agent_id" id="agent_id" class="form-control select2" required>
                        <option value="">Seleccionar</option>

                        @foreach($agents as $a)
                            <option value="{{ $a->id }}">{{ $a->dni }} - {{ $a->surname }}, {{ $a->name }}</option>
                        @endforeach

                    </select>
                </div>

            </div>

        </div>

    </div>

    @include('agents.assign.partials.agent')

    @if(strtolower($positionType->name) != 'docente')
        <div class="card">

            <div class="card-header">
                <strong>Seleccionar fecha de alta</strong>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="form-group col-sm-4 float-right">
                        {!! Form::label('date', 'Fecha de alta') !!}

                        {!! Form::text('date', null, ['class' => 'form-control date-range-picker date-mask', 'data-field'=>'start_date', 'required']) !!}
                    </div>

                </div>

            </div>

        </div>
    @endif

    <div class="mb-5 mt-5 overflow-hidden">

        <a href="{{ route('agents.assign.positions.types',['position_id'=>$position->id])  }}"
           class="btn btn-danger float-left"><span class="fa fa-arrow-left"></span>&emsp;Volver</a>

        <button type="submit" class="btn btn-primary float-right">Continuar&emsp;<span
                class="fa fa-arrow-right"></span></button>

    </div>

    {!! Form::close() !!}

@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/inputmask/inputmask.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script>
        let agent_id = $('select#agent_id');
        let user_data_container = $('div.user-data-container');

        $(document).ready(function () {
            $('.select2').select2();

            agent_id.change(function () {
                user_data_container.addClass('d-none');
                if ($(this).val()) {
                    findAgent($(this).val());
                }
            });

            $('#date').change();
        });

        function findAgent(agent_id) {
            $.ajax({
                async: true,
                url: `${baseUri}/agents/${agent_id}`,
                type: 'GET',
                data: {},
                dataType: 'json',
                beforeSend: function () {
                    user_data_container.addClass('d-none');
                    user_data_container.find('.user-data').empty();
                },
                success: function (response) {
                    if (response.agent) {
                        user_data_container.removeClass('d-none');

                        $.each(response.agent, function (field, value) {
                            user_data_container.find('.user-data').append(`
                                <div class="col-sm-6"><p><span>${agentFields[field]}: </span><strong>${value}</strong></p></div>
                            `);
                        })
                    }
                }
            });
        }
    </script>
@endsection
