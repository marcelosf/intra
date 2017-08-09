<template>

    <div>

        <v-navigation-drawer class="grey lighten-5" persistent floating height="100%" clipped enable-resize-watcher v-model="drawer">

            <v-list dense class="pt-3 grey lighten-5">

                <v-list-tile ripple :to="{ name: 'home.index'}"  v-model="activeItem">

                    <v-list-tile-action>

                        <v-icon>home</v-icon>

                    </v-list-tile-action>

                    <v-list-tile-content>

                        <v-list-tile-title>Home</v-list-tile-title>

                    </v-list-tile-content>

                </v-list-tile>

                <v-divider></v-divider>

                <v-list-tile ripple v-model="activeItem" v-for="item in items" :key="item" :to="{ name: item.link }">

                    <v-list-tile-action>

                        <v-icon>{{ item.icon }}</v-icon>

                    </v-list-tile-action>

                    <v-list-tile-content>

                        <v-list-tile-title>{{ item.text }}</v-list-tile-title>

                    </v-list-tile-content>

                </v-list-tile>

            </v-list>

        </v-navigation-drawer>

        <v-toolbar class="light-blue white--text" fixed prominent>

            <v-toolbar-side-icon class="white--text" @click.native.stop="drawer = !drawer"></v-toolbar-side-icon>

            <v-toolbar-title>Intranet</v-toolbar-title>

            <v-spacer></v-spacer>

            <div v-show="!authenticated">

                <oauth-component></oauth-component>

            </div>

            <div v-show="authenticated">

                {{ username }}

                <auth-component></auth-component>

            </div>


        </v-toolbar>

        <main>

            <v-container>

                <v-layout>

                    <v-flex xs12>

                        <transition name="fade" mode="out-in">

                            <router-view></router-view>

                        </transition>

                    </v-flex>

                </v-layout>

            </v-container>

        </main>

    </div>

</template>

<script>

    import Auth from '../../common/services/auth';
    import AuthComponent from '../../common/components/Auth.vue';
    import OAuthComponent from '../../common/components/OAuth.vue';

    export default {

        created() {

            this.$store.commit('user', )

        },

        data() {

            return {

                drawer: true,

                items: [
                    {icon: 'account_balance', text: 'Diretoria', link: 'home.directory'},
                    {icon: 'school', text: 'Colegiados', link: 'home.collegiate'},
                    {icon: 'send', text: 'Comissões', link: 'home.commissions'},
                    {icon: 'email', text: 'E-mail', link: 'home.email'},
                    {icon: 'computer', text: 'Suporte', link: 'home.support'},
                    {icon: 'build', text: 'Serviços', link: 'home.services'},
                    {icon: 'book', text: 'Normas', link: 'home.roles'},
                    {icon: 'send', text: 'CCE', link: 'home.cce'},
                    {icon: 'photo_camera', text: 'Imagens', link: 'home.images'},
                    {icon: 'perm_identity', text: 'Comunidade', link: 'home.community'},
                    {icon: 'send', text: 'ASIAG', link: 'home.community'}
                ],

                activeItem: false,

                user: Auth.user

            }

        },

        computed: {

            username() {

//                return this.user.data ? this.user.data.name : '';

                return this.$store.getters.username;

            },

            authenticated() {

//                return this.user.check;

                return this.$store.state.user.user.check;

            }

        },


        methods: {

            login() {

                Auth.login();

            }

        },


        components: {

            'auth-component': AuthComponent,

            'oauth-component': OAuthComponent

        }

    }

</script>