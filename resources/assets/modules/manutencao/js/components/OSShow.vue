<template>

    <div>

        <v-card flat>

            <v-toolbar class="white" flat>

                <v-toolbar-title>

                    <span>Ordem de Serviço</span>

                </v-toolbar-title>

                <v-layout row wrap>

                    <v-flex md5 xs5 >

                        <v-select
                                v-bind:items="items"
                                v-model="selected"
                                class="ml-2"
                        ></v-select>

                    </v-flex>

                    <v-spacer></v-spacer>

                    <os-dialog-create :service="this.$route.params.id" @reload-data="getOss"></os-dialog-create>

                </v-layout>

            </v-toolbar>

            <v-layout row wrap>

                <v-flex xs12 md12>

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

                               <span class="title">Técnicos:</span>

                               <blockquote>

                                   <v-card flat>

                                       <technitians-component :os="id" @loaded="setTech"></technitians-component>

                                   </v-card>

                               </blockquote>

                           </v-flex>

                        </v-layout>

                        <v-divider></v-divider>

                        <v-layout row wrap>

                            <v-flex xs8 md8>

                                <span class="title">Data</span>

                                <blockquote>

                                    <v-card flat>

                                        <v-layout wrap row>

                                            <v-flex xs6 md6>

                                                <v-text-field
                                                    v-model="osCreatedAt"
                                                    readonly
                                                    label="Criado em"
                                                    prepend-icon="event"
                                                ></v-text-field>

                                            </v-flex>

                                            <v-flex xs6 md6>

                                                <datepicker :os="this.selected" fieldTitle="Finalizado em" @loaded="dateChanged"></datepicker>

                                            </v-flex>

                                        </v-layout>

                                    </v-card>

                                </blockquote>

                            </v-flex>

                            <v-flex xs4 xmd4>

                                <span class="title">Status</span>

                                <blockquote>

                                    <v-select
                                            v-bind:items="statusItems"
                                            v-model="status"
                                            label="Status"
                                            single-line
                                            bottom
                                    ></v-select>

                                </blockquote>

                            </v-flex>

                        </v-layout>

                       <v-divider></v-divider>

                       <v-layout row wrap>

                           <v-flex xs12 md12>

                               <span class="title">Medidas</span>

                               <blockquote>

                                   <v-card flat>

                                        <epi-component :os="id"></epi-component>

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

    import resourceMixins       from '../mixins/resourceMixins';
    import statusItems          from '../mixins/status';
    import Filter               from '../../../../common/filters';
    import Datepicker           from '../../../../common/components/DatePicker.vue';
    import Epi                  from './Epis.vue';
    import OSMixin              from '../mixins/OS';
    import Technitioans         from './Technitians.vue';
    import OSCreate             from '../components/OSCreate.vue';
    import {OS}                 from '../forms/OS';

    export default {

        filters: Filter,

        mixins: [resourceMixins, OSMixin],

        mounted() {

            this.getOss();

        },

        data() {

            return {

                oss: [],

                items: [],

                status: '',

                statusItems: statusItems.items,

                selected: null,

                endDate: '',

                technitians: []

            }

        },

        computed: {

            osCreatedAt() {

                return moment(this.created_at, 'YYYY-MM-DD HH:mm:ss').format('DD/MM/YY');

            }

        },

        watch: {

            selected() {

                this.loadFormData();

            }

        },

        methods: {

            getOss()
            {

                this.solicitacaoOss(this.$route.params.id).then((response) => {

                    this.oss = response.data.oss;

                    let i, data = response.data.oss, items = [];

                    for (i in data) {

                        let obj = {

                            text: data[i].codigo + ' ' + data[i].tecnica.nome + '/' + data[i].status,

                            value: data[i]

                        };

                        items.push(obj);

                    }

                    this.items = items;

                    this.selected = items[items.length -1].value;

                    console.log(this.selected);

                });

            },

            loadFormData() {

                this.setOs(this.selected);

                this.status = this.selected.status;

            },

            getDate(value) {

                console.log(value);

            },

            dateChanged(value) {

                this.endDate = value;

                console.log(value);

            },

            setTech(value) {

                this.technitians = value;

            }

        },

        components: {

            'datepicker': Datepicker,
            'epi-component': Epi,
            'technitians-component': Technitioans,
            'os-dialog-create': OSCreate

        }

    }


</script>