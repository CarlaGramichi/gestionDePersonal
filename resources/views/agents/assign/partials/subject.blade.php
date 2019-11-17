<div class="subject-data-container card {{ !isset($subject) ? 'd-none' : '' }}">

    <div class="card-header">
        <strong>Datos de la asignatura selecionada</strong>
    </div>

    <div class="card-body subject-data row">

        @if(isset($subject))
            <div class="col-sm-4">
                <p><span>Nombre: </span><strong>{{ $subject->name }}</strong></p>
            </div>
            <div class="col-sm-4">
                <p><span>Régimen: </span><strong>{{ $subject->regimen->name }}</strong></p>
            </div>
            <div class="col-sm-4">
                <p><span>Horas cátedra: </span><strong>{{ $subject->hours }}</strong></p>
            </div>
        @endif

    </div>

</div>