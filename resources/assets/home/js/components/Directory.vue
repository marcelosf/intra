<template>

    <div>

        <div>

            <div class="row">

                <h4>Diretoria</h4>

            </div>

            <v-card v-for="card in cards" :key="card.weight">

                <v-card-media :src="card.image" height="100px"></v-card-media>

                <v-card-title primary-title>

                    <div>

                        <h3 class="headline mb-0">{{card.title}}</h3>

                    </div>

                </v-card-title>

            </v-card>

        </div>

    </div>

</template>

<script>

    export default {

        data() {

            return {


                        cards: [

                            {

                                weight: 0,
                                title: 'Carreira dos Funcionário',
                                content: 'Carreida dos functionários Técenicos e administrativos',
                                image: 'http://wallpapercave.com/wp/wp1813090.png',
                                link: ''


                            },

                            {
                                weight: 1,
                                title: 'Lista Triplice',
                                content: 'Escolha da lista triplice para diretor do IAG',
                                image: 'http://wallpapercave.com/wp/wp1813090.png',
                                link: ''


                            },

                            {
                                weight: 2,
                                title: 'IAG 2020',
                                content: 'Plano Diretor IAG 2020',
                                image: 'http://wallpapercave.com/wp/wp1813090.png',
                                link: ''


                            },






                            {

                                weight: 3,
                                title: 'Previdencia Complementar',
                                content: 'Previdencia Complementar PREVICOM',
                                image: 'http://wallpapercave.com/wp/wp1813090.png',
                                link: ''


                            },

                            {

                                weight: 4,
                                title: 'Carreira',
                                content: 'Carreida dos functionários Técenicos e administrativos',
                                image: 'http://wallpapercave.com/wp/wp1813090.png',
                                link: ''


                            },

                            {

                                weight: 5,
                                title: 'Asistências',
                                content: 'Carreida dos functionários Técenicos e administrativos',
                                image: 'http://wallpapercave.com/wp/wp1813090.png',
                                link: ''


                            },




                ]




            }

        }

    }

</script>