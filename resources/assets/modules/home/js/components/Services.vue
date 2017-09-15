<template>

    <v-container grid-list-md2>

        <v-layout row wrap>

            <h6>Serviços</h6>

        </v-layout>

        <v-layout row wrap justify-end>

            <v-flex xs3 v-for="(s, i) in services" :key="i" class="mb-4 px-3">

                <v-card hover @click="cardClick(s.link)" height="200px">

                    <v-card-media :src="s.media" height="120px"></v-card-media>

                    <v-card-title primary-title>

                        <div>

                            <div class="title">{{ s.title }}</div>

                        </div>

                    </v-card-title primary-title>

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
                    {title: 'Manutenção', media: 'https://cdn.evbuc.com/eventlogos/110429189/facilitiesmanagement2.jpg', link: 'maintenence.index'},
                    {title: 'Patrimônio', media: '', link: ''},
                    {title: 'Plotagem', media: '', link: ''},
                    {title: 'Transporte', media: '', link: ''},
                    {title: 'Acesso', media: '', link: ''},
                    {title: 'Chaves', media: '', link: ''},

                ]

            }

        },

        methods: {

            cardClick(link){

                this.$router.push({name: link});

            }

        }

    }

</script>