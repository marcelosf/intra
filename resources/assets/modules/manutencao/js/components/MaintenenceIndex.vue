<template>

    <v-container grid-list-xs>

        <v-layout row wrap>

            <v-flex xs12 class="align-center">

                <v-card>

                    <v-card-title>

                        <h6>Lista de Chamados</h6>

                        <v-spacer></v-spacer>

                        <v-text-field append-icon="search" label="Busca" single-line hide-details v-model="search"></v-text-field>

                    </v-card-title>

                    <v-data-table
                            v-bind:headers="headers"
                            v-bind:items="items"
                            v-bind:search="search"
                            :loading="loading"
                            v-bind:pagination.sync="pagination"
                            hide-actions
                    >

                        <template slot="items" scope="props">

                            <td>{{ props.item.codigo }}</td>
                            <td class="text-xs-left">{{ props.item.responsavel.name }}</td>
                            <td class="text-xs-left">{{ props.item.solicitante.name }}</td>
                            <td class="text-xs-left">{{ props.item.created_at }}</td>
                            <td class="text-xs-left">{{ props.item.status }}</td>

                        </template>

                    </v-data-table>

                    <div class="text-xs-left pt-4 pb-4">

                        <v-pagination :length="totalPages" v-model="pagination.page" circle></v-pagination>

                    </div>

                </v-card>

            </v-flex>

        </v-layout>

    </v-container>

</template>

<script>

    import VIcon from "../../../../../../node_modules/vuetify/src/components/VIcon/VIcon.vue";

    export default {

        components: {VIcon},
        mounted() {

            this.loadServices();

        },


        data() {

            return {

                headers: [

                    {text: 'Nº Serviço', align: 'left', value: 'codigo'},
                    {text: 'Responsável', align: 'left', value: 'responsavel'},
                    {text: 'Solicitante', align: 'left', value: 'solicitante'},
                    {text: 'Entrada', align: 'left', value: 'created_at'},
                    {text: 'Status', align: 'left', value: 'status'},

                ],

                items: [],

                search: '',

                pagination: {},

                totalPages: 1,

                loading: true

            }

        },


        computed: {

            pages() {

                let pag = this.pagination;

                if (pag.rowsPerPage > 0) {

                    return Math.ceil((pag.totalItems / pag.rowsPerPage));

                }

            }

        },


        methods: {

            loadServices() {

                this.loading = true;

                this.servicesResource().then((response) => {

                    console.log(response.data.solicitacoes);

                    this.paginate(response.data.solicitacoes);

                });

            },

            servicesResource() {

                return this.$http.get('manutencao');

            },

            paginate(items) {

                this.pagination.sortBy = 'codigo';

                this.pagination.rowsPerPage = 10;

                this.pagination.totalItems = items.length;

                this.loading = false;

                this.items = items;

                this.totalPages = this.pages;

            }

        }

    }

</script>