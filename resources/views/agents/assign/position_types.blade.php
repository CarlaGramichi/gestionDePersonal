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

                <div class="form-group col-sm-4">
                    {!! Form::label('status_id', 'Situación de revista') !!}

                    {!! Form::select('status_id',$statuses, null, ['class' => 'form-control','placeholder'=>'Seleccionar', 'required']) !!}
                </div>

            </div>

        </div>

    </div>

    @include('agents.assign.partials.position_type')

    <div class="mb-5 mt-1 overflow-hidden">

        <a href="{{ route('agents.assign.positions')  }}" class="btn btn-danger float-left"><span
                class="fa fa-arrow-left"></span>&emsp;Volver</a>

        <button type="submit" class="btn btn-primary float-right">Continuar&emsp;<span
                class="fa fa-arrow-right"></span></button>

    </div>

    {!! Form::close() !!}

@endsection

@section('scripts')
    <script>
        let form = $('form');
        let positionType = form.find('#position_type_id');
        let positionTypeDataContainer = $('.position-type-data-container');

        $(document).ready(function () {
            positionType.change(function () {
                if ($(this).find(':selected').text().toLowerCase() !== 'docente') {
                    findPositionType($(this).val());
                }
            });
        });

        function findPositionType(id) {
            $.ajax({
                async: true,
                url: `${baseUri}/pof/positions/{{ $position->id }}/types/${id}`,
                type: 'GET',
                data: {},
                dataType: 'json',
                beforeSend: function () {
                    positionTypeDataContainer.addClass('d-none');
                    positionTypeDataContainer.find('.position-type-data').empty();
                    form.find('[type=submit]').prop('disabled', false);
                },
                success: function (response) {
                    if (response.position_type) {
                        positionTypeDataContainer.removeClass('d-none');

                        if (response.available <= 0) {
                            positionTypeDataContainer.find('.position-type-data').prepend(`<div class="col-sm-12">
                                        <div class="alert alert-danger">
                                            <p><span class="fa fa-info-circle"></span>&emsp;No quedan cupos disponibles para el subcargo seleccionado.</p>
                                        </div>
                                    </div>`);

                            form.find('[type=submit]').prop('disabled', true);
                        }

                        positionTypeDataContainer.find('.position-type-data').append(`
                                <div class="col-sm-4"><p><span>Cantidad: </span><strong>${response.position_type.quota}</strong></p></div>
                                <div class="col-sm-4"><p><span>Puntaje: </span><strong>${response.position_type.points}</strong></p></div>
                                <div class="col-sm-4"><p><span>Disponibles: </span><strong>${response.available}</strong></p></div>
                            `);
                    }
                }
            });
        }
    </script>
@endsection
