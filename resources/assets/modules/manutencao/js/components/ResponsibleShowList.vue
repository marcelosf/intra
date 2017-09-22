<template>

    <div>

        <v-card flat class="pa-4">

            <v-toolbar class="white " flat>

                <v-toolbar-title>

                    Responsável

                </v-toolbar-title>

            </v-toolbar>

            <v-list two-line>

                <template>

                    <v-list-tile>

                        <v-list-tile-avatar>

                            <v-icon x-large>account_circle</v-icon>

                        </v-list-tile-avatar>

                        <v-list-tile-content>

                            <v-list-tile-title>Responsável</v-list-tile-title>

                            <v-list-tile-sub-title>{{ responsible.name }}</v-list-tile-sub-title>

                        </v-list-tile-content>

                    </v-list-tile>

                    <v-divider></v-divider>

                    <v-list-tile>

                        <v-list-tile-avatar>

                            <v-icon x-large>email</v-icon>

                        </v-list-tile-avatar>

                        <v-list-tile-content>

                            <v-list-tile-title>E-mail</v-list-tile-title>

                            <v-list-tile-sub-title>{{ responsible.email }}</v-list-tile-sub-title>

                        </v-list-tile-content>

                    </v-list-tile>

                    <v-divider></v-divider>

                    <v-list-tile>

                        <v-list-tile-avatar>

                            <v-icon x-large>room</v-icon>

                        </v-list-tile-avatar>

                        <v-list-tile-content>

                            <v-list-tile-title>Sala</v-list-tile-title>

                            <v-list-tile-sub-title>{{ responsible.local }}</v-list-tile-sub-title>

                        </v-list-tile-content>

                    </v-list-tile>

                    <v-divider></v-divider>

                    <v-list-tile>

                        <v-list-tile-avatar>

                            <v-icon x-large>phone</v-icon>

                        </v-list-tile-avatar>

                        <v-list-tile-content>

                            <v-list-tile-title>Ramal</v-list-tile-title>

                            <v-list-tile-sub-title>{{ responsible.phone | phone}}</v-list-tile-sub-title>

                        </v-list-tile-content>

                    </v-list-tile>

                </template>

            </v-list>


        </v-card>


    </div>

</template>

<script>

    import Filter from '../../../../common/filters';

    export default {

        props: ['responsible'],

        filters: Filter

    }

</script>