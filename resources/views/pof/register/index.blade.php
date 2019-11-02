@extends('layouts.app')

@section('breadcrumbs')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">P.O.F.</li>
        <li class="breadcrumb-item">Registrar P.O.F.</li>
    </ol>
@endsection

@section('content')
    <div class="vh-100 container-fluid">

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/plugins/typeahead /typeahead.min.js') }}"></script>

    <script>
        let search = $('[name=search]');
        let agent_table = $('.agent-table');
        let new_agent_button = $('a.new-agent');
        let new_agent_alert = $('.new-agent-alert');
        let agent = [];
        let xhr;

        $(document).ready(function () {

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

                    agent_table.removeClass('d-none');

                    agent_table.find('tbody').html(`
                    <tr>
                        <td>${item.dni}</td>
                        <td>${item.surname}, ${item.name}</td>
                        <td></td>
                        <td class="text-center"><a href="" class="btn btn-block btn-primary">Acciones</a></td>
                        <td class="text-center"><a href="agents/${item.id}/assign" class="btn btn-block btn-warning">Asignar propuesta</a></td>
                        <td class="text-center"><button class="btn btn-block btn-success">Documentos</button></td>
                    </tr>
                    `);
                }
            })
        });
    </script>
@endsection
