<template>
    <div class="user-data-container card" v-if="allowedPositionTypes">

        <div class="card-header">
            <strong>Datos del subcargo seleccionado</strong>
        </div>

        <div class="card-body user-data row">

            <div class="col-sm-12 alert alert-danger" v-if="!positionTypeAvailability.available">
                <p><span class="fa fa-info-circle"></span>&emsp;No quedan cupos disponibles para el subcargo
                    seleccionado.</p>
            </div>

            <div class="col-sm-3" v-for="(field, value) in positionTypeFields">
                <p>
                    <span>{{ field }}: </span>
                    <strong>{{ positionTypeData[value] ? positionTypeData[value] : "-" }}</strong>
                </p>
            </div>

            <div class="col-sm-3" v-if="positionTypeAvailability">
                <p>
                    <span>Disponibles: </span>
                    <strong>{{ positionTypeAvailability.available }}</strong>
                </p>
            </div>

        </div>

    </div>
</template>

<script>
    let positionTypeFields = {
        'quota': 'Cantidad',
        'points': 'Puntaje',
    };

    export default {
        props: {
            positionTypeData: {
                required: true,
            }
        },
        data() {
            return {
                positionTypeFields: positionTypeFields,
                positionTypeAvailability: '',
            }
        },
        methods: {
            checkAvailability() {
                axios.get(`${baseUri}/position_types/${this.$root.selectedPositionType.id}`)
                    .then((response) => {
                        this.positionTypeAvailability = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            }
        },
        computed: {
            allowedPositionTypes() {
                let available = !(['docente', 'horas institucionales'].includes(this.positionTypeData.name.toLowerCase()));
                return available;
            }
        },
        mounted() {
            this.$root.$on('checkAvailability', data => {
                this.checkAvailability();
            });
        },
    }
</script>
