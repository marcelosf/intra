<template>

    <div>

        <v-layout row wrap>

            <v-flex xs12 md12>

                <v-card>

                    <v-toolbar class="white">

                        <v-toolbar-title>Nova Ordem de Serviço</v-toolbar-title>

                    </v-toolbar>

                    <v-container fluid>

                        <v-select
                                label="Técnicos"
                                v-bind:items="technitianItems"
                                v-model="technitians"
                                multiple
                                chips
                        ></v-select>

                        <v-select label="Área Técnica"></v-select>

                        <v-select
                                label="Proteção Individual (EPI) / Proteção Coletiva"
                                v-bind:items="epiItems"
                                v-model="epis"
                                multiple
                                chips
                        ></v-select>

                        <v-text-field multi-line label="Observação"></v-text-field>

                        <v-btn primary class="text--white">Salvar</v-btn>

                    </v-container>

                </v-card>

            </v-flex>

        </v-layout>

    </div>

</template>

<script>

    import UserResources from '../../../user/js/mixins/resourceMixins';
    import MaintenenceResource from '../mixins/resourceMixins';

    export default {

        mixins: [UserResources, MaintenenceResource],


        created() {

            this.getTechnitians();

            this.getEpis();

        },

        data() {

            return {

                technitianItems: [],

                technitians: [],

                epiItems: [],

                epis: []

            }

        },

        methods: {

            getTechnitians() {

                this.users().then((response) => {

                    let i, data = response.data, items = [];

                    for (i in data) {

                        let obj = {

                            text: data[i].name,

                            value: data[i].id

                        }

                        items.push(obj);

                    }

                    this.technitianItems = items;

                });

            },

            getEpis() {

                this.resourceEpis().then((response) => {

                    let i, data = response.data.epis, items = [];

                    for (i in data) {

                        let obj = {

                            text: data[i].equipamento,

                            value: data[i].id

                        }

                        items.push(obj);

                    }

                    this.epiItems = items;

                });

            }

        }

    }

</script>