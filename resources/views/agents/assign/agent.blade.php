@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
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
                    <label for="agent_id">Agente</label>
                    <input type="hidden" name="agent_id" :value="selectedAgent.id">
                    <v-select :options="{{ $agents }}" id="agent_id" :required="!selectedAgent" v-model="selectedAgent">

                        <template #search="{attributes, events}">
                            <input
                                class="vs__search"
                                :required="!selectedAgent"
                                v-bind="attributes"
                                v-on="events"
                            />
                        </template>

                        <template slot="selected-option" slot-scope="option">
                            <div class="selected d-center">
                                <strong>@{{ option.label }}</strong>
                            </div>
                        </template>

                    </v-select>
                </div>

            </div>

        </div>

    </div>

    <v-agent-information v-if="selectedAgent" :agent-data="selectedAgent"></v-agent-information>

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
                        <input type="hidden" name="start_date" value="{{ now()->toDateString() }}">
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
    <script>
        $(document).ready(function () {
            $('#date').change();
        });
    </script>

    <script>
        new Vue({
            el: '#app',
            data: {
                options: [],
                selectedAgent: '',
            },
        })
    </script>

@endsection
