<template>

    <div>

        <v-card flat>

            <v-toolbar class="white" flat>

                <v-toolbar-title>Ordens de Serviço</v-toolbar-title>

                <v-spacer></v-spacer>

            </v-toolbar>

            <v-layout row wrap>

                <v-flex xs12 md2>

                    <v-layout row wrap>

                            <v-data-table
                                    v-model="selected"
                                    v-bind:headers="headers"
                                    v-bind:items="items"
                                    :loading="loading"
                                    v-bind:pagination.sync="pagination"
                                    hide-actions
                            >

                                <template slot="items" scope="props">
                                    <tr :active="props.selected" @click="props.selected = !props.selected; select(props);">
                                        <td>{{ props.item.codigo }}</td>
                                    </tr>
                                </template>

                            </v-data-table>

                            <div class="text-xs-left pt-4 pb-4" v-if="showPagination">

                                <v-pagination :length="totalPages" v-model="pagination.page" circle></v-pagination>

                            </div>

                    </v-layout>

                    <v-divider></v-divider>

                    <v-layout>

                        <v-btn primary block bottom>Nova OS</v-btn>

                    </v-layout>


                </v-flex>

                <v-flex xs12 md10>

                   <v-card flat class="ma-3">

                       <v-layout row wrap>

                           <v-flex xs12 md12>

                               <span class="title">Serviço:</span>

                               <blockquote>

                                   <v-card flat>

                                        {{ service }}

                                   </v-card>

                               </blockquote>

                           </v-flex>

                       </v-layout>

                       <v-divider></v-divider>

                        <v-layout row wrap>

                           <v-flex xs12 md12>

                               <span class="title">Técnicos:</span>

                               <blockquote>

                                   <v-card flat>

                                       <v-select
                                               v-bind:items="technitianItems"
                                               v-model="technitians"
                                               multiple
                                               chips
                                       ></v-select>

                                   </v-card>

                               </blockquote>

                           </v-flex>

                        </v-layout>

                        <v-divider></v-divider>

                        <v-layout row wrap>

                            <v-flex xs12 md12>

                                <span class="title">Data</span>

                                <blockquote>

                                    <v-card flat>

                                        <v-layout wrap row>

                                            <v-flex xs4 md4>

                                                <v-text-field
                                                    v-model="osCreatedAt"
                                                    readonly
                                                    label="Criado em"
                                                    prepend-icon="event"
                                                ></v-text-field>

                                            </v-flex>

                                            <v-flex xs4 md4>

                                                <datepicker fieldTitle="Finalizado em"></datepicker>

                                            </v-flex>

                                            <v-flex xs4 md4>

                                                <v-select
                                                        v-bind:items="statusItems"
                                                        v-model="status"
                                                        label="Status"
                                                        single-line
                                                        bottom
                                                ></v-select>

                                            </v-flex>

                                        </v-layout>

                                    </v-card>

                                </blockquote>

                            </v-flex>

                        </v-layout>

                       <v-divider></v-divider>

                       <v-layout row wrap>

                           <v-flex xs12 xmd12>

                               <span class="title">Observação</span>

                               <blockquote>

                                    {{ observation }}

                               </blockquote>

                           </v-flex>

                       </v-layout>

                       <v-divider></v-divider>

                       <v-layout row wrap>

                           <v-flex xs12 md12>

                               <span class="title">Medidas</span>

                               <blockquote>

                                   <v-card flat>

                                        {{ epi }}

                                   </v-card>

                               </blockquote>

                           </v-flex>

                       </v-layout>

                       <v-divider></v-divider>

                       <v-layout row wrap>

                           <v-flex xs12 md12>

                               <span class="title">Histórico</span>

                               <blockquote>

                                   <v-card flat>

                                        {{ history }}

                                   </v-card>

                               </blockquote>

                           </v-flex>

                       </v-layout>

                   </v-card>

                </v-flex>

            </v-layout>

        </v-card>

    </div>

</template>

<script>

    import resourceMixins from '../mixins/resourceMixins';
    import statusItems from '../mixins/status';
    import Filter from '../../../../common/filters';
    import Datepicker from '../../../../common/components/DatePicker.vue';
    import OSMixin from '../mixins/OS';

    export default {

        filters: Filter,

        mixins: [resourceMixins, OSMixin],

        created() {

            this.getOss();

        },

        data() {

            return {

                oss: [],

                os: null,

                headers: [

                    {text: 'Código', align: 'left', value: 'codigo'},

                ],

                pagination: {},

                loading: true,

                items: [],

                totalPages: 1,

                status: '',

                statusItems: statusItems.items,

                technitians: [],

                technitianItems: [],

                selected: [],

            }

        },

        computed: {

            pages() {

                let pag = this.pagination;

                if (pag.rowsPerPage > 0) {

                    return Math.ceil((pag.totalItems / pag.rowsPerPage));

                }

            },

            showPagination() {

                return (this.totalPages > 1);

            },

            osCreatedAt() {

                return moment(this.created_at, 'YYYY-MM-DD HH:mm:ss').format('DD/MM/YY');

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

            getEpis(osId) {

                this.osEpis(osId).then((response) => {

                    console.log(response.data);

                })

            },

            paginate(items) {

                this.pagination.sortBy = 'codigo';

                this.pagination.rowsPerPage = 10;

                this.pagination.totalItems = items.length;

                this.loading = false;

                this.items = items;

                this.totalPages = this.pages;

            },

            select() {

                let length = this.selected.length;

                this.selected = this.selected.slice(length -1, length);

                this.status = this.selected[0].status;

                this.getEpis(this.selected[0].id);

                this.setOs(this.selected[0]);

            }


        },

        components: {

            'datepicker': Datepicker

        }


    }


</script>