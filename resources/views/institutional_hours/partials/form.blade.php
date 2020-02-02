<div class="card">

    <div class="card-header">
        <strong>Ingresar los datos</strong>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="form-group col-sm-12 text-center">
                {!! Form::label('tmp_file', 'Documento de respaldo (Formato PDF)') !!}
                <div class="clearfix"></div>
                {!! Form::file('tmp_file',['accept' => 'application/pdf']) !!}

                @if(isset($institutionalHour))
                    @if($institutionalHour->file)
                        <div class="store-file-container">
                            <p class="mt-3">
                                <strong>
                                    Archivo cargado:
                                    <a href="{{  asset("uploads/{$institutionalHour->file}") }}" download>Descargar</a>
                                </strong>
                            </p>

                            <input type="hidden" name="file" value="{{ $institutionalHour->file }}">
                        </div>
                    @endif
                @endif
            </div>

            <div class="form-group col-sm-2">
                {!! Form::label('year', 'Año'); !!}

                {!! Form::selectRange('year', 2018, 2040, isset($institutionalHour) ? null : now()->year,['class' => 'form-control select2', 'required', 'placeholder' => 'Seleccionar']); !!}
            </div>

            <div class="form-group col-sm-4">
                {!! Form::label('name', 'Nombre del proyecto'); !!}

                {!! Form::text('name', null, ['class'=>'form-control','required']); !!}
            </div>

            <div class="form-group col-sm-2">
                {!! Form::label('hours', 'Horas'); !!}

                {!! Form::number('hours', null, ['class'=>'form-control just-numbers','required']); !!}
            </div>

        </div>

    </div>

</div>

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet"/>
    <script>
        let year = $('#year');
        let tmpFile = $('[name=tmp_file]');

        $(document).ready(function () {
            $('.select2').select2();

            tmpFile.click(function () {
                $('.store-file-container').empty();

                $(this).prop('required', true);
            });
        });
    </script>
@endsection
