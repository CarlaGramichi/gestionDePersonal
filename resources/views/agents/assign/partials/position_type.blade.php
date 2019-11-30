<div class="position-type-data-container card d-none">

    <div class="card-header">
        <strong>Datos del subcargo seleccionado</strong>
    </div>

    <div class="card-body position-type-data row">

        @if(isset($agent))
            @foreach($agent->attributesToArray() as $field => $value)
                <div class="col-sm-6"><p>
                        <span>{{ $field }}: </span><strong>{{ $value }}</strong></p>
                </div>
            @endforeach
        @endif

    </div>

</div>
