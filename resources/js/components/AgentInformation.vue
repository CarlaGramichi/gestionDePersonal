<template>
    <div class="user-data-container card">

        <div class="card-header">
            <strong>Datos del agente seleccionado</strong>
        </div>

        <div class="card-body user-data row">

            <div class="col-sm-6" v-for="(field, value) in agentFields">
                <p><span>{{ field }}: </span><strong>{{ agentData[value] ? agentData[value] : "-" }}</strong></p>
            </div>

        </div>

    </div>
</template>

<script>
    let agentFields = {
        'name': 'Nombre',
        'surname': 'Apellido',
        'dni': 'D.N.I.',
        'cuil': 'CUIL',
        'born_date': 'Fecha de nacimiento',
        'email': 'E-mail',
        'phone': 'Teléfono',
        'cellphone': 'Celular',
        'address': 'Dirección',
        'city': 'Ciudad',
        'state': 'Provincia',
        'country': 'País',
    };

    export default {
        props: ['agentData'],
        data() {
            return {
                agentFields: agentFields,
            }
        },
    }
</script>
