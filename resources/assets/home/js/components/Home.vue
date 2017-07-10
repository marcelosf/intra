<template>

    <div>

        <q-layout>

            <div slot="header" class="toolbar white">

                <q-toolbar-title :padding="2">Logo</q-toolbar-title>

            </div>

            <q-drawer>

                <menu-drawer-component></menu-drawer-component>

            </q-drawer>


            <transition name="content-fade" mode="out-in">

                <router-view class="layout-view"></router-view>

            </transition>

            <div slot="footer" class="toolbar bg-grey-2">

                IAG - Instituto de Astronomia, Geofísica e Ciências Atmosféricas | Rua do Matão, 1226 - Cidade Universitária - São Paulo - CEP 05508-090 SP Tel 55 (11) 3091-4762 Fax 55 (11) 3091-2801

            </div>

        </q-layout>

    </div>

</template>


<script>

    import HeadercComponent from '../../../common/components/Header.vue';
    import MenuDrawerComponent from '../../../common/components/MenuDrawer.vue';

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

            'header-component': HeadercComponent,
            'menu-drawer-component': MenuDrawerComponent

        }

    }

</script>