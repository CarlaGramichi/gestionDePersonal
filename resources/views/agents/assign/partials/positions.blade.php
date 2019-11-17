<div class="card">

    <div class="card-header">
        <strong>Datos del cargo seleccionado</strong>
    </div>

    <div class="card-body user-data row">
        <div class="form-group col-sm-6">
            {!! Form::label(null, 'Cargo') !!}

            <p><strong>{{ $position->name }}</strong></p>
        </div>

        <div class="form-group col-sm-6">
            {!! Form::label(null, 'Subcargo') !!}

            <p><strong>{{ $positionType->name }}</strong></p>
        </div>
    </div>

</div>