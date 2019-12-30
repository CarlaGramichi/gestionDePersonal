<template>
    <div class="card">

        <div class="card-header">
            <strong>Seleccionar un subcargo</strong>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="form-group col-sm-4">
                    <label for="position_type_id">Seleccionar subcargo</label>

                    <v-select :options="positionTypes" id="position_type_id" label="name"
                              v-model="selectedPositionType" @input="setSelectedPositionType"></v-select>

                </div>

            </div>

        </div>

    </div>
</template>

<script>
    export default {
        props: ['positionTypes'],
        data() {
            return {
                selectedPositionType: '',
            }
        },
        methods: {
            setSelectedPositionType() {
                this.$root.selectedPositionType = this.selectedPositionType;

                this.$root.$emit('checkAvailability', this.selectedPositionType);
            },
        },
    }
</script>
