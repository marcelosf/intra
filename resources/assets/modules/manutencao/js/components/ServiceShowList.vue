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

                            <v-list-tile-sub-title>{{ service.created_at }}</v-list-tile-sub-title>

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

                            <v-list-tile-sub-title>{{ service.created_at }}</v-list-tile-sub-title>

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

                            <v-list-tile-title>Status</v-list-tile-title>

                            <v-list-tile-sub-title>{{ service.created_at }}</v-list-tile-sub-title>

                        </v-list-tile-content>

                    </v-list-tile>

                </v-list>

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

    export default {

        props: ['service']

    }

</script>