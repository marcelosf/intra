<template>

    <div>

        <div class="layout-padding full-height bg-grey-3">

            <div class="row">

                <h4>Diretoria</h4>

            </div>

            <div class="row gutter sm-column" v-for="row in rows">

                <div v-for="card in row.cards" class="width-3of3">

                    <div  class="card width-1of3">

                        <div class="card-title bg-white ">{{ card.title }}</div>

                        <img :src="[card.image]">

                    </div>

                </div>

                <div class="offset-"></div>

            </div>

        </div>

    </div>

</template>

<script>

    export default {

        data() {

            return {


                rows: [

                    {

                        cards: [

                            {

                                title: 'Carreira dos Funcionário',
                                content: 'Carreida dos functionários Técenicos e administrativos',
                                image: 'http://wallpapercave.com/wp/wp1813090.png',
                                link: ''


                            },

                            {

                                title: 'Lista Triplice',
                                content: 'Escolha da lista triplice para diretor do IAG',
                                image: 'http://wallpapercave.com/wp/wp1813090.png',
                                link: ''


                            },

                            {

                                title: 'IAG 2020',
                                content: 'Plano Diretor IAG 2020',
                                image: 'http://wallpapercave.com/wp/wp1813090.png',
                                link: ''


                            },


                        ]

                    },

                    {

                        cards: [

                            {

                                title: 'Previdencia Complementar',
                                content: 'Previdencia Complementar PREVICOM',
                                image: 'http://wallpapercave.com/wp/wp1813090.png',
                                link: ''


                            },

                            {

                                title: 'Carreira',
                                content: 'Carreida dos functionários Técenicos e administrativos',
                                image: 'http://wallpapercave.com/wp/wp1813090.png',
                                link: ''


                            },

                            {

                                title: 'Asistências',
                                content: 'Carreida dos functionários Técenicos e administrativos',
                                image: 'http://wallpapercave.com/wp/wp1813090.png',
                                link: ''


                            },


                        ]

                    }


                ]




            }

        }

    }

</script>