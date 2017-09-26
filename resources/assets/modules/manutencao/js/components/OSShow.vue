<template>

    <div>

        <v-card>

            <v-toolbar class="white">

                <v-toolbar-title>Ordens de Serviço</v-toolbar-title>

                <v-spacer></v-spacer>

                <v-text-field append-icon="search" label="Busca" single-line hide-details v-model="search"></v-text-field>

            </v-toolbar>

            <v-data-table
                    v-bind:headers="headers"
                    v-bind:items="items"
                    v-bind:search="search"
                    :loading="loading"
                    v-bind:pagination.sync="pagination"
                    hide-actions
            >

                <template slot="items" scope="props">

                    <td> <v-btn icon :to="{name: 'maintenence.show', params: {id: props.item.id}}"><v-icon>more_vert</v-icon></v-btn> {{ props.item.codigo }}</td>
                    <td class="text-xs-left">{{ props.item.tecnica.nome | upFirst}}</td>
                    <td class="text-xs-left">{{ props.item.created_at | date}}</td>
                    <td class="text-xs-left">{{ props.item.updated_at | date }}</td>
                    <td class="text-xs-left">{{ props.item.status | serviceStatus | upFirst}}</td>

                </template>

            </v-data-table>

            <div class="text-xs-left pt-4 pb-4">

                <v-pagination :length="totalPages" v-model="pagination.page" circle></v-pagination>

            </div>

        </v-card>


    </div>

</template>

<script>

    import resourceMixins from '../mixins/resourceMixins';
    import Filter from '../../../../common/filters';

    export default {

        filters: Filter,

        mixins: [resourceMixins],

        created() {

            this.getOss();

        },

        data() {

            return {

                oss: [],

                headers: [

                    {text: 'Código', align: 'left', value: 'codigo'},
                    {text: 'Serviço', align: 'left', value: 'tecnica'},
                    {text: 'Criação', align: 'left', value: 'created_at'},
                    {text: 'Finalização', align: 'left', value: 'updated_at'},
                    {text: 'Status', align: 'left', value: 'status'},

                ],

                search: '',

                pagination: {},

                loading: true,

                items: [],

                totalPages: 1

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

            getOss()
            {

                this.loading = true;

                this.solicitacaoOss(this.$route.params.id).then((response) => {

                    this.paginate(response.data.oss);

                });

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