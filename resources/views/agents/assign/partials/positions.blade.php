<div class="card">

    <div class="card-header">
        <strong>Datos del cargo seleccionado</strong>
    </div>

    <div class="card-body user-data row">
        <div class="form-group col-sm-4">
            <label>Cargo</label>

            <p><strong>{{ $position->name }}</strong></p>
        </div>

        <div class="form-group col-sm-4">
            <label>Subcargo</label>

            <p><strong>{{ $positionType->name }}</strong></p>
        </div>

        <div class="form-group col-sm-4">
            <label>Situación de revista</label>

            <p><strong>{{ $status->name }}</strong></p>
        </div>
    </div>

</div>
