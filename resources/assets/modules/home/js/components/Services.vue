<template>

    <v-container grid-list-md2>

        <v-layout row wrap>

            <h4>Serviços</h4>

        </v-layout>

        <v-layout row wrap justify-end>

            <v-flex xs3 v-for="(s, i) in services" :key="i" class="mb-4 px-3">

                <v-card height="200px">

                    <v-card-media class="white--text" :src="s.media" height="100px">

                        <v-container fill-height fluid>

                            <v-layout fill-height>

                                <v-flex xs12 align-end flexbox>

                                    <span class="headline">{{ s.title }}</span>

                                </v-flex>

                            </v-layout>

                        </v-container>

                    </v-card-media>

                    <v-card-title>

                        <div>

                            <span>Whitsunday Island, Whitsunday Islands</span>

                        </div>

                    </v-card-title>

                </v-card>

            </v-flex>

        </v-layout>

    </v-container>

</template>

<script>

    export default {

        data() {

            return {

                services: [

                    {title: 'Audiovisual', media: '', link: ''},
                    {title: 'Copa', media: '', link: ''},
                    {title: 'LIme', media: '', link: ''},
                    {title: 'Manutenção', media: 'https://cdn.evbuc.com/eventlogos/110429189/facilitiesmanagement2.jpg', link: ''},
                    {title: 'Patrimônio', media: '', link: ''},
                    {title: 'Plotagem', media: '', link: ''},
                    {title: 'Transporte', media: '', link: ''},
                    {title: 'Acesso', media: '', link: ''},
                    {title: 'Chaves', media: '', link: ''},

                ]

            }

        }

    }

</script>