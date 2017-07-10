<template>

    <div class="bg-grey-3 full-height no-scroll">

        <div class="row">

            <div class="toolbar white shadow-2">

                <q-toolbar-title :padding="2">LOGO</q-toolbar-title>

            </div>

        </div>

        <div class="row sm-column">

            <div class="column">

                <div class="list no-border platform-delimiter">

                    <q-drawer-link v-for="item in menuItems" :icon="item.icon" :to="{name: [item.link]}">

                        {{ item.text }}

                    </q-drawer-link>

                </div>

            </div>

            <div class="column">

                <transition name="content-fade" mode="out-in">

                    <router-view class="layout-view"></router-view>

                </transition>

            </div>

        </div>

        <div class="toolbar bg-grey-2 fixed-bottom"></div>

    </div>

</template>


<script>

    import HeadercComponent from '../../../common/components/Header.vue';

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

            'header-component': HeadercComponent

        }

    }

</script>