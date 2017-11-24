<template>

    <div class="pa-4">

        <v-layout row wrap>

            <v-flex xs12 md4>

                <v-list>

                    <v-list-tile>

                        <v-list-tile-avatar>

                            <v-icon x-large>date_range</v-icon>

                        </v-list-tile-avatar>

                        <v-list-tile-content>

                            <v-list-tile-title>Data de criação</v-list-tile-title>

                            <v-list-tile-sub-title>{{ service.created_at | date }}</v-list-tile-sub-title>

                        </v-list-tile-content>

                    </v-list-tile>

                </v-list>

            </v-flex>

            <v-flex xs12 md4>

                <v-list>

                    <v-list-tile>

                        <v-list-tile-avatar>

                            <v-icon x-large>date_range</v-icon>

                        </v-list-tile-avatar>

                        <v-list-tile-content>

                            <v-list-tile-title>Data de término</v-list-tile-title>

                            <v-list-tile-sub-title>{{ service.created_at | date }}</v-list-tile-sub-title>

                        </v-list-tile-content>

                    </v-list-tile>

                </v-list>

            </v-flex>

            <v-flex xs12 md4>

                <v-select
                        v-bind:items="statusItems | serviceStatus"
                        v-model="statusValue"
                        label="Status"
                        single-line
                        prepend-icon="check_circle"
                        bottom
                >
                </v-select>

            </v-flex>

            <v-flex xs12 md12>

                <h6>Descrição</h6>

                <blockquote>

                    {{ service.description }}

                </blockquote>

            </v-flex>

        </v-layout>

    </div>

</template>

<script>

    import Filters from '../../../../common/filters';
    import StatusItems from '../mixins/status';
    import MaintenenceResource from '../mixins/resourceMixins';

    export default {

        props: ['service'],

        filters: Filters,

        mixins: [MaintenenceResource],

        mounted() {

            this.statusValue = this.service.status;

        },

        data() {

            return {

                statusItems: StatusItems.items,

                status: null

            }

        },

       computed: {

            statusValue: {

                get() {

                    return this.service.status;

                },

                set(value) {

                    this.status = value;

                    this.changeStatus(value);

                }

            }

       },

        methods: {

            changeStatus(value) {

                if (value !== this.service.status) {

                    let serviceUpdated = this.service.service;

                    serviceUpdated.status = value;

                    console.log(serviceUpdated);

                    this.updateOrder(this.$route.params.id, serviceUpdated).then((response) => {

                        console.log(response);

                    });

                }

            }

        }
    }

</script>