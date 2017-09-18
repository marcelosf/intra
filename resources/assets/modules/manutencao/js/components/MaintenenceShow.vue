<template>

    <v-container grid-list-xs>

        <v-card>

            <v-toolbar class="white" light>

                <v-toolbar-title>Chamado {{ code }}</v-toolbar-title>

                <v-spacer></v-spacer>

                <v-btn flat :to="{ name: 'maintenence.index' }">

                    <v-icon>list</v-icon>

                    Lista

                </v-btn>

            </v-toolbar>

                <v-layout row wrap>

                    <v-flex xs12 md6 >

                        <div class="pa-4">

                            <v-toolbar class="white">

                                <v-toolbar-title>Solicitante</v-toolbar-title>

                            </v-toolbar>

                        </div>

                    </v-flex>

                </v-layout>

        </v-card>

    </v-container>

</template>

<script>

    import resourceMixins from '../mixins/resourceMixins'

    export default {
        
        mixins: [resourceMixins],

        created() {

            this.loadService();

        },

        data() {

            return {

                code: '',

            }

        },

        methods: {

            loadService() {

                this.getResource(this.$route.params.id).then((response) => {

                    let service = response.data.solicitacao;

                    this.code = service.codigo;

                });

            }

        }

    }

</script>