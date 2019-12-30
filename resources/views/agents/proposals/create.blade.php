@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Agentes</li>
        <li class="breadcrumb-item">Asignar propuesta a un agente</li>
        <li class="breadcrumb-item">Seleccionar Cargo</li>
    </ol>
@endsection

@section('content')

    {!! Form::open(['route' => ['agents.proposals.store'],'class'=>'col-sm-12','method'=>'POST']) !!}

    <div class="card" v-show="step === 1">

        <div class="card-header">
            <strong>Seleccionar un cargo</strong>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="form-group col-sm-4">
                    <label for="year">Seleccionar año</label>

                    <v-select :options="years" id="year" label="year"
                              v-model="selectedYear" @input="getPositions"></v-select>
                </div>

                <div class="form-group col-sm-4">
                    <label for="position_id">Seleccionar cargo</label>

                    <v-select :options="positions" id="position_id" label="name"
                              v-model="selectedPosition" @input="getTypes"></v-select>
                </div>

            </div>

        </div>

    </div>

    <v-position-type v-if="selectedPosition" :position-types="positionTypesData" v-show="step === 2"></v-position-type>

    <v-position-type-information v-if="selectedPositionType" :position-type-data="selectedPositionType"
                                  v-show="step === 2">
    </v-position-type-information>

    <v-agent-selection v-if="selectedPositionType" :agents="{{ $agents }}" :statuses="{{ $statuses }}" v-show="step === 3"></v-agent-selection>

    <div class="col-sm-12">
        <button type="button" @click="step--" v-if="step > 1" class="btn btn-dark float-left">
            <span class="fa fa-arrow-left"></span>
            &emsp;Volver
        </button>

        <button @click="step++" type="button" class="btn btn-primary float-right">
            Continuar&emsp;
            <span class="fa fa-arrow-right"></span>
        </button>
    </div>

    {!! Form::close() !!}

@endsection

@section('scripts')
    <script>
        let app = new Vue({
            el: '#app',
            data: {
                step: 1,
                year: new Date().getFullYear(),
                selectedYear: year,
                positions: [],
                selectedPosition: '',
                selectedPositionType: '',
                selectedPositionTypeAvailability: '',
                positionTypesData: [],
                selectedAgent: '',
                agentData: [],
                selectedStatus: '',
                nestStepDisabled: false,
            },
            methods: {
                getTypes() {
                    this.selectedPositionType = '';
                    axios.get(`${baseUri}/pof/positions/${this.selectedPosition.id}/types`)
                        .then(function (response) {
                            app.positionTypesData = response.data.data;
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
                },
                getPositions() {
                    this.selectedPosition = '';

                    axios.get(`${baseUri}/pof/positions/?year=${this.selectedYear}`)
                        .then(function (response) {
                            app.positions = response.data.data;
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
                },
            },
            computed: {
                years() {
                    let years = [];

                    for (let year = 2010; year <= this.year + 1; year++) {
                        years.push(year);
                    }

                    return years;
                }
            },
        })
    </script>
@endsection
