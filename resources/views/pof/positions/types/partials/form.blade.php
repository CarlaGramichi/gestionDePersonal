<div class="form-group col-sm-12">
    {!! Form::label('career', 'Cargo') !!}

    <p><strong>{{ $position->name }}</strong></p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre del subcargo') !!}

    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'autocomplete' => 'off']) !!}
</div>

<div class="form-group col-sm-2">
    {!! Form::label('quota', 'Cantidad') !!}

    {!! Form::text('quota', null, ['class' => 'form-control allow-numeric-without-decimal', 'required']) !!}
</div>

<div class="form-group col-sm-2">
    {!! Form::label('points', 'Puntaje') !!}

    {!! Form::text('points', null, ['class' => 'form-control allow-numeric-with-decimal', 'required']) !!}
</div>

<div class="form-group col-sm-2">
    {!! Form::label(null, 'Tot. puntos') !!}

    <p><strong class="total-points">0</strong></p>
</div>

@section('scripts')
    <script>
        let form = $('form');
        let quota = form.find('#quota');
        let points = form.find('#points');
        let selectors = form.find('#quota, #points');

        $(document).ready(function () {
            selectors.on('input', function () {
                totalPointsCalculation();
            });
        });

        function totalPointsCalculation() {
            if (quota.val() >= 0 && points.val() >= 0) {
                $('.total-points').text(quota.val() * points.val());
            }
        }
    </script>
@endsection
