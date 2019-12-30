<template>
    <div class="card">

        <div class="card-header">
            <strong>Seleccionar un agente</strong>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="form-group col-sm-4">
                    <label for="agent_id">Seleccionar agente</label>

                    <v-select :options="agents" id="agent_id" label="name"
                              v-model="selectedAgent" @input="setSelectedPositionType"></v-select>
                </div>

            </div>

        </div>

    </div>
</template>

<script>
    export default {
        props: ['agents'],
        data() {
            return {
                selectedAgent: '',
            }
        },
        methods: {
            setSelectedPositionType() {
                this.$root.selectedAgent = this.selectedAgent;
            }
        }
    }
</script>
