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
                    {!! Form::label('year', 'Año') !!}

                    {!! Form::select('year',$years, now()->year, ['class' => 'form-control','placeholder'=>'Seleccionar', 'required']) !!}
                </div>


                <div class="form-group col-sm-4">
                    {!! Form::label('position_id', 'Cargo') !!}

                    {!! Form::select('position_id',$positions, null, ['class' => 'form-control','placeholder'=>'Seleccionar', 'required']) !!}
                </div>

            </div>

            <a href="{{ url('dashboard') }}" class="btn btn-danger float-left">Cancelar&emsp;<span
                    class="fa fa-times"></span></a>

            <button type="submit" class="btn btn-primary float-right">Continuar&emsp;<span
                    class="fa fa-arrow-right"></span></button>

        </div>

        {!! Form::close() !!}
    </div>

@endsection

@section('scripts')
    <script>
        let yearSelector = $('#year');
        let positionSelector = $('#position_id');

        $(document).ready(function () {
            yearSelector.change(function () {
                getPositions($(this).val());
            });
        });

        function getPositions(year) {
            $.ajax({
                async: true,
                url: `${baseUri}/pof/positions`,
                type: 'GET',
                data: {
                    year: year,
                },
                dataType: 'json',
                beforeSend: function () {
                    positionSelector.html('<option value="">Seleccionar</option>');
                },
                success: function (response) {
                    if (response.data) {
                        $.each(response.data, function (index, position) {
                            positionSelector.append(`<option value="${position.id}">${position.name}</option>`);
                        })
                    }
                }
            });
        }
    </script>
@endsection
