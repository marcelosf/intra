<template>

    <div>

        <v-dialog v-model="dialog" fullscreen transition="dialog-bottom-transition" :overlay=false>

            <v-btn icon slot="activator" @click.native.stop="login()">

                <v-icon class="white--text">account_circle</v-icon>

            </v-btn>

            <v-card>

                <v-toolbar class="light-blue white--text">

                    <v-btn icon dark @click.native.stop="closeDialog()">

                        <v-icon>close</v-icon>

                    </v-btn>

                    <v-toolbar-title>Intranet IAG</v-toolbar-title>

                </v-toolbar>

                <v-card-text>

                    <div v-if="dialog">

                        <div v-if="resource.url">

                            <iframe id="login-page"
                                    :src="resourceUrl"
                                    frameborder="0"
                                    width="95%"
                                    height="90%"
                                    scrolling="no"
                                    style="position: absolute;">

                            </iframe>

                        </div>

                        <div v-else>

                            <v-progress-circular indeterminate v-bind:size="70" class="primary--text text-md-center"></v-progress-circular>

                        </div>

                    </div>

                </v-card-text>

            </v-card>

        </v-dialog>

    </div>

</template>

<script>

    import Auth from '../../common/services/auth';

    export default {

        data() {

            return {

                resource: {

                    url: false,

                    iframe: true

                },

            }

        },

        computed: {

            resourceUrl() {

                return this.resource.url;

            },

            dialog() {

                return this.$store.state.home.dialog;

            }

        },

        methods: {

            login() {

                this.$store.commit('loginDialog', true);

                Auth.login(this.resource);

            },

            iframe() {

                switch (this.resource.iframe) {

                    case true: {

                        this.resource.iframe = false;

                        break;
                    }

                    case false: {

                        this.$store.commit('loginDialog', false);

                        this.resource.url = false;

                        this.resource.iframe = !this.resource.iframe;

                        break;
                    }

                }

            },

            closeDialog() {

                this.$store.commit('loginDialog', false);

                this.resource.url = false;

                this.resource.iframe = !this.resource.iframe;

            }

        }

    }

</script>