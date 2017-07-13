<template>

        <div>

            <template-component></template-component>


        </div>

</template>

<script>

    import templateComponent from '../../../common/components/Template.vue';

    export default {

        data() {

            return {

                menuItems: [
                    {icon:'home', text: 'Home', link: 'home.index'},
                    {icon:'account_balance', text: 'Diretoria', link: 'home.directory'},
                    {icon:'school', text: 'Colegiados', link:'home.collegiate'},
                    {icon:'mail', text: 'E-mail', link:'home.email'},
                    {icon:'computer', text: 'Suporte', link:'home.support'},
                    {icon:'build', text: 'Serviços', link:'home.services'},
                    {icon:'photo_camera', text: 'Imagens', link:'home.images'}

                ]

            }

        },

        components: {

            'template-component': templateComponent

        }

    }

</script>