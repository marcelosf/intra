<template>

    <v-container grid-list-md2>

        <v-layout row wrap>

            <h6>Serviços</h6>

        </v-layout>

        <v-layout row wrap justify-end>

            <v-flex xs3 v-for="(s, i) in services" :key="i" class="mb-4 px-3">

                <v-card hover height="200px">

                    <v-card-media @click="cardClick(s.link)" :src="s.media" height="150px">

                        <span class="headline white--text pl-3" v-text="s.title"></span>

                    </v-card-media>

                    <v-card-actions>

                        <v-spacer></v-spacer>

                        <v-btn v-if="s.add" icon :to="{name: s.add}">

                            <v-icon>add</v-icon>

                        </v-btn>

                        <v-btn v-if="s.list" icon :to="{name: s.list}">

                            <v-icon>list</v-icon>

                        </v-btn>

                    </v-card-actions>

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
                    {
                        title: 'Manutenção',
                        media: 'https://cdn.evbuc.com/eventlogos/110429189/facilitiesmanagement2.jpg',
                        link: 'maintenence.index',
                        add: 'maintenence.new',
                        list: 'maintenence.index'
                    },
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