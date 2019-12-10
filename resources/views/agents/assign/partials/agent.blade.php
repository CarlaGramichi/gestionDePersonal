<div class="user-data-container card {{ !isset($agent) ? 'd-none' : '' }}">

    <div class="card-header">
        <strong>Datos del agente seleccionado</strong>
    </div>

    <div class="card-body user-data row">

        @if(isset($agent))
            @foreach($agent->attributesToArray() as $field => $value)
                <div class="col-sm-6"><p><span>{{ config('global.agent_fields')[$field] }}: </span><strong>{{ $value }}</strong></p>
                </div>
            @endforeach
        @endif

    </div>

</div>
