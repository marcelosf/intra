<template>

    <div>

        <v-dialog v-model="dialog" persistent width="50%">

                <v-btn slot="activator" flat>

                    <v-icon>add</v-icon>

                    Criar

                </v-btn>

            <v-layout row wrap>

                <v-flex xs12 md12>

                    <v-card flat>

                        <v-card-title class="headline">Nova Ordem de Serviço</v-card-title>

                        <v-card-text>

                            <v-container fluid>

                                <v-form v-model="valid" ref="form">

                                    <v-text-field
                                            label="Descrição"
                                            v-model="os.description"
                                    ></v-text-field>

                                    <v-select
                                            label="Técnicos"
                                            v-bind:items="technitianItems"
                                            v-model="os.technitians"
                                            multiple
                                            required
                                            chips
                                            :rules="[rules.selectIsEmpty]"
                                    ></v-select>

                                    <v-select
                                            label="Área Técnica"
                                            v-bind:items="techItems"
                                            v-model="os.tech"
                                            required
                                            :rules="[rules.textIsEmpty]"
                                    ></v-select>

                                    <v-select
                                            label="Proteção Individual (EPI) / Proteção Coletiva"
                                            v-bind:items="epiItems"
                                            v-model="os.epis"
                                            multiple
                                            chips
                                    ></v-select>

                                    <v-text-field multi-line label="Observação" v-model="os.observation"></v-text-field>

                                </v-form>

                            </v-container>

                        </v-card-text>

                        <v-card-actions>

                            <v-spacer></v-spacer>

                            <v-btn slot="actions" class="blue--text darken-1" flat @click.native="dialog = false">Cancelar</v-btn>

                            <v-btn slot="actions" class="blue--text darken-1" flat @click.native="send(); dialog = false;">Salvar</v-btn>

                        </v-card-actions>

                    </v-card>

                </v-flex>

            </v-layout>


        </v-dialog>


    </div>

</template>

<script>

    import UserResources from '../../../user/js/mixins/resourceMixins';
    import MaintenenceResource from '../mixins/resourceMixins';
    import {OS} from '../forms/OS';

    export default {

        mixins: [UserResources, MaintenenceResource],

        props: ['service'],


        created() {

            this.getTechnitians();

            this.getEpis();

            this.getTechArea();

        },

        data() {

            return {

                dialog: false,

                os: {

                    description: null,

                    technitians: null,

                    epis: null,

                    tech: null,

                    observation: null

                },

                technitianItems: [],

                epiItems: [],

                techItems: [],

                valid: false,

                rules: {

                    selectIsEmpty(value) {

                        return (value != '') ? true : 'Campo Obrigatório.';

                    },

                    textIsEmpty(value) {

                        return (!!value) || 'Campo Obrigatório.';

                    }

                }

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

            },

            getTechArea() {

                this.maintenenceTechArea().then((response) => {

                    let i, data = response.data, items = [];

                    for (i in data) {

                        let obj = {

                            text: data[i].nome,

                            value: data[i].id

                        }

                        items.push(obj);

                    }

                    this.techItems = items;

                });

            },

            send() {

                this.$refs.form.validate();

                if (this.valid) {

                    let os = new OS(this.$route.params.id, this.os.description, 3, this.os.technitians, this.os.tech, this.os.epis, this.os.observation);

                    this.maintenenceResource().save({query: 'os'}, os).then((response) => {

                        this.$emit('reload-data');

                    });

                }

            },

        }

    }

</script>