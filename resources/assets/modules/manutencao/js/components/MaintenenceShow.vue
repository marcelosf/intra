<template>

    <v-container grid-list-md>

        <v-card>

            <v-tabs centered fixed>

                <v-toolbar class="white">

                    <v-toolbar-title>Chamado {{ code }}</v-toolbar-title>

                </v-toolbar>

                <v-tabs-bar class="white">

                    <v-tabs-item ripple :href="'#service'">Solicitação</v-tabs-item>

                    <v-tabs-item ripple :href="'#requester'">Solicitante</v-tabs-item>

                    <v-tabs-item ripple :href="'#os'">Ordens de Serviço</v-tabs-item>

                    <v-tabs-slider></v-tabs-slider>

                </v-tabs-bar>

                <v-tabs-items>

                    <v-tabs-content id="service">

                        <v-card flat>

                            <v-layout row wrap>

                                <v-flex xs12 md6>

                                    <requester-list :requester="requester"></requester-list>

                                </v-flex>

                                <v-flex xs12 md6>

                                    <responsible-list :responsible="responsible"></responsible-list>

                                </v-flex>

                                <v-flex xs12 md12>

                                    <service-list :service="service"></service-list>

                                </v-flex>

                            </v-layout>

                        </v-card>

                    </v-tabs-content>

                    <v-tabs-content id="requester">

                        <v-card flat>

                            <v-card-text>

                                <requester-list :requester="requester"></requester-list>

                            </v-card-text>

                        </v-card>

                    </v-tabs-content>


                    <v-tabs-content id="os">

                        <v-card flat>

                            <v-card-text>

                                OS

                            </v-card-text>

                        </v-card>

                    </v-tabs-content>

                </v-tabs-items>

            </v-tabs>

        </v-card>

    </v-container>

</template>

<script>

    import resourceMixins from '../mixins/resourceMixins';
    import Requester from './RequesterShowList.vue';
    import Responsible from './ResponsibleShowList.vue';
    import OS from './OSShowList.vue';
    import Service from './ServiceShowList.vue';

    export default {

        mixins: [resourceMixins],

        created() {

            this.loadService();

        },

        data() {

            return {

                code: '',

                requester: {

                    name: '',
                    email: '',
                    local: '',
                    phone: '',

                },

                responsible: {

                    name: '',
                    email: '',
                    local: '',
                    phone: ''
                },

                service: {

                    description: '',
                    created_at: ''

                }

            }

        },

        methods: {

            loadService() {

                this.getResource(this.$route.params.id).then((response) => {

                    let service = response.data.solicitacao;

                    this.setRequester(service);

                    this.setResponsible(service);

                    this.setService(service);

                    this.code = service.codigo;



                });

            },

            setRequester(service) {

                this.requester.name = service.solicitante.name;

                this.requester.email = service.solicitante.main_email;

                this.requester.local = 'Todo';

                this.requester.phone = service.solicitante.phone;

                this.code = service.codigo;

            },

            setResponsible(service) {

                this.responsible.name = service.responsavel.name;

                this.responsible.email = service.responsavel.main_email;

                this.responsible.local = 'Todo';

                this.responsible.phone = service.responsavel.phone;

            },

            setService(service) {

                this.service.description = service.descricao;

                this.service.created_at = service.created_at;

            }

        },

        components: {

            'requester-list': Requester,
            'responsible-list': Responsible,
            'os-list': OS,
            'service-list': Service

        }

    }

</script>