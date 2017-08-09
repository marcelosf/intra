<template>

    <v-menu offset-y>

        <v-btn icon slot="activator">

            <v-icon class="white--text">account_circle</v-icon>

        </v-btn>

        <v-card>

            <v-card-title primary-title>

                <div class="headline">Minha Conta</div>

            </v-card-title>

            <v-card-text>

                <v-list>

                    <v-list-tile>

                        <v-list-tile-avatar>

                            <v-icon large>account_circle</v-icon>

                        </v-list-tile-avatar>

                        <v-list-tile-content>

                            <v-list-tile-title>

                                {{ username }}

                            </v-list-tile-title>

                            <v-list-tile-sub-title>

                                {{ department }}

                            </v-list-tile-sub-title>

                        </v-list-tile-content>



                    </v-list-tile>

                </v-list>

            </v-card-text>

            <v-card-actions>

                <v-btn flat class="blue--text" @click.native.stop="logout()">Sair</v-btn>

            </v-card-actions>

        </v-card>

    </v-menu>

</template>

<script>

    import Auth from '../../common/services/auth';

    export default {

        data() {

            return {

                user: Auth.user

            }

        },

        computed: {

           username() {

//               return this.user.data ? this.user.data.name : '';

               return this.$store.getters.username;
           },

           department() {

//                return this.user.data ? this.user.bond()[0].nomeSetor : '';

               return this.$store.getters.department;

           }

        },


        methods: {

            logout() {

                this.user.data = null;

                this.user.check = false;

                Auth.logout();

            }

        }

    }

</script>