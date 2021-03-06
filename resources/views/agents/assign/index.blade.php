@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Agentes</li>
        <li class="breadcrumb-item">Asignar propuesta a un agente</li>
    </ol>
@endsection

@section('content')
    <div class="vh-100 container-fluid">
        {!! Form::open(['route' => 'agents.index','class'=>'col-sm-12']) !!}
        <div class="row">
            <div class="form-group col-sm-8">
                {!! Form::label('search','Buscar un agente') !!}

                {!! Form::text('search', isset($agent) ? $agent->name : null, ['class' => 'form-control typeahead', 'placeholder' => 'Buscar por nombre o dni...', 'autocomplete' => 'off','data-provide' => 'typeahead']) !!}
            </div>

            <div class="form-group col-sm-2">
                <label>&nbsp;</label>
                <button type="submit" class="btn btn-block btn-primary">
                    Buscar&emsp;<span class="fa fa-search"></span>
                </button>
            </div>

            <div class="col-sm-12 d-none new-agent-alert">
                <div class="alert alert-warning" role="alert">
                    <p>
                        <span class="fas fa-exclamation-triangle"></span>&emsp;
                        Parece que el agente que estás buscando no se encuentra cargado en el sistema.
                        Para darlo de alta tenés que presionar el botón
                        <a href="{{ route('agents.create') }}" class="btn btn-success disabled new-agent">
                            Nuevo&emsp;<span class="fa fa-user-plus"></span>
                        </a>
                        O podés ingresar al menú > • Dar de alta un agente.
                    </p>
                </div>
            </div>

            <table class="table table-responsive-sm hidden agent-table d-none">
                <thead>
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Propuesta</th>
                    <th colspan="1" class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>

        </div>

        {!! Form::close() !!}
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/plugins/typeahead/typeahead.min.js') }}"></script>

    <script>
        let search = $('[name=search]');
        let agent_table = $('.agent-table');
        let new_agent_button = $('a.new-agent');
        let new_agent_alert = $('.new-agent-alert');
        let search_agent_button = $('form button[type=submit]');
        let agent = [];
        let xhr;

        $(document).ready(function () {

            search_agent_button.click(event, function () {
                event.preventDefault();

                if (agent.id) {
                    agent_table.removeClass('d-none');
                }
            });

            search.typeahead({
                minLength: 3,
                autoSelect: false,
                matcher: function (item) {
                    return true;
                },
                source: function (term, process) {
                    if (xhr) {
                        xhr.abort();
                    }
                    xhr = $.ajax({
                        url: `{{ route('agents.index') }}`,
                        type: 'GET',
                        data: {
                            search: term,
                        },
                        dataType: 'JSON',
                        async: true,
                        beforeSend: function () {
                            agent = [];

                            agent_table.addClass('d-none');
                        },
                        success: function (data) {
                            new_agent_button.addClass('disabled');
                            new_agent_alert.addClass('d-none');

                            process(data);

                            if (!data.length) {
                                new_agent_button.removeClass('disabled');
                                new_agent_alert.removeClass('d-none');
                            }
                        }
                    });
                },
                afterSelect: function (item) {
                    agent = item;

                    // agent_table.removeClass('d-none');
                    $('.agent-table').find('tbody').html(`
                    <tr>
                        <td>${item.dni}</td>
                        <td>${item.surname}, ${item.name}</td>
                        <td></td>
                        <td class="text-center"><a href="agents_assign/${item.id}/positions" class="btn btn-block btn-success">Asignar propuesta&emsp;<span class="fa fa-share"></span></a></td>
                    </tr>
                    `);
                }
            })
        });
    </script>
@endsection
