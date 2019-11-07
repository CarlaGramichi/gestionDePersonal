@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Agentes</li>
        <li class="breadcrumb-item">Dar de alta un agente</li>
    </ol>
@endsection

@section('content')
    <div class="vh-100 container-fluid">

        @include('partials.alerts')

        <div class="col-12">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <p><span class="fa fa-info-circle"></span>&emsp;Primero debe buscar un agente antes de poder darlo de
                    alta.
                    En el caso de que no exista se habilitará la opción para poder darlo de alta.</p>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>


        {!! Form::open(['route' => 'agents.index','class'=>'col-sm-12 search-agent']) !!}
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
        </div>
        {!! Form::close() !!}

        <div class="col-sm-12 d-none new-agent-alert">
            <div class="alert alert-warning" role="alert">
                <p>
                    <span class="fas fa-exclamation-triangle"></span>&emsp;
                    Parece que el agente que estás buscando no se encuentra cargado en el sistema.
                    Para darlo de alta tenés que presionar el botón
                    <a href="{{ route('agents.create') }}" class="btn btn-success disabled new-agent">
                        Nuevo&emsp;<span class="fa fa-user-plus"></span>
                    </a>
                </p>
            </div>
        </div>

        <table class="table table-responsive-sm hidden agent-table {{ !isset($agent) ? 'd-none' : ''}}">
            <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Propuesta</th>
                <th colspan="2" class="text-center">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($agent))
                <tr>
                    <td>{{$agent->dni}}</td>
                    <td>{{$agent->surname}}, {{$agent->name}}</td>
                    <td></td>
                    <td class="text-center">
                        <a class="btn btn-info" href="agents/{{$agent->id}}/edit">Editar&emsp;<span
                                    class="fa fa-edit"></span></a>
                    </td>
                    <td class="text-center">
                        <form action="agents/{{$agent->id}}" method="post">
                            {{ method_field('delete') }}
                            {{ @csrf_field() }}
                            <button type="submit" class="btn btn-danger">Borrar&emsp;<span
                                        class="fa fa-trash"></span></button>
                        </form>
                    </td>
                </tr>

            @endif
            </tbody>
        </table>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/plugins/typeahead/typeahead.min.js') }}"></script>

    <script>
        let search = $('[name=search]');
        let agent_table = $('.agent-table');
        let new_agent_button = $('a.new-agent');
        let new_agent_alert = $('.new-agent-alert');
        let search_agent_button = $('form.search-agent button[type=submit]');
        let agent = [];
        let xhr;

        window.setTimeout(function () {
            $('.alert-info').slideUp('slow')
        }, 10000);

        $(document).ready(function () {

            search_agent_button.click(event, function () {
                event.preventDefault();

                if (agent.id) {
                    agent_table.removeClass('d-none');

                    return true;
                }

                new_agent_button.removeClass('disabled');
                new_agent_alert.removeClass('d-none');
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
                        <td class="text-center"><a class="btn btn-info" href="agents/${item.id}/edit">Editar&emsp;<span class="fa fa-edit"></span></a></td>
                        <td class="text-center">
                            <form action="agents/${item.id}" method="post">
                                {{ method_field('delete') }}
                            {{ @csrf_field() }}
                        <button type="submit" class="btn btn-danger">Borrar&emsp;<span class="fa fa-trash"></span></button>
                    </form>
        </td>
    </tr>
`);
                }
            })
        });
    </script>
@endsection
