<div class="card">

    <div class="card-header">
        <strong>Ingresar los datos</strong>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="form-group col-sm-12 text-center">
                {!! Form::label('tmp_file', 'Documento PDF') !!}
                <div class="clearfix"></div>
                {!! Form::file('tmp_file',[!isset($positionTypeHour) ? 'required' : '', 'accept' => 'application/pdf']) !!}

                @if(isset($positionTypeHour))
                    <div class="store-file-container">
                        <p class="mt-3">
                            <strong>
                                Archivo cargado:
                                <a href="{{  asset("uploads/{$positionTypeHour->file}") }}" download>Descargar</a>
                            </strong>
                        </p>

                        <input type="hidden" name="file" value="{{ $positionTypeHour->file }}">
                    </div>
                @endif
            </div>

            <div class="form-group col-sm-2">
                {!! Form::label('year', 'Año'); !!}

                {!! Form::select(null, $years, isset($positionTypeHour) ? $positionTypeHour->position_type->position->year : now()->year, ['id' => 'year', 'class' => 'form-control select2', 'required']); !!}
            </div>

            <div class="form-group col-sm-3">
                {!! Form::label('position_id', 'Cargo'); !!}

                {!! Form::select(null, $positions, isset($positionTypeHour) ? $positionTypeHour->position_type->position->id : null, ['id' => 'position_id', 'class'=>'form-control select2','required']); !!}
            </div>

            <div class="form-group col-sm-3">
                {!! Form::label('position_type_id', 'Subcargo'); !!}

                {!! Form::select('position_type_id', isset($position_types) ? $position_types : ['' => 'Seleccionar cargo'], isset($positionTypeHour) ? $positionTypeHour->position_type->id : null , ['class'=>'form-control select2','required']); !!}
            </div>

            <div class="form-group col-sm-2">
                {!! Form::label('hours', 'Horas'); !!}

                {!! Form::text('hours', null, ['class'=>'form-control','required']); !!}
            </div>

        </div>

    </div>
</div>

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet"/>
    <script>
        let year = $('#year');
        let positions = $('#position_id');
        let positionTypes = $('[name=position_type_id]');
        let tmpFile = $('[name=tmp_file]');

        $(document).ready(function () {
            $('.select2').select2();

            year.change(function () {
                getPositions($(this).val());
            });

            positions.change(function () {
                getPositionTypes($(this).val());
            });

            tmpFile.click(function () {
                $('.store-file-container').empty();

                $(this).prop('required', true);
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
                    positions.html('<option value="">Seleccionar</option>');
                },
                success: function (response) {
                    if (response.data) {
                        $.each(response.data, function (index, position) {
                            positions.append(`<option value="${position.id}">${position.name}</option>`);
                        })
                    }
                }
            });
        }

        function getPositionTypes(position_id) {
            $.ajax({
                async: true,
                url: `${baseUri}/pof/positions/${position_id}/types`,
                type: 'GET',
                data: {
                    position_id: position_id,
                },
                dataType: 'json',
                beforeSend: function () {
                    positionTypes.html('<option value="">Seleccionar</option>');
                },
                success: function (response) {
                    if (response.data) {
                        $.each(response.data, function (index, position) {
                            positionTypes.append(`<option value="${position.id}">${position.name}</option>`);
                        })
                    }
                }
            });
        }
    </script>
@endsection
