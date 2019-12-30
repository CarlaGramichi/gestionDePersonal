@extends('layouts.app')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.7/dist/sweetalert2.min.css">
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Agentes</li>
        <li class="breadcrumb-item">Asignar propuesta a un agente</li>
        <li class="breadcrumb-item">Cargo <strong>{{ $position->name }}</strong></li>
        <li class="breadcrumb-item"><strong>{{ $agent->name }}</strong></li>
        <li class="breadcrumb-item">Cargar datos de la propuesta</li>
    </ol>
@endsection

@section('content')

    @include('agents.assign.partials.positions')

    <v-agent-information :agent-data="{{ $agent }}"></v-agent-information>

    @include('agents.assign.partials.subject')

    <div class="card">

        <div class="card-header">
            <strong>Cargar horarios para {{ $subject->course->career->name }}
                - {{ $subject->course->name.$subject->division->name }} - {{ $subject->name }}</strong>
        </div>

        <form class="add-schedules-form">

            <div class="card-body">

                <div class="row">

                    <div class="form-group col-sm-4">
                        <label for="day">Día</label>

                        <select id="day" name="day" class="form-control" autofocus required>
                            <option value="">Seleccionar</option>
                            @foreach(config('global.week_days') as $week_day_number => $week_day)
                                @if(!in_array(strtolower($week_day),['sábado','domingo']))
                                    <option value="{{ $week_day_number }}">{{ $week_day }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="start_time">Horario</label>

                        <input type="text" id="start_time" name="start_time"
                               class="form-control date-time-picker time-mask" required autocomplete="off"
                               value="08:00">
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="end_time">Hora de fin</label>

                        <input type="text" id="end_time" name="end_time" class="form-control date-time-picker time-mask"
                               required autocomplete="off" value="12:00">
                    </div>

                    <div class="form-group col-sm-2">
                        <label>&nbsp</label>
                        <div class="clearfix"></div>
                        <button type="submit" class="btn btn-primary">Agregar&emsp;<span class="fa fa-plus"></span>
                        </button>
                    </div>

                </div>

            </div>
        </form>

    </div>

    {!! Form::open([
            'route' => [
                'agents.assign.positions.{position}.types.{positionType}.agents.{agent}.proposal.subject_schedule.{subject}.store',
                'position' => $position->id,
                'positionType' => $positionType->id,
                'agent' => $agent->id,
                'subject'=>$subject->id
            ],
            'method'=>'POST',
            'class'=>'schedules-form'
        ])
    !!}

    <input type="hidden" name="status_id" value="{{ $status->id }}">

    <div class="card">
        <div class="card-header">
            <strong>Horarios seleccionados</strong>
        </div>

        <div class="card-body table-responsive">

            <div class="alert alert-warning">
                <p>
                    <span class="fa fa-info-circle"></span>&emsp;
                    La suma de horas totales debe ser igual a la cantidad de horas cátedra de la asignatura para poder
                    continuar.
                </p>
            </div>
            <table class="table table-striped table-bordered table-hover table-sm schedules-table">
                <thead class="thead-dark">
                <tr>
                    <th>Día</th>
                    <th>Horario de inicio</th>
                    <th>Horario de fin</th>
                    <th>Horas</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                </tbody>

                <tfoot>
                <tr>
                    <td colspan="3" class="text-right"><strong>Horas totales</strong></td>
                    <td class="text-center total-hours"></td>
                    <td></td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="card">

        <div class="card-header">
            <strong>Seleccionar fecha de alta</strong>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="form-group col-sm-4 float-right">
                    {!! Form::label('date', 'Fecha de alta') !!}

                    {!! Form::text('date', null, ['class' => 'form-control date-range-picker date-mask', 'data-field'=>'start_date', 'required']) !!}
                </div>

            </div>

        </div>

    </div>

    <div class="mb-5 mt-5 overflow-hidden">

        <a href="{{ url()->previous()  }}" class="btn btn-danger float-left"><span class="fa fa-arrow-left"></span>&emsp;Volver</a>

        <button type="submit" class="btn btn-primary float-right" disabled>
            Continuar&emsp;<span class="fa fa-arrow-right"></span>
        </button>

    </div>

    {!! Form::close() !!}


@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/inputmask/inputmask.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.18.7/dist/sweetalert2.min.js"></script>
    <script>
        let schedulesForm = $('.schedules-form');
        let addSchedulesForm = $('.add-schedules-form');
        let schedulesTable = $('.schedules-table');
        let hours = '{{ $subject->hours }}';
        let matchingHours = false;

        let schedules = [];

        $(document).ready(function () {

            $('.date-time-picker').daterangepicker({
                singleDatePicker: true,
                timePicker: true,
                timePicker24Hour: true,
                timePickerIncrement: 1,
                timePickerSeconds: false,
                locale: {
                    format: 'HH:mm',
                    applyLabel: "Seleccionar",
                    cancelLabel: "Cancelar",
                }
            }).on('show.daterangepicker', function (ev, picker) {
                picker.container.find(".calendar-table").hide();
            });

            $('#date').change();

            schedulesForm.submit(function () {
                if (!matchingHours) {
                    swalAlert('¡Error!', 'La sumatoria de horas totales debe ser igual al total de horas cátedra de la asignatura selecionada.', 'error');

                    return false;
                }

                $.each(schedules, function (index, schedule) {
                    $.each(schedule, function (name, value) {
                        schedulesForm.append(`<input type="hidden" name="${name}[]" value="${value}">`);
                    });
                });
            });

            addSchedulesForm.submit(function (e) {
                e.preventDefault();

                let schedule = $(this).serializeObject();
                let lastIndex = schedules.push(schedule) - 1;

                schedulesTable.find('tbody').append(`
                    <tr>
                        <td>${week_days[schedule.day]}</td>
                        <td class="text-center">${schedule.start_time}</td>
                        <td class="text-center">${schedule.end_time}</td>
                        <td  class="text-center">${dateDifference(schedule.start_time, schedule.end_time)}</td>
                        <td class="text-center"><button type="button" class="btn btn-danger btn-sm remove-schedule" title="Eliminar horario" data-index="${lastIndex}"><span class="fa fa-trash"></span></button></td>
                    </tr>
                `);

                addSchedulesForm.find('[name=day]').val('');
                addSchedulesForm.find('[name=start_time]').val('08:00');
                addSchedulesForm.find('[name=end_time]').val('12:00');

                calculateTotalHours();
            });

            schedulesTable.on('click', '.remove-schedule', function () {
                delete schedules[$(this).data('index')];

                $(this).parents('tr').remove();

                calculateTotalHours();
            });

        });

        function calculateTotalHours() {
            let maxHours = moment.utc(hours, "HH:mm");
            let addedHours = moment.utc('00:00', "HH:mm");
            let dateDiff = dateDifference('00:00', '00:00');
            matchingHours = false;

            schedulesForm.find('button[type=submit]').prop('disabled', true);

            $.each(schedules, function (index, schedule) {
                if (schedule) {
                    dateDiff = dateDifference(schedule.start_time, schedule.end_time);

                    addedHours = addedHours.add(moment.duration(dateDiff)._milliseconds, 'ms');
                }
            });

            schedulesTable.find('tfoot .total-hours').text(addedHours.format('HH:mm'));

            if (addedHours.format('HH:mm') === maxHours.format('HH:mm')) {
                schedulesForm.find('button[type=submit]').prop('disabled', false);

                matchingHours = true;
            }
        }
    </script>
@endsection
