<template>

    <v-container grid-list-xs grid-list-md>

        <v-layout row wrap>

            <v-flex xs12>

                <h6>Manutenção</h6>

            </v-flex>

            <v-flex xs12 class="align-center">

                <v-card>

                    <v-card-title>

                        <h6>Lista de Chamados</h6>

                        <v-spacer></v-spacer>

                        <v-text-field append-icon="search" label="Busca" single-line hide-details v-model="search"></v-text-field>

                    </v-card-title>

                    <v-data-table
                            v-bind:headers="headers"
                            :items="items"
                            v-bind:search="search"
                            :loading="loading"
                            v-bind:pagination.sync="pagination"
                            :total-items="totalItems"
                    >

                        <template slot="items" scope="props">

                            <td>{{ props.item.codigo }}</td>
                            <td class="text-xs-left">{{ props.item.responsavel.name }}</td>
                            <td class="text-xs-left">{{ props.item.solicitante.name }}</td>
                            <td class="text-xs-left">{{ props.item.created_at }}</td>
                            <td class="text-xs-left">{{ props.item.status }}</td>

                        </template>

                    </v-data-table>

                </v-card>



            </v-flex>

        </v-layout>



    </v-container>

</template>

<script>

    export default {

        mounted() {

            this.loadServices();

        },

        data() {

            return {

                headers: [

                    {text: 'Nº Serviço', align: 'left', sortable: true, value: 'codigo'},
                    {text: 'Responsável', align: 'left', sortable: true, value: 'responsavel'},
                    {text: 'Solicitante', align: 'left', sortable: true, value: 'solicitante'},
                    {text: 'Entrada', align: 'left', sortable: true, value: 'created_at'},
                    {text: 'Status', align: 'left', sortable: true, value: 'status'},

                ],

                items: [],

                pagination: {},

                totalItems: 0,

                search: '',

                loading: true

            }

        },

        watch: {

            pagination: {

                handler() {

                    this.loading = true;

                    this.loadServices();

                },

                deep: true

            }

        },

        methods: {

            loadServices() {

                this.servicesResource().then((response) => {

                    let filter = this.filter(response.data.solicitacoes);

                    this.items = filter.fItems;

                    this.totalItems = filter.total;

                    this.loading = false;

                });

            },

            servicesResource() {

                return this.$http.get('manutencao');

            },

            filter(items) {

                const { sortBy, descending, page, rowsPerPage } = this.pagination;

                let fItems = items;

                const total = fItems.length;

                if(this.pagination.sortBy) {

                    fItems = fItems.sort((a,b) => {

                        const sortA = a[sortBy];

                        const sortB = b[sortBy];

                        if(descending) {

                            if(sortA < sortB) return 1;

                            if(sortA > sortB) return -1;

                            return 0

                        } else {

                            if(sortA < sortB) return -1;

                            if(sortA > sortB) return 1;

                        }
                    });

                }

                if (rowsPerPage > 0) {

                    fItems = fItems.slice((page -1) * rowsPerPage, page * rowsPerPage);

                }

                if (this.search)
                {

                    console.log(this.search);

                }

                return { fItems, total };

            }

        }

    }

</script>